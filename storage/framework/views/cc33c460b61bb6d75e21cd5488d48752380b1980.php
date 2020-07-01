<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <style type="text/css">
    .recommended-sec .ratingul li i {
    color: #008489 ;
    }
    </style>


<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>

            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                <div class="container clearfix">
                    <div class="row">
                    <div class="col-12">
                    <div class="explore-slider">
                    <div class="swiper-container">
                    <div class="swiper-wrapper">
            
                  <?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kc=>$mustnot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                    $getproperty = DB::table('properties')->where('placeId',$mustnot->id)->limit(1)->get();
                    ?>
                    <?php if(count($getproperty) > 0): ?>
            
          
                        <div class="swiper-slide">
                            <div class="explor-media">
                                <a href="#<?php echo e($kc); ?>" class="scroll-to">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="<?php echo e(asset('placebanner')); ?>/<?php echo e($mustnot->banner); ?>" alt="No image">
                                    <div class="media-body">
                                        <h5 class="mt-0"><?php echo e($mustnot->place); ?></h5>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                         <?php endif; ?>
          
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
                       
    
                    </div>
                    </div>
                    <div class="swiper-button-next swiper-button-disabled"></div>
                    <div class="swiper-button-prev swiper-button-disabled"></div>
                    </div>
                    </div>    
                    </div>
                </div>
            </div>
            
            <div class="location-sec recommended-sec" style="padding-top:0px !important;">
                    <div class="container">
                        <?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl=>$mustnot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php
                        $getproperty = DB::table('properties')->where('placeId',$mustnot->id)->limit(1)->get();
                        ?>
                        <?php if(count($getproperty) > 0): ?>
                            <div  id="<?php echo e($cl); ?>"></div>
                            <h1>Homestays in <?php echo e($mustnot->place); ?></h1>
                            <div class="row">
                                <?php
                                $getproperty = DB::table('properties')->where('placeid',$mustnot->id)->orderBy('id', 'desc')->get();
                                ?>
                                <div class="col-12">
                                    <div class="location-slider">
                                        <div class="swiper-container swiper-slider-<?php echo e($cl); ?>">
                                            <div class="swiper-wrapper">
                                               <?php $__currentLoopData = $getproperty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $showpro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="swiper-slide">
                                                    <div class="team-block">
                                                        <div class="box_grid">
                                                        <figure>
                                                         <a href="<?php echo e(url('/searchDetails/'.$showpro->id.'')); ?>" target="_blank">
                                                            <img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($showpro->image); ?>" alt="" />
                                                            </a>
                                                        <small><?php echo e($showpro->hotel_name); ?></small>
                                                     </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   

                                            </div>
                                            <!-- Add Pagination -->
                                        </div>
                                        <div class="swiper-button-next swiper-button-disabled swiper-slider-prev-<?php echo e($cl); ?>"></div>
                                        <div class="swiper-button-prev swiper-button-disabled swiper-slider-next-<?php echo e($cl); ?>"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                 <a class="show-all" href="<?php echo e(url('/explore_all_homestays/'.$mustnot->id)); ?>">Show all   <i class="la la-angle-right"></i></a>
                               </div> 
                            </div>
                            <br>
                            <hr>
                            <?php endif; ?>
                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div> 
            


            

    </div>

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

    <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cl=>$mustnot): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script>
        var locationSwiper<?php echo e($cl); ?> = new Swiper('.location-slider .swiper-slider-<?php echo e($cl); ?>', {
            slidesPerView: 3,
            spaceBetween: 30,
            // init: false,
            navigation: {
                nextEl: '.location-slider .swiper-slider-prev-<?php echo e($cl); ?>',
                prevEl: '.location-slider .swiper-slider-next-<?php echo e($cl); ?>',
            },
            breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            399: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            }
        });
    </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>

</html>