


<?php $__env->startSection('title', 'Admin-Dashboard'); ?>

<?php $__env->startSection('sidebar'); ?>
    ##parent-placeholder-19bd1503d9bad449304cc6b4e977b74bac6cc771##
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
	        <li><a href="#">Home</a></li>                    
	        <li class="active">Dashboard</li>
	    </ul>
	    <!-- END BREADCRUMB -->   
<?php
		
		
		$req = DB::table('booking')
			->where('booking_status',1)
			->get();
			
		 $countreq = count($req);
		 
		 $conf = DB::table('booking')
			->where('booking_status',2)
			->get();
			
			
			$sum = DB::table('booking')
			->where('booking_status',2)
		    //->where('payment_status',2)
		    ->sum('amount');
		    
        ?>		
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	        <!-- START WIDGETS -->

<div class="row">

	            <div class="col-md-3">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Requested</div>

	                            <div class="widget-subtitle">Details</div>

	                            <div class="widget-int"><?php echo e($countreq); ?></div>

	                        </div>

	                       

	                    </div>                            

	                                      

	                </div>         

	                <!-- END WIDGET SLIDER -->

	                

	            </div>

	            <div class="col-md-3">

	                

	                <!-- START WIDGET SLIDER -->

	                <div class="widget widget-default widget-carousel">

	                    <div class="owl-carousel" id="owl-example">

	                       

	                        <div>                                    

	                            <div class="widget-title">Confirmed</div>

	                            <div class="widget-subtitle">Details</div>

	                            <div class="widget-int"><?php echo e(count($conf)); ?></div>

	                        </div>

	                       

	                    </div>                            

	                                      

	                </div>         

	                <!-- END WIDGET SLIDER -->

	                

	            </div>

	            <div class="col-md-3">

	                

	                <!-- START WIDGET REGISTRED -->

	                <div class="widget widget-default widget-item-icon" onclick="location.href='pages-address-book.html';">

	                    <div class="widget-item-left">

	                        <span class="fa fa-rupee"></span>

	                    </div>

	                    <div class="widget-data">

	                        <div class="widget-int num-count"><?php echo e($sum); ?></div>

	                        <div class="widget-title">Total Transaction</div>

	                        <div class="widget-subtitle">Details</div>

	                    </div>

	                    <div class="widget-controls">                                

	                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>

	                    </div>                            

	                </div>                            

	                <!-- END WIDGET REGISTRED -->

	                

	            </div>

	            <div class="col-md-3">

	                

	                <!-- START WIDGET CLOCK -->

	                <div class="widget widget-danger widget-padding-sm">

	                    <div class="widget-big-int plugin-clock">00:00</div>                            

	                    <div class="widget-subtitle plugin-date">Loading...</div>

	                    <div class="widget-controls">                                

	                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>

	                    </div>                            

	                    <div class="widget-buttons widget-c3">

	                        <div class="col">

	                            <a href="#"><span class="fa fa-clock-o"></span></a>

	                        </div>

	                        <div class="col">

	                            <a href="#"><span class="fa fa-bell"></span></a>

	                        </div>

	                        <div class="col">

	                            <a href="#"><span class="fa fa-calendar"></span></a>

	                        </div>

	                    </div>                            

	                </div>                        

	                <!-- END WIDGET CLOCK -->

	                

	            </div>

	    </div>
		
		
		<div class="row">
		
		<div class="col-md-12">
                            
                            <!-- START PROJECTS BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Bookings</h3>
                                        <span>Bookings activity</span>
                                    </div>                                    
                                    <ul class="panel-controls" style="margin-top: 2px;">
                                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                                            <ul class="dropdown-menu">
                                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                                            </ul>                                        
                                        </li>                                        
                                    </ul>
                                </div>
                                <div class="panel-body panel-body-table">
                                    
                                    <div class="table-responsive">
                                        <table class="table table-condensed table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Property</th>
													<th>Date</th>
                                                    <th>Status</th>
                                                    <th>Activity</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $data = DB::table('booking')->get();
			                                                    
			                                    
			                                    ?>
                                                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $sql = DB::table('properties')
			                                                    ->where('id',$row->property_id)
			                                                    ->first();
			                                    $bstatus = $row->booking_status;
			                                    if($bstatus==1){ $status = 'Requested'; $stclass = 'primary'; $bar = 'warning'; $per='85%'; }
			                                    
			                                    else{ $status = 'Confirmed';  $stclass = 'info'; $bar = 'success'; $per='100%'; }
                                                ?>
                                                
                                                <tr>
                                                    <td><strong><?php echo e($sql->hotel_name); ?></strong></td>
                                                    
                                                    <td>
													<span class="label label-danger"><?php echo e($row->datefrom); ?></span>
													<span class="label label-danger"><?php echo e($row->dateto); ?></span>
													</td>
													<td><span class="label label-<?php echo e($stclass); ?>"><?php echo e($status); ?></span></td>
                                                    <td>
                                                        <div class="progress progress-small progress-striped active">
                                                            <div class="progress-bar progress-bar-<?php echo e($bar); ?>" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo e($per); ?>;"><?php echo e($per); ?></div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                                                              
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <!-- END PROJECTS BLOCK -->
                            
                        </div>
		</div>			
	        				
	        
	        <!-- END WIDGETS -->                    
	        	        
	        
	        
	                           
	        <!-- END DASHBOARD CHART -->
	        
	    </div>
	    <!-- END PAGE CONTENT WRAPPER -->                                
	
    
<?php $__env->stopSection(); ?>

<?php $__env->startSection('supporting_files'); ?>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>