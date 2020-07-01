
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
	        <h2><span class="fa fa-cogs"></span>Manage Preferables</h2>
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
	         <div class="row">
                        
						
						 <div class="col-md-12">

                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <h3>Add Preferable</h3>                                
                                    <form class="form-horizontal" action="{{ url('admin/addpreferable') }}" method="post">
                                        @csrf
                                    <div class="panel-body">
										<div class="form-group">
                                            <label class="col-md-3 control-label">Preferable Name:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" id="name" class="form-control" name="name" required/>
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
					
					
					
					<div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Preferable Listings</h3>
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
                                <table id="preferableTable" class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sl No</th>
                                           <th>Preferable Name</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($preferables as $preferable)
                                         <?php $i++; ?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >{{ $preferable->name }}</td>
                                            <td >
                                                <a href="{{ url('admin/editpreferable/'.$preferable->id.'') }}" class="btn btn-danger" role="button">Edit</a>
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
