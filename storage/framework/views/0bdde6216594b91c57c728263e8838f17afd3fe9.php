<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>

			
			<?php
			
			
			$sss = DB::table('sightseen')->where(['id'=>$plid])->get();
			?>
			<?php $__currentLoopData = $sss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pldeta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55" >
                <div class="main_title_2" style="margin-bottom: 15px;">
                    <h2><?php echo e($pldeta->title); ?></h2>
                    
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($pldeta->image); ?>" width="540px" height="365" style="float: left; margin: 4px 16px 2px 0px; border: 1px solid #0e0d0de6;" class="img-fluid" alt="">
                            <span style="font-size: 15px;text-align: justify;" ><?php echo $pldeta->description; ?></span>
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
		
		


        
            

    </main>

    <?php echo $__env->make('user.footer_content', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   <?php echo $__env->make('user.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>