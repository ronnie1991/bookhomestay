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
	        <h2><span class="fa fa-cogs"></span>Host details</h2>
	    </div>
	    <!-- END PAGE TITLE -->                     
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="alert alert-warning" role="alert">
	                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	                    <strong>Important!</strong> Main feature of this page is "Change photo" function. Press button "Change photo" and try to use this awesome feature.
	                </div>                            
	            </div>
	        </div> -->     
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
									
				
				
				
				<?php 
				/*
				[id] => 4
                    [placeid] => 1
                    [hostid] => 2
                    [main_category] => 1
                    [holiday_category] => 2
                    [confort_id] => 1
                    [season_id] => 2
                    [hotel_name] => Divya Shree
                    [address] => no 15, 1st main road, tata silk farm, basavanagudi, b-4
                    [latitude] => 12345
                    [longitude] => 6543
                    [price] => 5678
                    [rating] => null
                    [image] => Experiences.jpg
                    [available_status] => 0
				*/
				?>
				
				<?php
				$i = 0;  
				?>
				<?php $__currentLoopData = $host_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $host_details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				$i++;
				
				
				?>					
									
			
	         <div class="row">
			 <form class="form-horizontal" action="<?php echo e(url('admin/updatehostdetails')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>  
                        <div class="col-md-9">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                                                
                                   <h3>Details of Host Id: <?php echo e($host_details->id); ?></h3>
								   <input type="hidden" class="form-control" name="hostid" value="<?php echo e($host_details->id); ?>" required id="postcode"/> 
								   
								   <div class="form-group">
                                            <label class="col-sm-4 control-label">Host Name</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="name" value="<?php echo e($host_details->name); ?>" required id="postcode"/> 
												</p>												
                                            </div>
                                    </div>
									
									
									<div class="form-group">
                                            <label class="col-sm-4 control-label">Host Email</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="email" value="<?php echo e($host_details->email); ?>" required id="postcode"/> 
												</p>												
                                            </div>
                                    </div>
									
									
									<div class="form-group">
                                            <label class="col-sm-4 control-label">Host Phone</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="phone" value="<?php echo e($host_details->phone); ?>" required id="postcode"/> 
												</p>												
                                            </div>
                                    </div>
										
								   
								   
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Host Rank</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<select  name="rating" required>
													<option value="<?php echo e($host_details->rating); ?>"><?php echo e($host_details->rating); ?></option>
													<option value="<?php echo e(1); ?>">1</option>
													<option value="<?php echo e(2); ?>">2</option>
													<option value="<?php echo e(3); ?>">3</option>
													<option value="<?php echo e(4); ?>">4</option>
													<option value="<?php echo e(5); ?>">5</option>
																
												</select>
												</p>
                                            </div>
                                        </div>
                                        
                                     
									 
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Host Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<img src="<?php echo e(asset('host_pic')); ?>/<?php echo e($host_details->image); ?>" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
											<label class="col-md-4 control-label">Upload Image:</label>                                        
											<div class="col-md-8">
												<input type="file"  name="image" title="Browse file"/>
											</div>
										</div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Languages know </label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="languageKnow" value="<?php echo e($host_details->language_known); ?>" required /> 
												</p>												
                                            </div>
                                       </div>
                                       	<div class="form-group">
                                            <label class="col-sm-4 control-label">Hosting Since</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hostingSince" value="<?php echo e($host_details->hosting_since); ?>" required /> 
												</p>												
                                            </div>
                                       </div>
                                       
                                       <div class="form-group">
                                            <label class="col-md-3 control-label">Short Description</label>                                        
                                            <div class="col-md-9">
                                                <Textarea type="text" class="form-control" name="shortDescription" value="<?php echo e($host_details->short_description); ?>" rows="5" required >  
												<?php echo e($host_details->short_description); ?>

												</Textarea>
                                                
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Host View:</label>                                        
                                            <div class="col-md-9">
                                                <Textarea type="text" class="summernote" name="description" value="<?php echo e($host_details->view); ?>" rows="10" required  id="postcode">  
												<?php echo e($host_details->view); ?>

												</Textarea>
                                                
                                            </div>
                                        </div>
										
										
										<div class="btn-group pull-right">
                                            <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                        </div> 
										
										
                                                                                                                         
                                </div>
                            </div>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
					</form>
                    </div>
					
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
					
				
					
				
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('supporting_files'); ?><script>            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {                lineNumbers: true,                matchBrackets: true,                mode: "application/x-httpd-php",                indentUnit: 4,                indentWithTabs: true,                enterMode: "keep",                tabMode: "shift"                                                            });            editor.setSize('100%','420px');        </script>

	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>