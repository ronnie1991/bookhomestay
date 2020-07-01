<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>



    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
            <section class="serch-dtl-hero hero_in">
                <div class="search-dtl-banner">
                  <img class="search-pic" src="<?php echo e(asset('propertypic/'.$prop->image.'')); ?>" alt="" />      
                </div>
                <span class="magnific-gallery">
                  <?php
                  $prps = DB::table('property_room_pics')->where('property_id',$prop->id)->get();
                  $place = DB::table('place')->where('id',$prop->placeid)->first();
                  $moreDetails = DB::table('property_more_details')->where('prop_id',$prop->id)->first();
                  ?>
                  <?php $__currentLoopData = $prps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rc=>$prp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php
                   if($rc==0)
                   {
                    ?>
                   <a href="<?php echo e(asset('rooms_multiple_pics/'.$prp->pics.'')); ?>" class="btn_photos" data-effect="mfp-zoom-in">View photos</a>
                   <?php
                   }
                   else
                   {
                   ?>
                   <a href="<?php echo e(asset('rooms_multiple_pics/'.$prp->pics.'')); ?>" data-effect="mfp-zoom-in"></a>
                    <?php
                   }
                   
                   ?>
                   
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                       
                        
                </span>
            </section>

            <nav class="secondary_nav sticky_horizontal" style="border-bottom: 1px solid #ededed;">
                <div class="container col-lg-10" id="cd-vertical-nav">
                    <ul class="search-details-filter clearfix" style="margin-left: 6%;">
                        <li><a class="btn-white btn-sm" href="#section1" class="active" data-number="1">The Host</a></li>
                        <li><a class="btn-white btn-sm" href="#section2" data-number="2">Rooms</a></li>
                        <li><a class="btn-white btn-sm" href="#section3" data-number="3">Places</a></li>
                        <li><a class="btn-white btn-sm" href="#section4" data-number="4">Food</a></li>
                        <li><a class="btn-white btn-sm" href="#section5" data-number="5">Reviews</a></li>
                    </ul>
                </div>
            </nav>
            <div class="col-sm-12">
                    <?php if(session('status')): ?>
                        <?php if(session('code')): ?>
                            <div class="alert alert-<?php echo e(session('code')); ?> text-center" >
                        <?php else: ?>
                            <div class="alert alert-success text-center" >
                        <?php endif; ?>                          
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
            </div>
            <div class="smap-sec margin_80_0" style="padding-top: 25px;">
                <div class="container clearfix">
					
					
					
                    <div class="search-dtl-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-8" style="margin-top:-10px;">
                            <div class="cd-section" >
							<h3 style="font-size: 18px;color:#333;"><?php echo e($prop->hotel_name); ?></h3>
					        <p style="color:#333"><span><i class="la  la-map-marker" style="font-size: 19px;"></i><?php echo e($place->place); ?></span></p>     
					        <br>
                            <div class="cd-section" style="margin: 2px 0px 0px;">
                             <h1>Entire homestay includes</h1>
                                <?php
                                if($moreDetails->amenities!='')
                                {
                                ?>
                                <p class="mt-4"><?php echo $moreDetails->amenities; ?></p>
                                <?php
                                }
                                else
                                {
                                ?>
                                <p class="mt-4"><?php echo "Oops ! not available"; ?></p>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="cd-section" style="margin: 0px 0px 25px 0px;">
                             <h1>Package includes</h1>
                                <?php
                                if($moreDetails->package_includes!='')
                                {
                                ?>
                                <p class="mt-4"><?php echo $moreDetails->package_includes; ?></p>
                                <?php
                                }
                                else
                                {
                                ?>
                                <p class="mt-4"><?php echo "Oops ! not available"; ?></p>
                                <?php
                                }
                                ?>

                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            <?php
                              $h = DB::table('host')->where('id',$prop->hostid)->first();
                              ?>
                            <b style="font-size:18px;" >Host :</b>&nbsp;&nbsp;<span id="section1"><?php echo e($h->name); ?></span>
                            <div class="room_type first">
                              
                                <div class="row">
                                     
                                    <div class="col-md-4">
                                        <img src="<?php echo e(asset('host_pic/'.$h->image.'')); ?>" class="img-fluid" alt="" width="202" height="152">
                                    </div>
                                    <div class="col-md-8">
                                        <p><span style="font-weight: bold;" >Languages know</span>: <?php echo $h->language_known; ?></p>
                                        <p><span style="font-weight: bold;" >Hosting Since</span>: <?php echo $h->hosting_since; ?></p><br>
                                        <p style="font-weight: bold;">What you need to know before you go ?</p>
                                        <p><?php echo str_limit($h->short_description,329); ?></p>
                                        <p><a href="<?php echo e(url('/host_details/'.$prop->hostid)); ?>"target="_blank">(read more)</a> </p>
                                    </div>
                                </div>
                                <!-- /row -->
                              </div>
                              <div class="clearfix"></div>
                            <hr>
                              <h1  id="section2"  class="cd-section">Room Details</h1>
                              <?php
							  $i = 0;
							  ?>
                              <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $var => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							  <?php
							 
							  if(($var+1)%2==0)
							  {
								  $cls = 'room_type gray';
							  }
							  else
							  {
								  $cls = 'room_type';
							  }
							  ?>
                              <div class="<?php echo e($cls); ?>">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <img src="<?php echo e(asset('propertyrooms_pic/'.$detail->image.'')); ?>" class="img-fluid" alt="">
                                      </div>
                                      <div class="col-md-8">
                                          <h4 style="margin-top: -1px;" ><?php echo e($detail->romm_name); ?></h4>
                                          <p><?php echo $detail->description; ?></p>
                                          <?php
                                          $explode = explode(",", $detail->aminities);
                                          ?>
                                          <ul class="hotel_facilities">
                                            <?php $__currentLoopData = $explode; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                            $d = DB::table('aminities')->where('id',$element)->first();
                                            ?>
                                              <li><img src="<?php echo e(asset('propertypic/'.$d->image.'')); ?>" alt=""><?php echo e($d->aminities); ?></li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                              
                                          </ul>
                                      </div>
                                  </div>
                                  <!-- /row -->
                              </div>
							  <?php
							  $i++;
							  ?>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             

                            </div>
                            <div class="clearfix"></div>
                            <hr>

                            <div id="section3" class="cd-section">
                                <h1 >Places to See</h1>
                                <?php
                                if($moreDetails->hotspots!='')
                                {
                                ?>
                                <p class="mt-4"><?php echo $moreDetails->hotspots; ?></p>
                                <?php
                                }
                                else
                                {
                                ?>
                                <p class="mt-4"><?php echo "No Hotspots Found"; ?></p>
                                <?php
                                }
                                ?>
                                <div class="places-slide">
                                        <div class="swiper-container">
                                        <div class="swiper-wrapper">
                              <?php
							 
                              $explodesee = explode(",", $prop->placesto_see);
                              ?>
                              <?php $__currentLoopData = $explodesee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $elementsee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                    $pts = DB::table('sightseen')->where('id',$elementsee)->first();
                                ?>
                                <div class="swiper-slide">
                                    <?php if(isset($pts->image)): ?>
                                    <img src="<?php echo e(asset('placebanner/'.$pts->image.'')); ?>" alt=""/>
                                    <div class="places-slidertext">
                                        <h2><?php echo e($pts->title); ?></h2>
                                        <p><?php echo str_limit($pts->short_description,319); ?><a href="<?php echo e(url('/pl_details_front/'.$elementsee)); ?>">(read more)</a>.</p>
                                    </div>
                                    <?php else: ?> 
                                        <img src="" alt=""/>
                                    <div class="places-slidertext">
                                        <h2></h2>
                                        <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                        <p></p>
                                    </div>
                                    <?php endif; ?>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                             
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination swiper-pagination-white"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                </div>
                                </div>
                           
                            <div class="clearfix"></div>
                            
                                <hr>
                                <h1 id="section4">Food</h1>
                                <div class="magnific-gallery mt-3 mb-3 cd-section">
                                    <?php
                                    if($moreDetails->food!='')
                                    {
                                    ?>
                                    <p class="mt-4"><?php echo $moreDetails->food; ?></p>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                    <p class="mt-4"><?php echo "No Food Menu Found"; ?></p>
                                    <?php
                                    }
                                    ?>
                                   
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>

                            <div  class="cd-section">
                                <h1>The Neighbourhood</h1>
                                
                                <?php
                                if($moreDetails->road_map!='')
                                {
                                ?>
                                <p class="mt-4"><?php echo $moreDetails->road_map; ?></p>
                                <?php
                                }
                                else
                                {
                                ?>
                                <p class="mt-4"><?php echo "No Routemap Found"; ?></p>
                                <?php
                                }
                                ?>
                                                                       
                                <div id="map" style="width:100%;height:350px;position:relative;display:block;visibility:visible"></div>
                              

                            </div>
                            <div class="clearfix"></div>
                            <hr>
                            
                             <div class="cd-section">
                             <h1>Local Area facilities</h1>
                                <?php
                                if($moreDetails->local_area_facilities!='')
                                {
                                ?>
                                <p class="mt-4"><?php echo $moreDetails->local_area_facilities; ?></p>
                                <?php
                                }
                                else
                                {
                                ?>
                                <p class="mt-4"><?php echo "No Local Area facilities Found"; ?></p>
                                <?php
                                }
                                ?>

                            </div>
                            
                            <div class="clearfix"></div>
                            <hr>
                            
                             <div class="cd-section">
                             <h1>House Rules</h1>
                                <?php
                                if($moreDetails->house_rules!='')
                                {
                                ?>
                                <p class="mt-4"><?php echo $moreDetails->house_rules; ?></p>
                                <?php
                                }
                                else
                                {
                                ?>
                                <p class="mt-4"><?php echo "House Rules Not Found"; ?></p>
                                <?php
                                }
                                ?>

                            </div>
                                                        <div class="clearfix"></div>
                            
                                <hr>
                                <h1 id="section4">Things to carry</h1>
                                <div class="mt-3 mb-3 cd-section">
                                     <?php
                                     
                                     if($moreDetails->things_to_do!='')
                                     {
                                     ?>
                                    <p class="mt-4"><?php echo $moreDetails->things_to_do; ?></p>
                                    <?php
                                    }
                                    ?>
                                    <?php 
                                        $thinstoDoList = DB::table('property_things_do')->where('prop_id',$prop->id)->first();
                                        $explodeList = explode(',', $thinstoDoList->exprience_list);
                                        foreach($explodeList as $singlThistoDo)
                                        {
                                        $dtialdThinstoDo = DB::table('toprated_exp')->where('id',$singlThistoDo)->first();
                                    ?>
                                     <p class="mt-4">
                                        <a href="<?php echo e(url('/topexp_details_front/'.$dtialdThinstoDo->id)); ?>" target="_blank"> 
                                         <?php echo e($dtialdThinstoDo->name); ?>

                                         </a>
                                         </p>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            
                            <div class="clearfix"></div>
                            <hr>

                            <div class="cd-section" id="section5">
                                                <h1>Reviews</h1>
                                                
                                              <hr>
                                                <div class="reviews-container">
                                                    <?php
                                                    $reviewCount = DB::table('review')->where('propertyid', $prop->id)->count();
                                                    if($reviewCount==0)
                                                    {
                                                     ?>
                                                     
                                                    <p> No Reviews </p>
                                                    
                                                    <?php 
                                                    }
                                                    
                                                    ?>
                                                    
                                                    
                                                    <!-- /review-box -->
                                                    <?php
                                                    if($reviewCount>0)
                                                    {
                                                    
                                                    $getAllReviews = DB::table('review')->where('propertyid', $prop->id)->get();
                                                    foreach($getAllReviews as $reviewData)
                                                    {
                                                    ?>
                                                   
                                                    
                                                    <div class="review-box clearfix">
                                                        <figure class="rev-thumb"><img src="<?php echo e(asset('user_files/images/custdefimg.png')); ?>" alt="">
                                                        </figure>
                                                        <div class="rev-content">
                                                            <div class="rating">
                                                                <?php if( $reviewData->rating=='1') { ?>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                }
                                                               <?php } ?>
                                                                <?php if( $reviewData->rating=='2') 
                                                                {
                                                                ?>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                
                                                               <?php } ?>
                                                               <?php if( $reviewData->rating=='3') {  ?>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                               <?php } ?>
                                                               <?php if( $reviewData->rating=='4') { ?>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star"></i>
                                                               <?php }  ?>
                                                               <?php if( $reviewData->rating=='5') { ?>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                               <?php } ?>
                                                            </div>
                                                            <?php 
                                                            $specCustDtls = DB::table('customer')->where('id', $reviewData->userid)->first();
                                                            ?>
                                                            <div class="rev-info" style="font-size:14px;">
                                                                Name – <?php echo e($specCustDtls->name); ?>

                                                            </div>
                                                            <div class="rev-text">
                                                                <p><?php echo e($reviewData->feedback); ?> </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    }}
                                                    ?>
                                                   
                                                    <!-- /review-box -->
                                                  
                                                </div>
                                                <!-- /review-container -->
                            </div>
                            
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-4">
                              <div class="searchmap-fixed search-dtl-right sticky_horizontal" id="reservationBox">
                                <form class="form-horizontal" method="post" action="<?php echo e(url('user/booking')); ?>" name="purchase" id="purchase" >
                                  <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">
                                  <input type="hidden" id="hostId" name="hostId" value="<?php echo e($prop->hostid); ?>">
                                  <input type="hidden" id="customerId" name="customerId" value="<?php echo e(session('session_id')); ?>">
                                  <input type="hidden" id="propertyId" name="propertyId" value="<?php echo e($prop->id); ?>">
                                  <input type="hidden" id="loggedroom_details" name="loggedroom_details" value="">
                                  <div class="theiaStickySidebar">
                                    <div class="box_detail">
                                      <div class="price" id="price">
                                          <span style="font-size: 14px !important;color: rgba(118, 108, 108, 0.89) !important;font-weight: 600;">From</span>
                                          <span style=" font-family: sans-serif;">&#8377; <?php echo e($prop->price); ?> </span>
                                          <span style="font-size: 14px !important;color: rgba(118, 108, 108, 0.89) !important;font-weight: 600;">per person</span>
                                          
                                      </div>
          
                                      <div class="input-daterange search-details-form">
                                        <div class="form-group date-picker">
                                          <input type="text" class="datepicker form-control checkin-date" id="checkInDatePicker" data-date="<?php echo e(session('checkIn')); ?>" placeholder="Check-In" required="required" readonly>
                                          <input type="hidden" class="selected-date sel-checkin-date" id="checkInDate" name="from_date">
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        
                                        <div class="form-group date-picker">
                                            <input type="text" class="datepicker form-control checkout-date" id="checkOutDatePicker" data-date="<?php echo e(session('checkOut')); ?>" placeholder="Check-Out" required="required" readonly>
                                            <input type="hidden" class="selected-date sel-checkout-date" id="checkOutDate" name="to_date">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                          <div class="search-guests search-select">
                                            <div class="no-of-guests search-select-input">
                                                <input type="hidden" id="noOfGuests" name="no_of_guests" value="<?php if(session('totalGuests')!=''){ echo session('totalGuests'); }else{ echo '1'; } ?>">
                                                <span>Guests</span>
                                                <span class="no"><?php if(session('totalGuests')!=''){ echo session('totalGuests'); }else{ echo '1'; } ?></span>
                                            </div>
                                            <div class="search-select-box">
                                                <div class="guest-type adults">
                                                    <div class="title">Adults</div>
                                                    <div class="number-selector">
                                                        <input type="hidden" id="adults" name="adults" value="<?php if(session('totalAdults')!=''){ echo session('totalAdults'); }else{ echo '1'; } ?>">
                                                        <span class="selector-btn decrease-btn">-</span>
                                                        <span class="number"><?php if(session('totalAdults')!=''){ echo session('totalAdults'); }else{ echo '1'; } ?></span>
                                                        <span class="selector-btn increase-btn">+</span>
                                                    </div>
                                                </div>
                                                <div class="guest-type childrens">
                                                    <div class="title">Childrens</div>
                                                    <div class="number-selector">
                                                        <input type="hidden" id="child" name="child" value="<?php if(session('totalAdults')!=''){ echo session('totalAdults'); }else{ echo '0'; } ?>">
                                                        <span class="selector-btn decrease-btn">-</span>
                                                        <span class="number"><?php if(session('totalChilds')!=''){ echo session('totalChilds'); }else{ echo '0'; } ?></span>
                                                        <span class="selector-btn increase-btn">+</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="form-group" style="margin:-25px 0px 0px 0px" >
                                          <a href="#" style="float:left;" class=" add_top_30 btn_1 full-width purchase" onclick="myPurchase(<?php echo e(session('session_id')); ?>)">Confirm Availability</a>  
                                      </div>
                                       </form>
                                       <div > <i class="fa fa-phone"></i> <small class="text-align: left;">+91 99 3382 0006 </small>  <small class="text-align: right;" style="margin-left: 1%;" >for easy booking</small> </div>
                                      
                                    </div>
                                    <ul class="share-buttons">
                                        <li><a class="fb-share"  href="https://www.facebook.com/sharer/sharer.php?u=bookhomestays.in/searchDetails/<?php echo e($prop->id); ?>" target="_blank" ><i class="fa fa-facebook" style="font-size:18px !important;" ></i> FaceBook</a></li>
                                        <li><a class="twitter-share" href="https://api.whatsapp.com/send?text=bookhomestays.in/searchDetails/<?php echo e($prop->id); ?>" target="_blank"><i class="fa fa-whatsapp" style="font-size:18px !important;"></i> Whatsapp</a></li>
                                       </ul>
                                     
                                  </div>
                                  
                                                           
                              </div>
                              
                            </div> 

                        </div>
                        <!-- /row -->
                        </div>
                </div>
            </div>
            
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
            <div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>More places to stay</h1>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                              <?php
                              $sls = DB::table('properties')->where('placeid',$prop->placeid)->where('id','!=',$prop->id)->get();
                              ?>
                              <?php $__currentLoopData = $sls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="<?php echo e(url('/searchDetails/'.$sl->id.'')); ?>" target="_blank" style="text-decoration: none;}">
                                                        <img src="<?php echo e(asset('propertypic/'.$sl->image.'')); ?>" alt="">
                                                    
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3 style="color:#333;" ><?php echo e($sl->hotel_name); ?></h3>
                                                    <p>From <span style=" font-family: sans-serif;">&#8377; </span> <?php echo e($sl->price); ?> per person</p>
                                                    <ul class="ratingul">
                                                        <?php if( $sl->rating=='3') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $sl->rating=='4') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $sl->rating=='5') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <?php } ?>
                                                        
                                                    </ul>
                                                </div>
                                                </a>
                                            </div>
                                        
                                        </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <!-- Add Pagination -->
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>

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
	  
     var map;
     function initMap() {
       
       var uluru = {lat: -25.363, lng: 131.044};

        var latlng = new google.maps.LatLng(<?php echo $prop->latitude ?>,<?php echo $prop->longitude ?>);

       var myOptions = {
               zoom: 28,
               center: latlng,
               mapTypeId: google.maps.MapTypeId.ROADMAP,
               mapTypeControl: false
           };

       var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: latlng
       });

       var iconBase = 'https://maps.google.com/mapfiles/kml/shapes/info-i_maps.png';

       
        
        console.log(<?php echo $prop->latitude ?>);
           marker = new google.maps.Marker({
              position: new google.maps.LatLng(<?php echo $prop->latitude ?>,<?php echo $prop->longitude ?>),
              icon: "http://maps.google.com/mapfiles/ms/icons/red-dot.png",
              map: map,
			  zoom: 12,
              title: '123456(Ayers Rock)',

           }); 
		   


           marker.addListener('click', function() {
               infowindow.open(map, marker);
             });        
     }
	 



	  
	  
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7vCGu2vwPSMIMFosGLj1mbmZKJtShhxg&callback=initMap">
    </script>
    
    
    
    


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
	<script>
	
	    function myPurchase(id) { 
	        var check = id;
			//console.log(check);
			//exit;
	        if (typeof check === "undefined") {
	            _token = $("#_token").val();
                hostId = $("#hostId").val();
                // customerId = $("#customerId").val();
                propertyId = $("#propertyId").val();
                var myString = $("#price").text();
                myString = myString.replace(/\D/g,'');
                price = myString;
                from_date = $("#checkInDate").val();
                to_date = $("#checkOutDate").val();
                //from_date = $(".t-input-check-in").val();
                //to_date = $(".t-input-check-out").val();
                adults = $("#adults").val();
                child = $("#child").val();
                room_type = $('input[type=checkbox]:checked').map(function(_, el) {
                                                                        return $(el).val();
                                                                    }).get();                
                
				var fruits = [];
                $('input[type=checkbox]:checked').each(function() {
                    checkedId = this.value;
                    roomnos = $("#roomno"+checkedId).val();
                    RoomType = checkedId;
					fruits.push(checkedId+'-'+roomnos);
                }); 
                
                if( from_date != '' && to_date != '') { 
				
				
                    
                    var dataString = 'hostId=' + hostId + '&_token='+ _token + '&propertyId='+ propertyId +
                                '&price=' + price +'&from_date='+ from_date + '&to_date=' + to_date +'&adults='+ adults +'&child='+ child;
								
								console.log(dataString);
								//exit;
                        $.ajax({
                            type: "POST",
                            url: "<?php echo e(url('/setSessionDataForPurchase')); ?>",
                            data: dataString,
                            headers: {'X-CSRF-TOKEN': _token},
                            success: function(response) {
                                if(response == 'success') {
                                    window.location.href = "http://bookhomestays.in/customer_signup";
                                    // alert('success');
                                } else {
                                   window.location.href = "http://bookhomestays.in/customer_signup";
                                } 
                              console.log(response);
                            }
                        });  
                        console.log(dataString);
                        return false;
                    
                } 
				else {
                    window.location.href = "http://bookhomestays.in/customer_signup";
                }
				
            } 
			if (typeof check != '') {
				//console.log('id found');
				//exit;
                
                _token = $("#_token").val();
                hostId = $("#hostId").val();
                // customerId = $("#customerId").val();
                propertyId = $("#propertyId").val();
                var myString = $("#price").text();
                myString = myString.replace(/\D/g,'');
                price = myString;
                from_date = $("#checkInDate").val();
                to_date = $("#checkOutDate").val();
                //from_date = $(".t-input-check-in").val();
                //to_date = $(".t-input-check-out").val();
                adults = $("#adults").val();
                child = $("#child").val();
                room_type = $('input[type=checkbox]:checked').map(function(_, el) {
                                                                        return $(el).val();
                                                                    }).get();                
                
				var fruits = [];
                $('input[type=checkbox]:checked').each(function() {
                    checkedId = this.value;
                    roomnos = $("#roomno"+checkedId).val();
                    RoomType = checkedId;
					fruits.push(checkedId+'-'+roomnos);
                }); 
                
                if( from_date != '' && to_date != '') { 
				
				
                    
                    var dataString = 'hostId=' + hostId + '&_token='+ _token + '&propertyId='+ propertyId +
                                '&price=' + price +'&from_date='+ from_date + '&to_date=' + to_date +'&adults='+ adults +'&child='+ child;
								
								//console.log(dataString);
								//exit;
                        $.ajax({
                            type: "POST",
                            url: "<?php echo e(url('/setSessionDataForPurchase')); ?>",
                            data: dataString,
                            headers: {'X-CSRF-TOKEN': _token},
                            success: function(response) {
                                if(response == 'success') {
                                    //window.location.href = "http://bookhomestays.in/customer_signup";
                                    window.location.href = "http://bookhomestays.in/user/booking_process";
                                    // alert('success');
                                } else {
                                   window.location.href = "/";
                                } 
                              console.log(response);
                            }
                        });  
                        console.log(dataString);
                        return false;
                    
                } 
				else {
                    window.location.href = "http://bookhomestays.in/customer_signup";
                }
            }
          
        }
    
    </script>
 
	
	<?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>


</body>

</html>