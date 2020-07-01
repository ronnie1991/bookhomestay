<?php $__env->startSection('title', 'Admin-Main Category Listings'); ?>

<?php $__env->startSection('sidebar'); ?>
    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

        <!-- START BREADCRUMB -->
        <ul class="breadcrumb">
            <li><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
            <li><a href="#">Property</a></li>                    
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
                            <h3 class="panel-title">Property Listings</h3>
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
                                           <th>Place</th>
                                           <th>Host</th>
                                           <th>Hotel Name</th>
                                           <th>Category</th>
                                           <th>Price</th>
                                           <th>Available Status</th>
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
									$i = 0;  
									?>
                                    <?php $__currentLoopData = $property; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php
									$i++;
									$getplace = DB::table('place')->where('id',$properties->placeid)->first();
									$gethost = DB::table('host')->where('id',$properties->hostid)->first();
									$getcategory = DB::table('main_categories')->where('id',$properties->main_category)->first();
                                    ?>
									<?php
										/*
										[id] => 1
										[placeid] => 3
										[hostid] => 1
										[main_category] => 1,2,3
										[holiday_category] => 1
										[confort_id] => 1
										[season_id] => 1
										[hotel_name] => test
										[address] => kolkata
										[latitude] => 22.225
										[longitude] => 58.235
										[price] => 20
										[rating] => null
										[image] => Screenshot 2015-10-10 12.44.38.png
										[available_status] => 0
										<?php /*<img src="{{ asset('site_images/holiday_category')}}/{{ $holidays->image }}" alt="" height="60" width="120">
										*/ 
										?>                
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td ><?php echo e($getplace->place); ?></td>
                                            
                                            <td ><?php echo e($gethost->name); ?></td>
											<td ><?php echo e($properties->hotel_name); ?></td>
											<td ><?php echo e($getcategory->cname); ?></td>
											<td ><?php echo e($properties->price); ?></td>
											<td >
											
											<?php
											if($properties->available_status==1)
											{ ?>
												
												<a href="<?php echo e(url('admin/change_property_status/'.$properties->id,'booking')); ?>" title="Make Available" class="btn btn-primary btn-xs" role="button">NA</a>
											<?php 
											}
											else{
											?>
											
											<a href="<?php echo e(url('admin/change_property_status/'.$properties->id,'booking')); ?>" title="Make NotAvailable" class="btn btn-success btn-xs" role="button">Available</a>
											
											<?php 
											}
											?>
											</td>
                                           
                                            <td>
                                                <!--<a href="" class="btn btn-primary btn-xs" role="button">Edit</a>-->
												<p><a href="<?php echo e(url('admin/delproperty/'.$properties->id)); ?>" class="btn btn-danger btn-xs" role="button">Delete</a></p>
												<p><a href="<?php echo e(url('admin/add_room_ui/'.$properties->id)); ?>" class="btn btn-primary btn-xs" role="button">Add Rooms</a></p>
												<p><a href="<?php echo e(url('admin/add_room_pics/'.$properties->id)); ?>" class="btn btn-primary btn-xs" role="button">Add Rooms Pics</a></p>
												<p><a href="<?php echo e(url('admin/addplacestosee_properties/'.$properties->id)); ?>" class="btn btn-primary btn-xs" role="button">Add Places To See</a></p>
												<p><a href="<?php echo e(url('admin/add_more_details/'.$properties->id)); ?>" class="btn btn-primary btn-xs" role="button">Add More Details</a></p>
												<p><a href="<?php echo e(url('admin/add_things_do_property/'.$properties->id)); ?>" class="btn btn-primary btn-xs" role="button">Things to do</a></p>
												<p><a href="<?php echo e(url('admin/property_details/'.$properties->id)); ?>" class="btn btn-primary btn-xs" role="button">Details</a></p>
												
                                                <?php /* ?>@if($promotion->activated == 1)

                                                    <a href="#" class="btn btn-success" role="button">Activated</a>
                                                @else
                                                    <a href="{{ url('admin/ActivatePromo/'.$promotion->id.'/1')}}" class="btn btn-info" role="button">Activate</a>

                                                @endif <?php */ ?>
                                                
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