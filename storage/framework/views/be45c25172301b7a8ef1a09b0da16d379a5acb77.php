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
	   
	    <div class="page-content-wrap">
	        
	        <div class="row">
	            <div class="col-md-12">
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
	            </div>
	        </div>


	         <div class="row">
                        
						
						 <div class="col-md-12">

                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <h3>Add Place</h3>                                
                                    <form class="form-horizontal" action="<?php echo e(url('admin/addplace')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                    <div class="panel-body">   
									
										<div class="form-group">
                                            <label class="col-md-3 control-label">Place Name:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="pname" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
											<label class="col-md-3 control-label">Image:</label>                                        
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
                            <h3 class="panel-title">Place Listings</h3>
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
                                           
                                           <th>Place Name</th>
                                           <th>Banner Pic</th>
                                           
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    <?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $places): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                         <?php $i++; ?>                
                                        <tr>
                                            <td><?php echo e($i); ?></td>
                                            <td ><?php echo e($places->place); ?></td>
                                            <td >
											<!---<img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($places->banner); ?>" alt="" height="60" width="120">--->
											<img src="<?php echo e(asset('placebanner')); ?>/<?php echo e($places->banner); ?>" alt="" height="60" width="120">
											</td>
                                           
                                            <td >
                                                <a href="<?php echo e(url('admin/placeEditview/'.$places->id)); ?>" class="btn btn-danger btn-xs" role="button">Edit</a>
												
                                               
                                                
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeciEON29M-Sur2-bSOysbbDU9Eu71R0g&sensor=false&libraries=places"></script>
	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script type="text/javascript">
  function initializeAutocomplete(){
    var input = document.getElementById('address');
    // var options = {
    //   types: ['(regions)'],
    //   componentRestrictions: {country: "IN"}
    // };
    var options = {}

    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();
      var placeId = place.place_id;
      // to set city name, using the locality param
      var componentForm = {
        locality: 'short_name',
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById("city").value = val;
        }
      }
      document.getElementById("latitude").value = lat;
      document.getElementById("longitude").value = lng;
      document.getElementById("location_id").value = placeId;
	  console.log(lat);
    });
  }
  
  
</script> 
 
  
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>