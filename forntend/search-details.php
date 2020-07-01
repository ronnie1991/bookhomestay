<?php 
include_once("main.class.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BookHomestays</title>
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
    <!-- <link href="https://fonts.googleapis.com/css?family=Bitter:400,400i,700" rel="stylesheet"> -->

    <!-- Bootstrap CSS File -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- font-awesome CSS Files -->
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Animate.css" type="text/css">
    <link rel="stylesheet" href="css/swiper.min.css" type="text/css">

    <!-- date range Stylesheet File -->
    <link href="css/t-datepicker.min.css" rel="stylesheet" type="text/css">
    <link href="css/themes/t-datepicker-main.css" rel="stylesheet" type="text/css">

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/responsive.css" />

</head>

<body>
    <div id="page" class="theia-exception">
        <?php include_once("header.php"); 
         $specificPropDtls=$object->findSpecificPropDtls(base64_decode($_GET['pri']));
        ?>

        <main>
            <section class="serch-dtl-hero hero_in">
                <div class="search-dtl-banner">
                  <img class="search-pic" src="../propertypic/<?= $specificPropDtls['image'];?>" alt="" />      
                </div>
                <span class="magnific-gallery">
                	   <?php foreach ($object->findSpecPropertyAllPic($specificPropDtls['id']) as $key => $propertyPics) { ?>
                        <a href="../rooms_multiple_pic/<?= $propertyPics['pics'];?>" class="btn_photos" title="<?= $specificPropDtls['hotel_name'];?>" data-effect="mfp-zoom-in">View photos</a>
                      <?php    } ?>
                </span>
            </section>

            <nav class="secondary_nav sticky_horizontal">
                <div class="container col-lg-10" id="cd-vertical-nav">

                    <ul class="search-details-filter clearfix">
                        <li><a class="btn-white btn-sm" href="#section1" class="active" data-number="1">Overview</a></li>
                        <li><a class="btn-white btn-sm" href="#section2" data-number="2">The Host</a></li>
                        <li><a class="btn-white btn-sm" href="#section3" data-number="3">Location</a></li>
                        <li><a class="btn-white btn-sm" href="#section4" data-number="4">Reviews</a></li>

                    </ul>
                </div>
            </nav>
            <div class="smap-sec margin_80_0">
                <div class="container clearfix">
                    <div class="search-dtl-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-8">
                            <?php $hostDtls=$object->findSpecificHostDtls($specificPropDtls['hostid']); ?>
                            <div id="section1" class="cd-section">
                            <h2 style="font-size: 1.5rem;">This is what the host has to say...</h2>
                            <br>
                            <div class="room_type first">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="../host_pic/<?= $hostDtls['image'];?>" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-8">                                       
                                        <p><strong>Paris Homestay</strong> is hosted by ad sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad<br> <i>- <?= $hostDtls['name'];?>, <?= $specificPropDtls['hotel_name'];?></i> <a href="#">(read more)</a> </p>
                                    </div>
                                </div>
                                <!-- /row -->
                              </div>
                              <h2 style="font-size: 1.5rem;">Room Details</h2><br>
                              <?php foreach ($object->findSpecPropertyAllRoomDtls($specificPropDtls['id']) as $rc => $roomDtls) { 
                              	if(($rc+1)%2==0)
                              		{ $cls= "room_type gray";} 
                              	else
                              		{ $cls="room_type ";}
                              	?>
                              <div class="<?=$cls;?>">
                                  <div class="row">                                  	
                                      <div class="col-md-4">
                                          <img src="images/hotel_list_1.jpg" class="img-fluid" alt="">
                                      </div>
                                      <div class="col-md-8">
                                          <h4><?= $roomDtls['romm_name'];?></h4>
                                          <p><?= $roomDtls['description'];?>.</p>
                                          <ul class="hotel_facilities">
                                              <li><img src="images/hotel_facilites_icon_2.svg" alt=""><?= $roomDtls['romm_name'];?></li>
                                              <li><img src="images/hotel_facilites_icon_4.svg" alt="">Free Wifi</li>
                                              <li><img src="images/hotel_facilites_icon_5.svg" alt="">Shower</li>
                                              <li><img src="images/hotel_facilites_icon_7.svg" alt="">Air Condition</li>
                                              <li><img src="images/hotel_facilites_icon_8.svg" alt="">Hairdryer</li>
                                          </ul>
                                      </div>
                                  </div>
                                  <!-- /row -->
                                </div>
                               <?php } ?>
                                <!-- /rom_type -->
                            </div>
                            <div class="clearfix"></div>
                            <hr>

                            <div id="section2" class="cd-section">
                                <h1>Places to See</h1>
                                <div class="places-slide">
                                        <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                          <div class="swiper-slide">
                                            <img src="images/adventure-1.jpg" alt=""/>
                                            <div class="places-slidertext">
                                                <h2>1. Tunga River</h2>
                                                <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                            </div>
                                        </div>
                                          <div class="swiper-slide">
                                            <img src="images/adventure-2.jpg" alt=""/>
                                            <div class="places-slidertext">
                                                    <h2>2. Tunga River</h2>
                                                    <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                    <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                            </div>
                                        </div>
                                          <div class="swiper-slide">
                                            <img src="images/adventure-3.jpg" alt=""/>
                                            <div class="places-slidertext">
                                                    <h2>3. Tunga River</h2>
                                                    <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                    <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                            </div>
                                        </div>
                                          <div class="swiper-slide">
                                            <img src="images/adventure-4.jpg" alt=""/>
                                            <div class="places-slidertext">
                                                    <h2>4. Tunga River</h2>
                                                    <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                    <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                                </div>
                                        </div>
                                          <div class="swiper-slide">
                                            <img src="images/adventure-5.jpg" alt=""/>
                                            <div class="places-slidertext">
                                                    <h2>5. Tunga River</h2>
                                                    <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                    <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                                </div>
                                        </div>
                                        <div class="swiper-slide">
                                                <img src="images/adventure-6.jpg" alt=""/>
                                                <div class="places-slidertext">
                                                        <h2>6. Tunga River</h2>
                                                        <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                        <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                                    </div>
                                        </div>
                                        <div class="swiper-slide">
                                                <img src="images/wild-life.jpg" alt=""/>
                                                <div class="places-slidertext">
                                                        <h2>7. Tunga River</h2>
                                                        <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                        <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                                    </div>
                                        </div>
                                        <div class="swiper-slide">
                                                <img src="images/nature_3.jpg" alt=""/>
                                                <div class="places-slidertext">
                                                        <h2>8. Tunga River</h2>
                                                        <h5>(<b>1km</b> from theerthali Homestay)</h5>
                                                        <p>About Paris Homestay., and sumo viris eloquentiam sed. Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.Mea appareat omittantur eloquentiam ad, ad sumo viris eloquentiam sed.</p>
                                                    </div>
                                        </div>
                                        </div>
                                        <!-- Add Pagination -->
                                        <div class="swiper-pagination swiper-pagination-white"></div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                </div>
                                </div>
                                <hr>
                                <h1>Food</h1>
                                <div class="magnific-gallery mt-3 mb-3">
                                    <a href="../propertypic/<?= $specificPropDtls['food_image']?>" class="btn_menu btn" title="Food Menu" data-effect="mfp-zoom-in"><i class="la la-cutlery"></i> Click to View Menu</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <hr>

                            <div id="section3" class="cd-section">
                                        <h1>Location and Routemap</h1>                                        
                                        <iframe class="" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d61538.2623096141!2d75.63320658011305!3d15.422918098078707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHotels!5e0!3m2!1sen!2sin!4v1547058395628" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                                        <p class="mt-4">The home is located at the border of Daly City and San Francisco, very close to BART (subway) station and bus stations, that give you easy access to anywhere in San Francisco and peninsula (San Mateo County). This home is perfect for tourists, business travelers and families.</p>

                            </div>
                            <div class="clearfix"></div>
                            <hr>

                            <div id="section4" class="cd-section">
                                                <h2>Reviews</h2>
                                                <div class="reviews-container">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <div id="review_summary">
                                                                <strong>8.5</strong>
                                                                <em>Superb</em>
                                                                <small>Based on 4 reviews</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-9">
                                                            <div class="row">
                                                                <div class="col-lg-10 col-9">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-3"><small><strong>5 stars</strong></small></div>
                                                            </div>
                                                            <!-- /row -->
                                                            <div class="row">
                                                                <div class="col-lg-10 col-9">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-3"><small><strong>4 stars</strong></small></div>
                                                            </div>
                                                            <!-- /row -->
                                                            <div class="row">
                                                                <div class="col-lg-10 col-9">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-3"><small><strong>3 stars</strong></small></div>
                                                            </div>
                                                            <!-- /row -->
                                                            <div class="row">
                                                                <div class="col-lg-10 col-9">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-3"><small><strong>2 stars</strong></small></div>
                                                            </div>
                                                            <!-- /row -->
                                                            <div class="row">
                                                                <div class="col-lg-10 col-9">
                                                                    <div class="progress">
                                                                        <div class="progress-bar" role="progressbar" style="width: 0" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-2 col-3"><small><strong>1 stars</strong></small></div>
                                                            </div>
                                                            <!-- /row -->
                                                        </div>
                                                    </div>
                                                    <!-- /row -->
                                                </div>
                    
                                                <hr>
                    
                                                <div class="reviews-container">
                                                                    <!-- /review-box -->
                                                    <div class="review-box clearfix">
                                                        <figure class="rev-thumb"><img src="images/avatar1.jpg" alt="">
                                                        </figure>
                                                        <div class="rev-content">
                                                            <div class="rating">
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="rev-info">
                                                                Ahsan – April 01, 2016:
                                                            </div>
                                                            <div class="rev-text">
                                                                <p>
                                                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /review-box -->
                                                    <div class="review-box clearfix">
                                                        <figure class="rev-thumb"><img src="images/avatar1.jpg" alt="">
                                                        </figure>
                                                        <div class="rev-content">
                                                            <div class="rating">
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star voted"></i>
                                                                <i class="fa fa-star"></i>
                                                            </div>
                                                            <div class="rev-info">
                                                                Sara – March 31, 2016:
                                                            </div>
                                                            <div class="rev-text">
                                                                <p>
                                                                    Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /review-box -->
                                                </div>
                                                <!-- /review-container -->
                            </div>
                            <div class="clearfix"></div>
                            <hr>

                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-4">
                                <div class="searchmap-fixed search-dtl-right sticky_horizontal">
                                    <div class="theiaStickySidebar">
                                        <div class="box_detail booking">
                                        <div class="price">
                                            <span>45 &#8377; <small>person</small></span>
                                            <div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div>
                                        </div>
            
                                        <div class="form-group">
                                            <input class="form-control" type="text" name="dates" placeholder="When..">
                                            <i class="la la-calendar"></i>
                                        </div>
            
                                        <div class="panel-dropdown">
                                            <a href="#">Guests <span class="qtyTotal">1</span></a>
                                            <div class="panel-dropdown-content right">
                                                    <div class="qtyButtons">
                                                            <label>Adults </label>
                                                            <input type="text" name="qtyInput" value="1">
                                                        </div>
                                                        <div class="qtyButtons">
                                                            <label>Childrens</label>
                                                            <input type="text" name="qtyInput" value="0">
                                                        </div>
                                            </div>
                                        </div>
            
                                        <div class="form-group clearfix">
                                            <div class="custom-select-form">
                                                <select class="wide form-control">
                                                    <option>Room Type</option>	
                                                    <option>Single Room</option>
                                                    <option>Double Room</option>
                                                    <option>Suite Room</option>
                                                </select>
                                            </div>
                                        </div>
                                        <a href="#" class=" add_top_30 btn_1 full-width purchase">Purchase</a>
                                        <a href="#" class="btn_1 full-width outline wishlist"><i class="la la-heart"></i> Add to wishlist</a>
                                        <div class="text-center"><small>No money charged in this step</small></div>
                                       </div>
                                       <ul class="share-buttons">
                                        <li><a class="fb-share" href="#0"><i class="fa fa-facebook"></i> Share</a></li>
                                        <li><a class="twitter-share" href="#0"><i class="fa fa-twitter"></i> Tweet</a></li>
                                        <li><a class="gplus-share" href="#0"><i class="fa fa-googleplus"></i> Share</a></li>
                                       </ul>
                                </div>                               
                            </div>
                            </div> 

                        </div>
                        <!-- /row -->
                        </div>
                </div>
            </div>
            

            <div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Similar listings</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                    	<?php foreach ($object->findAllPropertyByPlace($specificPropDtls['placeid']) as  $aPBP) { ?>
                                        <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3><?= $aPBP['hotel_name'];?></h3>
                                                    <p>From <?= $aPBP['price'];?>/- per night</p>
                                                    <ul class="ratingul">
                                                        <li><a class="textstar"><?= $aPBP['rating'];?> Stars</a></li>
                                                        <li><i class="la la-star"></i></li>
                                                        <li><i class="la la-star"></i></li>
                                                        <li><i class="la la-star"></i></li>
                                                        <li><i class="la la-star-half-o"></i></li>
                                                        <li><i class="la la-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <?php  } ?>
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

    <?php include_once("footer.php"); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/swiper.min.js"></script>
    <script type="text/javascript" src="js/scrool.js"></script>
    <script type="text/javascript" src="js/t-datepicker.min.js"></script>
	<script>
            $(function() {
              $('input[name="dates"]').daterangepicker({
                  autoUpdateInput: false,
                  opens: 'left',
                  locale: {
                      cancelLabel: 'Clear'
                  }
              });
              $('input[name="dates"]').on('apply.daterangepicker', function(ev, picker) {
                  $(this).val(picker.startDate.format('MM-DD-YY') + ' > ' + picker.endDate.format('MM-DD-YY'));
              });
              $('input[name="dates"]').on('cancel.daterangepicker', function(ev, picker) {
                  $(this).val('');
              });
            });
    </script>
    <script type="text/javascript" src="js/init.js"></script>
    <script src="js/rocket-loader.min.js" data-cf-nonce="2bbc3ef6ef9e20307907d034-" defer=""></script>
    <script type="text/javascript" src="js/guest.qty.js"></script>

</body>

</html>