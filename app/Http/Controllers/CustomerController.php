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

class CustomerController extends Controller
{
    
	
	
	////show supersatr view
	public function show_customer () {
        if(session('admin_session_id')) {
			$data['customer'] = DB::table('customer')->get();    		
			//$data['id'] = $id;    		
    		return view('admin/show_customer',$data);
    	} else {

    		return redirect()->to('/admin');
    	}
    }
	
	//userLogin
	public function userLogin(Request $request) {

        $validatedData = $request->validate([           
            'email' => 'required',
            'password' => 'required',                
        ]);
		
		
        if($validatedData) {
		
		

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
	
	
	
	
	
    
}
