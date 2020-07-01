
@extends('admin.layouts.app')

@section('title', 'Admin-Edit Profile')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
	        <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Edit Profile</a></li>
            <li class="active">admin@gmail.com</li>
	    </ul>
	    <!-- END BREADCRUMB -->                       
	    <!-- PAGE TITLE -->
	    <div class="page-title">                    
	        <h2><span class="fa fa-cogs"></span> Edit Profile</h2>
	        @php 
	        $userid = Session::get('admin_session_id');
	
	        @endphp
	    </div>
	    <!-- END PAGE TITLE -->                     
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	         <div class="col-sm-12">
                <div class="col-sm-4"></div>
                <div class="col-sm-4">
                    @if (session('status'))                        
                        <div class="alert alert-{{session('code')}} text-center" >                      
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
               
                <div class="col-sm-4"></div>                    
            </div>
	        
	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="alert alert-warning" role="alert">
	                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	                    <strong>Important!</strong> Main feature of this page is "Change photo" function. Press button "Change photo" and try to use this awesome feature.
	                </div>                            
	            </div>
	        </div> -->     
	        
	        <div class="row">                        
	            
	            <div class="col-md-6 col-sm-8 col-xs-7">
	                
	                <form action="#" class="form-horizontal">
	                <div class="panel panel-default">
	                    <div class="panel-body">
	                        <h3><span class="fa fa-pencil"></span> Profile</h3>
	                        </div>
	                    <div class="panel-body form-group-separated">
	                        <div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">First Name</label>
	                            <div class="col-md-9 col-xs-7">
	                                <input type="text" value="John" class="form-control"/>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">Last Name</label>
	                            <div class="col-md-9 col-xs-7">
	                                <input type="text" value="Doe" class="form-control"/>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">Email</label>
	                            <div class="col-md-9 col-xs-7">
	                                <input type="text" value="admin@gmail.com" class="form-control"/>
	                            </div>
	                        </div>
							
							<div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">Password</label>
	                            <div class="col-md-9 col-xs-7">
	                                <input type="text" value="12345" class="form-control"/>
	                            </div>
	                        </div>
	                                                                 
	                       
	                    </div>
	                </div>
	                </form>
	                
	                
	            </div>
	            
	            <div class="col-md-6">
	                <div class="panel panel-default form-horizontal">
	                    
	                    <form action="{{ url('admin/updatepass') }}" method="post" class="form-horizontal">
	                         @csrf
	                    <div class="panel-body">
	                        <h3><span class="fa fa-info-circle"></span>Update Password</h3>
	                        
	                    </div>
	                    <div class="panel-body form-group-separated">  
	                    <div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">Old Password</label>
	                            <div class="col-md-9 col-xs-7">
	                                <input type="password"  class="form-control" name="oldpass" id="oldpass" required/>
	                            </div>
	                        </div>
	                       	<div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">Password</label>
	                            <div class="col-md-9 col-xs-7">
	                                <input type="password"  class="form-control" name="txtPassword" id="txtPassword" required/>
	                            </div>
	                        </div>
	                        <input type="hidden" name="adminid" value="{{ $userid }}"/>
	                        <div class="form-group">
	                            <label class="col-md-3 col-xs-5 control-label">Password</label>
	                            <div class="col-md-9 col-xs-7"> 
	                                <input type="text" class="form-control" id="txtConfirmPassword" name="txtConfirmPassword" required/>
	                            </div>
	                        </div>
	                        
	                         <div class="form-group">
	                            <div class="col-md-12 col-xs-5">
	                                <input type="submit" class="btn btn-primary btn-rounded pull-right" value="Update" onclick="return Validate()">
	                            </div>
	                        </div>
	                        
	                        
	                    </div>
	                    </form>
	                </div>
	                
	               
	            </div>
	            
	        </div>
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
@endsection

@section('supporting_files')

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        else{
        window.location.href = "http://bookhomestays.in/admin/updatepass";
        }
        return true;
    }
</script>
@endsection
