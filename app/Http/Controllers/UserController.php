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

class UserController extends Controller
{
	//userLogin
	
	public function userLogin(Request $request) {

        $validatedData = $request->validate([           
            'email' => 'required',
            'password' => 'required',                
        ]);
	
        if($validatedData) {
            
            $data = DB::table('customer')->where('email',$request->email)->first();

            if($data) {

            $c_password = $data->password;
            $session_id = $data->id;
            $resName = $data->name;
			
                if($request->password == $c_password) {

                    //$request->session()->put('res_session_id', $session_id);
                    $request->session()->put('name', $resName);
                    $request->session()->put('session_id', $session_id);
					
					//echo $adults = session('adults');

                    if($from_date = session('from_date')) {
						//echo 'in session';
						//exit;
					   $adults = session('adults');
					   $from_date = session('from_date');
					   $to_date = session('to_date');
					  
					   
                      //return redirect()->to('user/dashboard');  
					  return redirect()->to('user/booking_process');  
                    } else {
						//echo 'no';
						//exit;
					   $adults = session('adults');
					   $from_date = session('from_date');
					   $to_date = session('to_date');
					   
                       return redirect()->to('user/dashboard'); 
                    }

                    

                } else {
                    Session::flash('code','danger');
                    return redirect('/customer_signup')
                                    ->with('status','Wrong Password !!');
                }

            } else {

                Session::flash('code','danger');
                return redirect('/customer_signup')
                    ->with('status','No Data Found !!');

            }
        }

    }
	
	//signup
	
	public function userSignup(Request $request) {

        $validatedData = $request->validate([           
            'name' => 'required',
            'phone' => 'required',                
            'email' => 'required|unique:customer',                
            'password' => 'required',                
        ]);
	
        if($validatedData) {
            
            $data = DB::table('customer')->insertGetId(['name' => $request->name,
				'email' => $request->email,
				'phone' => $request->phone,
				'password' => $request->password,
				'status' => '1',]);
				
            if($data) {
                
                //$c_password = $data->password;
            //$session_id = $data->id;
            //$resName = $data->name;
			
                //print_r($data);
                //exit;

                    //$request->session()->put('res_session_id', $session_id);
                    $request->session()->put('name', $request->name);
                    $request->session()->put('session_id', $data);

                    /*if($adults = session('adults')) {
                      return redirect()->to('user/dashboard');  
                    } else {
                       return redirect()->to('/'); 
                    }*/
					
					if($from_date = session('from_date')) {
						
					   $adults = session('adults');
					   $from_date = session('from_date');
					   $to_date = session('to_date');
					  
					   
                      return redirect()->to('user/booking_process');  
                    } 

                    

                
            	
    	        $msg = 'Dear '.$request->name.', Thank you for signing up with bookhomestays.in. We will keep you updated on places to be explored and experienced. Looking forward to host you with us soon!';

    	        $numbers = $request->phone;

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
	            return redirect('user/dashboard')
	                ->with('status','You have registered successfully!!');

            } else {

                Session::flash('code','danger');
                return redirect('/customer_signup')
                    ->with('status','No Data Found !!');

            }
        }
		
		else {

                Session::flash('code','danger');
                return redirect('/customer_signup')
                    ->with('status','No Data Found !!');

            }

    }

    public function getOtp(Request $request) { 

        $otp = rand(100000,999999);         

        $msg = ''.$otp.' is your one time password to proceed on Bookhomestays.in . It is valid for 10 minutes. Do not share your OTP with anyone.';
        $numbers = $request->phone;
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

		return $otp;
    
    }
	
	//contact_msg
	
	public function contact_msg(Request $request) {

        $validatedData = $request->validate([           
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',                
            'email' => 'required',                
            'msg' => 'required',                
        ]);
	
        if($validatedData) {
            
            $data = DB::table('contact_msg')->insert(['name' => $request->name,
				'lastname' => $request->lastname,
				'email' => $request->email,
				'phone' => $request->phone,
				'msg' => $request->msg,
				]);

            if($data) {

            Session::flash('code','success');
            return redirect('/contact')
                ->with('status','You have Submitted Your Message successfully!!');

            } else {

                Session::flash('code','danger');
                return redirect('/contact')
                    ->with('status','Please Try Again !!');

            }
        }
		
		else {

                Session::flash('code','danger');
                return redirect('/contact')
                    ->with('status','No Data Found !!');

            }
        
    }
	
