
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
	        <h2><span class="fa fa-cogs"></span>Top Rated Experience Details</h2>
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
			
	        <div class="row">                        									
			<div class="col-md-12">						
			<!---	[place] => 1 [property] => 1 [rank] => 1 [similar_listings] => 1,4 [id] => 2 [name] => First Experience Added [title] => Title check 		
			[image] => Lighthouse.jpg [description] 	----->                            <!-- START VALIDATIONENGINE PLUGIN -->        
			<div class="panel panel-default">                 
			<div class="panel-body">                     
			<h3>Update SuperStars</h3>                    
			<!---<form class="form-horizontal" action="{{ url('admin/update_superstar_details') }}" method="post" enctype="multipart/form-data">--->	
			<form class="form-horizontal" action="{{ url('admin/update_exp_details') }}" method="post" enctype="multipart/form-data">								
			@csrf                                  
			<div class="panel-body">   								
			@foreach($exp as $sstar)					
			@php						
			echo $pid = $sstar->property;			
			$getplace = DB::table('place')->where('id',$sstar->place)->first(); 				
			$place = $getplace->place;													
			$allplace = DB::table('place')->get();									
			$sql = DB::table('properties')->where('id','$sstar->property')->first();		
			$proid = $sql['manual_pro_id'];													
			@endphp																
			<input type="hidden" class="form-control" name="id" value="{{ $sstar->id }}" required id="postcode"/>   	
			<div class="form-group">                                     
			<label class="col-md-3 control-label">Select Place:</label>       
			<div class="col-md-9">										
			<select class="form-control select" name="place">				
			<option value="{{ $sstar->place }}">{{ $place }}</option>			
			@foreach($allplace as $places)									
			<option value="{{ $places->id }}">{{ $places->place }}</option>			
			@endforeach													
			</select>                                        
			</div>                                  
			</div>								
			<div class="form-group">             
			<label class="col-md-3 control-label">Select Property:</label>  
			<div class="col-md-9">										
			<select  name="propertyid">									
			<option value="{{ $sstar->property }}">{{ $sstar->property }}</option>		
			</select>                         
			</div>                             
			</div>									
			<div class="form-group">                
			<label class="col-md-3 control-label">Priority Level:</label>       
			<div class="col-md-9">										
			<select class="form-control" name="rank">					
			<option value="{{ $sstar->rank }}">Priority Level {{ $sstar->rank }}</option>	
			<option value="{{1}}">Priority Level 1</option>								
			<option value="{{2}}">Priority Level 2</option>							
			<option value="{{3}}">Priority Level 3</option>							
			<option value="{{4}}">Priority Level 4</option>						
			<option value="{{5}}">Priority Level 5</option>					
			</select>                                   
			</div>                                 
			</div>									
			<div class="form-group">                
			<label class="col-md-3 control-label">Experience Name:</label>      
			<div class="col-md-9">                                         
			<input type="text" class="form-control" name="exp_name" value="{{ $sstar->name }}" required id="postcode"/>  
			</div>                                 
			</div>									
			<div class="form-group">                
			<label class="col-md-3 control-label">Title:</label>       
			<div class="col-md-9">                               
			<input type="text" class="form-control" name="title" value="{{ $sstar->title }}" placeholder="" required id="postcode"/>  
			</div>                                
			</div>									
			<div class="form-group">          
			<label class="col-sm-4 control-label">Experience Image</label>        
			<div class="col-md-8">                                    
            <p class="form-control-static">							
			<img src="{{asset('superstar_pic')}}/{{ $sstar->image }}" alt="" height="60" width="120">			
			</p>												                         
			</div>                              
			</div>								
			<div class="form-group">			
			<label class="col-md-3 control-label">Image:</label>       
			<div class="col-md-3">							
			<input type="file"  name="image" title="Browse file"/>		
			</div>										
			</div>										
			<div class="form-group">                   
			<label class="col-md-2 control-label">Description</label>       
			<div class="col-md-10">                             
			<textarea class="summernote" name="description" value="{!! $sstar->description !!}">	
			{!! $sstar->description !!}											
			</textarea>                                          
			</div>                                  
			</div>									
			@endforeach																				                                                                                                                                                         <div class="btn-group pull-right">                                            <button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>                                        </div>                                                                                                                                                              </div>                                                                                   </form>                                                                    </div>                            </div>                                            <!-- END VALIDATIONENGINE PLUGIN -->                        </div>						                    </div>
					
					
			

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
@endsection

@section('supporting_files')

	
@endsection
