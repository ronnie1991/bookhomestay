
@extends('customer.layouts.app')

@section('title', 'Customer-Dashboard')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
			<li class="active">Confirmed Bookings</li>
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
				@foreach ($confirmed as $properties)
				@php
				$i++;
				$getproperty = DB::table('properties')->where('id',$properties->property_id)->first();
				
				$getplace = DB::table('place')->where('id',$getproperty->placeid)->first();
				
				
				
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
                                  <input type="hidden" name="manual_pro_id" value="{{ $getproperty->manual_pro_id }}">
                                  <input type="hidden" name="price" value="{{ $properties->amount }}">
                                  @csrf
                                   <h3>Congratulations !! Your requested property is now available.</h3>
                                        


                                        <div class="col-md-6">
                                                
                                                
                                                <div class="invoice-address" style="margin-bottom: 0px">
                                                    
                                                    <table class="table table-striped">
                                                    <tr>
														    <td><strong>Booking Status:</strong></td><td class="text-right">
														    <strong>@php
															if($properties->booking_status==2)
															{ @endphp
																
																<a href="" class="btn btn-success btn-xs" role="button">Availability is confirmed by the Host</a>
																
																
															@php 
															}
															@endphp
															</strong>
															</td>
                                                            
                                                        </tr>
                                                       
                                                        <tr>
                                                            <td><strong>Booking ID:</strong></td><td class="text-right"><strong>{{ $getproperty->id }}</strong></td>
                                                        </tr>
														
                                                        <tr>
                                                            <td><strong>Property Pic:</strong></td><td class="text-right"><img src="{{asset('propertypic')}}/{{ $getproperty->image }}" alt="" height="60" width="120"></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Property Id:</strong></td><td class="text-right"><strong>{{ $getproperty->manual_pro_id }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Property Name:</strong></td><td class="text-right"><strong>{{ $getproperty->hotel_name }}</strong></td>
                                                        </tr>
                                                    </table>

                                                </div> 

                                            </div>

                                            <div class="col-md-6">
                                                
                                                
                                                <div class="invoice-address" style="margin-bottom: 0px">
                                                    
                                                    <table class="table table-striped">                                                    
                                                       
                                                        <tr>
                                                            <td><strong>Place:</strong></td><td class="text-right"><strong>{{ $getplace->place }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Check In Date:</strong></td><td class="text-right"><strong>{{date('d M Y', strtotime($properties->datefrom))}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Check Out Date:</strong></td><td class="text-right"><strong>{{date('d M Y', strtotime($properties->dateto))}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of  Adults:</strong></td><td class="text-right"><strong>{{ $properties->adult }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of Children:</strong></td><td class="text-right"><strong>{{ $properties->children }}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>Total Amount To Be Paid:</strong></td><td class="text-right"><strong>Rs. {{ $properties->amount }} /-</strong></td>
                                                        </tr>
                                                        
                                                    </table>
                                                     <div class="form-group">
                                            <label class="col-sm-4 control-label"></label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												
											@php
											if($properties->booking_status==2)
											{ @endphp
												
												
												
												<button href="" class="btn btn-primary  btn-block" role="button">Proceed to payment</button>
											@php 
											}
											@endphp
											
												</p>
                                            </div>
                                        </div>

                                                </div> 

                                            </div>    
                                           
										
										
										
                                        
                                        <div class="form-group">
                                            <label class="col-sm-12 control-label" style="color:#c30404">Once the payment is complete , the booking will be moved to “Completed Bookings”.</label>
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
