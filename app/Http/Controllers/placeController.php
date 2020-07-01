<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Banner;
use App\main_categories;
use App\place;
use App\holiday_categories;
use App\comfort_categories;
use DB;
use Session;
use File;

class placeController extends Controller
{
    
    public function managePlace() {

    	if(session('admin_session_id')) {

    		//$data['place'] = place::all();
			$data['place'] = DB::table('place')->get();
    		//return view('admin/maincategoryListings',$data);
    		return view('admin/managePlace',$data);
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }		public function pl_details_front ($id) {		 $data['plid']=$id;			return view('user/placesto_details',$data);	}
    
   
	
	public function addplace (Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'pname' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('placebanner', $imageName);
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/placebanner/" . $imageName);
                //$categories = implode(",",$request->main_category);
                $data = DB::table('place')->insert(['place' => $request->pname,'banner' => $imageName,'status' => '1',]);
                Session::flash('code','success');
                return redirect('admin/place')
                    ->with('status','Place added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//placeEditview
	
	public function placeEditview ($id) {

        if(session('admin_session_id')) {
			$data['data'] = DB::table('place')->where(['id'=>$id])->first();    
			//print_r($data['data']);
			//exit;
			return view('admin/placeEditview',$data);

    	} else {

			return redirect()->to('/admin');

    	}

    }
	
	public function updateplace (Request $request) {

        if(session('admin_session_id')) {
			$validatedData = $request->validate([
                    'placename' => 'required',
                    'placeid' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {
				
				
				if($request->hasFile('image')) {
				    
				    $imageName = request()->image->getClientOriginalName();
                request()->image->move('placebanner', $imageName);
				$data = DB::table('place')->where('id',$request->placeid)->update(['place' => $request->placename,'banner' => $imageName,'status' => '1',]);
				//$sql = DB::table('superstar')->where('id',$request->sid)->update(['similar_listings'=>$propertyar,]);
                Session::flash('code','success');
                return redirect('admin/place')
                    ->with('status','Place Updated successfully !!');
				    
				}
				else
				{
					$data = DB::table('place')->where('id',$request->placeid)->update(['place' => $request->placename]);
					Session::flash('code','success');
					return redirect('admin/place')
                    ->with('status','Place Updated successfully !!');
					
				}

                
            }

			

    	} else {

			return redirect()->to('/admin');

    	}

    }
	
	
    
}
