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


<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

		<?php if(session('status')): ?>                        
                       <div class="alert alert-<?php echo e(session('code')); ?> text-center">
                           <?php echo e(session('status')); ?>

                       </div>
                   <?php endif; ?>

                   <?php if($errors->any()): ?>
                       <div class="alert alert-danger">
                           <ul>
                               <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <li><?php echo e($error); ?></li>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </ul>
                       </div>
                   <?php endif; ?>
        <main>
            <section class="hero_single version_2" style="height: unset;" >
                <div class="wrapper">

                    <div class="tabslide">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide tab-slider" style="background-image:url(<?php echo e(asset('user_files/images/pic.jpg')); ?>);height: 500px;">
                                    <div class="container search-bar-container">
                                        <div class="search-bar">
                                            <form method="POST" action="<?php echo e(url('/set_search_params')); ?>" id="searchPropertyForm">
                                                <?php echo csrf_field(); ?>
                                                <div class="search-container">
                                                    <div class="search-destination search-select">
                                                        <input type="text" id="destination" class="search-select-input form-control required" placeholder="Destination" readonly>
                                                        <input type="hidden" id="destinationId" name="destination">
                                                        <div class="search-select-box">
                                                            <input type="text" id="searchDestinationInput" class="search-destination-input" placeholder="Search...">
                                                            <div class="select-box">
                                                            <?php $__currentLoopData = $placeforselect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pselect): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="select-item" data-val="<?php echo e($pselect->id); ?>"><?php echo e($pselect->place); ?></div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <form method="post" action="<?php echo e(url('/search_property')); ?>" name="myform" id="myForm">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="onlyhomestay" value="1">
                                </form>
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="<?php echo e(asset('user_files/images/destination-7.jpg')); ?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Homestays</h5>
                                    </div>
                                </div>
							</a>-->
							
							<a href="<?php echo e(url('/explorehome')); ?>">
							<div class="media">
                                    <img class="d-flex align-self-center mr-3" src="<?php echo e(asset('user_files/images/homeStay.jpg')); ?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Homestays</h5>
                                    </div>
                                </div>
							</a>
						
                             
                            </div>
                        </div>
                       
						
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="<?php echo e(url('front_exp/')); ?>">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="<?php echo e(asset('user_files/images/ThingstoDo.jpg')); ?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">Things to Do</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="<?php echo e(url('front_grace/')); ?>">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="<?php echo e(asset('user_files/images/PlacestoSee.jpg')); ?>" alt="Generic placeholder image" style="margin-right: 0.5rem!important;">
                                    <div class="media-body">
                                        <h5 class="mt-0">Places to See</h5>
                                    </div>
                                </div>
							</a>
                            </div>
                        </div>
                        <!--<div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
							<a href="<?php echo e(url('front_foodblog/')); ?>">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="<?php echo e(asset('user_files/images/PackageTours.jpg')); ?>" alt="Generic placeholder image">
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
									
									
									<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mustnot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									
									<a href="#" >
                                        <form method="post" action="<?php echo e(url('/search_property')); ?>" name="myPlaces" id="myPlaces">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="myPlace" id="myPlace">
                                        </form>
                                        <div class="swiper-slide">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    
                                                    <a href="<?php echo e(url('/myPlace/'.$mustnot['placeid'])); ?>">
                                                        <img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($mustnot['banner']); ?>" alt="" />
                                                    
                                                </div>
                                                <div class="team-info text-left">
                                                    
                                                    <h3><?php echo e($mustnot['place']); ?></h3>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
									</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									
                                       
                                        
                                        
                                    </div>
                                    <!-- Add Pagination -->
                                </div>
                                <div class="swiper-button-next swiper-button-disabled"></div>
                                <div class="swiper-button-prev swiper-button-disabled"></div>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <a class="show-all" href="<?php echo e(url('/placeall')); ?>">Show all <i class="la la-angle-right"></i></a>
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
										
										
										<?php $__currentLoopData = $season; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seasons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <form method="post" action="<?php echo e(url('/search_property')); ?>" name="mySeasons" id="mySeasons">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="mySeason" id="mySeason">
                                        </form>
                                            <div class="swiper-slide">
                                                <a href="<?php echo e(url('/mySeason/'.$seasons->id)); ?>" style="color: #333;"> 
                                                <div class="holidayspot-list">
                                                    <div class="team-block">
                                                        <div class="parent">
                                                            <div class="child">
                                                                <img src="<?php echo e(asset('site_images/season_category/'.$seasons->image)); ?>" alt="" />
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <div class="team-info text-left">
                                                    
                                                    <h3><?php echo e($seasons->name); ?> </h3>
                                                    <p><?php echo $seasons->starting_form; ?></p>
                                                </div>
                                                </div>
                                                </a>
                                            </div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
											
                                            
                                           
                                            
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
						
						<?php $__currentLoopData = $holiday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holidays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <form method="post" action="<?php echo e(url('/search_property')); ?>" name="myHolidays" id="myHolidays">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="myHoliday" id="myHoliday">
                        </form>
						
                        
                        <div class="swiper-slide">
                            <div class="holidayspot-list">
                                <div class="team-block">
                                    <div class="parent">
                                        <div class="child">
                                            <img src="<?php echo e(asset('site_images/holiday_category')); ?>/<?php echo e($holidays['banner']); ?>" alt="" width="200" height="160" />
                                            
                                            <a href="<?php echo e(url('/myHoliday/'.$holidays['holydayid'])); ?>"><?php echo e($holidays['title']); ?></a>
                                        </div>
                                    </div>
                                    <div class="team-info text-left">
                                        
                                        <p>Starting from Rs.<?php echo e($holidays['price']); ?>/-</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
						
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        
                    </div>
                    </div>
                    <div class="swiper-button-next swiper-button-disabled"></div>
                    <div class="swiper-button-prev swiper-button-disabled"></div>

                    </div>                                    
                    </div>
                    <div class="col-sm-12">
                            <a class="show-all" href="<?php echo e(url('allholiday/')); ?>">Show all <i class="la la-angle-right"></i></a>
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
                                       	
									<?php $__currentLoopData = $comfort; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comforts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <form method="post" action="<?php echo e(url('/search_property')); ?>" name="myComforts" id="myComforts">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="myComfort" id="myComfort">
                                    </form>
									
									<a href="#" >
                                        <div class="swiper-slide">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    
                                                    <a href="<?php echo e(url('/myComfort/'.$comforts['comfortid'])); ?>">
                                                        <img src="<?php echo e(asset('site_images/comfort_category')); ?>/<?php echo e($comforts['banner']); ?>" alt="" />
                                                    
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3><?php echo e($comforts['title']); ?></h3>
                                                    <p>Starting from <?php echo e($comforts['price']); ?></p>
                                                </div>
                                                </a>
                                            </div>

                                        </div>
									</a>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                       
                                        
                                    </div>
                                    <!-- Add Pagination -->
                                </div>
                                <div class="swiper-button-next swiper-button-disabled"></div>
                                <div class="swiper-button-prev swiper-button-disabled"></div>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <a class="show-all" href="<?php echo e(url('comfort/')); ?>">Show all <i class="la la-angle-right"></i></a>
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
                                            
											
											<?php $__currentLoopData = $superstar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superstars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<a href="<?php echo e(url('/star_details/'.$superstars->id)); ?>">
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="<?php echo e(url('/star_details/'.$superstars->id)); ?>">
                                                            <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($superstars->image); ?>" alt="" />
                                                        
                                                    </div>
                                                    <div class="team-info text-left">
                                                            <p><?php echo e($superstars->title); ?></p>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
											</a>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <!-- Add Pagination -->
                                    </div>
                                    <div class="swiper-button-next swiper-button-disabled"></div>
                                    <div class="swiper-button-prev swiper-button-disabled"></div>
    
                                </div>
                            </div>
                    <div class="col-sm-12">
                        <a class="show-all" href="<?php echo e(url('allStartsExp/')); ?>">Show all <i class="la la-angle-right"></i></a>
                    </div>
                        </div>
                    </div>
            </div>

            

            <div class="location-sec toprated-sec" style="background: #f8f8f8;">
                    <div class="container">
                        <h1><?php echo "Newly added top rated experiences "; ?> </h1>
                        <div class="row">
                          <div class="col-12">
                            <div class="toprated-slider">
                            <div class="swiper-container">
                            <div class="swiper-wrapper">
							
							
							
							<?php $__currentLoopData = $toprated; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toprateds): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<a href="<?php echo e(url('/exp_details_front/'.$toprateds->id)); ?>">
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="<?php echo e(url('/exp_details_front/'.$toprateds->id)); ?>">
                                                            <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($toprateds->image); ?>" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3><?php echo e($toprateds->name); ?></h3>
                                                       
                                                    </div>
                                                </div>
    
                                            </div>
											</a>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							
							
							
                           
                           
                         </div>

                         </div>
                         <div class="swiper-button-next swiper-button-disabled"></div>
                         <div class="swiper-button-prev swiper-button-disabled"></div>

                         </div>
                        </div>
                        <div class="col-sm-12">
                        <a class="show-all" href="<?php echo e(url('allTopRatedExp/')); ?>">Show all <i class="la la-angle-right"></i></a>
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
										
										
										<?php $__currentLoopData = $hirating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hiratings): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<a href="<?php echo e(url('admin/ActivatePromo/'.$hiratings->id)); ?>" >
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="<?php echo e(url('/searchDetails/'.$hiratings->id.'')); ?>" target="_blank">
                                                            <img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($hiratings->image); ?>" alt="" />
                                                        
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3><?php echo e($hiratings->hotel_name); ?></h3>
                                                        <p>From <span style="font-family: sans-serif; text-decoration:line-through">Rs. <?php echo e($hiratings->original_price); ?></span> <strong style="font-family: sans-serif;">Rs. </strong> <?php echo e($hiratings->price); ?> per night</p>
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
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                           
                                        </div>
                                        <!-- Add Pagination -->
                                    </div>
                                    <div class="swiper-button-next swiper-button-disabled"></div>
                                    <div class="swiper-button-prev swiper-button-disabled"></div>
    
                                </div>
                            </div>
                            <div class="col-sm-12">
                        <a class="show-all" href="<?php echo e(url('allRecomandedFoU/')); ?>">Show all <i class="la la-angle-right"></i></a>
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
                        <h1><?php echo "Homestays that own the seasons"; ?> </h1>
                        <div class="row">
                          <div class="col-12"> 
                            <div class="missbigday-slider">
                                <div class="swiper-container">
                                <div class="swiper-wrapper">
								
								
								<?php $__currentLoopData = $dontmiss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dont): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								
                                <div class="swiper-slide">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
											<a href="<?php echo e(url('/bigday/'.$dont->id)); ?>">
                                            <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($dont->image); ?>" alt="" />
                                            <div class="team-info text-left">
                                            <h3><?php echo e($dont->title); ?></h3>
                                            <p style="font-size: 15px;">Occurs On <?php echo e(date('d M Y',strtotime($dont->date))); ?></p>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
								
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
                             
                                  
                            </div>       
                            </div>
                            <div class="swiper-button-next swiper-button-disabled"></div>
                            <div class="swiper-button-prev swiper-button-disabled"></div>
                          </div>  
                        </div>
                        <div class="col-sm-12">
                        <a class="show-all" href="<?php echo e(url('allBigDay/')); ?>">Show all  <i class="la la-angle-right"></i></a>
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

							<?php $__currentLoopData = $host; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
                            <div class="swiper-slide">
                                <div class="visit-karnataka">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="<?php echo e(url('/host_details/'.$hosts->id)); ?>">
                                                    <img src="<?php echo e(asset('host_pic')); ?>/<?php echo e($hosts->image); ?>" alt="" />
                                                
                                            </div>
                                            <div class="team-info text-left">
                                                <h3><?php echo e($hosts->name); ?></h3>
                                                </a>
                                            </div>
                                        </div>
                                </div>
                            </div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							
							 
                       
                       </div>     
                       </div>
                       <div class="swiper-button-next swiper-button-disabled"></div>
                       <div class="swiper-button-prev swiper-button-disabled"></div>

                      </div>  
                    </div>
                    <div class="col-sm-12">
                      <a class="show-all" href="<?php echo e(url('allSuperHost/')); ?>">Show all <i class="la la-angle-right"></i></a>
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
                                    <?php
                                    $whs1="There is a saying that goes, AthithiDevo Bhava, which means''The Guest is God''. Indians consider it a huge honor to 
                                    have guests in their home, and go out of their way to please them. There is nothing like indian hospitality. ";
                                    $whs2="No one knows a place better than the local occupants, and by staying with someone local you have access to the best information
                                    on the place. Homestay owners make it their business to know more about the local area so that they can point out shortcuts and scenic 
                                    routes to their guests, making exploring all the moreconvenient.They also serve best of Authentic Home Cooked Food with personalized 
                                    services at pocket friendly rates and forming unlikely friendships.";
                                    ?>
                                    <p style="font-size: 16px;font-weight: 600;font-family: sans-serif;color: #5e4545;text-align: justify;"><?php echo e(htmlspecialchars($whs1)); ?></p>
                                    <p style="font-size: 16px;font-weight: 600;font-family: sans-serif;color: #5e4545;text-align: justify;"><?php echo e(htmlspecialchars($whs2)); ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                                <div class="block-reveal box-two" style="margin-top: 20px;">
                                    <img src="<?php echo e(asset('user_files/images/didupe12.jpg')); ?>" />
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
                                        <a href="<?php echo e(url('host/')); ?>" class="btn_1 btn-rounded">Start hosting</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

    </div>

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

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

    <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>