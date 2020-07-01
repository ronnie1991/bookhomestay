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
                  <img src="images/hero_in_bg_4.jpg" alt="" />      
                </div>
            </section>

            <div class="container-fluid smap-sec margin_80_0">
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                                <?php foreach ($object->findAllFoodBlogs() as  $foodBlog) { 
                                    $limFB=substr($foodBlog['description'],0,70);
                                    ?>                                    
                                <div class="col-sm-4 col-md-3">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="#0" class="wish_bt"></a>
                                            <a href="foodblog-details?fid=<?= base64_encode($foodBlog['id'])?>"><img src="../food_blog_pic/<?= $foodBlog['image'];?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Read more</span></div></a>
                                            <small><?= $foodBlog['title'];?></small>
                                        </figure>
                                        <div class="wrapper">
                                            <h3><a href="foodblog-details?fid=<?= base64_encode($foodBlog['id'])?>"><?= $foodBlog['name'];?></a></h3>
                                        </div>
                                        <ul>
                                            <p><?= $limFB;?>...</p>
                                        </ul>
                                    </div>
                                </div>
                              <?php } ?>
                                 
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