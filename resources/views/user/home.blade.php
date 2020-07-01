<?php
session(['destination' => '']);
session(['destinationName' => '']);
session(['checkIn' => '']);
session(['checkOut' => '']);
session(['totalAdults' => '']);
session(['totalChilds' => '']);
session(['totalGuests' => '']);
session(['minPrice' => '']);
session(['maxPrice' => '']);
session(['amenities' => '']);
session(['activities' => '']);
session(['preferables' => '']);

?>
<!DOCTYPE html>
<html lang="en">


@include ('user.head')


<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

		@if (session('status'))                        
                       <div class="alert alert-{{ session('code') }} text-center">
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
        <main>
            <section class="hero_single version_2" style="height: unset;" >
                <div class="wrapper">

                    <div class="tabslide">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide tab-slider" style="background-image:url({{ asset('user_files/images/pic.jpg')}});height: 500px;">
                                    <div class="container search-bar-container">
                                        <div class="search-bar">
                                            <form method="POST" action="{{ url('/set_search_params') }}" id="searchPropertyForm">
                                                @csrf
                                                <div class="search-container">
                                                    <div class="search-destination search-select">
                                                        <input type="text" id="destination" class="search-select-input form-control required" placeholder="Destination" readonly>
                                                        <input type="hidden" id="destinationId" name="destination">
                                                        <div class="search-select-box">
                                                            <input type="text" id="searchDestinationInput" class="search-destination-input" placeholder="Search...">
                                                            <div class="select-box">
                                                            @foreach($placeforselect as $pselect)
                                                                <div class="select-item" data-val="{{ $pselect->id }}">{{ $pselect->place }}</div>
                                                            @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="search-dates input-daterange">
                                                        <div class="date-picker">
                                                            <input type="text" id="checkInDatePicker" class="form-control datepicker required" placeholder="Check-In" required="required" readonly>
                                                            <input type="hidden" class="selected-date" id="checkInDate" name="tstart">
                                                        </div>
                                                        <div class="date-picker">
                                                            <input type="text" id="checkOutDatePicker" class="form-control datepicker required" placeholder="Check-Out" required="required" readonly>
                                                            <input type="hidden" class="selected-date" id="checkOutDate" name="tend">
                                                        </div>
                                                    </div>
                                                    <div class="search-guests search-select">
                                                        <div class="no-of-guests search-select-input">
                                                            <input type="hidden" id="noOfGuests" name="no_of_guests" value="1">
                                                            <span>Guests</span>
                                                            <span class="no">1</span>
                                                        </div>
                                                        <div class="search-select-box">
                                                            <div class="guest-type adults">
                                                                <div class="title">Adults</div>
                                                                <div class="number-selector">
                                                                    <input type="hidden" id="noOfAdults" name="adults" value="1">
                                                                    <span class="selector-btn decrease-btn">-</span>
                                                                    <span class="number">1</span>
                                                                    <span class="selector-btn increase-btn">+</span>
                                                                </div>
                                                            </div>
                                                            <div class="guest-type childrens">
                                                                <div class="title">Childrens</div>
                                                                <div class="number-selector">
                                                                    <input type="hidden" id="noOfChildrens" name="child" value="0">
                                                                    <span class="selector-btn decrease-btn">-</span>
                                                                    <span class="number">0</span>
                                                                    <span class="selector-btn increase-btn">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="search-button">
                                                        <button type="submit" id="submitSearch" class="btn-search">Search</button>
                                                    </div>
                                                </div>    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                        <div class="container slide-tabbar">
                            <div class="swiper-container gallery-thumbs tab-text" style="border-bottom: none;">
                                
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            
            <div id="unique" class="explor-sec margin_80_0" style="padding-top:32px;padding-bottom: 0px;" >
                <div class="container clearfix">
                    <div class="row">
                        

						<div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
                            
							<!--<a href="#" onclick="myFunction()">
                                <form method="post" action="{{ url('/search_property') }}" name="myform" id="myForm">
                                @csrf
                                <input type="hidden" name="onlyhomestay" value="1">
                                </form>
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/destination-7.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Homestays</h5>
                                    </div>
                                </div>
							</a>-->
							
							<a href="{{ url('/explorehome') }}">
							<div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/homeStay.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Homestays</h5>
                                    </div>
                                </div>
							</a>
						
                             
                            </div>
                        </div>
                       
						
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="{{ url('front_exp/')}}">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/ThingstoDo.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Things to Do</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="{{ url('front_grace/')}}">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/PlacestoSee.jpg')}}" alt="Generic placeholder image" style="margin-right: 0.5rem!important;">
                                    <div class="media-body">
                                        <h5 class="mt-0">Places to See</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                        <!--<div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="{{ url('front_foodblog/')}}">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/PackageTours.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Tour packages</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>

            <div class="location-sec">
                <div class="container">
                    <h1>Homestays at the best tourist destinations in Karnataka</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="location-slider">
                                <div class="swiper-container home-swiper">
                                    <div class="swiper-wrapper">
									
									
									@foreach ($data as $mustnot)
									
									<a href="#" >
                                        <form method="post" action="{{ url('/search_property') }}" name="myPlaces" id="myPlaces">
                                        @csrf
                                        <input type="hidden" name="myPlace" id="myPlace">
                                        </form>
                                        <div class="swiper-slide">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    {{-- <a href="#" onclick="myPlace({{ $mustnot['placeid'] }})"> --}}
                                                    <a href="{{ url('/myPlace/'.$mustnot['placeid']) }}">
                                                        <img src="{{ asset('placebanner')}}/{{ $mustnot['banner'] }}" alt="" />
                                                    
                                                </div>
                                                <div class="team-info text-left">
                                                    
                                                    <h3>{{ $mustnot['place'] }}</h3>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
									</a>
									@endforeach
										
									
                                       
                                        
                                        
                                    </div>
                                    <!-- Add Pagination -->
                                </div>
                                <div class="swiper-button-next swiper-button-disabled"></div>
                                <div class="swiper-button-prev swiper-button-disabled"></div>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <a class="show-all" href="{{ url('/placeall')}}">Show all <i class="la la-angle-right"></i></a>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="location-sec holidayspot-sec">
                    <div class="container">
                        <h1>Homestay Package Plans</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="reasons-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
										
										
										@foreach($season as $seasons)
                                        <form method="post" action="{{ url('/search_property') }}" name="mySeasons" id="mySeasons">
                                        @csrf
                                        <input type="hidden" name="mySeason" id="mySeason">
                                        </form>
                                            <div class="swiper-slide">
                                                <a href="{{ url('/mySeason/'.$seasons->id) }}" style="color: #333;"> 
                                                <div class="holidayspot-list">
                                                    <div class="team-block">
                                                        <div class="parent">
                                                            <div class="child">
                                                                <img src="{{ asset('site_images/season_category/'.$seasons->image)}}" alt="" />
                                                                
                                                                {{-- <a href="#" onclick="mySeason({{$seasons->id}})">Homestays to visit in {{ $seasons->name }}</a> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="team-info text-left">
                                                    
                                                    <h3>{{ $seasons->name }} </h3>
                                                    <p>{!! $seasons->starting_form !!}</p>
                                                </div>
                                                </div>
                                                </a>
                                            </div>
										@endforeach
											
											
                                            
                                           
                                            
                                        </div>
                                        <!-- Add Pagination -->
                                    </div>
                                   
    
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="location-sec holidayspot-sec">
                <div class="container">
                    <h1>Homestays according to your mood of travel</h1>
                    <div class="row">
                    <div class="col-12">
                    <div class="holiday-slider">
                        <div class="swiper-container">
                        <div class="swiper-wrapper">
						
						@foreach ($holiday as $holidays)

                        <form method="post" action="{{ url('/search_property') }}" name="myHolidays" id="myHolidays">
                        @csrf
                        <input type="hidden" name="myHoliday" id="myHoliday">
                        </form>
						{{-- <a href="{{ url('admin/ActivatePromo/'.$holidays['holydayid'].'/place')}}"> --}}
                        {{-- <a href="{{ url('/myHoliday/'.$holidays['holydayid']) }}"> --}}
                        <div class="swiper-slide">
                            <div class="holidayspot-list">
                                <div class="team-block">
                                    <div class="parent">
                                        <div class="child">
                                            <img src="{{ asset('site_images/holiday_category')}}/{{ $holidays['banner'] }}" alt="" width="200" height="160" />
                                            {{-- <a href="#" onclick="myHoliday({{$holidays['holydayid']}})">{{ $holidays['title'] }}</a> --}}
                                            <a href="{{ url('/myHoliday/'.$holidays['holydayid']) }}">{{ $holidays['title'] }}</a>
                                        </div>
                                    </div>
                                    <div class="team-info text-left">
                                        
                                        <p>Starting from Rs.{{ $holidays['price'] }}/-</p>
                                    </div>
                                    {{-- <img src="{{ asset('site_images/holiday_category')}}/{{ $holidays['banner'] }}" alt="" width="200" height="160" /> --}}
                                </div>
                            </div>
                        </div>
						{{-- </a> --}}
                        @endforeach
                        
                        
                    </div>
                    </div>
                    <div class="swiper-button-next swiper-button-disabled"></div>
                    <div class="swiper-button-prev swiper-button-disabled"></div>

                    </div>                                    
                    </div>
                    <div class="col-sm-12">
                            <a class="show-all" href="{{ url('allholiday/')}}">Show all <i class="la la-angle-right"></i></a>
                        </div>
                   </div> 
                </div>
            </div>

            <div class="location-sec holidayspot-sec">
                <div class="container">
                    <h1>Homestays at top rated places</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="comforts-slider">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                       	
									@foreach ($comfort as $comforts)

                                    <form method="post" action="{{ url('/search_property') }}" name="myComforts" id="myComforts">
                                    @csrf
                                    <input type="hidden" name="myComfort" id="myComfort">
                                    </form>
									
									<a href="#" >
                                        <div class="swiper-slide">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    {{-- <a href="#" onclick="myComfort({{$comforts['comfortid']}})"> --}}
                                                    <a href="{{ url('/myComfort/'.$comforts['comfortid']) }}">
                                                        <img src="{{ asset('site_images/comfort_category')}}/{{ $comforts['banner'] }}" alt="" />
                                                    
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>{{ $comforts['title'] }}</h3>
                                                    <p>Starting from {{ $comforts['price'] }}</p>
                                                </div>
                                                </a>
                                            </div>

                                        </div>
									</a>
									@endforeach
                                       
                                        
                                    </div>
                                    <!-- Add Pagination -->
                                </div>
                                <div class="swiper-button-next swiper-button-disabled"></div>
                                <div class="swiper-button-prev swiper-button-disabled"></div>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <a class="show-all" href="{{ url('comfort/')}}">Show all <i class="la la-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            

            <div class="location-sec">
                    <div class="container">
                        <h1>Top Travel destinations in Karnataka</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="experience-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            
											
											@foreach ($superstar as $superstars)
											<a href="{{ url('/star_details/'.$superstars->id)}}">
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="{{ url('/star_details/'.$superstars->id)}}">
                                                            <img src="{{ asset('superstar_pic')}}/{{ $superstars->image }}" alt="" />
                                                        
                                                    </div>
                                                    <div class="team-info text-left">
                                                            <p>{{ $superstars->title }}</p>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
											</a>
                                           @endforeach
                                        </div>
                                        <!-- Add Pagination -->
                                    </div>
                                    <div class="swiper-button-next swiper-button-disabled"></div>
                                    <div class="swiper-button-prev swiper-button-disabled"></div>
    
                                </div>
                            </div>
                    <div class="col-sm-12">
                        <a class="show-all" href="{{ url('allStartsExp/')}}">Show all <i class="la la-angle-right"></i></a>
                    </div>
                        </div>
                    </div>
            </div>

            

            <div class="location-sec toprated-sec" style="background: #f8f8f8;">
                    <div class="container">
                        <h1>{!! "Newly added top rated experiences " !!} </h1>
                        <div class="row">
                          <div class="col-12">
                            <div class="toprated-slider">
                            <div class="swiper-container">
                            <div class="swiper-wrapper">
							
							
							
							@foreach ($toprated as $toprateds)
											<a href="{{ url('/exp_details_front/'.$toprateds->id)}}">
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="{{ url('/exp_details_front/'.$toprateds->id)}}">
                                                            <img src="{{ asset('superstar_pic')}}/{{ $toprateds->image }}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3>{{ $toprateds->name }}</h3>
                                                       
                                                    </div>
                                                </div>
    
                                            </div>
											</a>
										@endforeach
							
							
							
							
                           
                           
                         </div>

                         </div>
                         <div class="swiper-button-next swiper-button-disabled"></div>
                         <div class="swiper-button-prev swiper-button-disabled"></div>

                         </div>
                        </div>
                        <div class="col-sm-12">
                        <a class="show-all" href="{{ url('allTopRatedExp/')}}">Show all <i class="la la-angle-right"></i></a>
                        </div>
                        </div>
                    </div>
            </div>

            <div class="location-sec recommended-sec">
                    <div class="container">
                        <h1>Newly added homestays</h1>
                        <div class="row">
                            <div class="col-12">
                                <div class="recommended-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
										
										
										@foreach ($hirating as $hiratings)
											<a href="{{ url('admin/ActivatePromo/'.$hiratings->id)}}" >
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="{{ url('/searchDetails/'.$hiratings->id.'') }}" target="_blank">
                                                            <img src="{{ asset('propertypic')}}/{{ $hiratings->image }}" alt="" />
                                                        
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3>{{ $hiratings->hotel_name }}</h3>
                                                        <p>From <span style="font-family: sans-serif; text-decoration:line-through">Rs. {{ $hiratings->original_price }}</span> <strong style="font-family: sans-serif;">Rs. </strong> {{ $hiratings->price }} per night</p>
                                                        <ul class="ratingul">
                                                            <?php if( $hiratings->rating=='3') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $hiratings->rating=='4') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $hiratings->rating=='5') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <?php } ?>
                                                            
                                                        </ul>
                                                    </div>
                                                </div>
                                                </a>
    
                                            </div>
											</a>
										@endforeach
                                           
                                           
                                        </div>
                                        <!-- Add Pagination -->
                                    </div>
                                    <div class="swiper-button-next swiper-button-disabled"></div>
                                    <div class="swiper-button-prev swiper-button-disabled"></div>
    
                                </div>
                            </div>
                            <div class="col-sm-12">
                        <a class="show-all" href="{{ url('allRecomandedFoU/')}}">Show all <i class="la la-angle-right"></i></a>
                        </div>
                        </div>
                    </div>
            </div>

			<?php 
			/*
			[id] => 2
                    [placeid] => 8
                    [date] => 2019-04-25
                    [image] => Koala.jpg
                    [title] => second chk
                    [description] =>
			*/
			
			?>
            <div class="location-sec bigday-sec">
                    <div class="container">
                        <h1>{!! "Homestays that own the seasons" !!} </h1>
                        <div class="row">
                          <div class="col-12"> 
                            <div class="missbigday-slider">
                                <div class="swiper-container">
                                <div class="swiper-wrapper">
								
								
								@foreach ($dontmiss as $dont)
								
                                <div class="swiper-slide">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
											<a href="{{ url('/bigday/'.$dont->id)}}">
                                            <img src="{{ asset('superstar_pic')}}/{{ $dont->image }}" alt="" />
                                            <div class="team-info text-left">
                                            <h3>{{ $dont->title }}</h3>
                                            <p style="font-size: 15px;">Occurs On {{date('d M Y',strtotime($dont->date)) }}</p>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								
								@endforeach
								
                             
                                  
                            </div>       
                            </div>
                            <div class="swiper-button-next swiper-button-disabled"></div>
                            <div class="swiper-button-prev swiper-button-disabled"></div>
                          </div>  
                        </div>
                        <div class="col-sm-12">
                        <a class="show-all" href="{{ url('allBigDay/')}}">Show all  <i class="la la-angle-right"></i></a>
                        </div>
                        </div>    
                    </div>
            </div>

            <div class="location-sec holidayspot-sec">
                    <div class="container">
                        <h1>Our newly added super hosts</h1>
                        <div class="row">
                        <div class="col-12"> 
                        <div class="superhost-slider">
                            <div class="swiper-container">
                            <div class="swiper-wrapper"> 

							@foreach($host as $hosts)
							
                            <div class="swiper-slide">
                                <div class="visit-karnataka">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="{{ url('/host_details/'.$hosts->id) }}">
                                                    <img src="{{ asset('host_pic')}}/{{ $hosts->image }}" alt="" />
                                                
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>{{ $hosts->name }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
							@endforeach
							
							 
                       
                       </div>     
                       </div>
                       <div class="swiper-button-next swiper-button-disabled"></div>
                       <div class="swiper-button-prev swiper-button-disabled"></div>

                      </div>  
                    </div>
                    <div class="col-sm-12">
                      <a class="show-all" href="{{ url('allSuperHost/')}}">Show all <i class="la la-angle-right"></i></a>
                    </div>
                    </div>    
                    </div>
            </div>

            

            
            <div class="call_section homestays" id="host" style="background: #f8f8f8;">
                    <div class="container clearfix">
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                            <div class="block-reveal">
                                <div class="block-vertical"></div>
                                <div class="box-two">
                                    <h3>Why BookHomestays.in?</h3>
                                    @php
                                    $whs1="There is a saying that goes, AthithiDevo Bhava, which means''The Guest is God''. Indians consider it a huge honor to 
                                    have guests in their home, and go out of their way to please them. There is nothing like indian hospitality. ";
                                    $whs2="No one knows a place better than the local occupants, and by staying with someone local you have access to the best information
                                    on the place. Homestay owners make it their business to know more about the local area so that they can point out shortcuts and scenic 
                                    routes to their guests, making exploring all the moreconvenient.They also serve best of Authentic Home Cooked Food with personalized 
                                    services at pocket friendly rates and forming unlikely friendships.";
                                    @endphp
                                    <p style="font-size: 16px;font-weight: 600;font-family: sans-serif;color: #5e4545;text-align: justify;">{{htmlspecialchars($whs1)}}</p>
                                    <p style="font-size: 16px;font-weight: 600;font-family: sans-serif;color: #5e4545;text-align: justify;">{{htmlspecialchars($whs2)}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                                <div class="block-reveal box-two" style="margin-top: 20px;">
                                    <img src="{{ asset('user_files/images/didupe12.jpg')}}" />
                                </div>
                        </div>
                    </div>
                    </div>
            </div>
            <div class="call_section" id="host">
                    <div class="container clearfix">
                        <div class="col-lg-6 col-md-6 float-right">
                            <div class="block-reveal">
                                <div class="block-vertical"></div>
                                <div class="box_1">
                                    <h3 style="font-size: 40px;margin-bottom: 10px;">Ready to earn ?</h3>
                                    <p style="font-family: sans-serif;font-size: 30px;text-align: justify;" >it`s Free, Simple and Safe. </p>
                                    <div id="newsletter" style="margin-top: 20px;">
                                        <a href="{{ url('host/')}}" class="btn_1 btn-rounded">Start hosting</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

    </div>

    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->
    <script>
        function myFunction() {
          document.myform.submit();
        }
        function myPlace(id) {
            $("#myPlace").val(id);
            $("#myPlaces").submit();
        }

        function myHoliday(id) {
            $("#myHoliday").val(id);
            $("#myHolidays").submit();
        }

        function myComfort(id) {            
            $("#myComfort").val(id);
            $("#myComforts").submit();
        }

        function mySeason(id) {            
            $("#mySeason").val(id);
            $("#mySeasons").submit();
        }
    </script>

    @include ('user.footer')

</body>

</html>