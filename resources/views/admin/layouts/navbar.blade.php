<!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    
                     <li class="">
                        <a>BOOK HOMESTAYS</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    {{-- <li class="xn-title">Navigation</li> --}}
                   <li>
            <a href="{{ url('admin/dashboard') }}"><span class="fa fa-dashboard"></span> <span class="xn-text">DASHBOARD</span></a>                        
					</li>  

		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">SETTINGS</span></a>
            <ul>
                <li><a href="{{ url('admin/edit-profile') }}"><span class="fa fa-wrench"></span> Edit Profile</a></li>
                <li><a href="{{ url('admin/main-categories') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Explore Categories</span></a></li>
                <!--<li><a href="{{ url('admin/add_holiday') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Add Holiday Categories</span></a></li>-->
                <li><a href="{{ url('admin/holiday-categories') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Holiday Categories</span></a></li>
                <li><a href="{{ url('admin/comfort-categories') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Comfort Categories</span></a></li>
                
                <li><a href="{{ url('admin/place') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Manage Place</span></a></li>
                <li><a href="{{ url('admin/aminities') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Manage Amenities</span></a></li>
                <li><a href="{{ url('admin/activities') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Manage Activities</span></a></li>
				<li><a href="{{ url('admin/preferables') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Manage Preferables</span></a></li>
            </ul>
        </li>
		
		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">HOST</span></a>
            <ul>
			<li><a href="{{ url('admin/showhost') }}"><span class="fa fa-wrench"></span>Show Host</a></li>
            </ul>
        </li>

		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">PROPERTY</span></a>
            <ul>
			<?php /* ?><li><a href="{{ url('admin/addPlaces_ui2') }}"><span class="fa fa-wrench"></span>Add Places To See2</a></li><?php /*/ ?>
			<li><a href="{{ url('admin/addPlaces_ui') }}"><span class="fa fa-wrench"></span>Add Places To See</a></li>
			<li><a href="{{ url('admin/showplaces_view') }}"><span class="fa fa-wrench"></span>Show Places To See</a></li>
			<li><a href="{{ url('admin/addProperty') }}"><span class="fa fa-wrench"></span>Add Property</a></li>
			<li><a href="{{ url('admin/viewPoperty') }}"><span class="fa fa-wrench"></span>Show Properties</a></li>
			<li><a href="{{ url('admin/addNAview') }}"><span class="fa fa-wrench"></span>Add NA Date</a></li>
			<li><a href="{{ url('admin/showNAdate') }}"><span class="fa fa-wrench"></span>Show NA Date</a></li>
            </ul>
        </li>

		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">SUPER STARS</span></a>
            <ul>
			<li><a href="{{ url('admin/addSuper_star') }}"><span class="fa fa-wrench"></span>Add Superstars</a></li>
			<li><a href="{{ url('admin/show_star') }}"><span class="fa fa-wrench"></span>Show Superstars</a></li>
            </ul>
        </li>
		
		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">TOP RATED EXP</span></a>
            <ul>
			<li><a href="{{ url('admin/add_exp_view') }}"><span class="fa fa-wrench"></span>Add Experience</a></li>
			<li><a href="{{ url('admin/show_exp') }}"><span class="fa fa-wrench"></span>Show Experience</a></li>
            </ul>
        </li>
		
		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">BIG DAYS</span></a>
            <ul>
			<li><a href="{{ url('admin/add_bigday_view') }}"><span class="fa fa-wrench"></span>Add Big Days</a></li>
			<li><a href="{{ url('admin/show_bigDay') }}"><span class="fa fa-wrench"></span>Show Big Days</a></li>
            </ul>
        </li>


		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">FOOD BLOG</span></a>
            <ul>
			<li><a href="{{ url('admin/addfood_blog') }}"><span class="fa fa-wrench"></span>Add FoodBlog</a></li>
			<li><a href="{{ url('admin/showfood_blog') }}"><span class="fa fa-wrench"></span>Show FoodBlog</a></li>
			
			<!--<li><a href="{{ url('admin/addgrace') }}"><span class="fa fa-wrench"></span>Add Grace & Beauty</a></li>-->
			<li><a href="{{ url('admin/showgrace') }}"><span class="fa fa-wrench"></span>Show Grace & Beauty</a></li>
            </ul>
        </li>	

		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">CUSTOMER</span></a>
            <ul>
			<li><a href="{{ url('admin/show_customer') }}"><span class="fa fa-wrench"></span>Show Customers</a></li>
            </ul>
        </li>


		<li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">BOOKING & BUSINESS</span></a>
            <ul>
			<li><a href="{{ url('admin/business_view') }}"><span class="fa fa-wrench"></span>Business Reports</a></li>
			<li><a href="{{ url('admin/show_bookings') }}"><span class="fa fa-wrench"></span>Show Bookings</a></li>
			 <li>
                    <a href="{{ url('admin/booking_requested/') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Bookings requested</span></a>
                </li>
				
				 <li>
                    <a href="{{ url('admin/booking_approved/') }}"><span class="fa fa-pencil"></span> <span class="xn-text">Bookings Approved</span></a>
                </li>
            </ul>
			
        </li>	
        
        <li class="xn-openable">
            <a href="#"><span class="fa fa-file-text-o"></span> <span class="xn-text">Enquery & Newsletter</span></a>
            <ul>
			<li><a href="{{ url('admin/showEnqueryList') }}"><span class="fa fa-wrench"></span>Enquery List</a></li>
			<li><a href="{{ url('admin/showNewsLetrList') }}"><span class="fa fa-wrench"></span>Newsletter List</a></li>
			
            </ul>
			
        </li>
                    
                                    
                                        
                                        
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->