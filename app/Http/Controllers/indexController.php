<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Address;
use App\Restaurant;
use App\Banner;
use App\Promotion;
use App\Recipe;
use App\Order;
use Session;
use DB;
// use Hash;

class  indexController extends Controller
{
	public function map() {
		return view('user/map');
	}
    
    public function index()   {

		$data['placeforselect'] = DB::table('place')->get();
		/*(
            [0] => Array
        (
            [placeid] => 1
            [place] => Chikmagaluru
            [banner] => chikmagaluru.jpg
            [price] => 5678
        )

    [1] => Array
        (
            [placeid] => 2
            [place] => Coorg
            [banner] => coorg.jpg
            [price] => 5678
        )
		)*/
		$getplace = DB::table('place')->get();  
		foreach($getplace as $placear)
		{
			$placeid = $placear->id;
			$getlowhotelfare = DB::table('properties')->where('placeid',$placeid)->get();
			$var = $getlowhotelfare->min('price');
			
			$data['data'][] = array('placeid'=>$placeid,'place'=>$placear->place,'banner'=>$placear->banner,'price'=>$var);
		}
		
		/*holiday category*/
		/*
		(
            [holydayid] => 7
            [title] => River Beds
            [banner] => shiva-lingas-carvings.jpg
            [price] => 
        )

		[7] => Array
        (
            [holydayid] => 8
            [title] => Cities
            [banner] => startups-in-bangalore.jpg
            [price] => 2000
        )
		*/
		$getholiday = DB::table('holiday_categories')->orderBy('id','desc')->get();  
		foreach($getholiday as $holydayar)
		{
			$holyid = $holydayar->id;
			$getholylowhotelfare = DB::table('properties')->where('holiday_category',$holyid)->get();
			
			$var = $getholylowhotelfare->min('price');
			$data['holiday'][] = array('holydayid'=>$holyid,'title'=>$holydayar->holiday_category,'banner'=>$holydayar->image,'price'=>$holydayar->price);
			
		}
		
		
		
		/*comfort category*/
		/*
		[0] => Array
        (
            [comfortid] => 1
            [title] => Camping Tents
            [banner] => camping-tent.jpg
            [price] => 20
        )

		[1] => Array
        (
            [comfortid] => 2
            [title] => Wild Life
            [banner] => wild-life.jpg
            [price] => 1001
        )
		*/
		$getcomfort = DB::table('comfort_categories')->orderBy('id','desc')->get();  
		foreach($getcomfort as $comfortar)
		{
			$comid = $comfortar->id;
			$getholylowhotelfare = DB::table('properties')->where('confort_id',$comid)->get();
			$var = $getholylowhotelfare->min('price');
			
			$data['comfort'][] = array('comfortid'=>$comid,'title'=>$comfortar->name,'banner'=>$comfortar->image,'price'=>$comfortar->price);
		}
		
		/*super star*/
		/*
		(
                    [id] => 2
                    [name] => Puneeth Rajkumar
                    [title] => Ninnindhale Coorg
                    [image] => puneeth-rajkumar.jpg
                    [description] => Puneeth Rajkumar is an Indian film actor, playback singer, producer and anchor who works primarily in Kannada cinema. He is famously known as Appu and Power star. He has been a lead actor in 27 films; as a child he appeared in films featuring his father Rajkumar.
        )
		*/
		$data['superstar'] = DB::table('superstar')->orderBy('rank', 'asc')->orderBy('id','desc')->get();
		
		
		$data['toprated'] = DB::table('toprated_exp')->orderBy('rank', 'asc')->orderBy('id','desc')->get();
		
		/*hi rating property*/
		/*
		[id] => 2
		[manual_pro_id] => xe 45
		[placeid] => 6
		[hostid] => 2
		[main_category] => 1,2,3,4,5,6
		[holiday_category] => 2
		[confort_id] => 1
		[season_id] => 1
		[hotel_name] => Hotel Name
		[address] => Hotel Address:
		[latitude] => 19.0760
		[longitude] => 72.8777
		[price] => 700
		[rank] => 2
		[rating] => 3
		[total_person_can_stay] => 0
		[food_image] => 
		[image] => destination-5.jpg
		[available_status] => 0
		*/
		$data['hirating'] = DB::table('properties')->whereBetween('rating',array(3,5))->orderBy('id','desc')->get();
		
		/*
		 [id] => 6
		[email] => divya.shree46@gmail.com
		[password] => myholidaystop1$
		[name] => Divya Shree
		[image] => Experiences.jpg
		[phone] => 9916248212
		[status] => 1
		*/
		$data['host'] = DB::table('host')->whereBetween('rating',array(3,5))->orderBy('id','desc')->get();
		
		
		/*
		 [id] => 3
                    [name] => Monsoon
                    [image] => monsoon.jpg
		*/
		$data['season'] = DB::table('seasons')->get();
		
		
		$data['dontmiss'] = DB::table('dont_missout')->orderBy('rank', 'asc')->orderBy('id','desc')->get();
		
		$data['exp_adv'] = DB::table('exp_adventure')->get();
		
		//echo '<pre>';
		//print_r($data['season']);
		
		//echo '</pre>';
		//exit;
        return view('user.home',$data);
    }
	
