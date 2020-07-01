
@extends('host.layouts.app')

@section('title', 'Property Listings')

@section('sidebar')
    @parent
@endsection



@section('content')

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="{{ url('host/dashboard') }}">Home</a></li>
            <li><a href="#">Approve Bookings</a></li>                    
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
                            <h3 class="panel-title">Approve Booking Listings</h3>
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
                                           <th>Property Id</th>
                                           <th>Hotel Name</th>
                                           <th>Room Type</th>
                                           <th>Booking Date</th>
                                           <th>Date From</th>
                                           <th>Date To</th>
                                           <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
									$i = 0;  
									@endphp
                                    @foreach ($data as $bookings)
									@php
									$i++;
									
                                    @endphp
									<?php
										/*
										[property_id] => 1
										[bookingid] => 1
										[proid] => dg 34
										[hotel_name] => test
										[room_type] => 1,2
										[booking_date] => 2019-02-23
										[datefrom] => 2019-02-25
										[dateto] => 2019-02-28
										[availble] => 0
										*/ 
										?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >{{ $bookings['proid'] }}</td>
                                            <td >{{ $bookings['hotel_name'] }}</td>
											<td >{{ $bookings['room_type'] }}</td>
											<td >{{ $bookings['booking_date'] }}</td>
											<td >{{ $bookings['datefrom'] }}</td>
											<td >{{ $bookings['dateto'] }}</td>
											<td >
											<p><a href="{{ url('host/booking_details/'.$bookings['property_id'],$bookings['bookingid'])}}" class="btn btn-primary btn-xs" role="button">Details</a></p>
											<br>
											
											
											</td>
											
                                           
                                            
                                                <!--<a href="" class="btn btn-primary btn-xs" role="button">Edit</a>-->
												<?php /*?><p><a href="{{ url('admin/add_room_ui/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Add Rooms</a></p>
												<p><a href="{{ url('admin/add_room_pics/'.$properties->id)}}" class="btn btn-primary btn-xs" role="button">Add Rooms Pics</a></p>
												<p><a href="{{ url('host/booking_details/'.$bookings['id'])}}" class="btn btn-primary btn-xs" role="button">Details</a></p><?php */ ?>
												
                                                
                                                              
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
