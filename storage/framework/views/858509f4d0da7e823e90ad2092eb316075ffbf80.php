<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>  
        
        <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fblist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55">
               
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($fblist->image); ?>" class="img-fluid" alt="" style="width:1200px;height:350px;" >
                           
                        </figure>
                         
                    </div>
                   
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <div class="bg_color_1" style="margin: 2px 0px 5px !important;">
            <div class="container margin_55">
               
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <div class="main_title_2" style="margin-bottom: 15px;">
                            <h4><?php echo e($fblist->name); ?></h4>
                            <p><?php echo e($fblist->title); ?></p>
                            </div>
                            
                           
                        </figure>
                        <span style="font-size: 15px;text-align: justify;" ><?php echo $fblist->description; ?></span>
                         
                    </div>
                   
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--/bg_color_1--> 

       
        <!-- /container -->  
		<?php
                                        $chk = DB::table('toprated_exp')->where('id',$topid)->first();
                                        
										if(!empty($chk->similar_listings)){
                                        ?>
		
		<div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Experience all of the above activities at :</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        
                                        <?php
                                        $fbd = DB::table('toprated_exp')->where('id',$topid)->first();
                                        $explodefbd = explode(",",$fbd->similar_listings);
                                        ?>
                                        
                                        <?php $__currentLoopData = $explodefbd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exfbd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $sls = DB::table('properties')->where('id',$exfbd)->first();
                                            ?>
                                            <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="<?php echo e(url('/searchDetails/'.$sls->id.'')); ?>">
                                                            <img src="<?php echo e(asset('propertypic/'.$sls->image.'')); ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3><?php echo e($sls->hotel_name); ?></h3>
                                                        <p>From <?php echo e($sls->price); ?>/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar"><?php echo e($sls->rating); ?> Stars</a></li>
                                                        </ul>
                                                    </div>
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
										<?php } ?>

        
          

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>