	 public function contact()   {
		
		//$data['season'] = DB::table('seasons')->get();
		//echo '<pre>';
		//print_r($data['season']);
		
		//echo '</pre>';
		//exit;
        return view('user.contact_view');
	 } 


	 public function terms_and_conditions()   {
        return view('user.terms_and_conditions');
	 }

	 public function cancellation_policy()   {
        return view('user.cancellation_policy');
	 }
	 
	 public function customer_signup()   {
		
		//$data['season'] = DB::table('seasons')->get();
		//echo '<pre>';
		//print_r($data['season']);
		
		//echo '</pre>';
		//exit;
        return view('user.customer_signup_view');
	 }
	 
	 public function star_details ($id) {
        
			$data['superstar'] = DB::table('superstar')->where(['id'=>$id])->get();  
			$data['superstarId'] = $id;
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		//return view('admin/show_foodblog_details',$data);
			//print_r($data['food_blog']);
			//exit;
    		return view('user/star_details',$data);
    	


    }
     public function allStartsExprience () {
		
		$data['allStarsExp'] = DB::table('superstar')->get();
		return view('user/all_exprience_stars',$data);	
    }
	
	
	 public function bigday ($id) {
        
			$data['bigday'] = DB::table('dont_missout')->where(['id'=>$id])->get();   
			foreach($data['bigday'] as $place)
			{
				$plid = $place->placeid;
			}
			$data['place'] = $plid;
			$data['bigDayId'] = $id;
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		//return view('admin/show_foodblog_details',$data);
			//print_r($data['place']);
			//exit;
    		return view('user/big_day',$data);
    	


    }
	
	//adventure
	
	 public function adventure ($id) {
        
			$data['exp_adventure'] = DB::table('exp_adventure')->where(['id'=>$id])->get();   
			foreach($data['exp_adventure'] as $place)
			{
				$plid = $place->placeid;
			}
			$data['place'] = $plid;
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		//return view('admin/show_foodblog_details',$data);
			//print_r($data['place']);
			//exit;
    		return view('user/adventure',$data);
    	


    }
	
	public function exp_details_front ($id) {
        
			$data['exp'] = DB::table('toprated_exp')->where(['id'=>$id])->get();
			$data['expId'] = $id;
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		//return view('admin/show_foodblog_details',$data);
			//print_r($data['food_blog']);
			//exit;
    		return view('user/exp_details',$data);
    	


    }
	
	//add_exp_view
	public function add_exp_view()   {
		$data['property'] = DB::table('properties')->get();
		$data['place'] = DB::table('place')->get();
        return view('admin/add_exp_view',$data);
	}
	
	//add_bigday_view
	public function add_bigday_view()   {
		$data['placeforselect'] = DB::table('place')->get();
        return view('admin/add_bigday_view',$data);
	}
	
	
	//add exp details
	
