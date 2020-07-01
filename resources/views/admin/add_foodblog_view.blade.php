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
	        <h2><span class="fa fa-cogs"></span>Add Food Blog</h2>
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

                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <h3>Add SuperStars</h3>                                
                                    <form class="form-horizontal" action="{{ url('admin/add_foodblog_details') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">   
									
									<div class="form-group">
                                            <label class="col-md-3 control-label">Select Place:</label>  
                                            <div class="col-md-9">
												<select class="form-control select" name="place">
													<option value="">Please Select</option>
													@foreach($place as $places)
														<option value="{{ $places->id }}">{{ $places->place }}</option>
													@endforeach			
												</select>
                                            </div>
                                        </div>

										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Priority Level:</label>  
                                            <div class="col-md-9">
												<select class="form-control" name="rank">
												<option value="">Select Priority Level</option>
													
														<option value="{{1}}">Priority Level 1</option>
														<option value="{{2}}">Priority Level 2</option>
														<option value="{{3}}">Priority Level 3</option>
														<option value="{{4}}">Priority Level 4</option>
														<option value="{{5}}">Priority Level 5</option>
													
												
												</select>
                                            </div>
                                        </div>	
									
										<div class="form-group">
                                            <label class="col-md-3 control-label">Food Blog Name:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="food_name" value="" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Title:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="title" placeholder="" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Food Image:</label>                                        
											<div class="col-md-3">
												<input type="file"  name="image" title="Browse file"/>
											</div>
										</div>
										
										
										
										
										<div class="form-group">
                                            <label class="col-md-2 control-label">Description</label>
                                            <div class="col-md-10">
                                                <textarea class="summernote" name="description" rows="5"></textarea>
                                            </div>
                                        </div>
										
				
										
										
                                                                                                                 
                                        <div class="btn-group pull-right">
                                            <button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>
                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                        </div>                                                                                                                          
                                    </div>                                               
                                    </form>
                                    
                                </div>
                            </div>                
                            <!-- END VALIDATIONENGINE PLUGIN -->

                        </div>
						
                    </div>
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
@endsection

@section('supporting_files')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeciEON29M-Sur2-bSOysbbDU9Eu71R0g&sensor=false&libraries=places"></script>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

		<script>
            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {
                lineNumbers: true,
                matchBrackets: true,
                mode: "application/x-httpd-php",
                indentUnit: 4,
                indentWithTabs: true,
                enterMode: "keep",
                tabMode: "shift"                                                
            });
            editor.setSize('100%','420px');
        </script> 
		
		
		<!-- THIS PAGE PLUGINS -->        
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('admin_files/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>        
        
        <script type="text/javascript" src="{{ asset('admin_files/js/plugins/codemirror/codemirror.js')}}"></script>        
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/xml/xml.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/javascript/javascript.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/css/css.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/clike/clike.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/php/php.js')}}"></script>    

        <script type="text/javascript" src="{{ asset('admin_files/js/plugins/summernote/summernote.js')}}"></script>

	
@endsection
