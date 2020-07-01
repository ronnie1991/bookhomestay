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
error_reporting(E_ALL ^ E_NOTICE);
class  SearchController extends Controller
{

    public function removeElementWithValue($array, $key, $value){
        foreach($array as $subKey => $subArray){
             if($subArray[$key] == $value){
                  unset($array[$subKey]);
             }
        }
        $array = array_values($array);
        return $array;
    }

    public function set_search_params(Request $request)   {
        $destination = $request->destination;

        session(['destination' => $destination]);
        session(['checkIn' => $request->tstart]);
        session(['checkOut' => $request->tend]);
        session(['totalAdults' => $request->adult]);
        session(['totalChilds' => $request->child]);
        session(['totalGuests' => $request->no_of_guests]);
        session(['minPrice' => 0]);
        session(['maxPrice' => 100000]);
        session(['amenities' => '']);
        session(['activities' => '']);
        session(['preferables' => '']);
        session(['holidayCategory' => '']);

        $destinationName = DB::table('place')->where(['id' => $destination])->get();
        $destinationName = $destinationName[0]->place;
        session(['destinationName' => $destinationName]);

        return redirect()->action('SearchController@search_properties');
    }

    public function search_properties(Request $request) {
        $data['placeforselect'] = DB::table('place')->get();
        $data['amenities'] = DB::table('aminities')->get();
        $data['activities'] = DB::table('activities')->get();
        $data['personal_preferables'] = DB::table('personal_preferables')->get();
        $data['selectedAmenities'] = session('amenities');
        $data['selectedActivities'] = session('activities');
        $data['selectedPreferables'] = session('preferables');
        return view('user.formsearch',$data);
    }

    public function set_search_dates(Request $request) {
        session(['checkIn' => $request->checkinDate]);
        session(['checkOut' => $request->checkoutDate]);

        return response()->json(['status' => 'success', 'checkin'=>session('checkIn'), 'checkout'=>session('checkOut')]);
    }

