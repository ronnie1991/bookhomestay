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
                                <div class="swiper-slide tab-slider" style="background-image:url({{ asset('user_files/images/Mountain-House.jpg')}});height: 500px;">
                                    <div class="container">
                                        <div class="search-bar" style="height: 65vh;">
                                            <form method="post" action="{{ url('/search_property') }}">
                                                @csrf
                                                <input type="hidden" name="searchId" value="1">
                                                <input type="hidden" name="homestays" value="1">
                                                <div class="row no-gutters custom-search-input-2">
                                                   <div class="col-lg-3">
													
                                                        <div class="form-group" style="cursor: pointer;">                                
                                                           
															  <select name="destination" required >
															  <option value="">Destination</option>
															  @foreach($placeforselect as $pselect)
																<option value="{{ $pselect->id }}">{{ $pselect->place }}</option>
															  @endforeach
															  </select>
															  
															
															  
															  
															  
															  
															  
                                                        </div>
                                                    </div>
                                                     <div class="col-lg-5">
                                                        <div class="form-group">
                                                            <div class="t-datepicker">
                                                                <div class="t-check-in resort">
                                                                	<input type="text" placeholder="Check-In" class="date form-control" name="rstart" required="required" readonly='true'>
                                                                </div>
                                                                <div class="t-check-out resort">
                                                                	<input type="text" placeholder="Check-Out" class="date form-control" name="rend" required="required" readonly='true'>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-4">
                                                        <input type="submit" class="btn_search" value="Search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->

  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css'>

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> -->
<!--<script src="https://code.jquery.com/jquery-1.10.2.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->

<!--  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>-->
<!--<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css'>-->
<!--<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>-->

<script type="text/javascript">

var date = new Date();
date.setDate(date.getDate());
$('.date').datepicker({  
format: 'dd/mm/yyyy',
startDate: '-0d',
orientation: "bottom",
 forceParse: false,
    autoclose: true,
    
    toggleActive: true

});  

</script> 
<style>
.datepicker table thead tr:nth-child(2){
background-color:#fc5b62;
color:white;
}
.datepicker table tr td.active,
.datepicker table tr td.active:hover {
    background: rgb(252, 91, 98) !important;
    text-shadow: none;
}

