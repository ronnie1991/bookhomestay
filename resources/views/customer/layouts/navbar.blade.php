<!-- START PAGE SIDEBAR -->
@php
$userid = Session::get('session_id');
$name = Session::get('name');
@endphp
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="">
                        <a href="{{ url('/') }}">BookHomestays.in</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    
        <li>
            <a href="{{ url('user/userprofile/'.$userid) }}"><span class="fa fa-user"></span> <span class="xn-text">My Profile</span></a>                        
        </li>
        <li>
            <a href="{{ url('user/dashboard') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">My DASHBOARD</span></a>                        
        </li>
        
        
		
		<li>
            <a href="{{ url('user/requested/'.$userid) }}"><span class="fa fa-spinner"></span> <span class="xn-text">Properties Requested</span></a>                        
        </li>

		<li>
            <a href="{{ url('user/confirmed/'.$userid) }}"><span class="fa fa-check"></span> <span class="xn-text">Availability Confirmed</span></a>                        
        </li>		
		
		<li>            
		<a href="{{ url('user/confirmbookings/'.$userid) }}"><span class="fa fa-list"></span> <span class="xn-text">Completed Bookings</span>
		</a>                                
		</li>
		
	
        
         <li>
            <a href="{{ url('user/logout') }}"><span class="fa fa-sign-out"></span> <span class="xn-text">Sign Out</span></a>                        
        </li>


		<!--<li>
            <a href="{{ url('user/request_booking/'.$userid) }}"><span class="fa fa-dashboard"></span> <span class="xn-text">Request Bookings</span></a>                        
        </li>	-->	

       
		
		
             
        
        
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->