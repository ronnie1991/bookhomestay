
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
	        <h2><span class="fa fa-cogs"></span>Update Similar Listings data For Food Blog.</h2>
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
				
				
				@php
				$i = 0;  
				@endphp
				
				@foreach ($food as $foods)
				@php
				$i++;
				
				
				@endphp					
									
			
	         <div class="row">
                        <div class="col-md-9">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                
                                   <h3>Details of Bg Days Id: {{ $foods->id }}</h3>
										
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Big Days name</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="{{ $foods->name }}" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										

										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Food Blog Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<img src="{{asset('food_blog_pic')}}/{{ $foods->image }}" alt="" height="60" width="120">
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
                            <h3 class="panel-title">Similar Properties Listings</h3>
                                                              
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sl No</th>
                                           <th>Property ID To Add</th>
                                           <th>Image</th>
                                           <th>Hotel Name</th>
                                           
                                           
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                @php
				$i = 0;  
				
				
				@endphp
				@foreach ($properties as $propertiess)
				@php
				
				$focus=explode(",",$foods->similar_listings);
				$i++;
				@endphp
			
				
									    <form class="form-horizontal" action="{{ url('admin/update_smlistings_to_food') }}" method="post" enctype="multipart/form-data">
                                        @csrf     
												<input type="hidden" name="foodblogid" value="{{ $foods->id }}"/>										
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td>
												<label class="check">
												<input type="checkbox" name="proid[]" value="{{ $propertiess->id }}" <?php foreach($focus as $key1){if(in_array($key1,(array)$propertiess->id)) {?> checked="checked" <?php } }?> >
													{{$propertiess->manual_pro_id}}
												</label>
											</td>
											 <td >
											<img src="{{asset('propertypic')}}/{{ $propertiess->image }}" alt="" height="60" width="120">
											</td>
                                            <td >{{ $propertiess->hotel_name }}</td>
										</tr>  
                                            @endforeach    
										<tr>
										<div class="btn-group pull-right">
											<button class="btn btn-danger"><i class="fa fa-bars"></i>Update Properties To Superstar Listings</button>
										   
										</div> 
										</tr>
										</form>
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
