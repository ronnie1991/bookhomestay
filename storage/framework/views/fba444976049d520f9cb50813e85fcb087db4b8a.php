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
	        <h2><span class="fa fa-cogs"></span>Manage Aminities</h2>
	    </div>
	    <!-- END PAGE TITLE -->                     
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	        <!-- <div class="row">
	            <div class="col-md-12">
	                <div class="alert alert-warning" role="alert">
	                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">�</span><span class="sr-only">Close</span></button>
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
	         <div class="row">
                        
						
						 <div class="col-md-12">

                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <h3>Add Aminities</h3>                                
                                    <form class="form-horizontal" action="<?php echo e(url('admin/addaminities')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                    <div class="panel-body">   
									
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Aminities Name:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="aname" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Picture:</label>                                        
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
					
					
					
					<div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Aminities Listings</h3>
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                <ul class="dropdown-menu">
                                   
                                    
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});">
                                        <img src='<?php echo e(url('admin_files/img/icons/csv.png')); ?>' width="24"/> CSV
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});">
                                        <img src='<?php echo e(url('admin_files/img/icons/xls.png')); ?>' width="24"/> XLS
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});">
                                    <img src='<?php echo e(url('admin_files/img/icons/ppt.png')); ?>' width="24"/> PowerPoint
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});">
                                        <img src='<?php echo e(url('admin_files/img/icons/pdf.png')); ?>' width="24"/> PDF
                                    </a>
                                </li>
                                </ul>
                            </div>                                   
                            
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="customers2" class="table datatable">
                                    <thead>
                                        <tr>
                                           <th>Sl No</th>
                                           
                                           <th>Aminities Name</th>
										   <th>Image</th>
                                           
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $aminities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aminitieses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php $i++; ?>                
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td ><?php echo e($aminitieses->aminities); ?></td>
                                            <td >
											<p class="form-control-static">
												
												<img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($aminitieses->image); ?>" alt="" height="60" width="120">
												</p>
											</td>
                                            <td>
                                                <a href="<?php echo e(url('admin/editamenity/'.$aminitieses->id.'')); ?>" class="btn btn-danger" role="button">Edit</a>
                                            </td>                   
                                        </tr>  
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                         
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
	        

	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('supporting_files'); ?>

	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>