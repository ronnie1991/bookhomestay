
@extends('host.layouts.app')

@section('title', 'Host-Dashboard')

@section('sidebar')
    @parent
@endsection



@section('content')

	    
		@php
		
		$hostid = Session::get('res_session_id');
		$req = DB::table('booking')
			->where('hostid',$hostid)
			->where('booking_status',1)
			->get();
			
		 $countreq = count($req);
		 
		 $conf = DB::table('booking')
			->where('hostid',$hostid)
			->where('booking_status',2)
			->get();
			
			
			 $sum = DB::table('booking')
			->where('hostid',$hostid)
		    ->where('booking_status',2)
		    //->where('payment_status',2)
		    ->sum('amount');
		    
        @endphp
        <input type="hidden" id="userid" value="{{$hostid}}">
	    <!-- END BREADCRUMB -->                       
	    
	    <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
		
		<div class="row">

	            <div class="col-md-6">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Requested</div>
	                            <div class="widget-int">{{ $countreq }}</div>

	                        </div>

	                       

	                    </div>                            

	                                      

	                </div>         

	                <!-- END WIDGET SLIDER -->

	                

	            </div>

	            <div class="col-md-6">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Confirmed</div>

	                            <div class="widget-int">{{ count($conf) }}</div>

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
                                        <h3>Bookings</h3>
                                        <span>Bookings activity</span>
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
                                                    <th>Property</th>
													<th>Date</th>
                                                    <th>Status</th>
                                                    <th>Activity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $data = DB::table('booking')
			                                                    ->where('hostid',$hostid)
			                                                    ->get();
			                                                    
			                                    
			                                    @endphp
                                                @foreach($data as $row)
                                                @php
                                                $sql = DB::table('properties')
			                                                    ->where('id',$row->property_id)
			                                                    ->first();
			                                    $bstatus = $row->booking_status;
			                                    if($bstatus==1){ $status = 'Requested'; $stclass = 'primary'; $bar = 'warning'; $per='85%'; }
			                                    
			                                    else{ $status = 'Confirmed';  $stclass = 'info'; $bar = 'success'; $per='100%'; }
                                                @endphp
                                                
                                                <tr>
                                                    <td><strong>{{ $sql->hotel_name }}</strong></td>
                                                    
                                                    <td>
													<span class="label label-danger">{{ $row->datefrom }}</span>
													<span class="label label-danger">{{ $row->dateto }}</span>
													</td>
													<td><span class="label label-{{ $stclass }}">{{ $status }}</span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-{{ $bar }}" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: {{ $per }};">{{ $per }}</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                                                              
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
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
                                              window.location.href = "http://bookhomestays.in/requested/{{ $hostid }}";
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
