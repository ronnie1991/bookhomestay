<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Banner;
use App\main_categories;
use App\holiday_categories;
use App\comfort_categories;
use DB;
use Session;
use File;

class categoriesController extends Controller
{
    
    public function maincategoryListings() {

    	if(session('admin_session_id')) {

    		$data['promotions'] = main_categories::all();
    		return view('admin/maincategoryListings',$data);
    		//return view('admin/maincategoryListings');
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }
	
	public function holidaycategoryListings() {

    	if(session('admin_session_id')) {

    		$data['holiday'] = holiday_categories::all();
    		return view('admin/holidaycategoryListings',$data);
    		//return view('admin/maincategoryListings');
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }
	
	public function holidayEditview ($id) {

        if(session('admin_session_id')) {
			$data['data'] = DB::table('holiday_categories')->where(['id'=>$id])->first();    
			//print_r($data['data']);
			//exit;
			//[id] => 1 [holiday_category] => Wild-Life [price] => 950 [image] 
			return view('admin/holidayEditview',$data);

    	} else {

			return redirect()->to('/admin');

    	}

    }
	
	
	
	public function addholiday (Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'cname' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('site_images/holiday_category', $imageName);
				$data = DB::table('holiday_categories')->insert(['holiday_category' => $request->cname,'image' => $imageName,]);
                Session::flash('code','success');
                return redirect('admin/holiday-categories')
                    ->with('status','Holiday Category added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	public function updateholiday (Request $request) {

        if(session('admin_session_id')) {
			$validatedData = $request->validate([
                    'holidayname' => 'required',
                    'holidayid' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {
				
				
				if($request->hasFile('image')) {
				    
				$imageName = request()->image->getClientOriginalName();
                request()->image->move('site_images/holiday_category', $imageName);
				$data = DB::table('holiday_categories')->where('id',$request->holidayid)->update(['holiday_category' => $request->holidayname,'image' => $imageName,]);
				//$sql = DB::table('superstar')->where('id',$request->sid)->update(['similar_listings'=>$propertyar,]);
                Session::flash('code','success');
                return redirect('admin/holiday-categories')
                    ->with('status','Holiday Category Updated successfully !!');
				    
				}
				else
				{
					$data = DB::table('holiday_categories')->where('id',$request->holidayid)->update(['holiday_category' => $request->holidayname]);
					Session::flash('code','success');
					return redirect('admin/holiday-categories')
                    ->with('status','Holiday Category Updated successfully !!');
					
				}

                
            }

			

    	} else {

			return redirect()->to('/admin');

    	}

    }
	
	//updateComfort
	public function updateComfort (Request $request) {

        if(session('admin_session_id')) {
			$validatedData = $request->validate([
                    'comfortname' => 'required',
                    'comfortid' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {
				
				
				if($request->hasFile('image')) {
				    
				$imageName = request()->image->getClientOriginalName();
                request()->image->move('site_images/comfort_category', $imageName);
				$data = DB::table('comfort_categories')->where('id',$request->comfortid)->update(['name' => $request->comfortname,'image' => $imageName,]);
				//$sql = DB::table('superstar')->where('id',$request->sid)->update(['similar_listings'=>$propertyar,]);
                Session::flash('code','success');
                return redirect('admin/comfort-categories')
                    ->with('status','Comfort Category Updated successfully !!');
				    
				}
				else
				{
					$data = DB::table('comfort_categories')->where('id',$request->comfortid)->update(['name' => $request->comfortname]);
					Session::flash('code','success');
					return redirect('admin/comfort-categories')
                    ->with('status','Comfort Category Updated successfully !!');
					
				}

                
            }

			

    	} else {

			return redirect()->to('/admin');

    	}

    }
	
	//comfortcategoryListings
	public function comfortcategoryListings() {

    	if(session('admin_session_id')) {

    		$data['comfort'] = comfort_categories::all();
			//print_r($data['comfort']);
			//exit;
			//[id] => 2 [name] => Tiled house [price] => 950 [image] 
    		return view('admin/comfortcategoryListings',$data);
    		//return view('admin/maincategoryListings');
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }
	
	//comfortEditview
	
	public function comfortEditview ($id) {

        if(session('admin_session_id')) {
			$data['data'] = DB::table('comfort_categories')->where(['id'=>$id])->first();    
			//print_r($data['data']);
			//exit;
			//[id] => 2 [name] => Tiled house [price] => 950 [image] 
			return view('admin/comfortEditview',$data);

    	} else {

			return redirect()->to('/admin');

    	}

    }
	
	//addcomfort
	public function addcomfort (Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'cname' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('site_images/comfort_category', $imageName);
				$data = DB::table('comfort_categories')->insert(['name' => $request->cname,'image' => $imageName,]);
                Session::flash('code','success');
                return redirect('admin/comfort-categories')
                    ->with('status','Comfort Category added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
			

}
