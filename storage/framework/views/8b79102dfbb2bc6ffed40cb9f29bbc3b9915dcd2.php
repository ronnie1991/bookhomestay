<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main> 

		
        
        	<?php $__currentLoopData = $exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $superstars): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55" >
                <div class="main_title_2" style="margin-bottom: 15px;">
                    <h2><?php echo e($superstars->name); ?></h2>
                    <p><?php echo e($superstars->title); ?></p>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($superstars->image); ?>" class="img-fluid" width="300px" height="165" style="float: left; margin: 4px 16px 2px 0px; border: 1px solid #000000e6;" alt="">
                            <span style="font-size: 15px;text-align: justify;" ><?php echo $superstars->description; ?></span>
                        </figure>
                    </div>
                    
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--/bg_color_1-->  

       
        <!-- /container -->  
		
		<div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Experience these activities at : </h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
									<?php
                                $dd = DB::table('toprated_exp')->where('id',$expId)->first();
                                $exdd = explode(",",$dd->similar_listings);
                            ?>
                            
                            <?php $__currentLoopData = $exdd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $sls = DB::table('properties')->where('id',$exd)->first();
                                ?>
                                
                                <?php if(isset($sls->id)): ?>
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
                                <?php else: ?> 
                                    <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                    <div class="team-block">
                                        <div class="img-sec">
                                            <a href="#">
                                                <img src="#" alt="">
                                            </a>
                                        </div>
                                        <div class="team-info text-left">
                                            <h3></h3>
                                            <p>From /- per night</p>
                                            <ul class="ratingul">
                                                <li><a class="textstar"> Stars</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>
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


        
            

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>