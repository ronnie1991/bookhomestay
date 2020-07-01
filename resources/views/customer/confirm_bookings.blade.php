
@extends('customer.layouts.app')

@section('title', 'Customer-Dashboard')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	      <ul class="breadcrumb">
			<li class="active">Completed Bookings</li>
	    </ul>
		@php
		
		$userid = Session::get('session_id');
        @endphp
	    <!-- END BREADCRUMB -->                       
	    
	    <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            
            <!-- START WIDGETS -->                    
            @php
				$i = 0;  
				@endphp
				@foreach ($approve as $properties)
				@php
				$i++;
				$getproperty = DB::table('properties')->where('id',$properties->property_id)->first();
				
				$getplace = DB::table('place')->where('id',$getproperty->placeid)->first();
				
				$gethost = DB::table('host')->where('id',$getproperty->hostid)->first();
				
				
				
				@endphp					
						
				<?php
				
				/*
				[id] => 1 =
                    [property_id] => 1
                    [hostid] => 1
                    [customer_id] => 2
                    [datefrom] => 2019-02-25
                    [dateto] => 2019-02-28
                    [adult] => 2
                    [children] => 2
                    [room_type] => 1,2
                    [booking_status] => 1
                    [payment_status] => 1
                    [amount] => 650
                    [booking_date] => 2019-02-23
                    [approve_date] => 2019-02-27
                    [leave_date] => 0000-00-00
				*/
				
				?>
			
	         <div class="row">
	             @if (session('status')) 
                  <div class="col-sm-12" style="margin-top: -160;">                            
                      <div class="alert alert-{{session('code')}} text-center" >
                          {{ session('status') }}
                          Please note your transaction-Id '{{session('transaction_id')}}'
                      </div>
                  </div>
                 @endif
                        <div class="col-sm-12">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                  <form method="post" action="{{ url('user/getBooked') }}" >  
                                  @csrf
                                   <h3>Happy Holidays !! The host is waiting for you arrival.  </h3>

                                   <div class="col-md-8">
                                                
                                                
                                                <div class="invoice-address" style="margin-bottom: 0px">
                                                    
                                                    <table class="table table-striped">
                                                       
                                                        <tr>
                                                            <td><strong>Booking Status:</strong></td><td class="text-right">
                                                            <strong>
															<a class="btn btn-info btn-xs" role="button">Payment Is Confirmed</a>
															
															</strong>
														</td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Booking ID:</strong></td><td class="text-right"><strong>{{ $properties->id }}</strong></td>
                                                        </tr>
														
                                                        <tr>
                                                            <td><strong>Amount Paid:</strong></td><td class="text-right"><strong>Rs. {{ $properties->amount }} /-</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Property Name:</strong></td><td class="text-right"><strong>{{ $getproperty->hotel_name }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Location:</strong></td><td class="text-right"><strong>{{ $getplace->place }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Address:</strong></td><td class="text-right"><strong>{{ $getproperty->address }}</strong></td>
                                                        </tr>
                                                    </table>

                                                </div> 

                                            </div>

                                             <div class="col-md-4">
                                                
                                                
                                                <div class="invoice-address" style="margin-bottom: 0px">
                                                    
                                                    <table class="table table-striped">
                                                        <tr>
                                                            <td><strong>Host Name:</strong></td><td class="text-right"><strong>{{ $gethost->name }}</strong></td>
                                                        </tr>
														
                                                        <tr>
                                                            <td><strong>Host Contact:</strong></td><td class="text-right"><strong>{{ $gethost->phone }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Check In Date:</strong></td><td class="text-right"><strong>{{date('d M Y', strtotime($properties->datefrom))}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Check Out Date:</strong></td><td class="text-right"><strong>{{date('d M Y', strtotime($properties->dateto))}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of Adults:</strong></td><td class="text-right"><strong>{{ $properties->adult }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of Children:</strong></td><td class="text-right"><strong>{{ $properties->children }}</strong></td>
                                                        </tr>
                                                    </table>

                                                </div> 

                                            </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-12 control-label">Note : Please do carry a government approved ID card for verification
                                            purpose during Check-In at the property.</label>
                                            
                                        </div>
										<div class="form-group">
                                            <label class="col-sm-6 control-label"></label>
                                            <div class="col-md-8">
                                               @php
												$today  = date('Y-m-d');
												if($properties->dateto<$today)
												{ @endphp
											    <p class="form-control-static">
												<a href="{{ url('user/writereview/'.$properties->id) }}" class="btn btn-primary btn-lg btn-block" role="button">Give Rating & Review</a>
												</p>
												@php }
												@endphp
												
                                            </div>
                                        </div>
										
										
										
										
                                                                                                                         
                                </div>
                            </div>
                            </form>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
						
                    </div>
					
					@endforeach
            <!-- END WIDGETS -->                    
            
			
            <!-- END RESPONSIVE TABLES -->
          
        </div>
	    <!-- END PAGE CONTENT WRAPPER -->                                
	{{-- </div> --}}
    
@endsection

@section('supporting_files')
		
		
@endsection
