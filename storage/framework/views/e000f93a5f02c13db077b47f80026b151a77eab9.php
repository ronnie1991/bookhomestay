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
	        <h2><span class="fa fa-cogs"></span>Property & Room details</h2>
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
				<?php $__currentLoopData = $property_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $properties): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<?php
				$i++;
				$getplace = DB::table('place')->where('id',$properties->placeid)->first();
				$gethost = DB::table('host')->where('id',$properties->hostid)->first();
				$getholiday = DB::table('holiday_categories')->where('id',$properties->holiday_category)->first();
				$getcomfort = DB::table('comfort_categories')->where('id',$properties->confort_id)->first();
				$getmain = DB::table('main_categories')->where('id',$properties->main_category)->first();
				$getseason = DB::table('seasons')->where('id',$properties->season_id)->first();
				
				$hh = $properties->holiday_category;
				
				
				?>					
									
			
	         <div class="row">
                        <div class="col-md-9">
						 <!-- START HORIZONTAL FORM SAMPLE -->
                            <div class="panel panel-default">
                                <div class="panel-body">
								
								<form class="form-horizontal" action="<?php echo e(url('admin/updateproperty')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                            <input type="hidden" name="pid" value="<?php echo e($properties->id); ?>"/>                    
                                   <h3>Details of Propety Id: <?php echo e($properties->id); ?></h3>
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Available Status</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<?php
											if($properties->available_status==0)
											{ ?>
												
												<a href="" class="btn btn-success btn-xs" role="button">Available</a>
											<?php 
											}
											else{
											?>
											<a href="" class="btn btn-primary btn-xs" role="button">NA</a>
											<?php 
											}
											?>
												</p>
                                            </div>
                                        </div>
								   
								   
                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Place</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<select class="form-control select" name="place">
													<option value="<?php echo e($properties->placeid); ?>"><?php echo e($getplace->place); ?></option>
													<?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $placelist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($placelist->id); ?>"><?php echo e($placelist->place); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
												</p>
                                            </div>
                                        </div>
                                        
                                      
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Host</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<select class="form-control select" name="host">
													<option value="<?php echo e($properties->hostid); ?>"><?php echo e($gethost->name); ?></option>
													<?php $__currentLoopData = $host; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hostlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($hostlist->id); ?>"><?php echo e($hostlist->name); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
												</p>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Manual Property Id</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="manual_pro_id" value="<?php echo e($properties->manual_pro_id); ?>" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Main Category</label>
                                            <div class="col-md-8">
                                               
											   
											    <p class="form-control-static">
												<select class="form-control select" name="main_category">
													<option value="<?php echo e($properties->main_category); ?>"><?php echo e($getmain->cname); ?></option>
													<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<option value="<?php echo e($catlist->id); ?>"><?php echo e($catlist->cname); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</p>				
												</select>
                                            
                                            </div>
                                        </div>			

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Holiday Category</label>
                                            <div class="col-md-8">
                                            	
											<?php
											
											?>
											<?php $__currentLoopData = $holiday; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $holidays): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php
											$focus=explode(",",$properties->holiday_category);
											
											
											?>
												<label class="check">
													<?php if(in_array($holidays->id, $focus)): ?>
													    <input type="checkbox" checked value="<?php echo e($holidays->id); ?>" name="holiday[]"><?php echo e($holidays->holiday_category); ?>

													<?php else: ?>
													    <input type="checkbox" value="<?php echo e($holidays->id); ?>" name="holiday[]" ><?php echo e($holidays->holiday_category); ?>

													<?php endif; ?>
												</label>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
                                        </div>

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Comfort Category</label>
                                            <div class="col-md-8">
											
                                            <?php $__currentLoopData = $comfort_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comfort_categoriesss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php
											$focus2=explode(",",$properties->confort_id);
											?>
												<label class="check">
													<?php if(in_array($comfort_categoriesss->id, $focus2)): ?>
													    <input type="checkbox" checked value="<?php echo e($comfort_categoriesss->id); ?>" name="comfort[]"><?php echo e($comfort_categoriesss->name); ?>

													<?php else: ?>
													    <input type="checkbox" value="<?php echo e($comfort_categoriesss->id); ?>" name="comfort[]" ><?php echo e($comfort_categoriesss->name); ?>

													<?php endif; ?>	
												</label>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
                                        </div>

										<div class="form-group">
                                            <label class="col-sm-4 control-label">Season Category</label>
                                            <div class="col-md-8">
                                               
											
											<?php $__currentLoopData = $season; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seasons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php
											$focus3=explode(",",$properties->season_id);
											?>
												<label class="check">
													<?php if(in_array($seasons->id, $focus3)): ?>
													    <input type="checkbox" checked value="<?php echo e($seasons->id); ?>" name="season[]"><?php echo e($seasons->name); ?>

													<?php else: ?>
													    <input type="checkbox" value="<?php echo e($seasons->id); ?>" name="season[]" ><?php echo e($seasons->name); ?>

													<?php endif; ?>
												
												</label>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Hotel Name</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="hname" value="<?php echo e($properties->hotel_name); ?>" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-4 control-label">Priority Level:</label>  
                                            <div class="col-md-8">
												<select class="form-control" name="rank">
												<option value="<?php echo e($properties->rank); ?>">Priority Level <?php echo e($properties->rank); ?></option>
													
													
														<option value="<?php echo e(1); ?>">Priority Level 1</option>
														<option value="<?php echo e(2); ?>">Priority Level 2</option>
														<option value="<?php echo e(3); ?>">Priority Level 3</option>
														<option value="<?php echo e(4); ?>">Priority Level 4</option>
														<option value="<?php echo e(5); ?>">Priority Level 5</option>
													
												
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-4 control-label">Rating:</label>                                        
                                            <div class="col-md-8">
                                                
												<select class="form-control" name="rating">
														<<option value="<?php echo e($properties->rating); ?>">Rating Level <?php echo e($properties->rating); ?></option>
														<option value="<?php echo e(1); ?>">Rating Level 1</option>
														<option value="<?php echo e(2); ?>">Rating Level 2</option>
														<option value="<?php echo e(3); ?>">Rating Level 3</option>
														<option value="<?php echo e(4); ?>">Rating Level 4</option>
														<option value="<?php echo e(5); ?>">Rating Level 5</option>
													
												
												</select>												
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Address</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                                <input type="text" class="form-control" name="address1" value="<?php echo e($properties->address); ?>" required id="postcode"/>  
											</p>
                                            </div>
                                        </div>
										
										<div class="form-group">
										
										<div class="col-md-3">
                                               
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="latitude" value="<?php echo e($properties->latitude); ?>" id="latitude" class="form-control" value="" >                                     
                                                
                                            </div>  
											<div class="col-md-3">
                                               
                                            </div>

											<div class="col-md-3">
                                                <input type="text" name="longitude" value="<?php echo e($properties->longitude); ?>" id="longitude" class="form-control" value="" >                                    
                                                
                                            </div>											
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Price</label>
                                            <div class="col-md-8">
											<p class="form-control-static">
                                               <input type="text" class="form-control" name="price" value="<?php echo e($properties->price); ?>" required id="postcode"/>  
											   </p>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Total Person</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												<input type="text" class="form-control" name="total_person" value="<?php echo e($properties->total_person_can_stay); ?>" required id="postcode"/> 
												</p>												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Cover Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												
												<img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($properties->image); ?>" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                    <label class="col-md-4 control-label">Change Cover Pic:</label>                                        
                                    <div class="col-md-8">
                                        <input type="file" class="fileinput btn-primary" name="image" title="Browse file"/>
                                    </div>
                                </div>
										
										
										<div class="form-group">
                                            <label class="col-sm-4 control-label">Food Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												
												<img src="<?php echo e(asset('propertypic')); ?>/<?php echo e($properties->food_image); ?>" alt="" height="60" width="120">
												</p>
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                    <label class="col-md-4 control-label">Change Food Menu Image:</label>                                        
                                    <div class="col-md-8">
                                        <input type="file" class="fileinput btn-primary" name="food_image" title="Browse file"/>
                                    </div>
                                </div>
								
								<div class="btn-group pull-right">
                                           <button class="btn btn-primary" name="submit" type="submit">Update</button>
                                        </div>
										
										
                                </form>                                                                                 
                                </div>
                            </div>
                            <!-- END HORIZONTAL FORM SAMPLE -->
						</div>
						
                    </div>
					
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    
                    <div id="propertyAmenities" class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Amenities</h3>
                                </div>    
                                <div class="panel-body">
                                    <?php $__currentLoopData = $amenities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amenity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $check = DB::table('property_amenities')->where(['property_id'=>$propertyId, 'amenity_id'=>$amenity->id])->first();
                                    ?>
                                    <div class="col-md-3">
                                        <label class="check">
                                            <?php if($check): ?>
                                                <input type="checkbox" class="amenity" checked value="<?php echo e($amenity->id); ?>" data-pid="<?php echo e($propertyId); ?>" name="amenities[]"> <?php echo e($amenity->aminities); ?>

                                            <?php else: ?>
                                                <input type="checkbox" class="amenity" value="<?php echo e($amenity->id); ?>" data-pid="<?php echo e($propertyId); ?>" name="amenities[]"> <?php echo e($amenity->aminities); ?>

                                            <?php endif; ?>	
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>              
                    </div>

                    <div id="propertyActivities" class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Activities</h3>
                                </div>    
                                <div class="panel-body">
                                    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $check = DB::table('property_activities')->where(['property_id'=>$propertyId, 'activity_id'=>$activity->id])->first();
                                    ?>
                                    <div class="col-md-3">
                                        <label class="check">
                                            <?php if($check): ?>
                                                <input type="checkbox" class="activity" checked value="<?php echo e($activity->id); ?>" data-pid="<?php echo e($propertyId); ?>" name="activities[]"> <?php echo e($activity->name); ?>

                                            <?php else: ?>
                                                <input type="checkbox" class="activity" value="<?php echo e($activity->id); ?>" data-pid="<?php echo e($propertyId); ?>" name="activities[]"> <?php echo e($activity->name); ?>

                                            <?php endif; ?>	
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>              
                    </div>

                    <div id="propertyPreferables" class="row"> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Personal Preferables</h3>
                                </div>    
                                <div class="panel-body">
                                    <?php $__currentLoopData = $preferables; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $preferable): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                    $check = DB::table('property_preferables')->where(['property_id'=>$propertyId, 'preferable_id'=>$preferable->id])->first();
                                    ?>
                                    <div class="col-md-3">
                                        <label class="check">
                                            <?php if($check): ?>
                                                <input type="checkbox" class="preferable" checked value="<?php echo e($preferable->id); ?>" data-pid="<?php echo e($propertyId); ?>" name="preferables[]"> <?php echo e($preferable->name); ?>

                                            <?php else: ?>
                                                <input type="checkbox" class="preferable" value="<?php echo e($preferable->id); ?>" data-pid="<?php echo e($propertyId); ?>" name="preferables[]"> <?php echo e($preferable->name); ?>

                                            <?php endif; ?>	
                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>              
                    </div>
					
			<div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Rooms Listings</h3>
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
                                           <th>Room name</th>
                                           <th>description</th>
                                           <th>aminities</th>
                                           <th>Price</th>
                                           <th>Status</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                <?php
				$i = 0;  				if(!empty($room_details))				{
				?>
				<?php $__currentLoopData = $room_details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rooms): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php
				$i++;
				
				
				?>	
				<?php 
				/*
				 [id] => 4
                    [property_id] => 1
                    [romm_name] => double bedded
                    [description] => jsghyjjghjfz
                    [image] => Homestays.jpg
                    [aminities] => 1,4,5
                    [price] => 1000
                    [status] => 1
				*/
				?>
									            
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td >
											<!---<img src="<?php echo e(asset('propertyrooms_pic')); ?>/<?php echo e($rooms->image); ?>" alt="" height="60" width="120">--->
											<img src="<?php echo e(asset('propertyrooms_pic')); ?>/<?php echo e($rooms->image); ?>" alt="" height="60" width="120">
											</td>
                                            <td ><?php echo e($rooms->romm_name); ?></td>
											<td ><?php echo $rooms->description; ?></td>
											<td ><?php echo e($rooms->aminities); ?></td>
											<td ><?php echo e($rooms->price); ?></td>
											<td >
											
												
												<?php
											if($rooms->status==0)
											{ ?>
												
												<a href="" class="btn btn-primary btn-xs" role="button">NA</a>
											<?php 
											}
											else{
											?>
											<a href="" class="btn btn-success btn-xs" role="button">Available</a>
											<?php 
											}
											?>
											
											<p><a href="<?php echo e(url('admin/room_editview/'.$rooms->id)); ?>" class="btn btn-primary btn-xs" role="button">Update</a></p>
												
											</td>
                                           
                                                             
                                        </tr>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                  				<?php } ?>
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
                    </div>
                </div>              
            </div>
			
			
			<div class="row"> 
                <div class="col-md-12">                            
                    <!-- START DATATABLE EXPORT -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Places To See Listings</h3>
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
                                           <th>PlacesId</th>
                                           <th>Image</th>
                                           <th>Place</th>
                                           <th>title</th>
                                           <th>Distance</th>
                                           <th>Description</th>
                                           
                                          
                                        </tr>
                                    </thead>
                                    <tbody>
									
									
									
									
										<?php
										$i = 0;  										if(!empty($placesto_see)){
										$placesto_see = explode(',', $properties->placesto_see);
										?>
										<?php $__currentLoopData = $placesto_see; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sight_scenes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
										<?php
										$i++;
										$getsiteid = DB::table('sightseen')->where('id',$sight_scenes)->first();
										$getplace = DB::table('place')->where('id',$getsiteid->placeId)->first();
			
										?>	
				
									            
                                        <tr>
                                            <td><?php echo e($sight_scenes); ?></td>
                                            <td >
											<img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($getsiteid->image); ?>" alt="" height="60" width="120">
											</td>
                                            <td ><?php echo e($getplace->place); ?></td>
											<td ><?php echo e($getsiteid->title); ?></td>
											<td ><?php echo e($getsiteid->distance); ?></td>
											<td ><?php echo $getsiteid->description; ?></td>
											
										
                                           
                                                             
                                        </tr>  
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>      										<?php } ?>
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

<script>
	$('#propertyAmenities .amenity').click(function(){
		var pid = $(this).data('pid');
		var amenityId = $(this).val();

		if($(this).is(':checked')){
			$.get('../set_property_amenity', {'propertyId': pid, 'amenityId': amenityId}, function(data){});
		}else{
			$.get('../unset_property_amenity', {'propertyId': pid, 'amenityId': amenityId}, function(data){});
		}
    });

    $('#propertyActivities .activity').click(function(){
		var pid = $(this).data('pid');
		var activityId = $(this).val();

		if($(this).is(':checked')){
			$.get('../set_property_activity', {'propertyId': pid, 'activityId': activityId}, function(data){});
		}else{
			$.get('../unset_property_activity', {'propertyId': pid, 'activityId': activityId}, function(data){});
		}
    });

    $('#propertyPreferables .preferable').click(function(){
		var pid = $(this).data('pid');
		var preferableId = $(this).val();

		if($(this).is(':checked')){
			$.get('../set_property_preferable', {'propertyId': pid, 'preferableId': preferableId}, function(data){});
		}else{
			$.get('../unset_property_preferable', {'propertyId': pid, 'preferableId': preferableId}, function(data){});
		}
    });
</script>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>