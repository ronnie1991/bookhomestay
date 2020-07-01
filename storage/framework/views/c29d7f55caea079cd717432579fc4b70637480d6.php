<!DOCTYPE html>
<html lang="en" class="body-full-height">
    
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>        
        <!-- META SECTION -->
        <title>Host Login Panel</title>            
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
        
        <div class="login-container" style="background-image:url(<?php echo e(asset('user_files/images/happyKids.jpg')); ?>);height: 500px;background-position: center;background-repeat: no-repeat;background-size: cover;">
        
            <div class="login-box animated fadeInDown">
              
               <div class="col-sm-12">
                       <?php if(session('status')): ?>
                           <?php if(session('code')): ?>
                               <div class="alert alert-<?php echo e(session('code')); ?> text-center" >
                           <?php else: ?>
                               <div class="alert alert-success text-center" >
                           <?php endif; ?>                          
                               <?php echo e(session('status')); ?>

                           </div>
                       <?php endif; ?>
               </div>
                <div class="login-body" style="background: rgb(44, 46, 72);border-radius: 3px 3px 0px 0px;" >

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>


                    <div class="login-title">Login as a <strong>host</strong></div>
                    <form action="<?php echo e(url('host/dologin')); ?>" class="form-horizontal" method="post">
                        <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" name="email" value="<?php echo e(old('email')); ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo e(old('password')); ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-4">
                            <a href="#" class="btn btn-link btn-block">Forgot password?</a>
                        </div>
                         <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-info btn-block" style="background-color: darkcyan;border-color: #1de2e2;" >Log In</button>
                        </div>
                    </div>
                    </form>
                  
                     <div class="col-sm-6" style="margin-top: 12px;">
                            <a href="<?php echo e(url('host/sign-up')); ?>" class="btn btn-link btn-block">Not registered as a host yet ?   <span style="text-decoration: underline;    margin-left: 6px;">  Register Now !</span></a>
                        </div>
                      
                    
                </div>
                <div class="login-footer" style="background: darkcyan;border-radius: 0px 0px 1px 1px;">
                    <div class="pull-left">
                        &copy; 2019 Home Stay
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo e(url('')); ?>">Home</a>
                      <a href="<?php echo e(url('contact/')); ?>" style="margin-left: 10px;">Contact Us</a>
                    </div>
                    
                </div>
            </div>
            
        </div>
        
    </body>

</html>






