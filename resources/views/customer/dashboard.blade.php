
@extends('customer.layouts.app')

@section('title', 'Customer-Dashboard')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
	        
	    </ul>
		@php
		
		$userid = Session::get('session_id');
		$req = DB::table('booking')
			->where('customer_id',$userid)
			->where('booking_status',1)
			->get();
			
		 $countreq = count($req);
		 
		 $conf = DB::table('booking')
			->where('customer_id',$userid)
			->where('booking_status',2)
			->get();
			
			
			$completed = DB::table('booking')
			->where('customer_id',$userid)
			->where('payment_status',2)
			->get();
		    
        @endphp
        <input type="hidden" id="userid" value="{{$userid}}">
	    <!-- END BREADCRUMB -->                       
	    
	    <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
		
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

	            <div class="col-md-4">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel" style="min-height: 0px;">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Bookings Requested</div>

	                            <div class="widget-int">{{ $countreq }}</div>

	                        </div>

	                       

	                    </div>                            

	                                      

	                </div>         

	                <!-- END WIDGET SLIDER -->

	                

	            </div>

	            <div class="col-md-4">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel" style="min-height: 0px;">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Bookings Confirmed</div>

	                            <div class="widget-int">{{ count($conf) }}</div>

	                        </div>

	                       

	                    </div>                            

	                                      

	                </div>         

	                <!-- END WIDGET SLIDER -->

	                

	            </div>

	            <div class="col-md-4">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel" style="min-height: 0px;">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Bookings completed</div>
	                            <div class="widget-int">{{ count($completed) }}</div>

	                        </div>

	                       

	                    </div>                            

	                                      

	                </div>         

	                <!-- END WIDGET SLIDER -->

	                

	            </div>

	            

	    </div>
		
		
		<div class="row">
		
		<div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Booking Activities</h3>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Properties</th>
													<th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $data = DB::table('booking')
			                                                    ->where('customer_id',$userid)
			                                                    ->where('payment_status','!=',2)
			                                                    ->get();
			                                                    
			                                    
			                                    @endphp
                                                @foreach($data as $row)
                                                @php
                                                $sql = DB::table('properties')
			                                                    ->where('id',$row->property_id)
			                                                    ->first();
			                                    $bstatus = $row->booking_status;
			                                    if($bstatus==1){ $status = 'Requested'; $stclass = 'primary'; $bar = 'warning';  }
			                                    
			                                    else{ $status = 'Confirmed';  $stclass = 'info'; $bar = 'success';  }
                                                @endphp
                                                
                                                <tr>
                                                    <td><strong>{{ $sql->hotel_name }}</strong></td>
                                                    
                                                    <td>
													<span class="label label-danger">{{ $row->datefrom }}</span>
													<span class="label label-danger">{{ $row->dateto }}</span>
													</td>
													<td><span class="label label-{{ $stclass }}">{{ $status }}</span></td>
                                                </tr>
                                                                                              
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
                         <div class="form-group">
                                <hr>
                            <h4 style="text-align:center" >Easy 3 Step booking procedure</h4>
                            <div class="list-group border-bottom">
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> Step 1: The bookings requested for availability will be present in BOOKINGS REQUESTED until the host confirms for the availability of the property.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Step 2: once the host confirms the availability of the requested booking. Our destination expert will reach out to you to confirm your dates of travel and the amount to be paid. 
                                 After this, the booking will be moved to BOOKINGS CONFIRMED where the payment can be done.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> STEP 3: Once the payment is complete, the bookings will be moved to BOOKINGS COMPLETED. Here you can review the details of your booking and the direction to reach your booked property. </a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-danger"></span> If in case the requested property is not available. Our bookhomestays.in destination expert will be responsible to provide you another property which will exactly match your requirements</a>
                                
                            </div>
                        </div>
		</div>
            
          
        </div>
	    <!-- END PAGE CONTENT WRAPPER -->                                
	{{-- </div> --}}
    
@endsection

@section('supporting_files')
    
    <script>
        function requestBooking() {
            var x = confirm("Are you sure you want to book?");
              if (x) {
                  if($("#userid").val()!= '') {
                                  _token = $("#_token").val();
                                  var dataString = '_token='+ _token;
                                  $.ajax({
                                      type: "POST",
									  //console.log(post);
                                      url: "{{ url('user/grequestBooking') }}",
                                      data: dataString,
									  //console.log(dataString);
                                      headers: {'X-CSRF-TOKEN': _token},
                                      success: function(response) {
                                          if(response == 'success') {
                                              window.location.href = "http://bookhomestays.in/requested/{{ $userid }}";
                                              // alert('success');
                                          } else {
                                              alert('Please try again later !!');
                                          } 
                                        console.log(response);
                                      }
                                  });
                                  // return false;
                  }
              }
              else {
                return false;
            }               
            
        }
    </script>		

@endsection
