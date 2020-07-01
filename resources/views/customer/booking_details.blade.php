
@extends('host.layouts.app')

@section('title', 'Booking Details')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
	        <li><a href="#">Home</a></li>
            <li><a href="#">Pages</a></li>
            <li><a href="#">Property Details</a></li>
            <li class="active">@php
$hostid = Session::get('res_session_id');
@endphp</li>
	    </ul>
	    <!-- END BREADCRUMB -->                       
	    <!-- PAGE TITLE -->
	    <div class="page-title">                    
	        <h2><span class="fa fa-cogs"></span>Booking details</h2>
	    </div>
	    <!-- END PAGE TITLE -->                     
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="alert alert-warning" role="alert">
	                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	                    <strong>Important!</strong> Main feature of this page is "Change photo" function. Press button "Change photo" and try to use this awesome feature.
	                </div>                            
	            </div>
	        </div> -->     
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
									
				<?php 
				/*
					[id] => 1
                    [property_id] => 1
                    [hostid] => 1
                    [customer_id] => 2
                    [datefrom] => 2019-02-25
                    [dateto] => 2019-02-28
                    [adult] => 2
                    [children] => 2
                    [room_type] => 1,2
                    [booking_status] => 1
                    [payment_status] => 1
                    [amount] => 650
                    [booking_date] => 2019-02-23
                    [leave_date] => 0000-00-00
				*/
				?>
				
				@php
				$i = 0;  
				@endphp
				@foreach ($bdetails as $details)
				@php
				$i++;
				
				$getcustomer = DB::table('customer')->where('id',$details->customer_id)->first();
				$getproperty = DB::table('properties')->where('id',$details->property_id)->first();
				
				@endphp					
									
			
	         <div class="row">
                        <div class="col-md-8">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                
                                   <h3>Details of Booking Id: {{ $details->id }}</h3>
								   
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Status</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												@php
												if($details->booking_status==1)
												{
												@endphp
												<a href="" class="btn btn-primary btn-xs" role="button">Requested</a>
												<a href="{{ url('host/approve_boking/'.$details->id)}}" class="btn btn-info btn-xs" role="button">Approve Booking</a>
												@php 
												}
												
												if($details->booking_status==2)
												{ @endphp
													
													<a href="" class="btn btn-primary info-xs" role="button">Confirmed</a>
												@php 
												}
												if($details->booking_status==3)
												{
												@endphp
												
												<a href="" class="btn btn-primary danger-xs" role="button">Cancelled</a>
												@php
												}
												@endphp
												
											
												</p>
                                            </div>
                                        </div>
										
										
								   
								   
                                       <div class="form-group">
                                            <label class="col-sm-4 control-label">Property Id</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="{{ $getproperty->manual_pro_id }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										

										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Hotel Name</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="{{ $getproperty->hotel_name }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Customer</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $getcustomer->name }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Booking Date</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $details->booking_date }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Date From</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $details->datefrom }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Date To</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $details->dateto }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Adult</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $details->adult }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Children</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $details->children }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Room Type</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $details->room_type }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
									
										
                                                                                                                         
                                </div>
                            </div>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
						
                    </div>
					
					@endforeach 
					
			
					
					
					
				
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
@endsection

@section('supporting_files')

	
@endsection
