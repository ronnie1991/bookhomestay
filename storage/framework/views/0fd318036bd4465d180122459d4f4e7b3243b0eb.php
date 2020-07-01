<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main> 

            
            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                    <div class="container clearfix">                        
                    <h1>Our newly added super hosts</h1>
                        <div class="row">
                             <?php $__currentLoopData = $allSuperhost; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allSuperHostDataDtls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
                                               <a href="<?php echo e(url('/host_details/'.$allSuperHostDataDtls->id)); ?>">
                                                     <img src="<?php echo e(asset('host_pic')); ?>/<?php echo e($allSuperHostDataDtls->image); ?>" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3><?php echo e($allSuperHostDataDtls->name); ?></h3>
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