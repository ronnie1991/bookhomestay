<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
		<?php /* ?>[id] => 16
                    [placesto_see_id] => 18
                    [placeid] => 3
                    [similar_listings] =>   
		<?php */ ?>
					
			<div class="location-sec recommended-sec" style="margin-top:50px !important;">
                    <div class="container">
                        
					
                        <h1 style="text-align: center;">Homestays in <?php echo e($place->place); ?></h1>
                        
					
                        <div class="row">
                            
                            
                            
							<?php $__currentLoopData = $expAllHOmsty; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expHmStay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="<?php echo e(url('/searchDetails/'.$expHmStay->id.'')); ?>" target="_blank">
                                                    
                                                    <img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($expHmStay->image); ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3><?php echo e($expHmStay->hotel_name); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
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