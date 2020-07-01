
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
                    <li><a href="#">Write Rewiew</a></li>
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
                        <div class="col-md-4 col-sm-12 col-xs-5">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">                                
                                <div class="panel-body">
                                    <h3><span class="fa fa-user"></span> Booking Details</h3>                                 
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Booking #ID</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->id}}" class="form-control" disabled/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Property Name</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->email}}" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Check-In</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->email}}" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Out</label>
                                        <div class="col-md-9 col-xs-7">
                                            <input type="text" value="{{$getcustomer->email}}" class="form-control"/>
                                        </div>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div class="col-md-8 col-sm-12 col-xs-7">
                            
                           <form class="form-horizontal" action="{{ url('user/givereview') }}" method="post" enctype="multipart/form-data">
							@csrf
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Write Review</h3>
                                 </div>
								 <input type="hidden" value="{{$bid}}" name="bid" class="form-control"/>
								 <input type="hidden" value="{{$userid}}" name="userid" class="form-control"/>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Rating:</label>                                        
                                            <div class="col-md-9">
                                                
												<select class="form-control" name="rating">
														<option value="">Select Rating Level</option>
													
														<option value="{{1}}">1 Star</option>
														<option value="{{2}}">2 Star</option>
														<option value="{{3}}">3 Star</option>
														<option value="{{4}}">4 Star</option>
														<option value="{{5}}">5 Star</option>
													
												
												</select>												
                                                
                                            </div>
                                        </div>
                                       

									<div class="form-group">
                                        <label class="col-md-3 col-xs-5 control-label">Review</label>
                                        <div class="col-md-9 col-xs-7">
                                            <textarea class="form-control" name="review" rows="5" placeholder="Review"></textarea>
                                        </div>
                                    </div> 
									
									

									
                                  <div class="form-group">
                                        <div class="col-md-12 col-xs-5">
                                            <button class="btn btn-primary btn-rounded pull-right">Submit Review</button>
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
