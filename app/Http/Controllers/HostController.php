<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Restaurant;
use DB;
use Session;
use File;

class HostController extends Controller
{
     
    public function signup() {
        
        return view('host/signup');

    }

    public function login() {
        
        return view('host/login');

    }
	
	
	
	
	 public function myprofile(Request $request) {
		 if(session('res_session_id')) {
		 
		return view('host/myprofile');
		} else {

    		return redirect()->to('/host');
    	}

    }
	
	//myview
	public function myview(Request $request) {
		 if(session('res_session_id')) {
		 
		return view('host/myview');
		} else {

    		return redirect()->to('/host');
    	}

    }
	
	//updatehostview
	public function updatehostview(Request $request) {
		 if(session('res_session_id')) {
		 
		$validatedData = $request->validate([
                    'userid' => 'required',
                    'view' => 'required',
                   ]);
            if($validatedData) {
				
					 $data = DB::table('host')->where('id',$request->userid)
					->update(['view'=>$request->view,
					]);
					
					Session::flash('code','success');
					return redirect('host/myview')
                    ->with('status','Views On Property Updated successfully !!');
				
				
              
            }
		} else {

    		return redirect()->to('/host');
    	}

    }
	
	//updateprofile
	public function updatehostprofile(Request $request) {
        
            $validatedData = $request->validate([
                    'userid' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'password' => 'required',
					'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
            if($validatedData) {
				
				if(($request->hasFile('image'))) {
					
					$imageName = request()->image->getClientOriginalName();
					
					request()->image->move('host_pic', $imageName);
					
					
					 $data = DB::table('host')->where('id',$request->userid)
					->update(['name'=>$request->name,
					'email'=>$request->email,
					'phone'=>$request->phone,
					'password'=>$request->password,
					'image'=>$imageName]);
					
					Session::flash('code','success');
					return redirect('host/myprofile')
                    ->with('status','Profile Updated successfully !!');
				}
				else{
					
					 $data = DB::table('host')->where('id',$request->userid)
					->update(['name'=>$request->name,
					'email'=>$request->email,
					'phone'=>$request->phone,
					'password'=>$request->password,]);
					
					Session::flash('code','success');
					return redirect('host/myprofile')
                    ->with('status','Profile Updated successfully !!');
					
					
				}

              
            }

        
    }
	
	
	public function host_details($id) {
        
        // $data['hostId'] = $id;
        $data['host'] = DB::table('host')->where('id',$id)->first();
        $data['properties'] = DB::table('properties')->where('hostid',$id)->get();
        
        return view('user/host_details',$data);
       
    }			//UserProfile	public function host_profile(Request $request) {		            return view('host/profile');         }
	
	
	public function dologin(Request $request) {

        $validatedData = $request->validate([           
            'email' => 'required',
            'password' => 'required',                
        ]);

        if($validatedData) {
		
		//print_r($request->email);
		//exit;

            $data = DB::table('host')->where('email',$request->email)->first();

            if($data) {

            $c_password = $data->password;
            $session_id = $data->id;
            $resName = $data->name;

                if($request->password == $c_password) {

                    $request->session()->put('res_session_id', $session_id);
                    $request->session()->put('name', $resName);

                    return redirect()->to('host/dashboard');

                } else {
                    Session::flash('code','danger');
                    return redirect('/host')
                                    ->with('status','Wrong Password !!');
                }

            } else {

                Session::flash('code','danger');
                return redirect('/host')
                    ->with('status','No Data Found !!');

            }
        }

        
    }

    public function logout() {

        session()->get('res_session_id');
        session()->forget('res_session_id');
        session()->flush();
        return redirect()->to('/host');

    }

    

    public function dashboard() {

        if(session('res_session_id')) {

            return view('host/dashboard');

        } else {

          return redirect()->to('/host'); 
        }

        
    }
	
	
	public function register(Request $request) {

        $validatedData = $request->validate([
                'resName' => 'required',
                'phone' => 'required',
                'email' => 'required',
                'password' => 'required',
				//'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if($validatedData) {

            //Restaurant::create($validatedData);
			//$imageName = request()->image->getClientOriginalName();
            //request()->image->move('host_pic', $imageName);
			//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/host_pic/" . $imageName);
               
			$data = DB::table('host')->insert(['email' => $request->email,
				'password' => $request->password,
				'name' => $request->resName,
				'phone' => $request->phone,
				'rating' => '',
				'view' => '',
				'image' => '',
				'status' => '1',]);
            
            Session::flash('code','success');
            return redirect('/host')
                ->with('status','You have registered successfully!!');

        }


    }
	
	//showHost
	public function showHost() {

    	if(session('admin_session_id')) {

    		//$data['place'] = place::all();
			$data['host'] = DB::table('host')->get();
    		//return view('admin/maincategoryListings',$data);
    		return view('admin/manageHost',$data);
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }
    

    


    /*

    public function editprofile(Request $request) {

        if(session('res_session_id')) {

            $validatedData = $request->validate([
                    'address' => 'required',
                    'lat' => 'required',
                    'long' => 'required',
                    'imagefile' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'tagLine' => 'required',
                    'totalRating' => 'required',
                    'totalPersonRating' => 'required',
                    'closed' => 'required',
                    'contactMail' => 'required|email',
                    'supportMail' => 'required|email',
                    'phone' => 'required',
                    'optionalPhone' => 'required',
                    'status' => 'required',
            ]);


            if($validatedData) {

                $delData = DB::table('restaurants')->where('resId',session('res_session_id'))->first();
                 

                if($request->hasFile('imagefile') && $delData->coverPic ) { 

                    if($delData->coverPic) {
                        
                        File::delete('rest_images/' . $delData->coverPic);
                        
                    }  
                
                    $imageName = request()->imagefile->getClientOriginalName();
                    request()->imagefile->move('rest_images', $imageName);

                    $imc = $request->all();
                    unset($imc['imagefile']);
                    unset($imc['_token']);

                    $finalData = array_merge($imc, array('coverPic' => $imageName));

                                          
                    Restaurant::where('resId', session('res_session_id'))
                                  ->update($finalData);                  
                                           
                } else if($request->hasFile('imagefile')){

                    $imageName = request()->imagefile->getClientOriginalName();
                    request()->imagefile->move('rest_images', $imageName);

                    $imc = $request->all();
                    unset($imc['imagefile']);
                    unset($imc['_token']);

                    $finalData = array_merge($imc, array('coverPic' => $imageName));

                                          
                    Restaurant::where('resId', session('res_session_id'))
                                  ->update($finalData);

                    
                } else {

                   Restaurant::where('resId', session('res_session_id'))
                              ->update($validatedData);
                }
                 

                Session::flash('code','success');
                return redirect('restaurant/profile')
                    ->with('status','You have updated successfully!!');                
            }           

        } else {

          return redirect()->to('/restaurant'); 
        }
        
    }

    

    public function wallet() {

        if(session('res_session_id')) {

           return view('restaurant/wallet');

        } else {

          return redirect()->to('/restaurant'); 
        }

        
    }*/
	
	
	//viewPoperty
	public function property_listing($id) {

    	if(session('res_session_id')) {

    		// $data['holiday'] = holiday_categories::all();
    		//return view('admin/holidaycategoryListings',$data);
            //$data['categories'] = DB::table('main_categories')->get();
            //$data['place'] = DB::table('place')->get();
            //$data['host'] = DB::table('host')->get();
            //$data['comfort_categories'] = DB::table('comfort_categories')->get();
			//$data['property_details'] = DB::table('properties')->where(['id'=>$id])->get();   
            $data['property'] = DB::table('properties')->where(['hostid'=>$id])->get();   
			//echo '<pre>';
            //print_r($data['property']);
			//echo '</pre>';
			//print_r($data['property']['placeid']);
			//$this->items[$key];
			//exit;
    		return view('host/property_view_host',$data);
    		

    	} else {

    		return redirect()->to('/host');
    	}

    }
	
	//property_details
	public function property_details ($id) {
        if(session('res_session_id')) {
			//$deliveryboy = DB::table('deliveryboy')->where(['online_status'=>'1','available_status'=>'0'])->get();

			$data['property_details'] = DB::table('properties')->where(['id'=>$id])->get();   
			$data['room_details'] = DB::table('room_details')->where(['property_id'=>$id])->get();
			return view('host/propertydetailsview',$data);
    	} else {

    		return redirect()->to('/host');
    	}
    }
	
	//booking requested
	public function booking_requested ($id) {
        if(session('res_session_id')) {
			
			$getbooking = DB::table('booking')->where(['hostid'=>$id,'booking_status'=>1])->get();   
			foreach($getbooking as $reqbooking)
			{
				$proid = $reqbooking->property_id;
				
				$bookingid = $reqbooking->id;
				
				$getmanulaproid = DB::table('properties')->where('id',$proid)->first();
				
				$available_status = $getmanulaproid->available_status;
				$manual_pro_id = $getmanulaproid->manual_pro_id;
				$hotel_name = $getmanulaproid->hotel_name;
				
				$data['data'][] = array(
				'property_id'=>$proid,
				'bookingid'=>$bookingid,
				'proid'=>$manual_pro_id,
				'hotel_name'=>$hotel_name,
				'room_type'=>$reqbooking->room_type,
				'booking_date'=>$reqbooking->booking_date,
				'datefrom'=>$reqbooking->datefrom,
				'dateto'=>$reqbooking->dateto,
				'availble'=>$available_status);
			}
			
			if(isset($data)) {
			 return view('host/booking_request_view',$data);   
			} else {
			    $data = array();
			   return view('host/booking_request_view',$data); 
			}
			//echo '<pre>';
			//print_r($data['data']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('host/booking_request_view',$data);
    	} else {

    		return redirect()->to('/host');
    	}
    }
	
	//booking_approved
	public function booking_approved ($id) {
        if(session('res_session_id')) {
			
			$getbooking = DB::table('booking')
			->where('hostid',$id)
			->where('booking_status','!=',1)
			->get();   
			foreach($getbooking as $reqbooking)
			{
				$proid = $reqbooking->property_id;
			
			$bookingid = $reqbooking->id;
				
				$getmanulaproid = DB::table('properties')->where('id',$proid)->first();
				
				$available_status = $getmanulaproid->available_status;
				$manual_pro_id = $getmanulaproid->manual_pro_id;
				$hotel_name = $getmanulaproid->hotel_name;
			
				$data['data'][] = array(
				'property_id'=>$proid,
				'bookingid'=>$bookingid,
				'proid'=>$manual_pro_id,
				'hotel_name'=>$hotel_name,
				'room_type'=>$reqbooking->room_type,
				'booking_date'=>$reqbooking->booking_date,
				'datefrom'=>$reqbooking->datefrom,
				'dateto'=>$reqbooking->dateto,
				'availble'=>$available_status);
			}
			
			
			
			if(isset($data)) {
			 return view('host/booking_approve_view',$data);   
			} else {
			    $data = array();
			   return view('host/booking_approve_view',$data); 
			}
			
			// $data['id'] = $id;    		
    		
    	} else {

    		return redirect()->to('/host');
    	}
    }

	//booking_details
	public function booking_details ($id,$bid) {
        if(session('res_session_id')) {
			
			$data['bdetails'] = DB::table('booking')->where(['property_id'=>$id,'id'=>$bid])->get();   
			
			//echo '<pre>';
			//print_r($data['bdetails']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('host/booking_details',$data);
    	} else {

    		return redirect()->to('/host');
    	}
    }
	
	//change_property_status
	public function change_property_status($id,$param) {
        if(session('res_session_id')) {
			
			$getstatus = DB::table('properties')->where('id',$id)->first();
			$status = $getstatus->available_status;
			$hostid = $getstatus->hostid;
			
			if($status==0){ $make = 1; }
			if($status==1){ $make = 0; }
			
			
                $data = DB::table('properties')->where('id',$id)->update(['available_status' => $make,]);
				
				if($param=='booking')
				{
					Session::flash('code','success');
					return redirect('host/booking_requested/'.$hostid)
                    ->with('status','Available Status Changed Successfully !!');
				}
				
				if($param=='property')
				{
					Session::flash('code','success');
					return redirect('host/property_listing/'.$hostid)
                    ->with('status','Available Status Changed Successfully !!');
				}
				
                
            

        } else {

            return redirect()->to('/host');
        }
    }
	
	//approve_boking
	
	public function approve_boking($id) {
        if(session('res_session_id')) {
			
			
			
			$date = date('Y-m-d');
			$getpro = DB::table('booking')->where(['id'=>$id])->first();  
			$pid = $getpro->property_id;
			
			$gethost = DB::table('properties')->where(['id'=>$pid])->first();  
			$host = $gethost->hostid;
			//exit;
                $data = DB::table('booking')->where('id',$id)->update(['booking_status' => 2,'approve_date' => $date,]);
				
				
				//exit;
				if($data)
				{
					Session::flash('code','success');
					return redirect('host/booking_approved/'.$host)
                    ->with('status','Successfully Approved Booking !!');
				}
				
                
            

        } else {

            return redirect()->to('/host');
        }
    }
	
	//update_host_view
	public function update_host_view ($id) {
        if(session('admin_session_id')) {
			$data['host_detail'] = DB::table('host')->where(['id'=>$id])->get();   
			return view('admin/hostview',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//updatehostdetails
	public function updatehostdetails(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'hostid' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'rating' => 'required',
                    'languageKnow'=>'required',
                    'hostingSince'=>'required',
                    'shortDescription'=>'required',
                    'description' => 'required',
                    ]);
            if($validatedData) {
				
				$chkimage = DB::table('host')->where(['id'=>$request->hostid])->first();  
				$getimg = $chkimage->image;
			
			
				if($request->hasFile('image') && $getimg) {
					
					$imageName = request()->image->getClientOriginalName();
					request()->image->move('host_pic', $imageName);
					File::delete('host_pic/' . $getimg);
					
					$sql = DB::table('host')->where('id',$request->hostid)->update([
					'name'=>$request->name,
					'image'=>$imageName,
					'email'=>$request->email,
					'phone'=>$request->phone,
					'rating'=>$request->rating,
					'language_known'=>$request->languageKnow,
					'hosting_since'=>$request->hostingSince,
					'short_description'=>$request->shortDescription,
					'view'=>$request->description,]);
					
					Session::flash('code','success');
					return redirect('admin/update_host_view/'.$request->hostid)
                    ->with('status','Host Updated Successfully !!');
				}
				else if($request->hasFile('image') && (empty($getimg)))
				{
					$imageName = request()->image->getClientOriginalName();
					request()->image->move('host_pic', $imageName);
					
					$sql = DB::table('host')->where('id',$request->hostid)->update([
					'name'=>$request->name,
					'image'=>$imageName,
					'email'=>$request->email,
					'phone'=>$request->phone,
					'rating'=>$request->rating,
					'language_known'=>$request->languageKnow,
					'hosting_since'=>$request->hostingSince,
					'short_description'=>$request->shortDescription,
					'view'=>$request->description,]);
					
					Session::flash('code','success');
					return redirect('admin/update_host_view/'.$request->hostid)
                    ->with('status','Host Updated Successfully !!');
				}
				
				else if(!empty($getimg))
				{
					$sql = DB::table('host')->where('id',$request->hostid)->update([
					'name'=>$request->name,
					'email'=>$request->email,
					'phone'=>$request->phone,
					'rating'=>$request->rating,
					'language_known'=>$request->languageKnow,
					'hosting_since'=>$request->hostingSince,
					'short_description'=>$request->shortDescription,
					'view'=>$request->description,]);
					
					Session::flash('code','success');
					return redirect('admin/update_host_view/'.$request->hostid)
                    ->with('status','Host Updated Successfully !!');
				}
				
                
				
				
            }

        } else {

            return redirect()->to('/admin');
        }
    }		
	
	
	public function updateplacetoproperty(Request $request) {
		
		
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'propertyid' => 'required',
                    'change' => 'required',
                    ]);
            if($validatedData) {
			    $request->propertyid;
				
				$placestosee = implode(",",$request->change);
				
				$pp = $placestosee;
				
                $sql = DB::table('properties')->where('id',$request->propertyid)->update(['placesto_see'=>$placestosee,]);
				
				Session::flash('code','success');
                return redirect('admin/addplacestosee_properties/'.$request->propertyid)
                    ->with('status','Property added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
   
}
