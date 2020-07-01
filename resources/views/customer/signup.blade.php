<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
        <!-- META SECTION -->
        <title>Host Registration</title>            
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
        
        <div class="login-container">
        
            <div class="login-box animated fadeInDown">
              
               <div class="col-sm-12">
                       @if (session('status'))
                           @if (session('code'))
                               <div class="alert alert-{{ session('code') }} text-center" >
                           @else
                               <div class="alert alert-success text-center" >
                           @endif                          
                               {{ session('status') }}
                           </div>
                       @endif
               </div>
                <div class="login-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <div class="login-title">
                    	<strong>Welcome</strong>, Please Register</div>
                    <form action="{{ url ('host/register') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Name" name="resName" value="{{ old('resName') }}"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email id" name="email" value="{{ old('email') }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}"/>
                        </div>
                    </div>
					
					<div class="form-group">
                                    <label class="col-md-3 control-label">Image:</label>                                        
                                    <div class="col-md-3">
                                        <input type="file" class="fileinput btn-primary" name="image" title="Browse file"/>
                                    </div>
                    </div>
					
                    <div class="form-group">
                        
                        <div class="col-md-4">
                            <a href="{{ url('host')}}" class="btn btn-link btn-block">Log In</a>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block">Register</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2018 SpeedyBites
                    </div>
                    
                </div>
            </div>
            
        </div>
        
    </body>

</html>







