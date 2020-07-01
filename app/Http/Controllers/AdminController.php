<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Admin;

use DB;

class AdminController extends Controller
{
    
    public function index()   {

        return view('home');
    }

    public function login() {
        
        return view('admin/pages-login');
    }

    public function authenticate(Request $request) {

        $validatedData = $request->validate([           
            'email' => 'required',
            'password' => 'required',                
        ]);

        if($validatedData) {

        
		//$deliveryboy = DB::table('deliveryboy')->where(['online_status'=>'1','available_status'=>'0'])->get();

            // $data = Admin::where('email', $request->email)->first();
            
            $data = DB::table('admins')->where(['email'=>$request->email])->first();
           

            if(!empty($data->email)) {

                $c_password = $data->password;
                //exit;
                $session_id = $data->id;
                $name = $data->name;

                if($request->password == $c_password) {

                    $request->session()->put('admin_session_id', $session_id);
                    $request->session()->put('admin_name', $name);

                    return redirect()->to('admin/dashboard');

                } else {
                    Session::flash('code','danger');
                    return redirect('/admin')
                                    ->with('status','Wrong Password !!');
                }

            } else {

                Session::flash('code','danger');
                return redirect('/admin')
                    ->with('status','No Data Found !!');

            }
        }

        
    }
    
    public function updatepass(Request $request) {

        $validatedData = $request->validate([           
            'txtPassword' => 'required',
            'adminid' => 'required',     
            'oldpass' => 'required', 
        ]);
        
        if($validatedData) {
            
			
			$data = DB::table('admins')->where(['id'=>$request->adminid])->first();
			
				$c_password = $data->password;
                

                if($request->oldpass == $c_password) {
                    
                    $new = $request->txtPassword;
                    //DB::table('admins')->where('id','$request->adminid')->update(['password'=>$new]);
                    $sql = DB::table('admins')->where('id',$request->adminid)->update(['password'=>$new,]);
                    
                    Session::flash('code','success');
                    return redirect()->to('admin/edit-profile')
                    ->with('status','Password Updated successfully !!');;

                } else {
                    Session::flash('code','danger');
                    return redirect('admin/edit-profile')
                                    ->with('status','Wrong Password !!');
                }
        }
        
    }

    public function logout() {

        session()->get('admin_session_id');
        session()->forget('admin_session_id');
        session()->flush();
        return redirect()->to('/admin');
    }

    public function dashboard() {

        if(session('admin_session_id')) {

            return view('admin/dashboard');

        } else {

            return redirect()->to('/admin');
        }
    }

    public function editprofile() {

        if(session('admin_session_id')) {

            return view('admin/editprofile');

        } else {

            return redirect()->to('/admin');
        }
    }
}