    public function get_search_properties(Request $request) {
        $destination = session('destination');
        $tstart = session('checkIn');
        $tend = session('checkOut');
        $adults = session('totalAdults');
        $child = session('totalChilds');
        $totalGuests = session('totalGuests');
        $minPrice = session('minPrice');
        $maxPrice = session('maxPrice');
        $homestays = 1;
        $data = '';

        if($destination!=''){
            $data = DB::table('properties')
                ->where(['placeid' => $destination, 'main_category' => $homestays, 'available_status'=>0, 'status'=>1])
                ->where('total_person_can_stay', '>', $totalGuests)
                ->where('price', '>', $minPrice)
                ->where('price', '<=', $maxPrice)
                ->select('id', 'placeid', 'holiday_category', 'hotel_name', 'latitude', 'longitude', 'original_price', 'price', 'rating', 'total_person_can_stay', 'image')
                ->orderBy('rank', 'asc')
                ->get();
        }else{
            $data = DB::table('properties')
                ->where(['main_category' => $homestays, 'available_status'=>0, 'status'=>1])
                ->where('total_person_can_stay', '>', $totalGuests)
                ->where('price', '>', $minPrice)
                ->where('price', '<=', $maxPrice)
                ->select('id', 'placeid', 'holiday_category', 'confort_id', 'season_id', 'hotel_name', 'latitude', 'longitude', 'original_price', 'price', 'rating', 'total_person_can_stay', 'image')
                ->orderBy('rank', 'asc')
                ->get();
        }
        
        
        if(session('holidayCategory')!='') {
            foreach($data as $holydayar) {
                $explodeCategory = explode(",", $holydayar->holiday_category);

                if(in_array(session('holidayCategory'), $explodeCategory)) {
                    $searchFinal[] = DB::table('properties')->where(['id' => $holydayar->id])
                        ->orderBy('rank', 'asc')
                        ->first();
                }
            }
            $data = $searchFinal;
        }

        if(session('comfortId')!='') {
            foreach($data as $holydayar) {
                $explodeCategory = explode(",", $holydayar->confort_id);
            
                if(in_array(session('comfortId'), $explodeCategory)) {
                    $searchFinal[] = DB::table('properties')->where(['id'=>$holydayar->id])
                        ->orderBy('rank', 'asc')
                        ->first();    
                }
            }
            $data = $searchFinal; 
        }

        if(session('seasonId')!='') {
            foreach($data as $holydayar) {
                $explodeCategory = explode(",", $holydayar->season_id);

                if(in_array(session('seasonId'), $explodeCategory)) {
                    $searchFinal[] = DB::table('properties')->where(['id'=>$holydayar->id])
                        ->orderBy('rank', 'asc')
                        ->first();   
                }
            }
            $data = $searchFinal; 
        }

        $properties = [];
        foreach($data as $property){
            $destinationName = DB::table('place')->where(['id' => $property->placeid])->get();
            $destinationName = $destinationName[0]->place;

            $property = ['id'=>$property->id, 'name'=>$property->hotel_name, 'destinationName'=>$destinationName, 'lat'=>$property->latitude, 'lng'=>$property->longitude, 'original_price'=>$property->original_price, 'price'=>$property->price, 'rating'=>$property->rating, 'capacity'=>$property->total_person_can_stay, 'img'=>$property->image];
            array_push($properties, $property);
        }

        if(session('amenities')!=''){
            $amenities = session('amenities');
            $tempProps = $properties;
            $totalSelectedAmenities = count($amenities);
            for($i=0; $i < $totalSelectedAmenities; $i++){
                for($j=0; $j < count($tempProps); $j++){
                    $checkAmenity = DB::table('property_amenities')
                        ->where(['amenity_id'=>$amenities[$i], 'property_id'=>$tempProps[$j]['id']])
                        ->get();

                    if(count($checkAmenity) == 0){
                        $properties = SearchController::removeElementWithValue($properties, "id", $tempProps[$j]['id']);
                    }
                }
            }
        }

        if(session('activities')!=''){
            $activities = session('activities');
            $tempProps = $properties;
            $totalSelectedActivities = count($activities);
            for($i=0; $i < $totalSelectedActivities; $i++){
                for($j=0; $j < count($tempProps); $j++){
                    $checkActivity = DB::table('property_activities')
                        ->where(['activity_id'=>$activities[$i], 'property_id'=>$tempProps[$j]['id']])
                        ->get();

                    if(count($checkActivity) == 0){
                        $properties = SearchController::removeElementWithValue($properties, "id", $tempProps[$j]['id']);
                    }
                }
            }
        }

        if(session('preferables')!=''){
            $preferables = session('preferables');
            $tempProps = $properties;
            $totalSelectedPreferables = count($preferables);
            for($i=0; $i < totalSelectedPreferables; $i++){
                for($j=0; $j < count($tempProps); $j++){
                    $checkPreferable = DB::table('property_preferables')
                        ->where(['preferable_id'=>$preferables[$i], 'property_id'=>$tempProps[$j]['id']])
                        ->get();

                    if(count($checkPreferable) == 0){
                        $properties = SearchController::removeElementWithValue($properties, "id", $tempProps[$j]['id']);
                    }
                }
            }
        }

        $totalSelectedFilters = 0;
        if($totalSelectedAmenities || $totalSelectedActivities || $totalSelectedPreferables){
            $totalSelectedFilters = $totalSelectedAmenities + $totalSelectedActivities + $totalSelectedPreferables;
        }
        
        return response()->json(['status' => 'success', 'destinationName'=>session('destinationName'), 'holiday'=>session('holidayCategory'), 'recordsFound'=>count($properties), 'totalSelectedFilters'=>$totalSelectedFilters, 'properties'=>$properties]);
    }
	
    
    public function filter_property_by_price(Request $request) {
        session(['minPrice' => $request->minPrice]);
        session(['maxPrice' => $request->maxPrice]);

        return redirect()->action('SearchController@get_search_properties');
    }

    public function filter_property_by_place(Request $request) {
        session(['destination' => $request->placeId]);

        return redirect()->action('SearchController@get_search_properties');
    }

    public function filter_property_by_guests(Request $request) {
        session(['totalAdults' => $request->adults]);
        session(['totalChilds' => $request->childrens]);
        $totalGuests = $request->adults + $request->childrens;
        session(['totalGuests' => $totalGuests]);

        return redirect()->action('SearchController@get_search_properties');
    }

    public function filter_property_by_amenities(Request $request) {
        $amenity = $request->amenity;
        $amenities = session('amenities');
        if($amenities==''){
            $amenities = [];
        }
        if (($key = array_search($amenity, $amenities)) !== false) {
            unset($amenities[$key]);
        }else{
            array_push($amenities, $amenity);
        }

        $amenities = array_values($amenities);
        session(['amenities' => $amenities]);
        return redirect()->action('SearchController@get_search_properties');
    }