	public function add_exp_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'superstar_name' => 'required',
                    'title' => 'required',
                    'description' => 'required',                  
                    'place' => 'required',                  
                    'propertyid' => 'required',                  
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
            if($validatedData) {
				
				

                $imageName = request()->image->getClientOriginalName();
                //request()->food_image->move('propertypic', $imageName);
                request()->image->move('superstar_pic', $imageName);

				
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/superstar_pic/" . $imageName);
                
                $data = DB::table('toprated_exp')->insert([
				'place' => $request->place,
				'property' => $request->propertyid,
				'rank' => $request->rank,
				'similar_listings' => '',
				'name' => $request->superstar_name,
				'title' => $request->title,
				'image' => $imageName,
				'description' => $request->description,]);
				
                Session::flash('code','success');
                return redirect('admin/add_exp_view')
                    ->with('status','Top Rated Experience Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//add_bigday_details
	public function add_bigday_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'date' => 'required',
                    'place' => 'required',
                    'rank' => 'required',
                    'title' => 'required',
                    'description' => 'required',                  
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
                ]);
            if($validatedData) {
				
				

                $imageName = request()->image->getClientOriginalName();
                //request()->food_image->move('propertypic', $imageName);
                request()->image->move('superstar_pic', $imageName);

				
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/superstar_pic/" . $imageName);
                
                $data = DB::table('dont_missout')->insert([
				'date' => $request->date,
				'placeid' => $request->place,
				'rank' => $request->rank,
				'similar_listings' => '',
				'title' => $request->title,
				'image' => $imageName,
				'description' => $request->description,]);
				
                Session::flash('code','success');
                return redirect('admin/add_bigday_view')
                    ->with('status','Top Rated Experience Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//
	
	//update_bigday_details
	public function update_bigday_details(Request $request) {
        if(session('admin_session_id')) {
			
			//echo 'yes';
			//exit;
			
            $validatedData = $request->validate([
                    'id' => 'required',
                    'place' => 'required',
                    'date' => 'required',
                    'rank' => 'required',
                    'title' => 'required',
                    'description' => 'required',
                ]);
            if($validatedData) {
				
				if($request->hasFile('image')) {

				$imageName = request()->image->getClientOriginalName();
				request()->image->move('superstar_pic', $imageName);
				//File::delete('propertyrooms_pic/'.$getimg);
				
				
				$data = DB::table('dont_missout')
				->where('id',$request->id)
				->update([
				'date' => $request->date,
				'placeid' => $request->place,
				'rank' => $request->rank,
				'title' => $request->title,
				'description' => $request->description,
				'image' => $imageName,
				]);
				
                Session::flash('code','success');
                return redirect('admin/bigday_details/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				else
				{
					
				
				$data = DB::table('dont_missout')
				->where('id',$request->id)
				->update([
				'date' => $request->date,
				'placeid' => $request->place,
				'rank' => $request->rank,
				'title' => $request->title,
				'description' => $request->description,
				]);
				
                Session::flash('code','success');
                return redirect('admin/bigday_details/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	//////show exp
	public function show_exp () {
        if(session('admin_session_id')) {
			$data['exp'] = DB::table('toprated_exp')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_exp',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	//big day details->bigday_details
	
	public function bigday_details ($id) {
        if(session('admin_session_id')) {
			$data['big'] = DB::table('dont_missout')->where(['id'=>$id])->get(); 
			//print_r($data['big']);
			//exit;			
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_bigday_details',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	////show exp details
	public function exp_details ($id) {
        if(session('admin_session_id')) {
			$data['exp'] = DB::table('toprated_exp')->where(['id'=>$id])->get(); 
			//print_r($data['exp']);
			//exit;			
			//$data['superstar'] = DB::table('superstar')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_exp_details',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	
	
	
	
	//update_exp_details
	public function update_exp_details(Request $request) {
        if(session('admin_session_id')) {
			
			//echo 'yes';
			//exit;
			
            $validatedData = $request->validate([
                    'id' => 'required',
                    'place' => 'required',
                    'propertyid' => 'required',
                    'rank' => 'required',
                    'exp_name' => 'required',
                    'title' => 'required',
                    'description' => 'required',
                ]);
            if($validatedData) {
				
				if($request->hasFile('image')) {

				$imageName = request()->image->getClientOriginalName();
				request()->image->move('superstar_pic', $imageName);
				//File::delete('propertyrooms_pic/'.$getimg);
				
				$data = DB::table('toprated_exp')
				->where('id',$request->id)
				->update(['place' => $request->place,
				'property' => $request->propertyid,
				'name' => $request->exp_name,
				'title' => $request->title,
				'description' => $request->description,
				'image' => $imageName,
				]);
				
                Session::flash('code','success');
                return redirect('admin/exp_details/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				else
				{
					
				
				$data = DB::table('toprated_exp')
				->where('id',$request->id)
				->update(['place' => $request->place,
				'property' => $request->propertyid,
				'name' => $request->exp_name,
				'title' => $request->title,
				'description' => $request->description,
				]);
				
                Session::flash('code','success');
                return redirect('admin/exp_details/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//show_bigDay
	public function show_bigDay () {
        if(session('admin_session_id')) {
			$data['big'] = DB::table('dont_missout')->get();    		
			//$data['big'] = $id;    	
			//print_r($data['big']);
			//exit;			
    		return view('admin/show_bigDay',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//update_smlistings_toprated
	public function update_smlistings_toprated ($id) {
        if(session('admin_session_id')) {
			//echo $id;
			///echo $placeid;
			///exit;
			$getplace = DB::table('toprated_exp')->where(['id'=>$id])->first(); 
			$placeid = $getplace->place;
			//exit;
			$data['exp'] = DB::table('toprated_exp')->where(['id'=>$id])->get(); 
			$data['properties'] = DB::table('properties')->where(['placeid'=>$placeid])->get();    		
			//$data['big'] = $id;    		
    		return view('admin/update_smlistings_toprated_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//update_pro_to_exp
	public function update_pro_to_exp(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'proid' => 'required',
                    'expid' => 'required',
                    ]);
            if($validatedData) {

               
                $propertyar = implode(",",$request->proid);
				//print_r($propertyar);
				//exit;
                $sql = DB::table('toprated_exp')->where('id',$request->expid)->update(['similar_listings'=>$propertyar,]);
				
				Session::flash('code','success');
                return redirect('admin/update_smlistings_toprated/'.$request->expid)
                    ->with('status','Property Listings added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	//update_smlistings_bigday
	public function update_smlistings_bigday ($id) {
        if(session('admin_session_id')) {
			//echo $id;
			///echo $placeid;
			///exit;
			$getplace = DB::table('dont_missout')->where(['id'=>$id])->first(); 
			$placeid = $getplace->placeid;
			//exit;
			$data['bigday'] = DB::table('dont_missout')->where(['id'=>$id])->get(); 
			$data['properties'] = DB::table('properties')->where(['placeid'=>$placeid])->get();    		
			//$data['big'] = $id;    		
    		return view('admin/update_smlistings_bigday_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	///update_pro_to_big
	public function update_pro_to_big(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'proid' => 'required',
                    'bigdayid' => 'required',
                    ]);
            if($validatedData) {

               // print_r($request->proid);
                //echo $request->bigdayid;
				
                $propertyar = implode(",",$request->proid);
				//exit;
                $sql = DB::table('dont_missout')->where('id',$request->bigdayid)->update(['similar_listings'=>$propertyar,]);
				
				Session::flash('code','success');
                return redirect('admin/update_smlistings_bigday/'.$request->bigdayid)
                    ->with('status','Property Listings added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	public function explorehome(Request $request) {
		$data['place'] = DB::table('place')->get();
		return view('user/explore_home',$data);
	}
	public function placeall () {
		
		$data['place'] = DB::table('place')->get();
		
		return view('user/all_place',$data);
        
			
    	
    }
    public function allHolidaySpots () {
		
		$data['holidayspot'] = DB::table('holiday_categories')->get();
		return view('user/holiday_category',$data);	
    }
    public function allComfortCategory () {
		
		$data['comfort'] = DB::table('comfort_categories')->get();
		return view('user/all_comfort_category',$data);	
    }
     public function allTopratedExpData () {
		
		$data['topRatedExprience'] = DB::table('toprated_exp')->get();
		return view('user/all_toprated_exprience',$data);	
    }
    public function allRecomandedProperty () {
		
		$data['recomdProperty'] = DB::table('properties')->whereBetween('rating',array(3,5))->get();
		return view('user/all_recomanded_properties',$data);	
    }
   
	 public function allBigDay () {
		
		$data['allBigDataData'] = DB::table('dont_missout')->get();
		return view('user/all_big_days',$data);	
    }
     public function allSuperHostData () {
		
		$data['allSuperhost'] = DB::table('host')->whereBetween('rating',array(3,5))->get();
		return view('user/all_super_host',$data);
    }
}