	//
	
	public function news(Request $request) {

        $validatedData = $request->validate([           
            'email' => 'required',
           ]);
	
        if($validatedData) {
            
            $data = DB::table('newslettter')->insert(['email' => $request->email,
				]);

            if($data) {

            Session::flash('code','success');
            return redirect('/')
                ->with('status','You have Submitted Your Email Id successfully!!');

            } else {

                Session::flash('code','danger');
                return redirect('/')
                    ->with('status','Please Try Again !!');

            }
        }
		
		else {

                Session::flash('code','danger');
                return redirect('/')
                    ->with('status','No Data Found !!');

            }

        
    }
    
    // Dashboard
    
    public function dashboard() {
        if(session('session_id')) {
			
            return view('customer/dashboard');
        } else {
            return redirect()->to('/');
        }
    }
	
	//booking_process
	public function booking_process() {
        if(session('session_id')) {
            return view('customer/booking_process');
        } else {
            return redirect()->to('/');
        }
    }
	
	public function host_details() {
        if(session('session_id')) {
			
            return view('customer/host_details');
        } else {
            return redirect()->to('/');
        }
    }
	
	public function requested($id) {
        if(session('session_id')) {
			$userid = Session::get('session_id');
			$data['waiting'] = DB::table('booking')
			->where('customer_id',$userid)
			->where('booking_status',1)
			->get();
			//echo '<pre>';
			//print_r($data['waiting']);
			//echo '</pre>';
			//exit;
            return view('customer/requested',$data);
        } else {
            return redirect()->to('/');
        }
    }
	
	//confirmed
	public function confirmed($id) {
        if(session('session_id')) {
			$userid = Session::get('session_id');
			$data['confirmed'] = DB::table('booking')
			->where('customer_id',$userid)
			->where('booking_status',2)
			->where('payment_status',1)
			->get();
			//echo '<pre>';
			//print_r($data['confirmed']);
			//echo '</pre>';
			//exit;
            return view('customer/confirmed',$data);
        } else {
            return redirect()->to('/');
        }
    }
	
	
	//request_booking
	
	public function request_booking($id) {
        if(session('session_id')) {
			/*
			[id] => 1
                    [property_id] => 1
                    [hostid] => 1
                    [customer_id] => 2
                    [datefrom] => 2019-02-25
                    [dateto] => 2019-02-28
                    [adult] => 2
                    [children] => 2
                    [room_type] => 1,2
                    [booking_status] => 1
                    [payment_status] => 1
                    [amount] => 650
                    [booking_date] => 2019-02-23
                    [approve_date] => 2019-02-27
                    [leave_date] => 0000-00-00*/
			$data['waiting'] = DB::table('booking')
			->where('customer_id',$id)
			->where('booking_status','!=',3)
			->get();
			
            return view('customer/request_booking');
        } else {
            return redirect()->to('/');
        }
    
    }
	
	//confirmbookings
	public function confirmbookings($id) {
        if(session('session_id')) {
			/*
			[id] => 1
                    [property_id] => 1
                    [hostid] => 1
                    [customer_id] => 2
                    [datefrom] => 2019-02-25
                    [dateto] => 2019-02-28
                    [adult] => 2
                    [children] => 2
                    [room_type] => 1,2
                    [booking_status] => 1
                    [payment_status] => 1
                    [amount] => 650
                    [booking_date] => 2019-02-23
                    [approve_date] => 2019-02-27
                    [leave_date] => 0000-00-00*/
			$data['approve'] = DB::table('booking')
			->where('customer_id',$id)
			->where('booking_status',2)
			->where('payment_status',2)
			->get();
			//echo '<pre>';
			//print_r($data['approve']);
			//echo '</pre>';
			//exit;
            return view('customer/confirm_bookings',$data);
        } else {
            return redirect()->to('/');
        }
    
    }
    
