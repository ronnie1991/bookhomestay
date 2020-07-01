<?php $__env->startSection('title', 'Admin-Main Category Listings'); ?>

<?php $__env->startSection('sidebar'); ?>
    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
            <li><a href="#">Host</a></li>                    
            <li class="active">Lists</li>
        </ul>
        <!-- END BREADCRUMB -->                       
        
        <!-- PAGE CONTENT WRAPPER -->
        <div class="page-content-wrap">
            <div class="row"> 
                <div class="col-md-12">

                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <?php if(session('status')): ?>
                            <?php if(session('code')): ?>
                                <div class="alert alert-<?php echo e(session('code')); ?> text-center" >
                            <?php endif; ?>                          
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            
            <div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Host Listings</h3>
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
                                           <th>Image</th>
                                           <th>Host Name</th>
                                           <th>Email</th>
                                           <th>Phone</th>
                                           
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i = 0;  
									?>
                                    <?php $__currentLoopData = $host; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hosts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
									$i++;
									
                                    ?>
									<?php
										
										?>                
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td >
											<!--<img src="<?php echo e(asset('host_pic')); ?>/<?php echo e($hosts->image); ?>" alt="" height="60" width="120">-->
											<img src="<?php echo e(asset('host_pic')); ?>/<?php echo e($hosts->image); ?>" alt="" height="60" width="120">
											
											</td>
                                            <td ><?php echo e($hosts->name); ?></td>
											<td ><?php echo e($hosts->email); ?></td>
											<td ><?php echo e($hosts->phone); ?></td>
											
											<td >
											<?php
											if($hosts->status==0)
											{ ?>
												
												<a href="" class="btn btn-primary btn-xs" title="Make Deactive" role="button">Active</a>
											<?php 
											}
											else{
											?>
											<a href="" class="btn btn-success btn-xs" title="Make Active" role="button">Deactive</a>
											<?php 
											}
											?>
											
											<p><a href="<?php echo e(url('admin/update_host_view/'.$hosts->id)); ?>" class="btn btn-primary btn-xs" role="button">Update Details</a></p>
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
    <script type='text/javascript' src="<?php echo e(asset('admin_files/js/plugins/validationengine/languages/jquery.validationEngine-en.js')); ?>"></script>
    <script type='text/javascript' src="<?php echo e(asset('admin_files/js/plugins/validationengine/jquery.validationEngine.js')); ?>"></script>        

    <script type='text/javascript' src="<?php echo e(asset('admin_files/js/plugins/jquery-validation/jquery.validate.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/blueimp/jquery.blueimp-gallery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/bootstrap/bootstrap-select.js')); ?>"></script> 
    
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/tableexport/tableExport.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/tableexport/jquery.base64.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/tableexport/html2canvas.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/tableexport/jspdf/libs/sprintf.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/tableexport/jspdf/jspdf.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin_files/js/plugins/tableexport/jspdf/libs/base64.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>