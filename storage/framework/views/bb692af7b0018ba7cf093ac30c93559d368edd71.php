<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
		<?php /* ?>[place] => 1 [property] => 1 [rank] => 1 [similar_listings] => [id] => 2 [name] => First Experience Added [title] => Title check [image] => Lighthouse.jpg [description]   
		<?php */ ?>
					
			<div class="location-sec recommended-sec" style="margin-top:50px !important;">
                    <div class="container">
					<?php $__currentLoopData = $toprated_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php
						$place = DB::table('place')->where('id',$pp->place)->first();
					?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <h1 style="text-align: center;"> Things to do in  <?php echo e($place->place); ?></h1>
					
                        <div class="row">
                            
							<?php $__currentLoopData = $toprated_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exfbd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php
								
							?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="<?php echo e(url('/topexp_details_front/'.$exfbd->id)); ?>">
                                                    
                                                    <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($exfbd->image); ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3><?php echo e($exfbd->name); ?></h3>
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