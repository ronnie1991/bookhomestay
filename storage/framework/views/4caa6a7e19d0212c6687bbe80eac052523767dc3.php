<!DOCTYPE html>
<html lang="en">

<?php echo $__env->make('user.head', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body>
    <div id="page" class="theia-exception">
        <?php echo $__env->make('user.header', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <main>
            <div class="container-fluid smap-sec margin_80_0" style="margin-top:50px;" >
                <h1><?php echo "Homestays that own the seasons"; ?></h1>
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                               <?php $__currentLoopData = $allBigDataData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allBigDayDetils): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                <div class="col-sm-6 col-md-4">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="<?php echo e(url('/bigday/'.$allBigDayDetils->id)); ?>" >   
                                                <img src="<?php echo e(asset('superstar_pic')); ?>/<?php echo e($allBigDayDetils->image); ?>" class="img-fluid" alt="" width="800" height="533">
                                                <div class="read_more"><span>Explore</span></div></a>
                                              <?php
                                              $placeDtls = DB::table('place')->where('id',$allBigDayDetils->placeid)->first();
                                              ?>
                                                <small><?php echo e($placeDtls->place); ?></small>
                                        </figure>
                                       <ul>
                                            <li><i class="la la-bookmark-o" style="font-size: 19px;"><?php echo e($allBigDayDetils->title); ?></i>  </li>
                                            
                                            <li><div class="score"><span><i class="la  la-calendar" style="font-size: 19px;"></i><?php echo e(date('d M Y', strtotime($allBigDayDetils->date))); ?></span></div></li>
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