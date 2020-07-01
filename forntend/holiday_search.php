<?php
//error_reporting(0);
 include_once("main.class.php"); ?>
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
        <?php include_once("header.php"); ?>

        <main>
             <section class="serch-hero">
                <div class="wrapper">
                  <img src="images/hero_in_bg_4.jpg" alt="" />      
                </div>
            </section>

            <nav class="secondary_nav sticky_horizontal">
                <div class="container col-lg-10">

                    <ul class="filter-search clearfix">
                        <li><a class="btn-white btn-sm" href="#">Filters:</a></li>
                        <li><a class="btn-white btn-sm" href="#">Price</a></li>
                        <li><a class="btn-white btn-sm" href="#">Rating</a></li>
                        <li><a class="btn-white btn-sm" href="#">Distance(closest first)</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid smap-sec margin_80_0">
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <div class="row">
                                    <?php 
                                    foreach($object->findAllPropertyByHolidaySpot(base64_decode($_GET['hi'])) as $propertyDta ) {
                                        $holidayC=$object->findSpecificHolidaySpot($propertyDta['holiday_category']);

                                        ?>
                                    
                                <div class="col-sm-6 col-md-6">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="#0" class="wish_bt"></a>
                                            <a href="search-details.html"><img src="../propertypic/<?=  $propertyDta['image'];?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Explore</span></div></a>
                                            <small><?= $holidayC['holiday_category'];?></small>
                                        </figure>
                                        <div class="wrapper">
                                            <div class="rating">
                                                <?php if($propertyDta['rating']=='1') { ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($propertyDta['rating']=='1.5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star-half voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($propertyDta['rating']=='2') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($propertyDta['rating']=='3') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                             <?php } if($propertyDta['rating']=='4') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i> 
                                                <?php } if($propertyDta['rating']=='5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i> 
                                                <?php } ?>  
                                            </div>
                                            <h3><a href="#"><?=  $propertyDta['hotel_name'];?></a></h3>
                                            <span class="price">From <strong>&#8377;<?=  $propertyDta['price'];?></strong> /per person</span>
                                        </div>
                                        <ul>
                                            <li><i class="la la-home"></i> 3 Rooms</li>
                                            <li><div class="score"><span>Superb<em>350 Reviews</em></span><strong><?=  $propertyDta['rating'];?></strong></div></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                                            
                               </div>    
                            </div>
                            
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <div class="searchmap-fixed sticky_horizontal">
                                <iframe class="mapiframe" src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d61538.2623096141!2d75.63320658011305!3d15.422918098078707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sHotels!5e0!3m2!1sen!2sin!4v1547058395628" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
                               </div>
                            </div> 

                        </div>
                        <!-- /row -->
                        </div>
                </div>
            </div>

            <div class="bg_color_1">
                    <div class="container margin_15_60">
                    <div class="row">
                    <div class="col-12 col-sm-6 col-md-4">
                    <a href="#0" class="boxed_list">
                    <i class="la la-smile-o"></i>
                    <h4>Need Help? Contact us</h4>
                    <p>Cum appareat maiestatis interpretaris et, et sit.</p>
                    </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                    <a href="#0" class="boxed_list">
                    <i class="la la-money"></i>
                    <h4>Payments</h4>
                    <p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
                    </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4">
                    <a href="#0" class="boxed_list">
                    <i class="la la-file-text-o"></i>
                    <h4>Cancel Policy</h4>
                    <p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
                    </a>
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
    <script type="text/javascript" src="js/t-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // Call global the function
            $('.t-datepicker').tDatePicker({
                // options here
            });
        });
    </script>
    <script type="text/javascript" src="js/init.js"></script>
    <script src="js/rocket-loader.min.js" data-cf-nonce="2bbc3ef6ef9e20307907d034-" defer=""></script>
    <script type="text/javascript" src="js/guest.qty.js"></script>

</body>

</html>