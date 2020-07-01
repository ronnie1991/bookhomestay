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

class FoodController extends Controller
{
    
	
	
	//add room details ui->add_room_ui
	public function addfood_blog () {
        if(session('admin_session_id')) {
			$data['place'] = DB::table('place')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/add_foodblog_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//addgrace
	public function addgrace () {
        if(session('admin_session_id')) {
			$data['place'] = DB::table('place')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/add_grace_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	//add supersatr details
	
	public function add_foodblog_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'place' => 'required',
                    'rank' => 'required',
                    'food_name' => 'required',
                    'title' => 'required',
                    'description' => 'required',                  
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {
				
				

                $imageName = request()->image->getClientOriginalName();
                //$banner = request()->banner->getClientOriginalName();
                //request()->food_image->move('propertypic', $imageName);
                request()->image->move('food_blog_pic', $imageName);
                //request()->image->move('food_blog_pic', $banner);

				
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/food_blog_pic/" . $imageName);
                
                $data = DB::table('food_blog')->insert([
				'place' => $request->place,
				'rank' => $request->rank,
				'similar_listings' => '',
				'name' => $request->food_name,
				'title' => $request->title,
				'image' => $imageName,
				'description' => $request->description,]);
				
                Session::flash('code','success');
                return redirect('admin/addfood_blog')
                    ->with('status','Food Blog Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	//update_foodblog_details
	
	public function update_foodblog_details(Request $request) {
        if(session('admin_session_id')) {
			
			//echo 'yes';
			//exit;
			
            $validatedData = $request->validate([
                    'id' => 'required',
                    'place' => 'required',
                    'name' => 'required',
                    'rank' => 'required',
                    'title' => 'required',
                    'description' => 'required',
                ]);
            if($validatedData) {
				
				if($request->hasFile('image')) {

				$imageName = request()->image->getClientOriginalName();
				request()->image->move('food_blog_pic', $imageName);
				//File::delete('propertyrooms_pic/'.$getimg);
				
				
				$data = DB::table('food_blog')
				->where('id',$request->id)
				->update([
				'name' => $request->name,
				'place' => $request->place,
				'rank' => $request->rank,
				'title' => $request->title,
				'description' => $request->description,
				'image' => $imageName,
				]);
				
                Session::flash('code','success');
                return redirect('admin/foodblog_details_view/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				else
				{
					
				
				$data = DB::table('food_blog')
				->where('id',$request->id)
				->update([
				'name' => $request->name,
				'place' => $request->place,
				'rank' => $request->rank,
				'title' => $request->title,
				'description' => $request->description,
				]);
				
                Session::flash('code','success');
                return redirect('admin/foodblog_details_view/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//add_grace_details
	
	
	
	public function add_grace_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'place' => 'required',
                    'rank' => 'required',
                    'food_name' => 'required',
                    'title' => 'required',
                    'description' => 'required',                  
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    
                ]);
            if($validatedData) {
				
				

                $imageName = request()->image->getClientOriginalName();
                //$banner = request()->banner->getClientOriginalName();
                //request()->food_image->move('propertypic', $imageName);
                request()->image->move('food_blog_pic', $imageName);
                //request()->image->move('food_blog_pic', $banner);

				
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/food_blog_pic/" . $imageName);
                
                $data = DB::table('grace')->insert([
				'place' => $request->place,
				'rank' => $request->rank,
				'similar_listings' => '',
				'name' => $request->food_name,
				'title' => $request->title,
				'image' => $imageName,
				'description' => $request->description,]);
				
                Session::flash('code','success');
                return redirect('admin/addgrace')
                    ->with('status','Grace & Beauty Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	////show supersatr view
	public function showfood_blog () {
        if(session('admin_session_id')) {
			$data['food_blog'] = DB::table('food_blog')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_food_blog',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//showgrace
	public function showgrace () {
        if(session('admin_session_id')) {
			//$data['grace'] = DB::table('grace')->get();    		
			//$data['id'] = $id;    	
			$data['sight_scene'] = DB::table('sightseen')->get(); 			
    		return view('admin/show_grace',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	public function foodblog_details ($id) {
        if(session('admin_session_id')) {
			$data['food_blog'] = DB::table('food_blog')->where(['id'=>$id])->get();   
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_foodblog_details',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//foodblog_details_view
	
	public function foodblog_details_view ($id) {
        if(session('admin_session_id')) {
			$data['food_blog'] = DB::table('food_blog')->where(['id'=>$id])->get();   
			//print_r($data['food_blog']);
			//exit;
    		return view('admin/foodblog_details_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//foodblog_details_front
	public function foodblog_details_front ($id) {
        
			$data['food_blog'] = DB::table('food_blog')->where(['id'=>$id])->get(); 
			$data['foodBlogId'] = $id;			return view('user/foodblog_details',$data);	}			
	
	//grace_details_front
	
	public function grace_details_front ($id) {
        
			$data['grace'] = DB::table('sightseen')->where(['id'=>$id])->get(); 
			$data['graceid'] = $id;
			
    		return view('user/grace_details',$data);
    	


    }
	
	//topexp_details_front
	public function topexp_details_front ($id) {
			
			$data['top'] = DB::table('toprated_exp')->where(['id'=>$id])->get(); 
			$data['topid'] = $id;
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		//return view('admin/show_foodblog_details',$data);
			//print_r($data['food_blog']);
			//exit;
    		return view('user/toprated_exp_details',$data);
    	


    }
	
	//update_placestoc_to_grace
	public function update_placestoc_to_grace(Request $request) {
        if(session('admin_session_id')) {
			//echo 'yes';
			//exit;
            $validatedData = $request->validate([
                    'placetocid' => 'required',
                    ]);
            if($validatedData) {

				DB::table('grace')->delete();
				//DB::table('users')->delete();
			   
                $placetocid = implode(",",$request->placetocid);
				
				foreach($request->placetocid as $grace)
				{
					//$chk = DB::table('grace')->where('placesto_see_id',$grace)->first();
					$getplace = DB::table('sightseen')->where('id',$grace)->first();
					
					
						//$sql = DB::table('grace')->insert('placesto_see_id'=>$grace);
						$data = DB::table('grace')->insert(['placesto_see_id' => $grace,'placeid' => $getplace->placeId]);
					
					
					
				}
                
				
				Session::flash('code','success');
                return redirect('admin/showgrace')
                  ->with('status','Updated successfully !!');
            }
			

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	public function front_foodblog () {
        
			//$data['food_blog'] = DB::table('food_blog')->get();   
			$data['food_blog'] = DB::table('food_blog')->select('place')->distinct()->get();			
			
			return view('user/food_blog',$data);
    	
    }
	
	//front_grace
	public function front_grace () {
        
		
			//$data['grace']  = DB::table('grace')->get();
			$data['grace']  = DB::table('grace')->select('placeid')->distinct()->get();
			//echo '<pre>';
			//print_r($data['grace']);
			//echo '</pre>';
			//exit;
		return view('user/grace',$data);
    	
    }
	
	public function grace_all ($id) {
	    
	         $data['place'] = DB::table('place')->where('id',$id)->first();
			 $data['grace_all'] = DB::table('sightseen')->where('placeId',$id)->orderBy('title', 'ASC')->get();
			
		return view('user/grace_all',$data);

    	
    }
    
    public function explore_all_homestays ($id) {
        
        
             $data['place'] = DB::table('place')->where('id',$id)->first();
			 $data['expAllHOmsty'] = DB::table('properties')->where(['placeid'=>$id])->where(['main_category'=>'1'])->get(); 
			
		return view('user/explor_all_homestays',$data);

    	
    }
    
  
	
	
	//food_all
	public function food_all ($id) {
        
			$data['food_blog'] = DB::table('food_blog')->where(['place'=>$id])->get(); 
			//print_r($data['food_blog']);
			//echo '</pre>';
			//exit;
			return view('user/food_all',$data);

    	
    }
	
	//front_exp
	public function front_exp () {
        
			//$data['toprated_exp'] = DB::table('toprated_exp')->get();    		
			$data['toprated_exp'] = DB::table('toprated_exp')->select('place')->distinct()->get();
			return view('user/topprated',$data);
    	
    }
	
	//toprated_all
	public function toprated_all ($id) {
        
			$data['toprated_all'] = DB::table('toprated_exp')->where(['place'=>$id])->get(); 
			//print_r($data['toprated_all']);
			//echo '</pre>';
			//exit;
			return view('user/toprated_all',$data);

    	
    }
	
	//get_smlistings_foodblog
	public function get_smlistings_foodblog ($id) {
        if(session('admin_session_id')) {
			//echo $id;
			///echo $placeid;
			///exit;
			$getplace = DB::table('food_blog')->where(['id'=>$id])->first(); 
			$placeid = $getplace->place;
			//exit;
			$data['food'] = DB::table('food_blog')->where(['id'=>$id])->get(); 
			$data['properties'] = DB::table('properties')->where(['placeid'=>$placeid])->get();    		
			//$data['big'] = $id;    		
    		return view('admin/update_smlistings_food_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//get_smlistings_grace
	public function get_smlistings_grace ($id) {
        if(session('admin_session_id')) {
			//echo $id;
			///echo $placeid;
			///exit;
			$getplace = DB::table('sightseen')->where(['id'=>$id])->first(); 
			$placeid = $getplace->placeId;
			//exit;
			$data['grace'] = DB::table('grace')->where(['placesto_see_id'=>$id])->get(); 
			$data['properties'] = DB::table('properties')->where(['placeid'=>$placeid])->get();    		
			//$data['big'] = $id;    
			
    		return view('admin/update_smlistings_grace',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//update_smlistings_tofood
	public function update_smlistings_to_food(Request $request) {
		
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'proid' => 'required',
                    'foodblogid' => 'required',
                    ]);
            if($validatedData) {

               //print_r($request->proid);
                $request->foodblogid;
				
                $propertyar = implode(",",$request->proid);
				//print_r($propertyar);
				//exit;
                $sql = DB::table('food_blog')->where('id',$request->foodblogid)->update(['similar_listings'=>$propertyar,]);
				
				Session::flash('code','success');
                return redirect('admin/get_smlistings_foodblog/'.$request->foodblogid)
                    ->with('status','Property Listings added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	///update_smlistings_to_grace
	
	public function update_smlistings_to_grace(Request $request) {
		
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'proid' => 'required',
                    'graceid' => 'required',
                    ]);
            if($validatedData) {

               //print_r($request->proid);
                $request->graceid;
				
                $propertyar = implode(",",$request->proid);
				//print_r($propertyar);
				//exit;
                $sql = DB::table('grace')->where('id',$request->graceid)->update(['similar_listings'=>$propertyar,]);
				
				Session::flash('code','success');
                return redirect('admin/get_smlistings_grace/'.$request->graceid)
                    ->with('status','Property Listings added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
    
}
