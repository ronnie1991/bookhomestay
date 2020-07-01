	

    <!DOCTYPE html>
    <html lang="en">
        
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>        
            <!-- META SECTION -->
            <title><?php echo $__env->yieldContent('title'); ?></title>            
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1" />
            
            <link rel="icon" href="favicon.ico" type="image/x-icon" />
            <!-- END META SECTION -->
            
            <!-- CSS INCLUDE -->        
            <link rel="stylesheet" type="text/css" id="theme" href="<?php echo e(asset('admin_files/css/theme-default.css')); ?>"/>
            <!-- EOF CSS INCLUDE -->                                      
    </head>

    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <?php $__env->startSection('sidebar'); ?>
                <?php echo $__env->make('admin.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldSection(); ?>
            
            <div class="page-content">
                
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                       
                    <!-- END SEARCH -->                    
                    <!-- POWER OFF -->
                    <li class="xn-icon-button pull-right last">
                        <a href="#"><span class="fa fa-power-off"></span></a>
                        <ul class="xn-drop-left animated zoomIn">
                            <li><a href="#"><span class="fa fa-lock"></span> Lock Screen</a></li>
                            <li>
                                <a href="<?php echo e(url('admin/logout')); ?>">
                                    <span class="fa fa-sign-out"></span>Sign Out
                                 </a>
                             </li>
                        </ul>                        
                    </li> 
                    <!-- END POWER OFF -->                    
                    <!-- MESSAGES -->
                    
                    
                    <!-- END TASKS -->
                    <!-- LANG BAR -->
                    
                    <!-- END LANG BAR -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->         


                <?php echo $__env->yieldContent('content'); ?>
            </div>

           
        </div>
        <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> 
        <?php echo $__env->yieldContent('supporting_files'); ?> 
    </body>    
   
</html>