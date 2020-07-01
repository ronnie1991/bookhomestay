<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
            <div class="container-fluid smap-sec margin_80_0" style="margin-top:50px;" >
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                               <?php $__currentLoopData = $recomdProperty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allrecomandedPropDtls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                <div class="col-sm-6 col-md-4">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="<?php echo e(url('/searchDetails/'.$allrecomandedPropDtls->id.'')); ?>" target="_blank"><img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($allrecomandedPropDtls->image); ?>" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Explore</span></div></a>
                                        </figure>
                                        <div class="wrapper">
                                           <div class="rating">
                                                
                                            <?php if($allrecomandedPropDtls->rating=='3') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                             <?php } if($allrecomandedPropDtls->rating=='4') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i> 
                                                <?php } if($allrecomandedPropDtls->rating=='5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i> 
                                                <?php } ?>  
                                            </div>
                                            <h3><a href="<?php echo e(url('/searchDetails/'.$allrecomandedPropDtls->id.'')); ?>" target="_blank"><?php echo e($allrecomandedPropDtls->hotel_name); ?></a></h3>
                                            <span class="price">From <strong style="font-family: sans-serif;">&#8377;</strong> <?php echo e($allrecomandedPropDtls->price); ?>/per person</span>
                                        </div>
                                       <ul>
                                            <li><i class="la la-user" style="font-size: 19px;"><?php echo e($allrecomandedPropDtls->total_person_can_stay); ?></i><span style="padding: 2px;font-size: 12px;">Capacity</span>  </li>
                                              <?php
                                              $placeDtls = DB::table('place')->where('id',$allrecomandedPropDtls->placeid)->first();
                                              ?>
                                            <li><div class="score"><span><i class="la  la-map-marker" style="font-size: 19px;"></i><?php echo e($placeDtls->place); ?></span></div></li>
                                        </ul>
                                    </div>
                                </div>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                               </div>    
                            </div>
                            
                            

                        </div>
                        <!-- /row -->
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