   //UserProfile
	public function userProfile($id) {
        if(session('session_id')) {
			
		
            return view('customer/profile');
        } else {
            return redirect()->to('/');
        }
    
    }
    //Review
    
    public function userpropertyreview($id) 
    { if(session('session_id'))
       { 
          $bid['bid']=$id;
        return view('customer/rewiew',$bid);
        }
    
    else {
        return redirect()->to('/');
        } 
        
    }
    
    // Log out
    
    public function logout() {
        if(session('session_id')) {
            session()->get('session_id');
            session()->forget('session_id');
            session()->flush();
            return redirect()->to('/');
        } else {
            return redirect()->to('/');
        }
    
    }
    
    
    // Booking

    public function testSms() {
        
        $otp = rand(100000,999999);

        $msg = ''.$otp.' is your one time password to proceed on Bookhomestays.in . It is valid for 10 minutes. Do not share your OTP with anyone.';
        $numbers = 9593634134;
		$url = 'http://sms.hspsms.com/sendSMS?';
		
		$query ='method=http&username=Maxcin@AGPNER&sendername=BKHMSY&smstype=TRANS&apikey=3da88287-abef-4c86-a0fa-8d1aea247cf8&numbers='.$numbers.'&message='.$msg;
		
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPGET, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$query);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		echo $return = curl_exec ($ch);
		curl_close ($ch);
    
    }
    
    public function booking(Request $request) {
        if(session('session_id')) {  
            
            $validatedData = $request->validate([           
                'hostId' => 'required',
                'customerId' => 'required',
                'propertyId' => 'required',
                'from_date' => 'required',
                'to_date' => 'required',
                'adult' => 'required',
            ]);
			
			//console.log($request->from_date);
			//console.log($request->to_date);
			//exit;
            
            if(isset($request->child)) {
             $children = $request->child;   
            } else {
                $children = "";
            }
            
            if(isset($request->room_type)) {
             $room_type = implode(",",$request->room_type); 
             
            } else {
                $room_type = "";
            }
            
           
            if($validatedData) {
                $start = strtotime($request->from_date);
                $end = strtotime($request->to_date);
                if($end>$start) {
                    $days_between = ceil(abs($end - $start) / 86400);
                    // $room_types = explode(",",$request->room_type) ;

                    $price = 0;
                    
                    $rd = explode(",", $request->loggedroom_details) ;
                    foreach ($rd as $value) {
                            
                        $noOfRooms = substr($value, strpos($value, "-") + 1);
                        $RoomType = strtok($value, '-');
        
                        $data = DB::table('room_details')->where('id',$RoomType)->first();
                        $price = $price + ($data->price*$noOfRooms);
                    }
                    // foreach ($request->room_type as $room_typez) {
                    //     $data = DB::table('room_details')->where('id',$room_typez)->first();
                    //     $price = $price + $data->price; 
                    // }

                    $totalPrice = $price * $days_between;                    

                    $data = DB::table('booking')->insert(['property_id' => $request->propertyId,'hostid' => $request->hostId, 'customer_id' => $request->customerId,
                    'datefrom' => $request->from_date, 'dateto' => $request->to_date, 'adult' => $request->adult, 'children' => $children,
                    'room_type' => $room_type, 'booking_status' => 1, 'payment_status' => 1, 'amount' => $totalPrice, 'booking_date' => date('Y-m-d')]);

                    $customerData = DB::table('customer')->where('id',$request->customerId)->first();

                    $msg = 'Dear '.$customerData->name.', Thank you for choosing bookhomestays.in. Your Property ID: '.$request->propertyId.' is checking for availability. You will receive a call from us shortly on confirmation of your booking.';
                    $numbers = $customerData->phone;
            		$url = 'http://sms.hspsms.com/sendSMS?';
            		
            		$query ='method=http&username=Maxcin@AGPNER&sendername=BKHMSY&smstype=TRANS&apikey=3da88287-abef-4c86-a0fa-8d1aea247cf8&numbers='.$numbers.'&message='.$msg;
            		
            		
            		$ch = curl_init();

            		curl_setopt($ch, CURLOPT_URL, $url);
            		curl_setopt($ch, CURLOPT_HTTPGET, 1);
            		curl_setopt($ch, CURLOPT_POSTFIELDS,$query);
            		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            		$return = curl_exec ($ch);
            		curl_close ($ch);

                    Session::flash('code','success');
                    return redirect('searchDetails/'.$request->propertyId.'')
                            ->with('status','You have booked successfully!!');
                } else {
                    Session::flash('code','danger');
                    return redirect('searchDetails/'.$request->propertyId.'')
                            ->with('status','Please check the checkout date !!');
                }
                

                
            }
        
        
        //   echo "<pre>";
        //   print_r($request->all());
        } else {
            return redirect()->to('/');
        }
    
    }


    public function grequestBooking(Request $request) {
        $hostId = session('hostId') ;
        $propertyId = session('propertyId') ;
        $from_date = session('from_date') ;
		
		
		$dateslash = str_replace('/', '-', $from_date);
		$datefrom =  date('Y-m-d', strtotime($dateslash));
		
		
        $to_date = session('to_date') ;
		
		$dateslash1 = str_replace('/', '-', $to_date);
		$dateto =  date('Y-m-d', strtotime($dateslash1));
		
        $adults = session('adults');
        $child = session('child');
        $customerId = session('session_id');

        //$room_types = session('room_types');
        $totalDays = session('totalDays');
        //$totalPrice = session('totalPrice');

        $data = DB::table('booking')->insert(['property_id' => $propertyId,'hostid' => $hostId, 'customer_id' => $customerId,
        'datefrom' => $from_date, 'dateto' => $to_date, 'adult' => $adults, 'children' => $child, 'booking_status' => 1, 'payment_status' => 1, 'amount' => 0, 'booking_date' => date('Y-m-d')]);

        $customerData = DB::table('customer')->where('id',$customerId)->first();

        $msg = 'Dear '.$customerData->name.', Thank you for choosing bookhomestays.in. Your Property ID: '.$propertyId.' is checking for availability. You will receive a call from us shortly on confirmation of your booking .';
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

        $request->session()->forget(['hostId', 'from_date','to_date', 'adults']);

        Session::flash('code','success');
        Session::flash('status','Thank You.Your Enquiry has been received successfully.Our Destination expert will reach out to you soon.');
        return 'success';
        // return redirect('searchDetails/'.$propertyId.'')
        //         ->with('status','You have booked successfully!!');

    }	
	
	
	public function getBooked(Request $request) {
	   
	    if(session('session_id')) { 
	       
	        $user_id = session('session_id');
	        $order_id = uniqid();
	        $finalAmount = $request->price;
	        
	        $customerData = DB::table('customer')->where('id',session('session_id'))->first();
	        
	        $name = $customerData->name;
	        $phone = $customerData->phone;
	        $email = $customerData->email;
	        
	        $data = DB::table('invoice')->insert([
	                            'user_id' => $user_id,
	                            'manual_pro_id' => $request->manual_pro_id, 
	                            'finalAmount' => $finalAmount,
	                            'name' => $name,
	                            'phone' => $phone,
	                            'order_id' => $order_id,
	                            'transaction_id' => '',
	                            'status' => 'Requested',
	                            'created_at' => date('Y-m-d H:i:s'),
	                            'updated_at' => date('Y-m-d H:i:s'),
	                        ]);
	       
	        $data_for_request = $this->handlePaytmRequest($order_id,$finalAmount,(int)$user_id,$phone);
	        
	        $paytm_txn_url = 'https://securegw-stage.paytm.in/theia/processTransaction';
	        $paramList = $data_for_request['paramList'];
	        $checkSum = $data_for_request['checkSum'];

	        return view('customer/paytmform', compact( 'paytm_txn_url', 'paramList', 'checkSum' ) );
	    }
	    
	}
	
	
	function getEncdecPaytm() {

		function encrypt_e($input, $ky) {
			$key   = html_entity_decode($ky);
			$iv = "@@@@&&&&####$$$$";
			$data = openssl_encrypt ( $input , "AES-128-CBC" , $key, 0, $iv );
			return $data;
		}
		function decrypt_e($crypt, $ky) {
			$key   = html_entity_decode($ky);
			$iv = "@@@@&&&&####$$$$";
			$data = openssl_decrypt ( $crypt , "AES-128-CBC" , $key, 0, $iv );
			return $data;
		}
		function generateSalt_e($length) {
			$random = "";
			srand((double) microtime() * 1000000);
			$data = "AbcDE123IJKLMN67QRSTUVWXYZ";
			$data .= "aBCdefghijklmn123opq45rs67tuv89wxyz";
			$data .= "0FGH45OP89";
			for ($i = 0; $i < $length; $i++) {
				$random .= substr($data, (rand() % (strlen($data))), 1);
			}
			return $random;
		}
		function checkString_e($value) {
			if ($value == 'null')
				$value = '';
			return $value;
		}
		function getChecksumFromArray($arrayList, $key, $sort=1) {
			if ($sort != 0) {
				ksort($arrayList);
			}
			$str = getArray2Str($arrayList);
			$salt = generateSalt_e(4);
			$finalString = $str . "|" . $salt;
			$hash = hash("sha256", $finalString);
			$hashString = $hash . $salt;
			$checksum = encrypt_e($hashString, $key);
			return $checksum;
		}
		function getChecksumFromString($str, $key) {
			
			$salt = generateSalt_e(4);
			$finalString = $str . "|" . $salt;
			$hash = hash("sha256", $finalString);
			$hashString = $hash . $salt;
			$checksum = encrypt_e($hashString, $key);
			return $checksum;
		}
		function verifychecksum_e($arrayList, $key, $checksumvalue) {
			$arrayList = removeCheckSumParam($arrayList);
			ksort($arrayList);
			$str = getArray2StrForVerify($arrayList);
			$paytm_hash = decrypt_e($checksumvalue, $key);
			$salt = substr($paytm_hash, -4);
			$finalString = $str . "|" . $salt;
			$website_hash = hash("sha256", $finalString);
			$website_hash .= $salt;
			$validFlag = "FALSE";
			if ($website_hash == $paytm_hash) {
				$validFlag = "TRUE";
			} else {
				$validFlag = "FALSE";
			}
			return $validFlag;
		}
		function verifychecksum_eFromStr($str, $key, $checksumvalue) {
			$paytm_hash = decrypt_e($checksumvalue, $key);
			$salt = substr($paytm_hash, -4);
			$finalString = $str . "|" . $salt;
			$website_hash = hash("sha256", $finalString);
			$website_hash .= $salt;
			$validFlag = "FALSE";
			if ($website_hash == $paytm_hash) {
				$validFlag = "TRUE";
			} else {
				$validFlag = "FALSE";
			}
			return $validFlag;
		}
		function getArray2Str($arrayList) {
			$findme   = 'REFUND';
			$findmepipe = '|';
			$paramStr = "";
			$flag = 1;	
			foreach ($arrayList as $key => $value) {
				$pos = strpos($value, $findme);
				$pospipe = strpos($value, $findmepipe);
				if ($pos !== false || $pospipe !== false) 
				{
					continue;
				}
				
				if ($flag) {
					$paramStr .= checkString_e($value);
					$flag = 0;
				} else {
					$paramStr .= "|" . checkString_e($value);
				}
			}
			return $paramStr;
		}
		function getArray2StrForVerify($arrayList) {
			$paramStr = "";
			$flag = 1;
			foreach ($arrayList as $key => $value) {
				if ($flag) {
					$paramStr .= checkString_e($value);
					$flag = 0;
				} else {
					$paramStr .= "|" . checkString_e($value);
				}
			}
			return $paramStr;
		}
		function redirect2PG($paramList, $key) {
			$hashString = getchecksumFromArray($paramList);
			$checksum = encrypt_e($hashString, $key);
		}
		function removeCheckSumParam($arrayList) {
			if (isset($arrayList["CHECKSUMHASH"])) {
				unset($arrayList["CHECKSUMHASH"]);
			}
			return $arrayList;
		}
		function getTxnStatus($requestParamList) {
			return callAPI(PAYTM_STATUS_QUERY_URL, $requestParamList);
		}
		function getTxnStatusNew($requestParamList) {
			return callNewAPI(PAYTM_STATUS_QUERY_NEW_URL, $requestParamList);
		}
		function initiateTxnRefund($requestParamList) {
			$CHECKSUM = getRefundChecksumFromArray($requestParamList,PAYTM_MERCHANT_KEY,0);
			$requestParamList["CHECKSUM"] = $CHECKSUM;
			return callAPI(PAYTM_REFUND_URL, $requestParamList);
		}
		function callAPI($apiURL, $requestParamList) {
			$jsonResponse = "";
			$responseParamList = array();
			$JsonData =json_encode($requestParamList);
			$postData = 'JsonData='.urlencode($JsonData);
			$ch = curl_init($apiURL);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
			'Content-Type: application/json', 
			'Content-Length: ' . strlen($postData))                                                                       
			);  
			$jsonResponse = curl_exec($ch);   
			$responseParamList = json_decode($jsonResponse,true);
			return $responseParamList;
		}
		function callNewAPI($apiURL, $requestParamList) {
			$jsonResponse = "";
			$responseParamList = array();
			$JsonData =json_encode($requestParamList);
			$postData = 'JsonData='.urlencode($JsonData);
			$ch = curl_init($apiURL);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);                                                                  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
			'Content-Type: application/json', 
			'Content-Length: ' . strlen($postData))                                                                       
			);  
			$jsonResponse = curl_exec($ch);   
			$responseParamList = json_decode($jsonResponse,true);
			return $responseParamList;
		}
		function getRefundChecksumFromArray($arrayList, $key, $sort=1) {
			if ($sort != 0) {
				ksort($arrayList);
			}
			$str = getRefundArray2Str($arrayList);
			$salt = generateSalt_e(4);
			$finalString = $str . "|" . $salt;
			$hash = hash("sha256", $finalString);
			$hashString = $hash . $salt;
			$checksum = encrypt_e($hashString, $key);
			return $checksum;
		}
		function getRefundArray2Str($arrayList) {	
			$findmepipe = '|';
			$paramStr = "";
			$flag = 1;	
			foreach ($arrayList as $key => $value) {		
				$pospipe = strpos($value, $findmepipe);
				if ($pospipe !== false) 
				{
					continue;
				}
				
				if ($flag) {
					$paramStr .= checkString_e($value);
					$flag = 0;
				} else {
					$paramStr .= "|" . checkString_e($value);
				}
			}
			return $paramStr;
		}
		function callRefundAPI($refundApiURL, $requestParamList) {
			$jsonResponse = "";
			$responseParamList = array();
			$JsonData =json_encode($requestParamList);
			$postData = 'JsonData='.urlencode($JsonData);
			$ch = curl_init($apiURL);	
			curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_URL, $refundApiURL);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);  
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
			$headers = array();
			$headers[] = 'Content-Type: application/json';
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);  
			$jsonResponse = curl_exec($ch);   
			$responseParamList = json_decode($jsonResponse,true);
			return $responseParamList;
		}

	}
	
	function configPaytmSettings() {

		define('PAYTM_ENVIRONMENT', 'TEST'); // PROD
		define('PAYTM_MERCHANT_KEY', 'NsrLqwq!&H_A_NNA'); //Change this constant's value with Merchant key received from Paytm.
		define('PAYTM_MERCHANT_MID', 'TmTEhC01016889448494'); //Change this constant's value with MID (Merchant ID) received from Paytm.
		define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING'); //Change this constant's value with Website name received from Paytm.
		$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
		$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
		if (PAYTM_ENVIRONMENT == 'PROD') {
			$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
			$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
		}
		define('PAYTM_REFUND_URL', '');
		define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
		define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
		define('PAYTM_TXN_URL', $PAYTM_TXN_URL);

	}
	
	
	function handlePaytmRequest($order_id,$amount,$user_id,$phone) {
		// Load all functions of encdec_paytm.php and config-paytm.php
		$this->getEncdecPaytm();
		$this->configPaytmSettings();
		$checkSum = "";
		$paramList = array();
		// Create an array having all required parameters for creating checksum.
		$paramList["MID"] = 'TmTEhC01016889448494';
		$paramList["ORDER_ID"] = $order_id;
		$paramList["CUST_ID"] = $user_id;
		$paramList["MOBILE_NO"] = $phone;	
		$paramList["INDUSTRY_TYPE_ID"] = 'Retail';
		$paramList["CHANNEL_ID"] = 'WEB';
		$paramList["TXN_AMOUNT"] = $amount;
		$paramList["WEBSITE"] = 'WEBSTAGING';
		$paramList["CALLBACK_URL"] = url( '/paytm-callback' );
		$paytm_merchant_key = 'NsrLqwq!&H_A_NNA';
		//Here checksum string will return by getChecksumFromArray() function.
		$checkSum = getChecksumFromArray( $paramList, $paytm_merchant_key );
		return array(
			'checkSum' => $checkSum,
			'paramList' => $paramList
		);
	
	}
	
	
	function paytmCallback(Request $request) {
	    
		$order_id = $request['ORDERID'];
		$id = session('session_id');
		if ( 'TXN_SUCCESS' === $request['STATUS'] ) {
		
		    $transaction_id = $request['TXNID'];
		    $data = DB::table('invoice')->where('order_id',$order_id)->update(['transaction_id' => $transaction_id, 'status' => 'paid']);
            Session::flash('code','success');
			Session::flash('transaction_id',$transaction_id);
			return redirect('user/requested/'.$id)
                    ->with('status','You have successfully booked !!');
			
		} else if( 'TXN_FAILURE' === $request['STATUS'] ){
			$data = DB::table('invoice')->where('order_id',$order_id)->update(['status' => 'cancelled']);
			Session::flash('code','warning');
			Session::flash('transaction_id',$request['TXNID']);
			return redirect('user/requested/'.$id)
                    ->with('status',$request['RESPMSG']);

		}
	
	}
    //updateprofile
	public function updateprofile(Request $request) {
        
            $validatedData = $request->validate([
                    'userid' => 'required',
                    'name' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'password' => 'required',
                ]);
            if($validatedData) {

               $data = DB::table('customer')->where('id',$request->userid)
				->update(['name'=>$request->name,
				'email'=>$request->email,
				'phone'=>$request->phone,
				'password'=>$request->password]);
				
                Session::flash('code','success');
                return redirect('user/userprofile/'.$request->userid)
                    ->with('status','Profile Updated successfully !!');
            }

        
    }
	//givereview
	public function givereview(Request $request) {
        
            $validatedData = $request->validate([
                    'userid' => 'required',
                    'bid' => 'required',
                    'rating' => 'required',
                    'review' => 'required',
                    ]);
            if($validatedData) {
			$getpro = DB::table('booking')->where(['id'=>$request->bid])->first(); 
			$proid = $getpro->property_id;
			
			$chk = DB::table('review')->where(['bookingid'=>$request->bid,'userid'=>$request->userid])->first(); 
			if(empty($chk))
			{
				$data = DB::table('review')->insert(['userid' => $request->userid,
				'bookingid' => $request->bid,
				'propertyid' => $proid,
				'rating' => $request->rating,
				'feedback' => $request->review,
				]);
			
              
				
                Session::flash('code','success');
                return redirect('user/dashboard')
                    ->with('status','Review Successfully Submitted !!');
				
			}
			else
			{
				
			}
				Session::flash('code','error');
                return redirect('user/writereview/'.$request->bid)
                    ->with('status','Review Already Submitted !!');
			
            }

        
    }

}
