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

class BookingController extends Controller
{
    
	
	
	////show supersatr view
	public function show_bookings () {
        if(session('admin_session_id')) {
			$data['booking'] = DB::table('booking')->get();    		
			//$data['id'] = $id;   
			
    		return view('admin/show_bookings_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	//booking requested
	public function booking_requested () {
        if(session('admin_session_id')) {
			
			$getbooking = DB::table('booking')->where(['booking_status'=>1])->get();   
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
			 return view('admin/booking_request_view',$data);   
			} else {
			    $data = array();
			   return view('admin/booking_request_view',$data); 
			}
			//echo '<pre>';
			//print_r($data['data']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('admin/booking_request_view',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//booking_approved
	public function booking_approved () {
        if(session('admin_session_id')) {
			
			$getbooking = DB::table('booking')
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
			 return view('admin/booking_approve_view',$data);   
			} else {
			    $data = array();
			   return view('admin/booking_approve_view',$data); 
			}
			
			// $data['id'] = $id;    		
    		
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//booking_details
	public function booking_details ($id,$bid) {
        if(session('admin_session_id')) {
			
			$data['bdetails'] = DB::table('booking')->where(['property_id'=>$id,'id'=>$bid])->get();   
			
			//echo '<pre>';
			//print_r($data['bdetails']);
			//echo '</pre>';
			//exit;
			// $data['id'] = $id;    		
    		return view('admin/booking_details',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	
	//change_property_status
	public function change_property_status($id,$param) {
        if(session('admin_session_id')) {
			
			$getstatus = DB::table('properties')->where('id',$id)->first();
			$status = $getstatus->available_status;
			//$hostid = $getstatus->hostid;
			
			if($status==0){ $make = 1; }
			if($status==1){ $make = 0; }
			
			
                $data = DB::table('properties')->where('id',$id)->update(['available_status' => $make,]);
				
				if($param=='booking')
				{
					Session::flash('code','success');
					return redirect('admin/viewPoperty')
                    ->with('status','Available Status Changed Successfully !!');
				}
				
				if($param=='property')
				{
					Session::flash('code','success');
					return redirect('admin/viewPoperty')
                    ->with('status','Available Status Changed Successfully !!');
				}
				
                
            

        } else {

            return redirect()->to('/admin');
        }
    }
	
	public function approve_boking(Request $request) {
        if(session('admin_session_id')) {
			
			
			//$request->payableamo
			$id = $request->bid;
			$property_id = $request->property_id;
			$datefrom = $request->datefrom;
			$dateto = $request->dateto;
			$adult = $request->adult;
			$payableamo = $request->payableamo;

			//exit;
			//$date = date('Y-m-d');
			$getpro = DB::table('booking')->where(['id'=>$id])->first();  
			$pid = $getpro->property_id;
			
			$gethost = DB::table('properties')->where(['id'=>$request->property_id])->first();  
			$host = $gethost->hostid;
			
            $data = DB::table('booking')->where('id',$id)->update(['property_id'=>$request->property_id,'amount'=>$request->payableamo,'datefrom'=>$request->datefrom,'dateto'=>$request->dateto,'adult'=>$request->adult,'booking_status'=>2,'approve_date'=>date('Y-m-d h:i'),]);
			
			
						
			if($data) {

                $customerData = DB::table('customer')->where('id',$getpro->customer_id)->first();
                $placeData = DB::table('place')->where('id',$gethost->placeid)->first();
                

                $msg = 'Dear '.$customerData->name.', Your property ID: '.$pid.' is available. Location: '.$placeData->place.'. Check-in time: '.$request->datefrom.', 11am onwards. Check-out time: '.$request->dateto.', till 12pm. No of guests: '.$request->adult.' adults. Payable Amount: Rs.'.$request->payableamo.'. Please pay to confirm your booking <http://bookhomestays.in/customer_signup>';
                $numbers = $customerData->phone;
        		//$url = 'http://sms.hspsms.com/sendSMS?';
        		
        		//$query ='method=http&username=Maxcin@AGPNER&sendername=BKHMSY&smstype=TRANS&apikey=3da88287-abef-4c86-a0fa-8d1aea247cf8&numbers='.$numbers.'&message='.$msg;
        		
        		$url = 'http://sms.hspsms.com/sendSMS?';
				$query = 'method=http&username=Maxcin@AGPNER1&message='.$msg.'&sendername=BKHMSY&smstype=TRANS&numbers='.$numbers.'&apikey=99ba502e-abcc-4337-b0ce-872671209ee7';
				
        		$ch = curl_init();

        		curl_setopt($ch, CURLOPT_URL, $url);
        		curl_setopt($ch, CURLOPT_HTTPGET, 1);
        		curl_setopt($ch, CURLOPT_POSTFIELDS,$query);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        		$return = curl_exec ($ch);
        		curl_close ($ch);

				Session::flash('code','success');
				return redirect('admin/booking_approved')
                ->with('status','Successfully Approved Booking !!');
			}
				
                
            

        } else {

            return redirect()->to('/admin');
        }
    }
	
	
	
	
    
}
