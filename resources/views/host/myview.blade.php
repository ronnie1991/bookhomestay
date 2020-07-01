
@extends('host.layouts.app')

@section('title', 'View Update')

@section('sidebar')
    @parent
@endsection



@section('content')

@php
		$hostid = Session::get('res_session_id');
		
		$name = Session::get('name');
        @endphp

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
	        <li><a href="{{ url('host/dashboard') }}">Dashboard</a></li>
            <li><a href="#">My View On Propert</a></li>
            <li><a href="#">{{$name}}</a></li>
            
	    </ul>
	    <!-- END BREADCRUMB -->                       
	    <!-- PAGE TITLE -->
	    <div class="page-title">                    
	        <h2><span class="fa fa-cogs"></span>Views</h2>
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
				$getcustomer = DB::table('host')->where('id',$hostid)->first();
				if(!empty($getcustomer->view))
				{
					$view = $getcustomer->view;
				}
				else
				{
					$view = '';
				}
				
				@endphp					
									
			
	         <div class="row">
			 <form class="form-horizontal" action="{{ url('host/updatehostview') }}" method="post" enctype="multipart/form-data">
                                        @csrf  
                        <div class="col-md-12">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                
                                   
								   
								   <input type="hidden" class="form-control" name="userid" value="{{ $hostid }}" required id="postcode"/> 
								   
								  
									<div class="form-group">
                                            <label class="col-md-2 control-label">Host View:</label>                                        
                                            <div class="col-md-10">
                                                <Textarea type="text" class="summernote" name="view" value="{{ $view }}" rows="10"  id="postcode">  
												{{ $view }}
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

@section('supporting_files')
<script>            
var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), 
{                
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

	
@endsection
