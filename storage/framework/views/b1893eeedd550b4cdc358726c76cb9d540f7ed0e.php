<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
		
			<?php $__currentLoopData = $grace; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fblist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55">
                <div class="main_title_2" style="margin-bottom: 15px;">
                    <h2><?php echo e($fblist->title); ?></h2>
                </div>
               
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($fblist->image); ?>" class="img-fluid" alt="" style="width:1200px;height:350px;" >
                           
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
		$chk = DB::table('grace')->where('id',$graceid)->first();
              
		if(!empty($chk->similar_listings))
		{
			
		
		?>
		
		<div class="location-sec similar-listing recommended-sec" style="padding-top: 40px;">
                <div class="container">
                    <h1>Homestays near <?php echo e($fblist->title); ?></h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        
                                        <?php
                                        $fbd = DB::table('grace')->where('id',$graceid)->first();
                                        $explodefbd = explode(",",$fbd->similar_listings);
                                        ?>
                                        
                                        <?php $__currentLoopData = $explodefbd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exfbd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $sls = DB::table('properties')->where('id',$exfbd)->first();
                                            ?>
                                            <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="<?php echo e(url('/searchDetails/'.$sls->id.'')); ?>" target="_blank">
                                                            <img src="<?php echo e(asset('propertypic/'.$sls->image.'')); ?>" alt="">
                                                        
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3><?php echo e($sls->hotel_name); ?></h3>
                                                        <p>From <strong style="font-family: sans-serif;">&#8377;</span><?php echo e($sls->price); ?> per night</p>
                                                <div class="rating">
                                                <?php if($sls->rating=='1') { ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($sls->rating=='2') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($sls->rating=='3') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                             <?php } if($sls->rating=='4') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i> 
                                                <?php } if($sls->rating=='5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i> 
                                                <?php } ?>  
                                            </div>
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

		<?php
		
		}
		?>
        
            

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>