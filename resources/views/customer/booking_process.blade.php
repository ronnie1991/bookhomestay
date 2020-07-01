
@extends('customer.layouts.app')

@section('title', 'Customer-Dashboard')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	    
		@php
		
		$userid = Session::get('session_id');

        @endphp
        <input type="hidden" id="userid" value="{{$userid}}">
	    <!-- END BREADCRUMB -->                       
	    
	    <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
		
		<div class="row">
                        <div class="col-md-12">
                             @if (session('hostId'))
                            <div class="panel panel-default">
                                <div class="panel-body">                            
                                    <h2>Review Booking</strong></h2>
                                   
                                    <!-- INVOICE -->
                                    <div class="invoice">

                                        <div class="row">
                                            <div class="col-md-6">
                                                
                                                
                                                <div class="invoice-address" style="margin-bottom: 0px">
                                                    
                                                    <table class="table table-striped">
                                                        @php
                                                         $hdata = DB::table('properties')->where('id',session('propertyId'))->first();
                                                         $host = DB::table('host')->where('id',$hdata->hostid)->first();
                                                         $plac = DB::table('place')->where('id',$hdata->placeid)->first();
                                                        @endphp
                                                        <tr>
                                                            <td><strong>Property Name:</strong></td><td class="text-right"><strong>{{$hdata->hotel_name}}</strong></td>
                                                        </tr>
														<tr>
														    <td><strong>Host:</strong></td><td class="text-right"><strong>{{$host->name}}</strong></td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of Adults:</strong></td><td class="text-right"><strong>{{session('adults')}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of Children:</strong></td><td class="text-right"><strong>{{session('child')}}</strong></td>
                                                        </tr>
                                                    </table>

                                                </div> 

                                            </div>
                                            <div class="col-md-6">

                                                <div class="invoice-address" style="margin-bottom: 0px">
                                                    <table class="table table-striped">
                                                        <tr><td><strong>Location:</strong></td><td class="text-right"><strong>{{$plac->place}}</strong></td></tr>
														<tr>
                                                            <td><strong>Check-In:</strong></td><td class="text-right"><strong>{{date('d M Y', strtotime(session('from_date')))}}</strong></td>
                                                        </tr>
														<tr>
                                                            <td><strong>Check-Out:</strong></td><td class="text-right"><strong>{{date('d M Y', strtotime(session('to_date')))}}</strong></td>
                                                        </tr>
                                                        <tr>
                                                            <td><strong>No. of Nights:</strong></td><td class="text-right"><strong>{{session('totalDays')}}</strong></td>
                                                        </tr>
                                                    </table>
                                                </div>                                        

                                            </div>
                                            <div class="col-md-6"  ><p><span style="font-size: 14px;font-weight: 700;color: firebrick;" >*</span>  The amount to be paid will be confirmed based on availability of the rooms</p></div>
                                            
                                        </div>
                                        <input type="hidden" name="_token" id="_token" value="{!! csrf_token() !!}">
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-striped">
                                                    
                                                    <tr class="total">
                                                        <td class="text-center" onclick="requestBooking()" style="background:#fc5b62;cursor:pointer;font-size: 16px;padding:6px;" >Contact Host</td>
                                                    </tr>
                                                </table>                                                
                                            </div>
                                        </div>
                                        
                                        
                        <div class="form-group">
                                <hr>
                            <h4 style="text-align:center" >Easy 3 step Booking process:</h4>
                            <div class="list-group border-bottom">
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> Step 1 : on clicking “contact host” Bookhomestays.in will contact the host for availability of the requested property.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Step 2 : Once the property is confirmed for availability , the property will be made available for making the payment.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> Step 3 : once the payment is done , the property will be confirmed for checking in.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-danger"></span> If the property is not available for your dates , bookhomestays.in will be responsible for providing a similar property exactly matching your requirements.</a>
                                
                            </div>
                        </div>
                        <div class="form-group">
                                <hr>
                            <h4 style="text-align:center" >Few terms and conditions</h4>
                            <div class="list-group border-bottom">
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> Children from 5- 12 years are charged 50% on Tariff.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> Children below 5 years are complimentary.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> Booking will be confirmed only on receipt of full payment.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-danger"></span> Mandatory to carry one government provided ID proof.</a>
                                
                            </div>
                        </div>
                        <div class="form-group">
                                <hr>
                            <h4 style="text-align:center" >Cancellation Policy</h4>
                            <div class="list-group border-bottom">
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-primary"></span> 100% of the total amount will be charged as cancellation fee on cancelling the booking 3 days prior to the date of arrival.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-success"></span> 50% of the total amount will be charged as cancellation fee on cancelling the booking 7 days prior to the date of arrival.</a>
                                <a href="#" class="list-group-item"><span class="fa fa-circle text-warning"></span> 0% of the amount will be charged as cancellation fee on cancelling the booking 30 days prior to the date of arrival..</a>
                                
                                
                            </div>
                        </div>
                                    </div>
                                    <!-- END INVOICE -->

                                </div>
                            </div>
                            @endif
                    
                        </div>
                    </div>
            
          
        </div>
	    <!-- END PAGE CONTENT WRAPPER -->                                
	{{-- </div> --}}
    
@endsection

@section('supporting_files')
    
    <script>
        function requestBooking() {
            //var x = confirm("Are you sure you want to book?");
              //if (x) {
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
                                              window.location.href = "http://www.bookhomestays.in/user/requested/{{ $userid }}";
                                              // alert('success');
                                          } else {
                                              alert('Please try again later !!');
                                          } 
                                        console.log(response);
                                      }
                                  });
                                  // return false;
                  }
              //}
              else {
                return false;
            }               
            
        }
    </script>		

@endsection
