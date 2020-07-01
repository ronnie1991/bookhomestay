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
        
        <div class="login-container" style="background-image:url({{ asset('user_files/images/happyKids.jpg')}});height: 500px;background-position: center;background-repeat: no-repeat;background-size: cover;">
        
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
                <div class="login-body" style="background: rgb(44, 46, 72);border-radius: 3px 3px 0px 0px;">

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
                            <input type="text" class="form-control" placeholder="Name*" name="resName" value="{{ old('resName') }}" required="required"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Phone*" name="phone" required="required" value="{{ old('phone') }}" pattern="[0-9]{1}[0-9]{9}" maxlength="10" oninvalid="setCustomValidity('Enter Valid Mobile Number')" onchange="try{setCustomValidity('')}catch(e){}" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Email id*" name="email" required="required" value="{{ old('email') }}"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password*" required="required" name="password" value="{{ old('password') }}"/>
                        </div>
                    </div>
					
					
					
                    <div class="form-group">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block" style="background-color: darkcyan;border-color: #1de2e2;">Register</button>
                        </div>
                        
                    </div>
                    </form>
                    
                    <div class="col-sm-6" style="margin-top: 12px;">
                            <a href="{{ url('host')}}" class="btn btn-link btn-block">Already registered as a host ?   <span style="text-decoration: underline;    margin-left: 6px;">  Login Now !</span></a>
                        </div>
                    
                </div>
               <div class="login-footer" style="background: darkcyan;border-radius: 0px 0px 1px 1px;">
                    <div class="pull-left">
                        &copy; 2019 Home Stay
                    </div>
                    <div class="pull-right">
                      <a href="{{ url('')}}">Home</a>
                      <a href="{{ url('contact/')}}" style="margin-left: 10px;">Contact Us</a>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
    </body>

</html>







