
@extends('admin.layouts.app')

@section('title', 'Admin-Main Category Listings')

@section('sidebar')
    @parent
@endsection



@section('content')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li><a href="#">Category</a></li>                    
            <li class="active">Lists</li>
        </ul>
        <!-- END BREADCRUMB -->                       
        
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row"> 
                <div class="col-md-12">

                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        @if (session('status'))
                            @if (session('code'))
                                <div class="alert alert-{{ session('code') }} text-center" >
                            @endif                          
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>									<div class="row">                        											<div class="col-md-12">                          			<!-- START VALIDATIONENGINE PLUGIN -->           			<div class="panel panel-default">                			<div class="panel-body">                         			<h3>Add Comfort Category</h3>                    			<form class="form-horizontal" action="{{ url('admin/addcomfort') }}" method="post" enctype="multipart/form-data">     			@csrf                             			<div class="panel-body">   					<div class="form-group">          			<label class="col-md-3 control-label">Comfort Category Name:</label>        			<div class="col-md-9">                                      			<input type="text" class="form-control" name="cname" required id="postcode"/>              			</div>                          			</div>											<div class="form-group">						<label class="col-md-3 control-label">Image:</label>  			<div class="col-md-3">											<input type="file" class="fileinput btn-primary" name="image" required title="Browse file"/>					</div>											</div>										<div class="btn-group pull-right">  			<button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button> 						</div>                         			</div>                         			</form>                       			</div>                        			</div>                     			<!-- END VALIDATIONENGINE PLUGIN -->          			</div>						           			</div>
            
            <div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Comfort Category Listings</h3>
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
                                           <th>Category Name</th>
                                           
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($comfort as $comforts)
                                         <?php $i++; ?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >
											<img src="{{asset('site_images/comfort_category')}}/{{ $comforts->image }}" alt="" height="60" width="120">
											<!--<img src="{{ asset('site_images/comfort_category')}}/{{ $comforts->image }}" alt="" height="60" width="120">-->
											</td>
                                            <td >{{ $comforts->name }}</td>
                                           
                                            <td >
                                                <a href="{{ url('admin/comfortEditview/'.$comforts->id)}}" class="btn btn-danger btn-xs" role="button">Edit</a>
												
                                                
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
    {{-- </div> --}}
    
@endsection

@section('supporting_files')
    <script type='text/javascript' src="{{ asset('admin_files/js/plugins/validationengine/languages/jquery.validationEngine-en.js')}}"></script>
    <script type='text/javascript' src="{{ asset('admin_files/js/plugins/validationengine/jquery.validationEngine.js')}}"></script>        

    <script type='text/javascript' src="{{ asset('admin_files/js/plugins/jquery-validation/jquery.validate.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/blueimp/jquery.blueimp-gallery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/bootstrap/bootstrap-select.js')}}"></script> 
    
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/tableexport/tableExport.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/tableexport/jquery.base64.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/tableexport/html2canvas.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/tableexport/jspdf/libs/sprintf.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/tableexport/jspdf/jspdf.js')}}"></script>
    <script type="text/javascript" src="{{ asset('admin_files/js/plugins/tableexport/jspdf/libs/base64.js')}}"></script>
@endsection