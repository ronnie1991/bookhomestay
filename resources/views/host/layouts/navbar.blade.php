<!-- START PAGE SIDEBAR -->
@php
$hostid = Session::get('res_session_id');
@endphp
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="">
                        <a>BOOK HOMESTAYS</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
        <li>
            <a href="{{ url('host/dashboard') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">DASHBOARD</span></a>                        
        </li>
		
		<li>
            <a href="{{ url('host/myprofile') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">My Profile</span></a>                        
        </li>
		
		<li>
            <a href="{{ url('host/myview') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">Host Says</span></a>                        
        </li>
				

        <li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Property</span></a>
            <ul>               
                <li>
                    <a href="{{ url('host/property_listing/'.$hostid) }}"><span class="fa fa-pencil"></span> <span class="xn-text">Propert Listings</span>
                    </a>
                </li>
               
            </ul>
        </li>
		
		<li class="xn-openable">
            <a href="#"><span class="fa fa-dashboard"></span> <span class="xn-text">Bookings</span></a>
            <ul>               
                <li>
                    <a href="{{ url('host/booking_requested/'.$hostid) }}"><span class="fa fa-pencil"></span> <span class="xn-text">Bookings requested</span></a>
                </li>
				
				 <li>
                    <a href="{{ url('host/booking_approved/'.$hostid) }}"><span class="fa fa-pencil"></span> <span class="xn-text">Bookings Approved</span></a>
                </li>
               
            </ul>
        </li>
        <li>
             <a href="{{ url('host/logout') }}"><span class="fa fa-sign-out"></span>Sign Out</a>                      
        </li>
             
        
        
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->