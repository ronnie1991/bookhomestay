
@extends('admin.layouts.app')

@section('title', 'Add More Property Details')

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
	        <h2><span class="fa fa-cogs"></span>Host details</h2>
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
				$chk=DB::table('property_more_details')->where('prop_id',$pid)->first();
				if(!empty($chk->amenities)){ $aminities = $chk->amenities; } else{ $aminities=''; }
				if(!empty($chk->package_includes)){ $package = $chk->package_includes; } else{ $package=''; }
				if(!empty($chk->road_map)){ $map = $chk->road_map; } else{ $map=''; }
				if(!empty($chk->local_area_facilities)){ $laf = $chk->local_area_facilities; } else{ $laf=''; }
				if(!empty($chk->hotspots)){ $hot = $chk->hotspots; } else{ $hot=''; }
				if(!empty($chk->food)){ $food = $chk->food; } else{ $food=''; }
				if(!empty($chk->things_to_do)){ $ttdo = $chk->things_to_do; } else{ $ttdo=''; }
				if(!empty($chk->house_rules)){ $house = $chk->house_rules; } else{ $house=''; }
				@endphp
				<div class="row">
			 <form class="form-horizontal" action="{{ url('admin/add_more') }}" method="post" enctype="multipart/form-data">
                                        @csrf  
                        <div class="col-md-12">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                  <input type="hidden" name="pid" value="{{$pid}}" />
								  
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Amenities in the homestay </label>
                                                <Textarea type="text" class="summernote" name="amenities" value="{{ $aminities }}">  
												{{ $aminities }}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Package includes</label>
                                                <Textarea type="text" class="summernote" name="package" value="{{ $package }}">  
												{{ $package }}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Road Map</label>
                                                <Textarea type="text" class="summernote" name="map" value="{{ $map }}">  
												{{ $map }}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Local Area facilities </label>
                                                <Textarea type="text" class="summernote" name="laf" value="{{ $laf }}">  
												{{ $laf }}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Hotspots – not to miss!! </label>
                                                <Textarea type="text" class="summernote" name="hotspot" value="{{$hot}}">  
												{{ $hot }}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Food </label>
                                                <Textarea type="text" class="summernote" name="food" value="{{ $food }}">  
												{{ $food }}
												</Textarea>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">Things to do</label>
                                                <Textarea type="text" class="summernote" name="thingstodo" value="{{$ttdo}}">  
                                                {{$ttdo}}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <div class="col-md-12">
											<label class="control-label">House Rules </label>
                                                <Textarea type="text" class="summernote" name="houserules" value="{{ $house }}">  
												{{ $house }}
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										
										<div class="btn-group pull-right">
                                            <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                        </div> 
										
										
                                                                                                                         
                                </div>
                            </div>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
					</form>
                    </div>
					
					
					
				
					
				
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
@endsection

@section('supporting_files')<script>            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {                lineNumbers: true,                matchBrackets: true,                mode: "application/x-httpd-php",                indentUnit: 4,                indentWithTabs: true,                enterMode: "keep",                tabMode: "shift"                                                            });            editor.setSize('100%','420px');        </script>

	
@endsection
