	@php
		$userid = Session::get('session_id');
		$name = Session::get('name');
		
        @endphp

    <!DOCTYPE html>
    <html lang="en">
        
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>        
            <!-- META SECTION -->
            <title>@yield('title')</title>            
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            
            <link rel="icon" href="favicon.ico" type="image/x-icon" />
            <!-- END META SECTION -->
            
            <!-- CSS INCLUDE -->        
            <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('admin_files/css/theme-default.css')}}"/>
            <!-- EOF CSS INCLUDE -->                                      
    </head>

    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            @section('sidebar')
                @include('customer.layouts.navbar')
            @show
            
            <div class="page-content">
                
                
                      


                @yield('content')
            </div>

           
        </div>
        @include('customer.layouts.footer') 
        @yield('supporting_files') 
    </body>    
   
</html>