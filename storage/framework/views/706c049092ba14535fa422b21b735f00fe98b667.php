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
	        <h2><span class="fa fa-cogs"></span>Add Places To See</h2>
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
	         <div class="row">
                        
						
						 <div class="col-md-12">

                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <h3>Add Place Details</h3>                                
                                    <form class="form-horizontal" action="<?php echo e(url('admin/insertplaces_details')); ?>" method="post" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                        <textarea  name="shortdescription" placeholder="Short Description" rows="5" cols="50" required></textarea>
                                        </div>
                                        <div class="form-group">
                                        <label>Long Description</label>
                                        <textarea class="summernote" name="description" placeholder="Long Description"></textarea>
                                           
                                        </div>
                                        <div class="form-group">
                                        <label>Place</label>
                                          <select name="place">	
                                          <?php $__currentLoopData = $place; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $places): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <option value="<?php echo e($places->id); ?>"><?php echo e($places->place); ?></option>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>								
                                          </select> 
                                          </div>
                                          <div class="form-group">
                                          <input type="text" class="form-control" name="title" placeholder="Enter title" required id="postcode"/> 
                                          </div>
                                          <div class="form-group">	
                                          <input type="text" class="form-control" name="distance" placeholder="Enter Distance" required id="postcode"/>
                                          </div>
                                          <div class="form-group">	
                                          <input type="file"  name="image" title="Browse file" required />  
                                          </div>
                                          <div class="btn-group pull-right">  
                                         
                                          <button class="btn btn-primary" name="submit" type="submit">Submit</button>
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