<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
        <!-- META SECTION -->
        <title>Host Panel</title>            
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


                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="{{ url('host/dologin') }}" class="form-horizontal" method="post">
                        @csrf
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" name="email" value="{{ old('email') }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-link btn-block">Forgot password?</a>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ url('host/sign-up') }}" class="btn btn-link btn-block">Sign Up</a>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                    
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2019 Home Stay
                    </div>
                    
                </div>
            </div>
            
        </div>
        
    </body>

</html>






