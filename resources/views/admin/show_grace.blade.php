
@extends('admin.layouts.app')

@section('title', 'Admin-Main Category Listings')

@section('sidebar')
    @parent
@endsection



@section('content')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li><a href="#">Grace & Beauty</a></li>                    
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
            </div>
            
            <div class="row"> 
			
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Grace & Beauty Listings</h3>
                                                              
                            
                        </div>
						<div class="panel-body">
                            <div class="table-responsive">
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sl No</th>
                                           <th>Id To Add</th>
                                           <th>Image</th>
                                           <th>Place</th>
                                           <th>title</th>
                                           <th>Distance</th>
                                           <th>Description</th>
                                           
                                           <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
										@php
										$i = 0;  
										@endphp
										@foreach ($sight_scene as $sight_scenes)
										@php
										$i++;
										$getplace = DB::table('place')->where('id',$sight_scenes->placeId)->first();
										
										$getdata = DB::table('grace')->where('placesto_see_id',$sight_scenes->id)->get();
										
										@endphp	
				
									    <form class="form-horizontal" action="{{ url('admin/update_placestoc_to_grace') }}" method="post" enctype="multipart/form-data">
                                        @csrf
										
                                        <tr>
                                            <td>{{ $i }}</td>
											<td>
												<label class="check">
												<input type="checkbox" name="placetocid[]" value="{{ $sight_scenes->id }}" <?php if(count($getdata)>0) {?> checked="checked" <?php }?> />
													{{$sight_scenes->id}}
												</label>
											</td>
                                            <td >
											<img src="{{asset('placebanner')}}/{{ $sight_scenes->image }}" alt="" height="60" width="120">
											</td>
                                            <td >{{ $getplace->place }}</td>
											<td >{{ $sight_scenes->title }}</td>
											<td >{{ $sight_scenes->distance }}</td>
											<td >{{ $sight_scenes->description }}</td>
											
											<td >
											
												<a href="{{ url('admin/get_smlistings_grace/'.$sight_scenes->id.'') }}" class="btn btn-primary btn-xs" role="button">Update Similar Listings</a>
											
											
											</td>
                                           
                                                             
                                        </tr>  

                                            @endforeach   
										<tr>
										<div class="btn-group pull-right">
											<button class="btn btn-danger"><i class="fa fa-bars"></i>Update The Places To Grace & Beauuty</button>
										   
										</div> 
										</tr>
										</form>
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
						<?php /* ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sl No</th>
                                           <th>Food blog Name</th>
                                           <th>Title</th>
                                           <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
									$i = 0;  
									@endphp
                                    @foreach ($grace as $food_blogs)
									@php
									$i++;
									
                                    @endphp
									<?php
										/*
										[id] => 1
										[placeid] => 3
										[hostid] => 1
										[main_category] => 1,2,3
										[holiday_category] => 1
										[confort_id] => 1
										[season_id] => 1
										[hotel_name] => test
										[address] => kolkata
										[latitude] => 22.225
										[longitude] => 58.235
										[price] => 20
										[rating] => null
										[image] => Screenshot 2015-10-10 12.44.38.png
										[available_status] => 0
										<?php /*<img src="{{ asset('site_images/holiday_category')}}/{{ $holidays->image }}" alt="" height="60" width="120">
										
										?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >{{ $food_blogs->name }}</td>
                                            <td >{{ $food_blogs->title }}</td>
											<td >
											<img src="{{asset('food_blog_pic')}}/{{ $food_blogs->image }}" alt="" height="60" width="120">
											</td>
											
                                           
                                            <td >
                                                <p><a href="{{ url('admin/get_smlistings_grace/'.$food_blogs->id)}}" class="btn btn-primary btn-xs" role="button">Similar Listings</a></p>
												
												
                                            </td>                   
                                        </tr>  
                                    @endforeach                                         
                                    </tbody>
                                </table>                                    
                            </div>
                        </div><?php */ ?>
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
