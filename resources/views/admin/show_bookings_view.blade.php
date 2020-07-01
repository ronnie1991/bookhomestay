
@extends('admin.layouts.app')

@section('title', 'Admin-Main Category Listings')

@section('sidebar')
    @parent
@endsection



@section('content')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('admin/dashboard') }}">Home</a></li>
            <li><a href="#">Bookings</a></li>                    
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
                            <h3 class="panel-title">Bookings Listings</h3>
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
                                           <th>Requested Date</th>
                                           <th>Host</th>
                                           <th>Hotel Name</th>
                                           <th>Customer</th>
                                           <th>Price</th>
                                           <th>Status</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
									$i = 0;  
									@endphp
                                    @foreach ($booking as $bookings)
									@php
									$i++;
									$proid = $bookings->property_id;
									$getproperty = DB::table('properties')->where('id',$proid)->first();
									$hostid = $getproperty->hostid;
									$gethost = DB::table('host')->where('id',$hostid)->first();
									
									$getcustomer = DB::table('customer')->where('id',$bookings->customer_id)->first();
                                    @endphp
									<?php
										/*
										[id] => 1
										[property_id] => 4
										[customer_id] => 2
										[datefrom] => 2019-02-25 02:07:10.000000
										[dateto] => 2019-02-28 03:10:10.000000
										[adult] => 2
										[children] => 2
										[room_type] => 1,2
										[booking_status] => 1
										[payment_status] => 1
										[amount] => 650
										[booking_date] => 2019-02-23 02:05:05.000000
										[leave_date] => 0000-00-00 00:00:00.000000*/ 
										?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >{{ $bookings->datefrom }}<br>{{ $bookings->dateto }}</td>
                                            <td >{{ $gethost->name }}</td>
											<td >{{ $getproperty->hotel_name }}</td>
											<td >{{ $getcustomer->name }}</td>
											<td ><p>&#x20B9;</p>{{ $bookings->amount }}</td>
											<td >
											@php
											if($bookings->booking_status==1)
											{ @endphp
												
												<a href="" class="btn btn-primary btn-xs" role="button">REQUESTED</a>
											@php 
											}
											if($bookings->booking_status==2)
											{
											@endphp
											<a href="" class="btn btn-success btn-xs" role="button">Confirmed</a>
											@php 
											}
											
											if($bookings->booking_status==3)
											{
											@endphp
											<a href="" class="btn btn-success btn-xs" role="button">Cancelled</a>
											@php 
											}
											@endphp
											</td>
                                           
                                            <td >
                                               
												
												<p><a href="" class="btn btn-primary btn-xs" role="button">Details</a></p>
												
                                                
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
