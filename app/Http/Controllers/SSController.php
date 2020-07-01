<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Banner;
use App\main_categories;
use App\holiday_categories;
//use App\seoson;
use App\Property;
use DB;
use Session;
use File;

class SSController extends Controller
{
    
	
	
	//add room details ui->add_room_ui
	public function addSuper_star () {
        if(session('admin_session_id')) {
			$data['property'] = DB::table('properties')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/add_superstar_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	//add supersatr details
	
	public function add_superstar_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'superstar_name' => 'required',
                    'title' => 'required',
                    'description' => 'required',                  
                    'propertyid' => 'required',                  
                    'rank' => 'required',                  
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
            if($validatedData) {
				
				

                $imageName = request()->image->getClientOriginalName();
                //request()->food_image->move('propertypic', $imageName);
                request()->image->move('superstar_pic', $imageName);

				
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/superstar_pic/" . $imageName);
                
                $data = DB::table('superstar')->insert(['name' => $request->superstar_name,
				'title' => $request->title,
				'image' => $imageName,
				'description' => $request->description,
				'propertyid' => $request->propertyid,
				'rank' => $request->rank,
				'similar_listings' => '',
				]);
				
                Session::flash('code','success');
                return redirect('admin/addSuper_star')
                    ->with('status','Super Star Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	////show supersatr view
	public function show_star () {
        if(session('admin_session_id')) {
			$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_superstar',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	////show supersatr details
	public function superstar_details ($id) {
        if(session('admin_session_id')) {
			$data['superstar'] = DB::table('superstar')->where(['id'=>$id])->get();   
			   		
    		return view('admin/show_superstar_details',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	
	public function update_smlistings_superstar ($id) {
        if(session('admin_session_id')) {
			//$deliveryboy = DB::table('deliveryboy')->where(['online_status'=>'1','available_status'=>'0'])->get();

			$data['property'] = DB::table('properties')->where(['main_category'=>1])->get();   
			$data['superstar'] = DB::table('superstar')->where(['id'=>$id])->get();
			//echo '<pre>';
			//print_r($data['property_details']);
			//echo '</pre>';
			
			//echo '<pre>';
			//print_r($data['room_details']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('admin/update_sm_listings_superstarview',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//update_pro_to_superstar
	
	public function update_pro_to_superstar(Request $request) {
        if(session('admin_session_id')) {
			
            $validatedData = $request->validate([
					'sid' => 'required',
                    'proid' => 'required',
                    ]);
            if($validatedData) {
			    //$request->propertyid;
				//print_r($request->proid);
				//print_r($request->sid);
				//exit;
				$propertyar = implode(",",$request->proid);
				//print_r($propertyar);
				//exit;
                $sql = DB::table('superstar')->where('id',$request->sid)->update(['similar_listings'=>$propertyar,]);
				
				Session::flash('code','success');
                return redirect('admin/update_smlistings_superstar/'.$request->sid)
                    ->with('status','Property Listings added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	//update_superstar_details	
	
    
}
