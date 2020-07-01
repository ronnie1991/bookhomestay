
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
	        <h2><span class="fa fa-cogs"></span>Property & Room details</h2>
	    </div>
	    <!-- END PAGE TITLE -->                     
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="alert alert-warning" role="alert">
	                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">�</span><span class="sr-only">Close</span></button>
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
				$getmain = DB::table('main_categories')->where('id',$properties->main_category)->first();
				$getseason = DB::table('seasons')->where('id',$properties->season_id)->first();
				
				$hh = $properties->holiday_category;
				
				
				@endphp					
									
			
	         <div class="row">
                        <div class="col-md-9">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
								
								<form class="form-horizontal" action="{{ url('admin/updateproperty') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <input type="hidden" name="pid" value="{{ $properties->id }}"/>                    
                                   <h3>Details of Propety Id: {{ $properties->id }}</h3>
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Available Status</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												@php
											if($properties->available_status==0)
											{ @endphp
												
												<a href="" class="btn btn-success btn-xs" role="button">Available</a>
											@php 
											}
											else{
											@endphp
											<a href="" class="btn btn-primary btn-xs" role="button">NA</a>
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
													<option value="{{ $properties->placeid }}">{{ $getplace->place }}</option>
													@foreach($place as $placelist)
													<option value="{{ $placelist->id }}">{{ $placelist->place }}</option>
													@endforeach
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
													@foreach($host as $hostlist)
													<option value="{{ $hostlist->id }}">{{ $hostlist->name }}</option>
													@endforeach
												</select>
												</p>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Manual Property Id</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="manual_pro_id" value="{{ $properties->manual_pro_id }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Main Category</label>
                                            <div class="col-md-8">
                                               
											   
											    <p class="form-control-static">
												<select class="form-control select" name="main_category">
													<option value="{{ $properties->main_category }}">{{ $getmain->cname }}</option>
													@foreach($categories as $catlist)
													<option value="{{ $catlist->id }}">{{ $catlist->cname }}</option>
													@endforeach
												</p>				
												</select>
                                            
                                            </div>
                                        </div>			

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Holiday Category</label>
                                            <div class="col-md-8">
                                            	
											@php
											
											@endphp
											@foreach($holiday as $holidays)
											@php
											$focus=explode(",",$properties->holiday_category);
											
											
											@endphp
												<label class="check">
													@if (in_array($holidays->id, $focus))
													    <input type="checkbox" checked value="{{ $holidays->id }}" name="holiday[]">{{ $holidays->holiday_category }}
													@else
													    <input type="checkbox" value="{{ $holidays->id }}" name="holiday[]" >{{ $holidays->holiday_category }}
													@endif
												</label>
											@endforeach
											</div>
                                        </div>

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Comfort Category</label>
                                            <div class="col-md-8">
											
                                            @foreach($comfort_categories as $comfort_categoriesss)
											@php
											$focus2=explode(",",$properties->confort_id);
											@endphp
												<label class="check">
													@if (in_array($comfort_categoriesss->id, $focus2))
													    <input type="checkbox" checked value="{{ $comfort_categoriesss->id }}" name="comfort[]">{{ $comfort_categoriesss->name }}
													@else
													    <input type="checkbox" value="{{ $comfort_categoriesss->id }}" name="comfort[]" >{{ $comfort_categoriesss->name }}
													@endif	
												</label>
											@endforeach
											</div>
                                        </div>

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Season Category</label>
                                            <div class="col-md-8">
                                               
											
											@foreach($season as $seasons)
											@php
											$focus3=explode(",",$properties->season_id);
											@endphp
												<label class="check">
													@if (in_array($seasons->id, $focus3))
													    <input type="checkbox" checked value="{{$seasons->id}}" name="season[]">{{ $seasons->name }}
													@else
													    <input type="checkbox" value="{{ $seasons->id }}" name="season[]" >{{ $seasons->name }}
													@endif
												
												</label>
											@endforeach
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
                                            <label class="col-md-4 control-label">Priority Level:</label>  
                                            <div class="col-md-8">
												<select class="form-control" name="rank">
												<option value="{{ $properties->rank }}">Priority Level {{ $properties->rank }}</option>
													
													
														<option value="{{1}}">Priority Level 1</option>
														<option value="{{2}}">Priority Level 2</option>
														<option value="{{3}}">Priority Level 3</option>
														<option value="{{4}}">Priority Level 4</option>
														<option value="{{5}}">Priority Level 5</option>
													
												
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-4 control-label">Rating:</label>                                        
                                            <div class="col-md-8">
                                                
												<select class="form-control" name="rating">
														<<option value="{{ $properties->rating }}">Rating Level {{ $properties->rating }}</option>
														<option value="{{1}}">Rating Level 1</option>
														<option value="{{2}}">Rating Level 2</option>
														<option value="{{3}}">Rating Level 3</option>
														<option value="{{4}}">Rating Level 4</option>
														<option value="{{5}}">Rating Level 5</option>
													
												
												</select>												
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Address</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="address1" value="{{ $properties->address }}" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
										
										<div class="col-md-3">
                                               
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="latitude" value="{{ $properties->latitude }}" id="latitude" class="form-control" value="" >                                     
                                                
                                            </div>  
											<div class="col-md-3">
                                               
                                            </div>

											<div class="col-md-3">
                                                <input type="text" name="longitude" value="{{ $properties->longitude }}" id="longitude" class="form-control" value="" >                                    
                                                
                                            </div>											
                                        </div>
										

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Original Price</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                               <input type="text" class="form-control" name="original_price" value="{{ $properties->original_price }}" required id="postcode"/>  
											   </p>
                                            </div>
                                        </div>


										<div class="form-group">
                                            <label class="col-sm-4 control-label">Price</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                               <input type="text" class="form-control" name="price" value="{{ $properties->price }}" required id="postcode"/>  
											   </p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Total Person</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="total_person" value="{{ $properties->total_person_can_stay }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Cover Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												
												<img src="{{asset('propertypic')}}/{{ $properties->image }}" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                    <label class="col-md-4 control-label">Change Cover Pic:</label>                                        
                                    <div class="col-md-8">
                                        <input type="file" class="fileinput btn-primary" name="image" title="Browse file"/>
                                    </div>
                                </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Food Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												
												<img src="{{asset('propertypic')}}/{{ $properties->food_image }}" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                    <label class="col-md-4 control-label">Change Food Menu Image:</label>                                        
                                    <div class="col-md-8">
                                        <input type="file" class="fileinput btn-primary" name="food_image" title="Browse file"/>
                                    </div>
                                </div>
								
								<div class="btn-group pull-right">
                                           <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                        </div>
										
										
                                </form>                                                                                 
                                </div>
                            </div>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
						
                    </div>
					
                    @endforeach 
                    
                    <div id="propertyAmenities" class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Amenities</h3>
                                </div>    
                                <div class="panel-body">
                                    @foreach($amenities as $amenity)
                                    @php
                                    $check = DB::table('property_amenities')->where(['property_id'=>$propertyId, 'amenity_id'=>$amenity->id])->first();
                                    @endphp
                                    <div class="col-md-3">
                                        <label class="check">
                                            @if ($check)
                                                <input type="checkbox" class="amenity" checked value="{{ $amenity->id }}" data-pid="{{ $propertyId }}" name="amenities[]"> {{ $amenity->aminities }}
                                            @else
                                                <input type="checkbox" class="amenity" value="{{ $amenity->id }}" data-pid="{{ $propertyId }}" name="amenities[]"> {{ $amenity->aminities }}
                                            @endif	
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>              
                    </div>

                    <div id="propertyActivities" class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Activities</h3>
                                </div>    
                                <div class="panel-body">
                                    @foreach($activities as $activity)
                                    @php
                                    $check = DB::table('property_activities')->where(['property_id'=>$propertyId, 'activity_id'=>$activity->id])->first();
                                    @endphp
                                    <div class="col-md-3">
                                        <label class="check">
                                            @if ($check)
                                                <input type="checkbox" class="activity" checked value="{{ $activity->id }}" data-pid="{{ $propertyId }}" name="activities[]"> {{ $activity->name }}
                                            @else
                                                <input type="checkbox" class="activity" value="{{ $activity->id }}" data-pid="{{ $propertyId }}" name="activities[]"> {{ $activity->name }}
                                            @endif	
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>              
                    </div>

                    <div id="propertyPreferables" class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Personal Preferables</h3>
                                </div>    
                                <div class="panel-body">
                                    @foreach($preferables as $preferable)
                                    @php
                                    $check = DB::table('property_preferables')->where(['property_id'=>$propertyId, 'preferable_id'=>$preferable->id])->first();
                                    @endphp
                                    <div class="col-md-3">
                                        <label class="check">
                                            @if ($check)
                                                <input type="checkbox" class="preferable" checked value="{{ $preferable->id }}" data-pid="{{ $propertyId }}" name="preferables[]"> {{ $preferable->name }}
                                            @else
                                                <input type="checkbox" class="preferable" value="{{ $preferable->id }}" data-pid="{{ $propertyId }}" name="preferables[]"> {{ $preferable->name }}
                                            @endif	
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>              
                    </div>
					
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
				$i = 0;  				if(!empty($room_details))				{
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
											<img src="{{asset('propertyrooms_pic')}}/{{ $rooms->image }}" alt="" height="60" width="120">
											</td>
                                            <td >{{ $rooms->romm_name }}</td>
											<td >{!! $rooms->description !!}</td>
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
											
											<p><a href="{{ url('admin/room_editview/'.$rooms->id)}}" class="btn btn-primary btn-xs" role="button">Update</a></p>
												
											</td>
                                           
                                                             
                                        </tr>  
                                            @endforeach                                  				@php } @endphp
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
			
			
			<div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Places To See Listings</h3>
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
                                           <th>PlacesId</th>
                                           <th>Image</th>
                                           <th>Place</th>
                                           <th>title</th>
                                           <th>Distance</th>
                                           <th>Description</th>
                                           
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
									
									
									
									
										@php
										$i = 0;  										if(!empty($placesto_see)){
										$placesto_see = explode(',', $properties->placesto_see);
										@endphp
										@foreach ($placesto_see as $sight_scenes)
										
										@php
										$i++;
										$getsiteid = DB::table('sightseen')->where('id',$sight_scenes)->first();
										$getplace = DB::table('place')->where('id',$getsiteid->placeId)->first();
			
										@endphp	
				
									            
                                        <tr>
                                            <td>{{ $sight_scenes }}</td>
                                            <td >
											<img src="{{asset('placebanner')}}/{{ $getsiteid->image }}" alt="" height="60" width="120">
											</td>
                                            <td >{{ $getplace->place }}</td>
											<td >{{ $getsiteid->title }}</td>
											<td >{{ $getsiteid->distance }}</td>
											<td >{!! $getsiteid->description !!}</td>
											
										
                                           
                                                             
                                        </tr>  
                                            @endforeach      										@php } @endphp
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

<script>
	$('#propertyAmenities .amenity').click(function(){
		var pid = $(this).data('pid');
		var amenityId = $(this).val();

		if($(this).is(':checked')){
			$.get('../set_property_amenity', {'propertyId': pid, 'amenityId': amenityId}, function(data){});
		}else{
			$.get('../unset_property_amenity', {'propertyId': pid, 'amenityId': amenityId}, function(data){});
		}
    });

    $('#propertyActivities .activity').click(function(){
		var pid = $(this).data('pid');
		var activityId = $(this).val();

		if($(this).is(':checked')){
			$.get('../set_property_activity', {'propertyId': pid, 'activityId': activityId}, function(data){});
		}else{
			$.get('../unset_property_activity', {'propertyId': pid, 'activityId': activityId}, function(data){});
		}
    });

    $('#propertyPreferables .preferable').click(function(){
		var pid = $(this).data('pid');
		var preferableId = $(this).val();

		if($(this).is(':checked')){
			$.get('../set_property_preferable', {'propertyId': pid, 'preferableId': preferableId}, function(data){});
		}else{
			$.get('../unset_property_preferable', {'propertyId': pid, 'preferableId': preferableId}, function(data){});
		}
    });
</script>
	
@endsection