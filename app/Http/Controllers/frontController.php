<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Restaurant;
use DB;
use Session;
use File;

class HostController extends Controller
{
     
    public function index() {
        
        return view('host/signup');

    }

    

   
}
