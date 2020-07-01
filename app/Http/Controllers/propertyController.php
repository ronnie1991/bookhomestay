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

class propertyController extends Controller
{
    
	
	public function addProperty() {

    	if(session('admin_session_id')) {

    		// $data['holiday'] = holiday_categories::all();
    		//return view('admin/holidaycategoryListings',$data);
            $data['categories'] = DB::table('main_categories')->get();
            $data['holiday'] = DB::table('holiday_categories')->get();
            $data['place'] = DB::table('place')->get();
            $data['host'] = DB::table('host')->get();
            $data['comfort_categories'] = DB::table('comfort_categories')->get();
            $data['season'] = DB::table('seasons')->get();
            //print_r($data['place']);
			//exit;
    		return view('admin/add_propert',$data);
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }
	
	//manage aminities
	public function manageaminities() {

    	if(session('admin_session_id')) {

    		//$data['place'] = place::all();
			$data['aminities'] = DB::table('aminities')->get();
    		//return view('admin/maincategoryListings',$data);
    		return view('admin/manageAminities',$data);
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }
	
	//Add Aminities
	public function addaminities (Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'aname' => 'required',
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('propertypic', $imageName);

                //$categories = implode(",",$request->main_category);
                $data = DB::table('aminities')->insert(['aminities'=>$request->aname,'image'=>$imageName,]);
                Session::flash('code','success');
                return redirect('admin/aminities')
                    ->with('status','Aminities added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
	}

	//Edit Amenities
	public function editamenity ($id) {
        if(session('admin_session_id')) {
			$data['data'] = DB::table('aminities')->where(['id'=>$id])->first();
			return view('admin/editamenity',$data);
    	} else {
			return redirect()->to('/admin');
    	}
    }
	
	public function updateamenity (Request $request) {
        if(session('admin_session_id')) {
			$validatedData = $request->validate([
                'aminities' => 'required',
                'id' => 'required',
				'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
            ]);
            if($validatedData) {
				if($request->hasFile('image')) {
				    $imageName = request()->image->getClientOriginalName();
                	request()->image->move('propertypic', $imageName);
					$data = DB::table('aminities')->where('id',$request->id)->update(['aminities' => $request->aminities,'image' => $imageName]);
                	Session::flash('code','success');
                	return redirect('admin/aminities')
                    ->with('status','Amenity Updated successfully !!');
				} else {
					$data = DB::table('aminities')->where('id',$request->id)->update(['aminities' => $request->aminities]);
					Session::flash('code','success');
					return redirect('admin/aminities')
                    ->with('status','Amenity Updated successfully !!');
				}
            }
    	} else {
			return redirect()->to('/admin');
    	}
    }
	
	//manage activities
	public function manageactivities() {
    	if(session('admin_session_id')) {
			$data['activities'] = DB::table('activities')->get();
    		return view('admin/manageActivities',$data);
    	} else {
    		return redirect()->to('/admin');
    	}
	}
	
	//add activities
	public function addactivity (Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            if($validatedData) {
                $data = DB::table('activities')->insert(['name'=>$request->name]);
                Session::flash('code','success');
                return redirect('admin/activities')
                    ->with('status','Activity added successfully !!');
            }
        } else {
            return redirect()->to('/admin');
        }
	}

	//Edit Activities
	public function editactivity ($id) {
        if(session('admin_session_id')) {
			$data['data'] = DB::table('activities')->where(['id'=>$id])->first();
			return view('admin/editactivity',$data);
    	} else {
			return redirect()->to('/admin');
    	}
    }
	
	public function updateactivity (Request $request) {
        if(session('admin_session_id')) {
			$validatedData = $request->validate([
                'name' => 'required',
                'id' => 'required',
            ]);
            if($validatedData) {
				$data = DB::table('activities')->where('id',$request->id)->update(['name' => $request->name]);
				Session::flash('code','success');
				return redirect('admin/activities')
				->with('status','Activity Updated successfully !!');
            }
    	} else {
			return redirect()->to('/admin');
    	}
    }

	//manage preferables
	public function managepreferables() {
    	if(session('admin_session_id')) {
			$data['preferables'] = DB::table('personal_preferables')->get();
    		return view('admin/managePreferables',$data);
    	} else {
    		return redirect()->to('/admin');
    	}
	}
	
	//add preferable
	public function addpreferable (Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                'name' => 'required',
            ]);
            if($validatedData) {
                $data = DB::table('personal_preferables')->insert(['name'=>$request->name]);
                Session::flash('code','success');
                return redirect('admin/preferables')
                    ->with('status','Preferable added successfully !!');
            }
        } else {
            return redirect()->to('/admin');
        }
	}

	//Edit preferable
	public function editpreferable ($id) {
        if(session('admin_session_id')) {
			$data['data'] = DB::table('personal_preferables')->where(['id'=>$id])->first();
			return view('admin/editpreferable',$data);
    	} else {
			return redirect()->to('/admin');
    	}
    }
	
	public function updatepreferable (Request $request) {
        if(session('admin_session_id')) {
			$validatedData = $request->validate([
                'name' => 'required',
                'id' => 'required',
            ]);
            if($validatedData) {
				$data = DB::table('personal_preferables')->where('id',$request->id)->update(['name' => $request->name]);
				Session::flash('code','success');
				return redirect('admin/preferables')
				->with('status','Preferable Updated successfully !!');
            }
    	} else {
			return redirect()->to('/admin');
    	}
    }
	
	//add room details ui->add_room_ui
	public function add_room_ui ($id) {
        if(session('admin_session_id')) {
			$data['aminities'] = DB::table('aminities')->get();    		
			$data['id'] = $id;    		
    		return view('admin/add_room_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//room_editview
	public function room_editview ($id) {
        if(session('admin_session_id')) {
			$data['aminities'] = DB::table('aminities')->get();    		
			$data['roomid'] = $id;    		
    		return view('admin/room_editview',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//addPlaces_ui
	public function addPlaces_ui () {
        if(session('admin_session_id')) {
			$data['place'] = DB::table('place')->get();  		
    		return view('admin/addPlaces_ui',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }			
	
	public function addPlaces_ui2 () {        if(session('admin_session_id')) {			$data['place'] = DB::table('place')->get();  		    		return view('admin/addPlaces_ui2',$data);    	} else {    		return redirect()->to('/admin');    	}    }
	
	
	
	//add add_room_pics
	public function add_room_pics ($id) {
        if(session('admin_session_id')) {
			$data['room'] = DB::table('property_room_pics')->where(['property_id'=>$id])->orderBy('id', 'DESC')->get();    		
			$data['id'] = $id;    		
			//print_r($data['room']);
			//exit;
    		return view('admin/add_room_pics',$data);
    		//return view('admin/add_room_pics');
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//folder->rooms_multiple_pics->add_room_pics_submit
	public function add_room_pics_submit(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'property_id' => 'required',
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('rooms_multiple_pics', $imageName);
				
                $data = DB::table('property_room_pics')->insert(['property_id' => $request->property_id,'pics' => $imageName,]);
                Session::flash('code','success');
                return redirect('admin/add_room_pics/'.$request->property_id)
                    ->with('status','Room Picture added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	
	
	//property_details
	public function property_details ($id) {
        if(session('admin_session_id')) {
			//$deliveryboy = DB::table('deliveryboy')->where(['online_status'=>'1','available_status'=>'0'])->get();

			$data['property_details'] = DB::table('properties')->where(['id'=>$id])->get();   
			$data['room_details'] = DB::table('room_details')->where(['property_id'=>$id])->get();
			
			$data['host'] = DB::table('host')->get();
			$data['categories'] = DB::table('main_categories')->get();
            $data['holiday'] = DB::table('holiday_categories')->get();
            $data['place'] = DB::table('place')->get();
            
            $data['comfort_categories'] = DB::table('comfort_categories')->get();
			$data['season'] = DB::table('seasons')->get();
			$data['amenities'] = DB::table('aminities')->get();
			$data['activities'] = DB::table('activities')->get();
			$data['preferables'] = DB::table('personal_preferables')->get();
			$data['propertyId'] = $id;
			//echo '<pre>';
			//print_r($data['property_details']);
			//echo '</pre>';
			
			//echo '<pre>';
			//print_r($data['room_details']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('admin/propertydetailsview',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//addplacestosee_properties
	
	public function addplacestosee_properties ($id) {
        if(session('admin_session_id')) {
			//$deliveryboy = DB::table('deliveryboy')->where(['online_status'=>'1','available_status'=>'0'])->get();

			$data['property_details'] = DB::table('properties')->where(['id'=>$id])->get();   
			$data['sight_scene'] = DB::table('sightseen')->get();
			//echo '<pre>';
			//print_r($data['property_details']);
			//echo '</pre>';
			
			//echo '<pre>';
			//print_r($data['room_details']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('admin/update_places_toproperty_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
    
    //Add Property More Detilails
	
	public function addPropertyMoreDetails ($id) {
        if(session('admin_session_id')) {
			 $data['pid'] = $id;    		
    		return view('admin/add_prop_more_details',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	/*public function update_smlistings_toprated ($id) {
        if(session('admin_session_id')) {
			
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
    }*/
    
    //Add Things to Do in Property
	
	public function addPropertyThingstoDo ($id) {
       if(session('admin_session_id')) {
			 $data['pid'] = $id;    
			 
			$data['toprated_exp'] = DB::table('toprated_exp')->get();
			$data['things'] = DB::table('property_things_do')->get();
			//print_r($data['pid']);
			//exit;
    		return view('admin/add_things_do_prop',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//update_thingstopro
	
	public function update_thingstopro(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'pid' => 'required',
                    'expid' => 'required',
                    ]);
            if($validatedData) {

               
                $experice = implode(",",$request->expid);
				//print_r($propertyar);
				//exit;
                $chk = DB::table('property_things_do')->where('prop_id',$request->pid)->first();
				if(empty($chk))
				{
					$data = DB::table('property_things_do')->insert(['prop_id' => $request->pid,'exprience_list' => $experice,]);
				}
				else
				{
					 $sql = DB::table('property_things_do')->where('prop_id',$request->pid)->update(['exprience_list'=>$experice,]);
				}
				
				
               
				
				Session::flash('code','success');
                return redirect('admin/add_things_do_property/'.$request->pid)
                    ->with('status','Things added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
    
    
	
	public function insertPropMoreDtls(Request $request) {
		
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'pid' => 'required',
                    'amenities' => 'required',
                    'package' => 'required',                  
                    'laf' => 'required',                  
                    'map' => 'required',                  
                    'hotspot' => 'required',                  
                    'thingstodo' => 'required',                  
                    'houserules' => 'required',                  
                    ]);
            if($validatedData) {
				
				$chk=DB::table('property_more_details')->where('prop_id',$request->pid)->first();
				//$data['property_details'] = DB::table('properties')->where(['id'=>$id])->get();   
				
				if(empty($chk))
				{
					$data = DB::table('property_more_details')->insert(['prop_id' => $request->pid,
					'amenities' => $request->amenities,
					'package_includes' => $request->package,
					'road_map' => $request->map,
					'local_area_facilities' => $request->laf,
					'hotspots' => $request->hotspot,
					'food' => $request->food,
					'things_to_do' => $request->thingstodo,
					'house_rules' => $request->houserules,
					]);
					
					Session::flash('code','success');
					return redirect('admin/add_more_details/'.$request->pid)
                    ->with('status','Details added successfully !!');
					
				}
				else
				{
					$data = DB::table('property_more_details')
					->where('prop_id',$request->pid)
					->update(['amenities' => $request->amenities,
					'package_includes' => $request->package,
					'road_map' => $request->map,
					'local_area_facilities' => $request->laf,
					'hotspots' => $request->hotspot,
					'food' => $request->food,
					'things_to_do' => $request->thingstodo,
					'house_rules' => $request->houserules,
					]);
					
					Session::flash('code','success');
					return redirect('admin/add_more_details/'.$request->pid)
                    ->with('status','Details Updated successfully !!');
				}
				
				
				
                
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	//showplaces_view
	public function showplaces_view () {
        if(session('admin_session_id')) {
			$data['sight_scene'] = DB::table('sightseen')->get();   
    		return view('admin/showplaces_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
    
    // Edit Show Place View
    public function editShowPlaces ($id) {
        if(session('admin_session_id')) {
			$data['sight_scene'] = DB::table('sightseen')->where('id',$id)->first();
			$data['place'] = DB::table('place')->get(); 
    		return view('admin/editshowplaces',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
   
    // Update Show Place 
    
    public function updateShowPlaces(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'place' => 'required',
                    'title' => 'required',
                    'distance' => 'required',
                    'shortDescription' => 'required',
                    'description' => 'required',
                   'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
                ]);
            if($validatedData) {
                
                $chkimage = DB::table('sightseen')->where(['id'=>$request->sid])->first();  
				$getimg = $chkimage->image;
				
				if($request->hasFile('image') && $getimg) {
				    
				    File::delete('placebanner/' . $getimg);
				    
				    $imageName = request()->image->getClientOriginalName();
                    request()->image->move('placebanner', $imageName);
                    
                    $data = DB::table('sightseen')->where('id',$request->sid)
                                              ->update([
                                                    'placeId' => $request->place,
                                                    'short_description' => $request->shortDescription,
                                			        'description' => $request->description,
                                				    'title' => $request->title,
                                				    'image' => $imageName,
                                				    'distance' => $request->distance,
                                				]);
				    
				} else if($request->hasFile('image')) {
				    
				    $imageName = request()->image->getClientOriginalName();
                    request()->image->move('placebanner', $imageName);
                    
                    $data = DB::table('sightseen')->where('id',$request->sid)
                                              ->update([
                                                    'placeId' => $request->place,
                                                    'short_description' => $request->shortDescription,
                                			        'description' => $request->description,
                                				    'title' => $request->title,
                                				    'image' => $imageName,
                                				    'distance' => $request->distance,
                                				]);
				    
				} else {
				   $data = DB::table('sightseen')->where('id',$request->sid)
                                              ->update([
                                                    'placeId' => $request->place,
                                                    'short_description' => $request->shortDescription,
                                			        'description' => $request->description,
                                				    'title' => $request->title,
                                				    'distance' => $request->distance,
                                				]); 
				}
				
				
                Session::flash('code','success');
                return redirect('admin/editShowPlaces/'.$request->sid.'')
                    ->with('status','Places Details updated successfully !!');
            }
    	} else {

    		return redirect()->to('/admin');
    	}
    }
    
    
	
	
	//viewPoperty
	public function viewPoperty() {

    	if(session('admin_session_id')) {

    		// $data['holiday'] = holiday_categories::all();
    		//return view('admin/holidaycategoryListings',$data);
            //$data['categories'] = DB::table('main_categories')->get();
            //$data['place'] = DB::table('place')->get();
            //$data['host'] = DB::table('host')->get();
            //$data['comfort_categories'] = DB::table('comfort_categories')->get();
            $data['property'] = DB::table('properties')->where('status',1)->get();
			//echo '<pre>';
            //print_r($data['property']);
			//echo '</pre>';
			//print_r($data['property']['placeid']);
			//$this->items[$key];
			//exit;
    		return view('admin/view_property',$data);
    		

    	} else {

    		return redirect()->to('/admin');
    	}

    }

    public function store(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    //'pro_id' => 'required',
                    'manual_pro_id' => 'required|unique:properties',
                    'place' => 'required',
                    'host' => 'required',
                    'main_category' => 'required',
                    'holiday' => 'required',
                    'comfort' => 'required',
                    'season' => 'required',
                    'hname' => 'required',
                    'rank' => 'required',
                    'rating' => 'required',
                    'address1' => 'required',
                    'latitude' => 'required',
					'longitude' => 'required',
					'original_price' => 'required',
                    'price' => 'required',                   
                    'total_person' => 'required',                   
                    'food_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',                   
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
            if($validatedData) {

                
				
                $imageName = request()->image->getClientOriginalName();
                request()->image->move('propertypic', $imageName);

				//move_uploaded_file($_FILES["food_image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/propertypic/" . $food_image);
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/propertypic/" . $imageName);
                //$categories = implode(",",$request->main_category);
                $holiday = implode(",",$request->holiday);
                $fare = $request->price;
                $exp = explode(',',$holiday);
                foreach($exp as $hcata)
                {
                    $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                    $price = $lowpricechk->price;
                    if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                }
                
                $comfort = implode(",",$request->comfort);
                $expcomfort = explode(',',$comfort);
                foreach($expcomfort as $ccata)
                {
                    $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                    $price2 = $lowpricechk2->price;
                    if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                }
                
				$season = implode(",",$request->season);
				if($request->hasFile('food_image')) {
					$food_image = request()->food_image->getClientOriginalName();
					request()->food_image->move('propertypic', $food_image);
					
					$data = DB::table('properties')->insert(['manual_pro_id' => $request->manual_pro_id,
					'view' => '',
					'placeid' => $request->place,
					'placesto_see' => '',
					'similar_listings' => '',
					'hostid' => $request->host,
					'main_category' => $request->main_category,
					'holiday_category' => $holiday,
					'confort_id' => $comfort,
					'season_id' => $season,
					'hotel_name' => $request->hname,
					'address' => $request->address1,
					'latitude' => $request->latitude,
					'longitude' =>$request->longitude,
					'original_price' => $request->original_price,
					'price' => $request->price,
					'rank' => $request->rank,
					'rating' => $request->rating,
					'total_person_can_stay' => $request->total_person,
					'food_image' => $food_image,
					'image' => $imageName,
					'available_status' => '0',
					'status' => '1',]);
					
				}
				else
				{
					$data = DB::table('properties')->insert(['manual_pro_id' => $request->manual_pro_id,
					'view' => '',
					'placeid' => $request->place,
					'placesto_see' => '',
					'similar_listings' => '',
					'hostid' => $request->host,
					'main_category' => $request->main_category,
					'holiday_category' => $holiday,
					'confort_id' => $comfort,
					'season_id' => $season,
					'hotel_name' => $request->hname,
					'address' => $request->address1,
					'latitude' => $request->latitude,
					'longitude' =>$request->longitude,
					'original_price'=> $request->original_price,
					'price' => $request->price,
					'rank' => $request->rank,
					'rating' => $request->rating,
					'total_person_can_stay' => $request->total_person,
					'food_image' => '',
					'image' => $imageName,
					'available_status' => '0',
					'status' => '1',]);
					
				}
                
                
                
				
                Session::flash('code','success');
                return redirect('admin/addProperty')
                    ->with('status','Property added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//updateproperty
	public function updateproperty(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'pid' => 'required',
                    //'pro_id' => 'required',
                    //'manual_pro_id' => 'required|unique:properties',
					'manual_pro_id' => 'required',
                    'place' => 'required',
                    'host' => 'required',
                    'main_category' => 'required',
                    'holiday' => 'required',
                    'comfort' => 'required',
                    'season' => 'required',
                    'hname' => 'required',
                    'rank' => 'required',
                    'rating' => 'required',
                    'address1' => 'required',
                    'latitude' => 'required',
					'longitude' => 'required',
					'original_price'=>'required',
                    'price' => 'required',                   
                    'total_person' => 'required',
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                    'food_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',                   
                    ]);
            if($validatedData) {

				$chkimage = DB::table('properties')->where(['id'=>$request->pid])->first();  
				$getimg = $chkimage->image;
				$getfdimg = $chkimage->food_image;

				$holiday = implode(",",$request->holiday);
				$comfort = implode(",",$request->comfort);
				$season = implode(",",$request->season);

				if(($request->hasFile('image') && $getimg) &&  ($request->hasFile('food_image') && $getfdimg)) {

					File::delete('propertypic/' . $getimg);
					File::delete('propertypic/' . $getfdimg);

					$imageName = request()->image->getClientOriginalName();
					$foodimageName = request()->food_image->getClientOriginalName();
					request()->image->move('propertypic', $imageName);
					request()->food_image->move('propertypic', $foodimageName);

					$data = DB::table('properties')->where('id',$request->pid)
													->update(['manual_pro_id' => $request->manual_pro_id,
															'placeid' => $request->place,
															'hostid' => $request->host,
															'main_category' => $request->main_category,
															'holiday_category' => $holiday,
															'confort_id' => $comfort,
															'season_id' => $season,
															'hotel_name' => $request->hname,
															'address' => $request->address1,
															'latitude' => $request->latitude,
															'longitude' =>$request->longitude,
															'original_price' => $request->original_price,
															'price' => $request->price,
															'rank' => $request->rank,
															'rating' => $request->rating,
															'total_person_can_stay' => $request->total_person,
															'food_image' => $foodimageName,
															'image' => $imageName,
														]);
				$fare = $request->price;										
				$exp = explode(',',$holiday);
                foreach($exp as $hcata)
                {
                    $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                    $price = $lowpricechk->price;
                    if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                }
                
                
                $expcomfort = explode(',',$comfort);
                foreach($expcomfort as $ccata)
                {
                    $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                    $price2 = $lowpricechk2->price;
                    if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                }
					

				} else if($request->hasFile('image') && $getimg) {

					File::delete('propertypic/' . $getimg);
					$imageName = request()->image->getClientOriginalName();
					request()->image->move('propertypic', $imageName);
					$data = DB::table('properties')->where('id',$request->pid)
													->update(['manual_pro_id' => $request->manual_pro_id,
															'placeid' => $request->place,
															'hostid' => $request->host,
															'main_category' => $request->main_category,
															'holiday_category' => $holiday,
															'confort_id' => $comfort,
															'season_id' => $season,
															'hotel_name' => $request->hname,
															'address' => $request->address1,
															'latitude' => $request->latitude,
															'longitude' =>$request->longitude,
															'original_price' => $request->original_price,
															'price' => $request->price,
															'rank' => $request->rank,
															'rating' => $request->rating,
															'total_person_can_stay' => $request->total_person,	
															'image' => $imageName,
														]);	
												
							$fare = $request->price;										
				$exp = explode(',',$holiday);
                foreach($exp as $hcata)
                {
                    $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                    $price = $lowpricechk->price;
                    if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                }
                
                
                $expcomfort = explode(',',$comfort);
                foreach($expcomfort as $ccata)
                {
                    $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                    $price2 = $lowpricechk2->price;
                    if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                }

				} else if($request->hasFile('food_image') && $getfdimg ) {

					File::delete('propertypic/' . $getfdimg);
					$imageName = request()->food_image->getClientOriginalName();
					request()->food_image->move('propertypic', $imageName);

					$data = DB::table('properties')->where('id',$request->pid)
													->update(['manual_pro_id' => $request->manual_pro_id,
																'placeid' => $request->place,
																'hostid' => $request->host,
																'main_category' => $request->main_category,
																'holiday_category' => $holiday,
																'confort_id' => $comfort,
																'season_id' => $season,
																'hotel_name' => $request->hname,
																'address' => $request->address1,
																'latitude' => $request->latitude,
																'longitude' =>$request->longitude,
																'original_price' => $request->original_price,
																'price' => $request->price,
																'rank' => $request->rank,
																'rating' => $request->rating,
																'total_person_can_stay' => $request->total_person,
																'food_image' => $imageName,
															]);
															
															$fare = $request->price;										
                                            				$exp = explode(',',$holiday);
                                                            foreach($exp as $hcata)
                                                            {
                                                                $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                                                                $price = $lowpricechk->price;
                                                                if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                                                            }
                                                            
                                                            
                                                            $expcomfort = explode(',',$comfort);
                                                            foreach($expcomfort as $ccata)
                                                            {
                                                                $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                                                                $price2 = $lowpricechk2->price;
                                                                if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                                                            }
					
				} else if ($request->hasFile('food_image')) {
					
					$imageName = request()->food_image->getClientOriginalName();
					request()->food_image->move('propertypic', $imageName);

					$data = DB::table('properties')->where('id',$request->pid)
													->update(['manual_pro_id' => $request->manual_pro_id,
																'placeid' => $request->place,
																'hostid' => $request->host,
																'main_category' => $request->main_category,
																'holiday_category' => $holiday,
																'confort_id' => $comfort,
																'season_id' => $season,
																'hotel_name' => $request->hname,
																'address' => $request->address1,
																'latitude' => $request->latitude,
																'longitude' =>$request->longitude,
																'original_price' => $request->original_price,
																'price' => $request->price,
																'rank' => $request->rank,
																'rating' => $request->rating,
																'total_person_can_stay' => $request->total_person,
																'food_image' => $imageName,
															]);
															
										$fare = $request->price;										
                        				$exp = explode(',',$holiday);
                                        foreach($exp as $hcata)
                                        {
                                            $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                                            $price = $lowpricechk->price;
                                            if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                                        }
                                        
                                        
                                        $expcomfort = explode(',',$comfort);
                                        foreach($expcomfort as $ccata)
                                        {
                                            $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                                            $price2 = $lowpricechk2->price;
                                            if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                                        }

				}  else if($request->hasFile('image')) {

					$imageName = request()->image->getClientOriginalName();
					request()->image->move('propertypic', $imageName);
					$data = DB::table('properties')->where('id',$request->pid)
													->update(['manual_pro_id' => $request->manual_pro_id,
															'placeid' => $request->place,
															'hostid' => $request->host,
															'main_category' => $request->main_category,
															'holiday_category' => $holiday,
															'confort_id' => $comfort,
															'season_id' => $season,
															'hotel_name' => $request->hname,
															'address' => $request->address1,
															'latitude' => $request->latitude,
															'longitude' =>$request->longitude,
															'original_price' => $request->original_price,
															'price' => $request->price,
															'rank' => $request->rank,
															'rating' => $request->rating,
															'total_person_can_stay' => $request->total_person,	
															'image' => $imageName,
														]);
														
														
								$fare = $request->price;										
                				$exp = explode(',',$holiday);
                                foreach($exp as $hcata)
                                {
                                    $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                                    $price = $lowpricechk->price;
                                    if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                                }
                                
                                
                                $expcomfort = explode(',',$comfort);
                                foreach($expcomfort as $ccata)
                                {
                                    $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                                    $price2 = $lowpricechk2->price;
                                    if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                                }

				} else {
					$data = DB::table('properties')->where('id',$request->pid)
													->update(['manual_pro_id' => $request->manual_pro_id,
																'placeid' => $request->place,
																'hostid' => $request->host,
																'main_category' => $request->main_category,
																'holiday_category' => $holiday,
																'confort_id' => $comfort,
																'season_id' => $season,
																'hotel_name' => $request->hname,
																'address' => $request->address1,
																'latitude' => $request->latitude,
																'longitude' =>$request->longitude,
																'original_price' => $request->original_price,
																'price' => $request->price,
																'rank' => $request->rank,
																'rating' => $request->rating,
																'total_person_can_stay' => $request->total_person,
															]);
															
									$fare = $request->price;										
                    				$exp = explode(',',$holiday);
                                    foreach($exp as $hcata)
                                    {
                                        $lowpricechk = DB::table('holiday_categories')->where('id',$hcata)->first();
                                        $price = $lowpricechk->price;
                                        if(empty($price) || $request->price<$price){ DB::table('holiday_categories')->where('id',$hcata)->update(['price'=>$fare]); }
                                    }
                                    
                                    
                                    $expcomfort = explode(',',$comfort);
                                    foreach($expcomfort as $ccata)
                                    {
                                        $lowpricechk2 = DB::table('comfort_categories')->where('id',$ccata)->first();
                                        $price2 = $lowpricechk2->price;
                                        if(empty($price2) || $request->price<$price2){ DB::table('comfort_categories')->where('id',$ccata)->update(['price'=>$fare]); }
                                    }
				
				}				
                
				
                Session::flash('code','success');
                return redirect('admin/property_details/'.$request->pid)
                    ->with('status','Property Updated successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
	}
	
	public function set_property_amenity(request $request) {
		$data = DB::table('property_amenities')->insert(['property_id'=>$request->propertyId,'amenity_id'=>$request->amenityId]);
		return response()->json(['status' => 'success']);
	}

	public function unset_property_amenity(request $request) {
		DB::table('property_amenities')->where(['property_id'=>$request->propertyId,'amenity_id'=>$request->amenityId])->delete();
		return response()->json(['status' => 'success']);
	}

	public function set_property_activity(request $request) {
		$data = DB::table('property_activities')->insert(['property_id'=>$request->propertyId,'activity_id'=>$request->activityId]);
		return response()->json(['status' => 'success']);
	}

	public function unset_property_activity(request $request) {
		DB::table('property_activities')->where(['property_id'=>$request->propertyId,'activity_id'=>$request->activityId])->delete();
		return response()->json(['status' => 'success']);
	}

	public function set_property_preferable(request $request) {
		$data = DB::table('property_preferables')->insert(['property_id'=>$request->propertyId,'preferable_id'=>$request->preferableId]);
		return response()->json(['status' => 'success']);
	}

	public function unset_property_preferable(request $request) {
		DB::table('property_preferables')->where(['property_id'=>$request->propertyId,'preferable_id'=>$request->preferableId])->delete();
		return response()->json(['status' => 'success']);
	}
	
	//update_room_details
	public function update_room_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'property_id' => 'required',
                    'room_name' => 'required',
                    'price' => 'required',
                    'description' => 'required',
                    'tot_room' => 'required',
                    'aminities' => 'required',
                ]);
            if($validatedData) {
				
				
				
				
				$chkimage = DB::table('room_details')->where(['id'=>$request->property_id])->first();  
				$getimg = $chkimage->image;
				
				if($request->hasFile('image')) {

				$imageName = request()->image->getClientOriginalName();
				request()->image->move('propertyrooms_pic', $imageName);
				//File::delete('propertyrooms_pic/'.$getimg);
					
				$aminities = implode(",",$request->aminities);
                $data = DB::table('room_details')
				->where('id',$request->property_id)
				->update(['romm_name' => $request->room_name,
				'total_room' => $request->tot_room,
				'description' => $request->description,
				'image' => $imageName,
				'aminities' => $aminities,
				'price' => $request->price,
				'status' => '1',]);
                Session::flash('code','success');
                return redirect('admin/room_editview/'.$request->property_id)
                    ->with('status','Room Details Updated successfully !!');
					
				}
				else
				{
					
				
					$aminities = implode(",",$request->aminities);
					$data = DB::table('room_details')
					->where('id',$request->property_id)
					->update(['romm_name' => $request->room_name,
					'description' => $request->description,
					'aminities' => $aminities,
					'price' => $request->price,
					'status' => '1',]);
					Session::flash('code','success');
					return redirect('admin/room_editview/'.$request->property_id)
						->with('status','Room Details Updated successfully !!');
					
				}
				
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//updateplacetoproperty
	
	
	
	//add room details->addproperty_room_details
	
	public function addproperty_room_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'property_id' => 'required',
                    'room_name' => 'required',
                    'price' => 'required',
                    'description' => 'required',
                    'tot_room' => 'required',
                    'aminities' => 'required',                                      
                    'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('propertyrooms_pic', $imageName);
				//move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/propertyrooms_pic/" . $imageName);
                
                $aminities = implode(",",$request->aminities);
                $data = DB::table('room_details')->insert(['property_id' => $request->property_id,
				'romm_name' => $request->room_name,
				'total_room' => $request->tot_room,
				'description' => $request->description,
				'image' => $imageName,
				'aminities' => $aminities,
				'price' => $request->price,
				'status' => '1',]);
                Session::flash('code','success');
                return redirect('admin/viewPoperty')
                    ->with('status','Room Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//insertplaces_details
	
	public function insertplaces_details(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'place' => 'required',
                    'title' => 'required',
                    'distance' => 'required',
                    'shortdescription' => 'required',
                    'description' => 'required',
                   'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:4096',
                ]);
            if($validatedData) {

                $imageName = request()->image->getClientOriginalName();
                request()->image->move('placebanner', $imageName);
				
                $data = DB::table('sightseen')->insert(['placeId' => $request->place,
				'description' => $request->description,
				'title' => $request->title,
				'image' => $imageName,
				'short_description' => $request->shortdescription,
				'distance' => $request->distance,
				]);
                Session::flash('code','success');
                return redirect('admin/addPlaces_ui')
                    ->with('status','Places Details added successfully !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	//delproperty
	public function delproperty ($id) {
        if(session('admin_session_id')) {
			//echo $id;
			//exit;
			
			$data = DB::table('properties')->where('id',$id)->update(['status'=>0]);
			//return view('admin/view_property');
			return redirect('admin/viewPoperty')
                    ->with('status','Property Deleted successfully !!');
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//del_room_pic
	public function del_room_pic ($id) {
        if(session('admin_session_id')) {
			//echo $id;
			//exit;
			$getpid = DB::table('property_room_pics')->where('id',$id)->first();
			$property_id = $getpid->property_id;
			$getimg = $getpid->pics;
			
			DB::table('property_room_pics')->where('id', $id)->delete();
			
			File::delete('rooms_multiple_pics/' . $getimg);
			
			
					
					Session::flash('code','success');
                return redirect('admin/add_room_pics/'.$property_id)
                    ->with('status','Room Picture Deleted successfully !!');
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//business_view
	public function business_view () {
        if(session('admin_session_id')) {
			//$data['place'] = DB::table('place')->get();  		
    		return view('admin/business_view');
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	public function addNAview () {
        if(session('admin_session_id')) {
			//echo 'yes';
			//exit;
			$data['property'] = DB::table('properties')->get();  
			
    		return view('admin/addNAview',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//inserNAdate
	public function inserNAdate(Request $request) {
        if(session('admin_session_id')) {
            $validatedData = $request->validate([
                    'propertyid' => 'required',
                    'fromdate' => 'required',
                    'todate' => 'required',
                    ]);
            if($validatedData) {

                $data = DB::table('na_dated')->insert([
				'proid' => $request->propertyid,
				'fromdate' => $request->fromdate,
				'todate' => $request->todate,]);
				
                Session::flash('code','success');
                return redirect('admin/addNAview')
                    ->with('status','Not Available Date Inserted !!');
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	
	public function showNAdate () {
        if(session('admin_session_id')) {
			//echo 'yes';
			//exit;
			$data['list'] = DB::table('na_dated')->get();  
			
    		return view('admin/showNAdate',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
    
    public function showEnqueryList () {
        if(session('admin_session_id')) {
			$data['enquerylist'] = DB::table('contact_msg')->get();  
			
    		return view('admin/showEnqueryList',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
    
    public function showNewsLetrList () {
        if(session('admin_session_id')) {
			$data['showNewsLetrList'] = DB::table('newslettter')->get();  
			
    		return view('admin/showNewsLetrList',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	public function update_superstar_details(Request $request) {
        if(session('admin_session_id')) {
			
			//echo 'yes';
			//exit;
			
            $validatedData = $request->validate([
                    'id' => 'required',
                    'propertyid' => 'required',
                    'rank' => 'required',
                    'superstar_name' => 'required',
                    'title' => 'required',
                    'description' => 'required',
                ]);
            if($validatedData) {
				
				if($request->hasFile('image')) {

				$imageName = request()->image->getClientOriginalName();
				request()->image->move('superstar_pic', $imageName);
				//File::delete('propertyrooms_pic/'.$getimg);
					
				
                $data = DB::table('superstar')
				->where('id',$request->id)
				->update(['name' => $request->superstar_name,
				'title' => $request->title,
				'description' => $request->description,
				'image' => $imageName,
				'propertyid' => $request->propertyid,
				]);
                Session::flash('code','success');
                return redirect('admin/superstar_details/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				else
				{
					
				
				$data = DB::table('superstar')
				->where('id',$request->id)
				->update(['name' => $request->superstar_name,
				'title' => $request->title,
				'description' => $request->description,
				'propertyid' => $request->propertyid,
				]);
                Session::flash('code','success');
                return redirect('admin/superstar_details/'.$request->id)
                    ->with('status','Details Updated successfully !!');
					
				}
				
            }

        } else {

            return redirect()->to('/admin');
        }
    }
	

    
}