    public function filter_property_by_activities(Request $request) {
        $activity = $request->activity;
        $activities = session('activities');
        if($activities==''){
            $activities = [];
        }
        if (($key = array_search($activity, $activities)) !== false) {
            unset($activities[$key]);
        }else{
            array_push($activities, $activity);
        }
        $activities = array_values($activities);
        session(['activities' => $activities]);
        return redirect()->action('SearchController@get_search_properties');
    }

    public function filter_property_by_preferables(Request $request) {
        $preferable = $request->preferable;
        $preferables = session('preferables');
        if($preferables==''){
            $preferables = [];
        }
        if (($key = array_search($preferable, $preferables)) !== false) {
            unset($preferables[$key]);
        }else{
            array_push($preferables, $preferable);
        }
        $preferables = array_values($preferables);
        session(['preferables' => $preferables]);
        return redirect()->action('SearchController@get_search_properties');
    }

    public function resetSearchSession() {
        session(['destination' => '']);
        session(['destinationName' => '']);
        session(['checkIn' => '']);
        session(['checkOut' => '']);
        session(['totalAdults' => 1]);
        session(['totalChilds' => 0]);
        session(['totalGuests' => 1]);
        session(['minPrice' => 0]);
        session(['maxPrice' => 100000]);
        session(['amenities' => '']);
        session(['activities' => '']);
        session(['preferables' => '']);
        session(['holidayCategory' => '']);
        session(['comfortId' => '']);
        session(['seasonId' => '']);
    }

    public function myPlace($id) {
        $this->resetSearchSession();
        session(['destination' => $id]);
        
        $destinationName = DB::table('place')->where(['id' => $id])->get();
        $destinationName = $destinationName[0]->place;
        session(['destinationName' => $destinationName]);

        return redirect()->action('SearchController@search_properties');
    }

    public function myHoliday($id) {
        $this->resetSearchSession();
        session(['holidayCategory' => $id]);

        return redirect()->action('SearchController@search_properties');
    }

    public function myComfort($id) {
        $this->resetSearchSession();
        session(['comfortId' => $id]);

        return redirect()->action('SearchController@search_properties');
    }

    public function mySeason($id) {
        $this->resetSearchSession();
        session(['seasonId' => $id]);

        return redirect()->action('SearchController@search_properties');
    }

    public function searchDetails($id) {
        $data['details'] = DB::table('room_details')->where('property_id',$id)->get();
        $data['prop'] = DB::table('properties')->where('id',$id)->first();
        $data['room_details'] = DB::table('room_details')->where('property_id',$id)->get();
        return view('user.search_details',$data);
    }

    public function setSessionDataForPurchase(Request $request) {

    	$hostId = $request->hostId ;
    	$propertyId = $request->propertyId ;
    	$from_date = $request->from_date ;
    	$to_date = $request->to_date ;
    	$start = strtotime($from_date);
    	$end = strtotime($to_date);

        
    	if($end>=$start) {

            
    		$days_between = ceil(abs($end - $start) / 86400);
    		$adults = $request->adults ;
			$child = $request->child ;
    		/*
    		
    		
    		$room_types = explode(",",$request->room_type) ;

    		$price = 0;
    		
    		$rd = explode(",", $request->room_details) ;
            foreach ($rd as $value) {
                    
                $noOfRooms = substr($value, strpos($value, "-") + 1);
                $RoomType = strtok($value, '-');

                $data = DB::table('room_details')->where('id',$RoomType)->first();
                $price = $price + ($data->price*$noOfRooms);
            }
            
    // 		foreach ($room_types as $room_type) {
    // 			$data = DB::table('room_details')->where('id',$room_type)->first();
    // 			$price = $price + $data->price; 
    // 		}

    	//	$totalPrice = $price * $days_between;
*/
    		session(['hostId' => $hostId]);
    		session(['propertyId' => $propertyId]);
    		session(['from_date' => $from_date]);
    		session(['to_date' => $to_date]);
    		session(['adults' => $adults]);
    		session(['child' => $child]);
    		//session(['room_types' => $request->room_type]);
    		//session(['room_details' => $request->room_details]);
    		session(['totalDays' => $days_between]);
            //session(['totalPrice' => $totalPrice]);

            if(session('session_id')){
                return redirect()->action('UserController@booking_process');
            }else{
                return redirect()->action('indexController@customer_signup');
            }
    	} else {
    		return 'fail';
    	}
    	


    }
	
}