select {
  -webkit-appearance: none;
  /*webkit browsers */
  -moz-appearance: none;
  /*Firefox */
  appearance: none;
  /* modern browsers */
  border-radius: 0;

}
</style>
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
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/destination-7.jpg')}}" alt="Generic placeholder image">
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
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/destination-6.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Experiences</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="{{ url('front_grace/')}}">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/destination-8.jpg')}}" alt="Generic placeholder image" style="margin-right: 0.5rem!important;">
                                    <div class="media-body">
                                        <h5 class="mt-0">Grace and beauty</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="{{ url('front_foodblog/')}}">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('user_files/images/destination-9.jpg')}}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Food Blog</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="location-sec">
                <div class="container">
                    <h1>Must not miss locations in Karnataka</h1>
                    <p>Explore new locations and book your homestays around them</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="location-slider">
                                <div class="swiper-container">
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
                                                    <a href="#" onclick="myPlace({{ $mustnot['placeid'] }})">
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
                    </div>
                </div>
            </div>

            <div class="location-sec holidayspot-sec">
                <div class="container">
                    <h1>Choose your holiday spot</h1>
                    <p>Confused on where to go ? Pick according to your mood !!</p>
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
                        <div class="swiper-slide">
                            <div class="holidayspot-list">
                                <div class="team-block">
                                    <div class="parent">
                                        <div class="child">
                                            <img src="{{ asset('site_images/holiday_category')}}/{{ $holidays['banner'] }}" alt="" width="200" height="160" />
                                            <a href="#" onclick="myHoliday({{$holidays['holydayid']}})">{{ $holidays['title'] }}</a>
                                        </div>
                                    </div>
                                    <div class="team-info text-left">
                                        <p>Starting from {{ $holidays['price'] }}</p>
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
                   </div> 
                </div>
            </div>

            <div class="location-sec holidayspot-sec">
                <div class="container">
                    <h1>Homes with comforts</h1>
                    <p>Choose according to your way of living</p>
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
                                                    <a href="#" onclick="myComfort({{$comforts['comfortid']}})">
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
                    </div>
                </div>
            </div>

            

            <div class="location-sec">
                    <div class="container">
                        <h1>Experience homestays with the Stars</h1>
                        <p>See what your favourite actors has to say about visiting homestays in Karnataka </p>
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
                        </div>
                    </div>
            </div>

            

            <div class="location-sec toprated-sec" style="background: #f8f8f8;">
                    <div class="container">
                        <h1>{!! "Top - rated Experience" !!} </h1>
                        <p>Experience Karnataka with top-rated activites at the homestays</p>
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
                                                        <h3>{{ $toprateds->title }}</h3>
                                                       
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
                        </div>
                    </div>
            </div>

            <div class="location-sec recommended-sec">
                    <div class="container">
                        <h1>Recommended for you </h1>
                        <p>Unique homestays for your trip </p>
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
                                                        <p>From <strong style="font-family: sans-serif;">&#8377;</strong> {{ $hiratings->price }} per night</p>
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
                        <h1>{!! "Don't miss Out on the big day" !!} </h1>
                        <p>Events and fun </p>
                        <div class="row">
                          <div class="col-12"> 
                            <div class="missbigday-slider">
                                <div class="swiper-container">
                                <div class="swiper-wrapper">
								
								
								@foreach ($dontmiss as $dont)
								
                                <div class="swiper-slide">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <h3>Occurs On {{ $dont->date }}</h3>
											<a href="{{ url('/bigday/'.$dont->id)}}">
                                            <img src="{{ asset('superstar_pic')}}/{{ $dont->image }}" alt="" />
											
                                            <div class="team-info text-left">
                                            <h3>{{ $dont->title }}</h3>
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
                        </div>    
                    </div>
            </div>

            <div class="location-sec holidayspot-sec">
                    <div class="container">
                        <h1>Stay with a Superhost</h1>
                        <p>Exprience a home away from your home </p>
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
                    </div>    
                    </div>
            </div>

            

            <div class="location-sec holidayspot-sec">
                    <div class="container">
                        <h1>Seasons got no Reasons</h1>
                        <p>Homestays that own the seasons</p>
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
                                                <div class="holidayspot-list">
                                                    <div class="team-block">
                                                        <div class="parent">
                                                            <div class="child">
                                                                <img src="{{ asset('site_images/season_category/'.$seasons->image)}}" alt="" />
                                                                <a href="#" onclick="mySeason({{$seasons->id}})">Homestays to visit in {{ $seasons->name }}</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										@endforeach
											
											
                                            
                                           
                                            
                                        </div>
                                        <!-- Add Pagination -->
                                    </div>
                                    <div class="swiper-button-next swiper-button-disabled"></div>
                                    <div class="swiper-button-prev swiper-button-disabled"></div>
    
                                </div>
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
                                    <h3>Why Homestays ?</h3>
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
                                    <img src="{{ asset('user_files/images/works_image1.jpg')}}" />
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
                                    <h3 style="font-size: 1.5rem;margin-bottom: 16px;">Want to host your own Homestay?</h3>
                                    <p style="font-family: sans-serif;font-size: 14px;text-align: justify;" >At book 
                                    <a href="http://bookhomestays.in/" style="color: #5553f6;font-size: 15px;" >homestays.in </a> list you homes for free, decide how you want to host and welcome your first guest from us. 
                                    We make your homestay secure and simple to host travelers keeping you and your homestay safe from unwanted guests.
                                    We always require the customers to confirm their identities before the bookings. Cheers to a better and safer hosting!. </p>
                                    <div id="newsletter" style="margin-top: 20px;">
                                        <a href="{{ url('host/')}}" class="btn_1 btn-rounded">Register Now!</a>
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