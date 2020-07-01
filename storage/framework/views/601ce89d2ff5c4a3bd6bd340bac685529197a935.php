<?php $__env->startSection('title', 'Admin-Edit Profile'); ?>



<?php $__env->startSection('sidebar'); ?>

    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##

<?php $__env->stopSection(); ?>







<?php $__env->startSection('content'); ?>



	    <!-- START BREADCRUMB -->

	    <ul class="breadcrumb">

	        <li><a href="#">Home</a></li>

            <li><a href="#">Pages</a></li>

            <li><a href="#">Edit Profile</a></li>

            <li class="active">admin@gmail.com</li>

	    </ul>

	    <!-- END BREADCRUMB -->                       

	    <!-- PAGE TITLE -->

	    <div class="page-title">                    

	        <h2><span class="fa fa-cogs"></span>Update Place</h2>

	    </div>

	    <!-- END PAGE TITLE -->                     

	    

	    <!-- PAGE CONTENT WRAPPER -->

	    <div class="page-content-wrap">

	        
	        <div class="col-sm-12">

                <div class="col-sm-4"></div>

                <div class="col-sm-4">

                    <?php if(session('status')): ?>                        

                        <div class="alert alert-<?php echo e(session('code')); ?> text-center" >                      

                            <?php echo e(session('status')); ?>


                        </div>

                    <?php endif; ?>

                    <?php if($errors->any()): ?>

                        <div class="alert alert-danger">

                            <ul>

                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <li><?php echo e($error); ?></li>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>

                        </div>

                    <?php endif; ?>

                </div>

               

                <div class="col-sm-4"></div>                    

            </div>

	         <div class="row">

                        

						

						 <div class="col-md-12">



                            <!-- START VALIDATIONENGINE PLUGIN -->

                            <div class="panel panel-default">

                                <div class="panel-body">                                    

                                    <h3>Update Place</h3>
									<?php 
									
									?>
									

                                    <form class="form-horizontal" action="<?php echo e(url('admin/updateplace')); ?>" method="post" enctype="multipart/form-data">

                                        <?php echo csrf_field(); ?>
										<input type="hidden" class="form-control" value="<?php echo e($data->id); ?>" name="placeid" required id="postcode"/> 
									
                                    <div class="panel-body">   

									

										<div class="form-group">

                                            <label class="col-md-3 control-label">Place Name:</label>                                        

                                            <div class="col-md-9">

                                                <input type="text" class="form-control" value="<?php echo e($data->place); ?>" name="placename" required id="postcode"/>                                        

                                                

                                            </div>

                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Place Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												
												<img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($data->banner); ?>" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>

										

										<div class="form-group">

											<label class="col-md-3 control-label">Upload New Image:</label>                                        

											<div class="col-md-3">

												<input type="file" class="fileinput btn-primary" name="image" title="Browse file"/>

											</div>

										</div>

										

                                      

                                        <div class="btn-group pull-right">

                                            <button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>

                                            <button class="btn btn-primary" name="submit" type="submit">Submit</button>

                                        </div>                                                                                                                          

                                    </div>                                               

                                    </form>
									
                                    

                                </div>

                            </div>                

                            <!-- END VALIDATIONENGINE PLUGIN -->



                        </div>

						

                    </div>

		</div>

	    <!-- END PAGE CONTENT WRAPPER -->     

<?php $__env->stopSection(); ?>



<?php $__env->startSection('supporting_files'); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeciEON29M-Sur2-bSOysbbDU9Eu71R0g&sensor=false&libraries=places"></script>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>