
@extends('host.layouts.app')

@section('title', 'Property Details')

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
	        <h2><span class="fa fa-cogs"></span>Property & Room details</h2>
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
				[id] => 4
                    [placeid] => 1
                    [hostid] => 2
                    [main_category] => 1
                    [holiday_category] => 2
                    [confort_id] => 1
                    [season_id] => 2
                    [hotel_name] => Divya Shree
                    [address] => no 15, 1st main road, tata silk farm, basavanagudi, b-4
                    [latitude] => 12345
                    [longitude] => 6543
                    [price] => 5678
                    [rating] => null
                    [image] => Experiences.jpg
                    [available_status] => 0
				*/
				?>
				
				@php
				$i = 0;  
				@endphp
				@foreach ($property_details as $properties)
				@php
				$i++;
				$getplace = DB::table('place')->where('id',$properties->placeid)->first();
				$gethost = DB::table('host')->where('id',$properties->hostid)->first();
				$getholiday = DB::table('holiday_categories')->where('id',$properties->holiday_category)->first();
				$getcomfort = DB::table('comfort_categories')->where('id',$properties->confort_id)->first();
				$getseason = DB::table('seasons')->where('id',$properties->season_id)->first();
				
				@endphp					
									
			
	         <div class="row">
                        <div class="col-md-6">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                
                                   <h3>Details of Propety Id: {{ $properties->id }}</h3>
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Available Status</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												@php
											if($properties->available_status==0)
											{ @endphp
												
												<a href="" class="btn btn-primary btn-xs" role="button">NA</a>
											@php 
											}
											else{
											@endphp
											<a href="" class="btn btn-success btn-xs" role="button">Available</a>
											@php 
											}
											@endphp
												</p>
                                            </div>
                                        </div>
								   
								   
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Place</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<select class="form-control select" name="place">
													<option value="{{ $properties->id }}">{{ $getplace->place }}</option>
																
												</select>
												</p>
                                            </div>
                                        </div>
                                        
                                      
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Host</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<select class="form-control select" name="host">
													<option value="{{ $properties->hostid }}">{{ $gethost->name }}</option>
																
												</select>
												</p>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Manual Property Id</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="{{ $properties->manual_pro_id }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Main Category</label>
                                            <div class="col-md-8">
                                               
											   @php
											   $cat = $properties->main_category;
											   $var = explode(',', $cat);
											   @endphp
											   @foreach($var as $element)
											   						<p class="form-control-static">{{ $element }}</p>					   
											   									   
											   @endforeach
                                            
                                            </div>
                                        </div>			

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Holiday Category</label>
                                            <div class="col-md-8">
                                               <p class="form-control-static">
												<select class="form-control select" name="place">
													<option value="{{ $properties->holiday_category }}">{{ $getholiday->holiday_category }}</option>
												</p>				
												</select>
                                            </div>
                                        </div>

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Comfort Category</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<select class="form-control select" name="place">
													<option value="{{ $properties->confort_id }}">{{ $getcomfort->name }}</option>
												</p>				
												</select>
                                            </div>
                                        </div>


										<div class="form-group">
                                            <label class="col-sm-4 control-label">Season Category</label>
                                            <div class="col-md-8">
                                               <p class="form-control-static">
												<select class="form-control select" name="place">
													<option value="{{ $properties->season_id }}">{{ $getseason->name }}</option>
															
												</select>
												</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Hotel Name</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="{{ $properties->hotel_name }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Address</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="hname" value="{{ $properties->address }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Price</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                               <input type="text" class="form-control" name="hname" value="{{ $properties->price }}" required id="postcode"/>  
											   </p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Total Person</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="{{ $properties->total_person_can_stay }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Cover Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<!--<img src="{{ asset('propertypic')}}/{{ $properties->image }}" alt="" height="60" width="120">-->
												<img src="{{'http://codingshifu.com/propertypic'}}/{{ $properties->image }}" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Food Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<!--<img src="{{ asset('propertypic')}}/{{ $properties->image }}" alt="" height="60" width="120">-->
												<img src="{{'http://codingshifu.com/propertypic'}}/{{ $properties->food_image }}" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										
                                                                                                                         
                                </div>
                            </div>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
						
                    </div>
					
					@endforeach 
					
			<div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rooms Listings</h3>
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                <ul class="dropdown-menu">
                                   
                                    
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});">
                                        <img src='{{ url('admin_files/img/icons/csv.png')}}' width="24"/> CSV
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});">
                                        <img src='{{ url('admin_files/img/icons/xls.png')}}' width="24"/> XLS
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});">
                                    <img src='{{ url('admin_files/img/icons/ppt.png')}}' width="24"/> PowerPoint
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});">
                                        <img src='{{ url('admin_files/img/icons/pdf.png')}}' width="24"/> PDF
                                    </a>
                                </li>
                                </ul>
                            </div>                                   
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sl No</th>
                                           <th>Image</th>
                                           <th>Room name</th>
                                           <th>description</th>
                                           <th>aminities</th>
                                           <th>Price</th>
                                           <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                @php
				$i = 0;  
				@endphp
				@foreach ($room_details as $rooms)
				@php
				$i++;
				
				
				@endphp	
				<?php 
				/*
				 [id] => 4
                    [property_id] => 1
                    [romm_name] => double bedded
                    [description] => jsghyjjghjfz
                    [image] => Homestays.jpg
                    [aminities] => 1,4,5
                    [price] => 1000
                    [status] => 1
				*/
				?>
									            
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >
											<!---<img src="{{ asset('propertyrooms_pic')}}/{{ $rooms->image }}" alt="" height="60" width="120">--->
											<img src="{{'http://codingshifu.com/propertyrooms_pic'}}/{{ $rooms->image }}" alt="" height="60" width="120">
											</td>
                                            <td >{{ $rooms->romm_name }}</td>
											<td >{{ $rooms->description }}</td>
											<td >{{ $rooms->aminities }}</td>
											<td >{{ $rooms->price }}</td>
											<td >
											
												
												@php
											if($rooms->status==0)
											{ @endphp
												
												<a href="" class="btn btn-primary btn-xs" role="button">NA</a>
											@php 
											}
											else{
											@endphp
											<a href="" class="btn btn-success btn-xs" role="button">Available</a>
											@php 
											}
											@endphp
											
											</td>
                                           
                                                             
                                        </tr>  
                                            @endforeach                                  
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
					
					
					
				
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
@endsection

@section('supporting_files')

	
@endsection
