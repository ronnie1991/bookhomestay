<?php include_once("main.class.php"); ?>
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
                  <img src="images/banner-2.jpg" alt="" />      
                </div>
            </section>
            <?php
             $decStId=base64_decode($_GET['stId']);
             $specStDtl=$object->findSpecificStExpDtls($decStId);?>  

            <div class="bg_color_1">
            <div class="container margin_55" >
                <div class="main_title_2">
                    <h2><?= $specStDtl['name'];?> </h2>
                    <p><?= $specStDtl['title'];?></p>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-6 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="../superstar_pic/<?= $specStDtl['image']?>" class="img-fluid" alt="">
                        </figure>
                    </div>
                    <div class="col-lg-5">
                        <p><?= $specStDtl['description'];?> .</p>
                        <p><em><strong><?= $specStDtl['name'];?></strong></em></p>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <!--/bg_color_1-->  

        <div class="container">
            <div class="main_title_2" style="margin-bottom: 10px">
                <span><em></em></span>
                <h2>Why Choose Homestay?</h2>                
            </div>
            <div class="row">
                
                <div class="col-lg-4 col-md-6">
                    <a class="box_feat" href="#0">
                        <i class="la la-comments"></i>
                        <h3>24/7 customer support</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="box_feat" href="#0">
                        <i class="la la-home"></i>
                        <h3>Global hospitality standards</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris.</p>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a class="box_feat" href="#0">
                        <i class="la la-smile-o"></i>
                        <h3>5-star hosts</h3>
                        <p>Id mea congue dictas, nec et summo mazim impedit. Vim te audiam impetus interpretaris, cum no alii option, cu sit mazim libris. </p>
                    </a>
                </div>
            </div>
            <!--/row-->
        </div>
        <!-- /container -->  


        <div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Similar HomeStay</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>Homestay within the woods</h3>
                                                    <p>From 1000/- per night</p>
                                                    <ul class="ratingul">
                                                        <li><a class="textstar">3.5 Stars</a></li>
                                                        <li><i class="la la-star"></i></li>
                                                        <li><i class="la la-star"></i></li>
                                                        <li><i class="la la-star"></i></li>
                                                        <li><i class="la la-star-half-o"></i></li>
                                                        <li><i class="la la-star-o"></i></li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="swiper-slide swiper-slide-next" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                        <h3>Homestay within the woods</h3>
                                                        <p>From 1000/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">4.5 Stars</a></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                        </ul>
                                                    </div>                                          
                                                </div>
                                        </div>
                                        <div class="swiper-slide" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                        <h3>Homestay within the woods</h3>
                                                        <p>From 1000/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">3.5 Stars</a></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                        <h3>Homestay within the woods</h3>
                                                        <p>From 1000/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">3.5 Stars</a></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                        <h3>Homestay within the woods</h3>
                                                        <p>From 1000/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">5 Stars</a></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-4.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                        <h3>Homestay within the woods</h3>
                                                        <p>From 1000/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">3.5 Stars</a></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/destination-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                        <h3>Homestay within the woods</h3>
                                                        <p>From 1000/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">4.5 Stars</a></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                        </ul>
                                                    </div>
                                            </div>
                                        </div>
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