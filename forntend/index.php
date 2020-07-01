<!-- <?php
error_reporting(0);
 include_once("main.class.php"); ?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>BookHomestay</title>
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
            <section class="hero_single version_2">
                <div class="wrapper">

                    <div class="tabslide">
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide tab-slider" style="background-image:url(images/home-stay1.jpg)">
                                    <div class="container">
                                        <div class="search-bar">
                                            <?php if (isset($_POST['homestaySearch'])) {
                                                $place=base64_encode($_POST['browser']);
                                                echo "<script>location='mustlocation_search?pid=$place'</script>";
                                            } ?>
                                            <form action="#" method="post">
                                                <div class="row no-gutters custom-search-input-2">
                                                     <div class="col-lg-3">
                                                        <div class="form-group">
                                                            <input list="browsers" name="browser" placeholder="Destination">
                                                              <datalist id="browsers">
                                                                <?php foreach($object->findAllPlaceses() as $placeDta) { ?>
                                                                <option value="<?= $placeDta['id'] ?>"><?= $placeDta['place'] ?></option>
                                                                <?php }?>
                                                              </datalist>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <div class="t-datepicker">
                                                                <div class="t-check-in"></div>
                                                                <div class="t-check-out"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="panel-dropdown">
                                                            <a href="#">Guests <span class="qtyTotal">1</span></a>
                                                            <div class="panel-dropdown-content">

                                                                <div class="qtyButtons">
                                                                    <label>Adults</label>
                                                                    <input type="text" name="qtyInput" value="1">
                                                                </div>
                                                                <div class="qtyButtons">
                                                                    <label>Childrens</label>
                                                                    <input type="text" name="qtyInput" value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="submit" class="btn_search" value="Search" name="homestaySearch">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide tab-slider" style="background-image:url(images/itc-resort-gurgaon.jpg)">
                                    <div class="container">
                                        <div class="search-bar">
                                            <form action="search.html">
                                                <div class="row no-gutters custom-search-input-2">
                                                    <div class="col-lg-3">
                                                            <div class="form-group">
                                                            <!-- <input class="form-control" type="text" id="searchCity" placeholder="Surfing in karnataka"> -->
                                                            <div class="navbar navbar-default search-dropdown" role="navigation">
                                                            <div class="collapse navbar-collapse show" id="bs-example-navbar-collapse-1">
                                                            <ul class="nav navbar-nav">
                                                            <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Destination</a>
                                                            <ul class="dropdown-menu multi-column columns-3">
                                                            <div class="row mr-0 ml-0">
                                                            <div class="col-sm-4 pr-0 pl-0">
                                                            <ul class="multi-column-dropdown">
                                                                <?php foreach($object->findAllPlaceses() as $placeDta) { ?>
                                                                <li><a href="#"><?= $placeDta['place'] ?></a></li>
                                                                <?php }?>

                                                            </ul>
                                                            </div>                                                            
                                                           
                                                            </div>
                                                            </ul>
                                                            </li>
                                                            </ul>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <div class="t-datepicker">
                                                                <div class="t-check-in"></div>
                                                                <div class="t-check-out"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="panel-dropdown">
                                                            <a href="#">Guests <span class="qtyTotal">1</span></a>
                                                            <div class="panel-dropdown-content">

                                                                <div class="qtyButtons">
                                                                    <label>Adults</label>
                                                                    <input type="text" name="qtyInput" value="1">
                                                                </div>
                                                                <div class="qtyButtons">
                                                                    <label>Childrens</label>
                                                                    <input type="text" name="qtyInput" value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="submit" class="btn_search" value="Search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide tab-slider" style="background-image:url(images/Summertime_Pool-Deck_5-22.jpg)">
                                    <div class="container">
                                        <div class="search-bar">
                                            <form action="search.html">
                                                <div class="row no-gutters custom-search-input-2">
                                                    <div class="col-lg-3">
                                                            <div class="form-group">
                                                            <div class="navbar navbar-default search-dropdown" role="navigation">
                                                            <div class="collapse navbar-collapse show" id="bs-example-navbar-collapse-1">
                                                            <ul class="nav navbar-nav">
                                                            <li class="dropdown">
                                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Destination</a>
                                                            <ul class="dropdown-menu multi-column columns-3">
                                                            <div class="row mr-0 ml-0">
                                                            <div class="col-sm-4 pr-0 pl-0">
                                                            <ul class="multi-column-dropdown">
                                                                <?php foreach($object->findAllPlaceses() as $placeDta) { ?>
                                                                <li><a href="#"><?= $placeDta['place'] ?></a></li>
                                                                <?php }?>

                                                            </ul>
                                                            </div>                                                            
                                                           
                                                            </div>
                                                            </ul>
                                                            </li>
                                                            </ul>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <div class="t-datepicker">
                                                                <div class="t-check-in"></div>
                                                                <div class="t-check-out"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div class="panel-dropdown">
                                                            <a href="#">Guests <span class="qtyTotal">1</span></a>
                                                            <div class="panel-dropdown-content">

                                                                <div class="qtyButtons">
                                                                    <label>Adults</label>
                                                                    <input type="text" name="qtyInput" value="1">
                                                                </div>
                                                                <div class="qtyButtons">
                                                                    <label>Childrens</label>
                                                                    <input type="text" name="qtyInput" value="0">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <input type="submit" class="btn_search" value="Search">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container slide-tabbar">
                            <div class="swiper-container gallery-thumbs tab-text">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <p>Homestays</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <p>Resorts</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <p>jungle Lodges</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container searchbox">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h3>Plan your next weekend </h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <div id="unique" class="explor-sec margin_80_0">
                <div class="container clearfix">
                    <h1>Explore BookHomestays.in</h1>
                    <div class="row">
                        <?php foreach ($object->findAllExploreBookHomestays() as  $ExpBookHmSty) { ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                            <div class="explor-media">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="../site_images/main_category/<?= $ExpBookHmSty['promo_image'];?>" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <?php if($ExpBookHmSty['cname']=='Food Blog') {?>
                                        <h5 class="mt-0"><a href="allFoodBlogs" style="color: #333;" onMouseOver="this.style.color='#fc5b62'"
                                          onMouseOut="this.style.color='#333'" ><?= $ExpBookHmSty['cname'];?></a></h5>
                                        <?php } else { ?>
                                        <h5 class="mt-0"><?= $ExpBookHmSty['cname'];?></h5>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <div class="location-sec">
                <div class="container">
                    <h1>Must not miss locations in Karnataka</h1>
                    <p>Explore new locations and book your stays around them</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="location-slider">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php foreach ($object->findAllPlace() as $placeData) { 
                                            $listPrice=$object->findListPriceByPlace($placeData['id']);
                                            ?>
                                        <div class="swiper-slide">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="mustlocation_search?pid=<?= base64_encode($placeData['id']);?>">
                                                        <img src="../placebanner/<?= $placeData['banner'];?>" alt="" />
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3><?= $placeData['place'];?></h3>
                                                    <p>From <?= $listPrice['price']?>/- per night</p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
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
                    <p>Confused on where to go ? Pick according to your mood</p>
                    <div class="row">
                    <div class="col-12">
                    <div class="holiday-slider">
                        <div class="swiper-container">
                        <div class="swiper-wrapper">
                        <?php foreach ($object->findAllHolidaySpot() as $holidayCategory) {
                        	  $listPriceHS=$object->findListPriceByHolidaySpot($holidayCategory['id']);
                        	?>
                        <div class="swiper-slide">
                            <div class="holidayspot-list">
                                <div class="team-block">
                                    <div class="parent">
                                        <div class="child">
                                            <img src="../site_images/holiday_category/<?= $holidayCategory['image'];?>" alt="" />
                                            <a href="holiday_search?hi=<?= base64_encode($holidayCategory['id'])?>"><?= $holidayCategory['holiday_category'];?></a>
                                        </div>
                                    </div>
                                    <div class="team-info text-left">
                                        <p>Starting from <?= $listPriceHS['price']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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
                                    <?php foreach ($object->findAllHomesComforts() as  $HomesComfort) {
                                    	$listPriceHC=$object->findListPriceByHomesComforts($HomesComfort['id']);
                                     ?>
                                        <div class="swiper-slide">
                                            <div class="holidayspot-list">
                                                <div class="team-block">
                                                    <div class="parent">
                                                        <div class="child">
                                                            <img src="../site_images/comfort_category/<?= $HomesComfort['image'];?>" alt="" />
                                                            <a href="comfort_search?cid=<?= base64_encode($HomesComfort['id'])?>"><?= $HomesComfort['name'];?></a>
                                                        </div>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <p>Starting from <?= $listPriceHC['price'];?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

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
                        <h1>Experience with the Stars</h1>
                        <p>See what your favourite actors has to say about Holidays in Karnataka </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="experience-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($object->findAllExperiencewithDaStars() as  $sE) {
                                             ?>
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="starExprience?stId=<?=base64_encode($sE['id'])?>">
                                                            <img src="../superstar_pic/<?= $sE['image'];?>" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <p><?=  $sE['title'];?></p>
                                                    </div>
                                                </div>
    
                                            </div>
                                        <?php } ?>

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
                                    <h3>Why Homestays ??? </h3>
                                    <p style="font-size: 15px;">There’s a saying that goes, “Athithi Devo Bhava”, which means “The Guest is God”. Indians consider it a huge honor to have guests in their home, and go out of their way to please them. There’s nothing like Indian hospitality. No one knows a place better than the local occupants, and by staying with someone local you have access to the best information on the place . Homestay owners make it their business to know more about the local area so that they can point out shortcuts and scenic routes to their guests, making exploring all the more convenient.
                                    </p>
                                    <p style="font-size: 15px;">Homestays are best for Authentic Home Cooked Food , personalized services , pocket friendly rates , forming unlikely friendships , peaceful and quiet places and it goes on ….</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                                <div class="block-reveal box-two">
                                    <img src="images/works_image1.jpg" />
                                </div>
                        </div>
                    </div>
                    </div>
            </div>

            <div class="location-sec toprated-sec">
                    <div class="container">
                        <h1>Top – rated Experience</h1>
                        <p>Experience Karnataka with top-rated activites at the homestays</p>
                        <div class="row">
                          <div class="col-12">
                            <div class="toprated-slider">
                            <div class="swiper-container">
                            <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/concord-For-Making-Homemade-Wine.png" alt="" />
                                                <a href="#">Wine making at coorg homestay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/homemade-Chocolates.jpg" alt="" />
                                                <a href="#">Home made chocolates in coorg</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/barbeque.jpg" alt="" />
                                                <a href="#">Barbeque night at chikmagalur</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/homemade-Chocolates.jpg" alt="" />
                                                <a href="#">Home made chocolates in coorg</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-1.jpg" alt="" />
                                                <a href="#">Wine making at coorg homestay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-2.jpg" alt="" />
                                                <a href="#">Home made chocolates in coorg</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-4.jpg" alt="" />
                                                <a href="#">Wine making at coorg homestay</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-5.jpg" alt="" />
                                                <a href="#">Home made chocolates in coorg</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-1.jpg" alt="" />
                                                <a href="#">Home made chocolates in coorg</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-2.jpg" alt="" />
                                                <a href="#">Piligrimage</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="holidayspot-list">
                                    <div class="team-block">
                                        <div class="parent">
                                            <div class="child">
                                                <img src="images/destination-4.jpg" alt="" />
                                                <a href="#">Home made chocolates in coorg</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <?php foreach ($object->findAllPropertyHiRating() as  $TopPropert) {?>
                                            <div class="swiper-slide">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="search-details?pri=<?= base64_encode($TopPropert['id'])?>">
                                                            <img src="../propertypic/<?= $TopPropert['image'];?>" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3><?= $TopPropert['hotel_name'];?></h3>
                                                        <p>From <?= $TopPropert['price'];?>/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar"><?= $TopPropert['rating'];?> Stars</a></li>
                                                            <?php if( $TopPropert['rating']=='3') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $TopPropert['rating']=='3.5') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $TopPropert['rating']=='4') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $TopPropert['rating']=='4.5') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star-half-o"></i></li>
                                                            <?php } ?>
                                                            <?php if( $TopPropert['rating']=='5') {?>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <li><i class="la la-star"></i></li>
                                                            <?php } ?>

                                                        </ul>
                                                    </div>
                                                </div>    
                                            </div>
                                           <?php } ?>

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

            <div class="location-sec bigday-sec">
                    <div class="container">
                        <h1>Don’t miss Out on the big day</h1>
                        <p>Events and fun </p>
                        <div class="row">
                          <div class="col-12"> 
                            <div class="missbigday-slider">
                                <div class="swiper-container">
                                <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <h3>Occurs On 01/01/2019</h3>
                                            <img src="images/destination-2.jpg" alt="" />
                                            <div class="team-info text-left">
                                            <p>Dussera in mysore</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                        <div class="holidayspot-list">
                                            <div class="team-block">
                                                <h3>Occurs On 01/01/2019</h3>
                                                <img src="images/destination-3.jpg" alt="" />
                                                <div class="team-info text-left">
                                                <p>Dussera in mysore</p>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="swiper-slide">
                                            <div class="holidayspot-list">
                                                <div class="team-block">
                                                    <h3>Occurs On 01/01/2019</h3>
                                                    <img src="images/destination-1.jpg" alt="" />
                                                    <div class="team-info text-left">
                                                    <p>Dussera in mysore</p>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                <div class="swiper-slide">
                                                <div class="holidayspot-list">
                                                    <div class="team-block">
                                                        <h3>Occurs On 01/01/2019</h3>
                                                        <img src="images/destination-2.jpg" alt="" />
                                                        <div class="team-info text-left">
                                                        <p>Dussera in mysore</p>
                                                        </div>
                                                    </div>
                                                </div>
                                </div>
                                <div class="swiper-slide">
                                                    <div class="holidayspot-list">
                                                        <div class="team-block">
                                                            <h3>Occurs On 01/01/2019</h3>
                                                            <img src="images/destination-4.jpg" alt="" />
                                                            <div class="team-info text-left">
                                                            <p>Dussera in mysore</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                </div>
                                <div class="swiper-slide">
                                                        <div class="holidayspot-list">
                                                            <div class="team-block">
                                                                <h3>Occurs On 01/01/2019</h3>
                                                                <img src="images/destination-5.jpg" alt="" />
                                                                <div class="team-info text-left">
                                                                <p>Dussera in mysore</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                </div>    
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
                        <p>A home just away from you home experiences</p>
                        <div class="row">
                        <div class="col-12"> 
                        <div class="superhost-slider">
                            <div class="swiper-container">
                            <div class="swiper-wrapper">   
                            <div class="swiper-slide">
                                <div class="visit-karnataka">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="#">
                                                    <img src="images/prof-avail-img.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>Mr.Robert</h3>
                                                <p>10 years of hosting experience</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="visit-karnataka">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="#">
                                                    <img src="images/prof-avail-img2.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>Mr.Williams</h3>
                                                <p>10 years of hosting experience</p>
                                            </div>
                                       </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                    <div class="visit-karnataka">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/prof-avail-img3.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>Mr.Rick</h3>
                                                    <p>10 years of hosting experience</p>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="swiper-slide">
                                    <div class="visit-karnataka">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/prof-avail-img4.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>Mr.Robert</h3>
                                                    <p>10 years of hosting experience</p>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="visit-karnataka">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="#">
                                                    <img src="images/prof-avail-img5.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>Mr.Williams</h3>
                                                <p>10 years of hosting experience</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                    <div class="visit-karnataka">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/prof-avail-img6.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>Mr.Robert</h3>
                                                    <p>10 years of hosting experience</p>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="visit-karnataka">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="#">
                                                    <img src="images/prof-avail-img7.jpg" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>Mr.Williams</h3>
                                                <p>10 years of hosting experience</p>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                    <div class="visit-karnataka">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="#">
                                                        <img src="images/prof-avail-img8.jpg" alt="" />
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>Mr.Williams</h3>
                                                    <p>10 years of hosting experience</p>
                                                </div>
                                            </div>
                                    </div>
                            </div>           
                       
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
                        <p>Stays that own the seasons</p>
                        <div class="row">
                            <div class="col-12">
                                <div class="reasons-slider">
                                    <div class="swiper-container">
                                        <div class="swiper-wrapper">
                                            <?php foreach ($object->findAllSeasons() as $seasons) { ?>
                                            <div class="swiper-slide">
                                                <div class="holidayspot-list">
                                                    <div class="team-block">
                                                        <div class="parent">
                                                            <div class="child">
                                                                <img src="../site_images/season_category/<?= $seasons['image'];?>" alt="" />
                                                                <a href="seasion_search?sid=<?= base64_encode($seasons['id'])?>">Homestays to visit in "<?= $seasons['name'];?>"</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
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
            <div class="call_section" id="host">
                    <div class="container clearfix">
                        <div class="col-lg-6 col-md-6 float-right">
                            <div class="block-reveal">
                                <div class="block-vertical"></div>
                                <div class="box_1">
                                    <h3>Want to host your own Homestay?</h3>
                                    <p>Ius cu tamquam persequeris, eu veniam apeirian platonem qui, id aliquip voluptatibus pri. Ei mea primis ornatus disputationi. Menandri erroribus cu per, duo solet congue ut. </p>
                                    <div id="newsletter">
                                        <a href="login.html" class="btn_1 btn-rounded">Host Now!</a>
                                    </div>
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