
@extends('admin.layouts.app')

@section('title', 'Admin-Main Category Listings')

@section('sidebar')
    @parent
@endsection



@section('content')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li><a href="#">Property</a></li>                    
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
                            <h3 class="panel-title">Property Listings</h3>
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
                                           <th>Place</th>
                                           <th>Host</th>
                                           <th>Hotel Name</th>
                                           <th>Category</th>
                                           <th>Price</th>
                                           <th>Available Status</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
									$i = 0;  
									@endphp
                                    @foreach ($property as $properties)
									@php
									$i++;
									$getplace = DB::table('place')->where('id',$properties->placeid)->first();
									$gethost = DB::table('host')->where('id',$properties->hostid)->first();
									$getcategory = DB::table('main_categories')->where('id',$properties->main_category)->first();
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
										*/ 
										?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >{{ $getplace->place }}</td>
                                            {{-- <td></td> --}}
                                            <td >{{ $gethost->name }}</td>
											<td >{{ $properties->hotel_name }}</td>
											<td >{{ $getcategory->cname }}</td>
											<td >{{ $properties->price }}</td>
											<td >
											
											@php
											if($properties->available_status==1)
											{ @endphp
												
												<a href="{{ url('admin/change_property_status/'.$properties->id,'booking') }}" title="Make Available" class="btn btn-primary btn-xs" role="button">NA</a>
											@php 
											}
											else{
											@endphp
											
											<a href="{{ url('admin/change_property_status/'.$properties->id,'booking') }}" title="Make NotAvailable" class="btn btn-success btn-xs" role="button">Available</a>
											
											@php 
											}
											@endphp
											</td>
                                           
                                            <td>
                                                <!--<a href="" class="btn btn-primary btn-xs" role="button">Edit</a>-->
												<p><a href="{{ url('admin/delproperty/'.$properties->id)}}" class="btn btn-danger btn-xs" role="button">Delete</a></p>
												<p><a href="{{ url('admin/add_room_ui/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Add Rooms</a></p>
												<p><a href="{{ url('admin/add_room_pics/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Add Rooms Pics</a></p>
												<p><a href="{{ url('admin/addplacestosee_properties/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Add Places To See</a></p>
												<p><a href="{{ url('admin/add_more_details/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Add More Details</a></p>
												<p><a href="{{ url('admin/add_things_do_property/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Things to do</a></p>
												<p><a href="{{ url('admin/property_details/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Details</a></p>
												
                                                <?php /* ?>@if($promotion->activated == 1)

                                                    <a href="#" class="btn btn-success" role="button">Activated</a>
                                                @else
                                                    <a href="{{ url('admin/ActivatePromo/'.$promotion->id.'/1')}}" class="btn btn-info" role="button">Activate</a>

                                                @endif <?php */ ?>
                                                
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
   
@endsection
