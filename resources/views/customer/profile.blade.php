
@extends('customer.layouts.app')

@section('title', 'Customer-Dashboard')

@section('sidebar')
    @parent
@endsection



@section('content')
	@php
		
		$userid = Session::get('session_id');
		$name = Session::get('name');
        @endphp

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
                    <li><a href="{{ url('user/dashboard') }}">Dashboard</a></li>
                    <li><a href="#">View Profile</a></li>
                    <li class="active">{{$name}}</li>
                </ul>
	
	    <!-- END BREADCRUMB --> 
	    
	      
                
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
                    
                    @php
				
				$getcustomer = DB::table('customer')->where('id',$userid)->first();
				
				@endphp	
                    
                      
                    
                    <div class="row">                        
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user"></span> {{$getcustomer->name}}</h3>                                 
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Cust. ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->id}}" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Login ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->email}}" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                             <input type="text" value="{{$getcustomer->password}}" name="password" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <div class="contact-info">
                                        <div class="col-md-9 col-xs-7">
                                        <p> <label class="control-label" style="color:red;" >Got a query?</label></p>
                                        <p><small>Write to us at </small><br>info@bookhomestays.in</p>                                        
                                        <p><small>Call us at</small><br>9916248212</p> 
                                        </div>
                                    </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-12">
                            
                            <form class="form-horizontal" action="{{ url('user/updateprofile') }}" method="post" enctype="multipart/form-data">
							@csrf
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span>Edit My Profile</h3>
                                 </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->name}}" name="name" class="form-control"/>
                                        </div>
                                    </div>
									
									<input type="hidden" value="{{$userid}}" name="userid" class="form-control"/>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Email ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->email}}" name="email" class="form-control"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Phone Number</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->phone}}" name="phone" class="form-control"/>
                                        </div>
                                    </div>    

									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Password</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->password}}" name="password" class="form-control"/>
                                        </div>
                                    </div>    									
                                   <div class="form-group">
                                        <div class="col-md-12 col-xs-12">
                                            <button class="btn btn-primary btn-rounded pull-right">Update profile</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div> 
                    </div>
                    

                </div>
                <!-- END PAGE CONTENT WRAPPER -->   
    
	    <!-- END PAGE CONTENT WRAPPER -->                                
	{{-- </div> --}}
    
@endsection

@section('supporting_files')
		
		
@endsection
