
@extends('admin.layouts.app')

@section('title', 'Admin-Edit Profile')

@section('sidebar')
    @parent
@endsection



@section('content')

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
	        <h2><span class="fa fa-cogs"></span>Add Property</h2>
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
                    @if (session('status'))                        
                        <div class="alert alert-{{session('code')}} text-center" >                      
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
               
                <div class="col-sm-4"></div>                    
            </div>
	         <div class="row">
                        
						
						 <div class="col-md-12">

                            <!-- START VALIDATIONENGINE PLUGIN -->
                            <div class="panel panel-default">
                                <div class="panel-body">                                    
                                    <h3>Add Property</h3>                                
                                    <form class="form-horizontal" action="{{ url('admin/addproperty') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                    <div class="panel-body">   
									
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Select Place:</label>  
                                            <div class="col-md-9">
												<select class="form-control select" name="place" required>
													<option value="">Please Select</option>
													@foreach($place as $places)
														<option value="{{ $places->id }}">{{ $places->place }}</option>
													@endforeach			
												</select>
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Select Host:</label>  
                                            <div class="col-md-9">
												<select class="form-control" name="host" required>
												<option value="">Please Select</option>
													@foreach($host as $hosts)
														<option value="{{ $hosts->id }}">{{ $hosts->name }}</option>
													@endforeach	
												
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Property Id:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="manual_pro_id" required id="pro_id"/>                                        
                                                
                                            </div>
                                        </div>
                                        <p id="vr"></p>
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Select Main Categories</label>
										<div class="col-md-6 col-xs-12">
											
											
											<select class="form-control" name="main_category" required>
												<option value="">Please Select</option>
													@foreach($categories as $category)
														<option value="{{ $category->id }}">{{ $category->cname }}</option>
													@endforeach	
												
												</select>
											
										</div>
										</div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Select Holiday Categories:</label>  
                                            <div class="col-md-9">
											@foreach($holiday as $holidays)											
												<label class="check">
											<input type="checkbox" name="holiday[]" value="{{ $holidays->id }}" class="icheckbox"/>{{ $holidays->holiday_category }}</label>
											@endforeach	
											
												
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Select Comfort Ids:</label>  
                                            <div class="col-md-9">
											@foreach($comfort_categories as $comfort)											
												<label class="check">
											<input type="checkbox" name="comfort[]" value="{{ $comfort->id }}" class="icheckbox"/>{{ $comfort->name }}</label>
											@endforeach	
											
												
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Select Season:</label>  
                                            <div class="col-md-9">
												
												
												@foreach($season as $seasons)											
												<label class="check">
											<input type="checkbox" name="season[]" value="{{ $seasons->id }}" class="icheckbox"/>{{ $seasons->name }}</label>
											@endforeach	
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Hotel Name:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="hname" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Priority Level:</label>  
                                            <div class="col-md-9">
												<select class="form-control" name="rank">
												<option value="">Select Priority Level</option>
													
														<option value="{{1}}">Priority Level 1</option>
														<option value="{{2}}">Priority Level 2</option>
														<option value="{{3}}">Priority Level 3</option>
														<option value="{{4}}">Priority Level 4</option>
														<option value="{{5}}">Priority Level 5</option>
													
												
												</select>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Rating:</label>                                        
                                            <div class="col-md-9">
                                                
												<select class="form-control" name="rating" required>
														<option value="">Select Rating Level</option>
													
														<option value="{{1}}">Rating 1</option>
														<option value="{{2}}">Rating Level 2</option>
														<option value="{{3}}">Rating Level 3</option>
														<option value="{{4}}">Rating Level 4</option>
														<option value="{{5}}">Rating Level 5</option>
													
												
												</select>												
                                                
                                            </div>
                                        </div>
										
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Hotel Address:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="address1" required id="address1" onFocus="initializeAutocomplete()"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
										
										<div class="col-md-3">
                                               
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="latitude" id="latitude" required class="form-control" value="" >                                     
                                                
                                            </div>  
											<div class="col-md-3">
                                               
                                            </div>

											<div class="col-md-3">
                                                <input type="text" name="longitude" id="longitude" required class="form-control" value="" >                                    
                                                
                                            </div>											
                                        </div>
										
										
										
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Original Price:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="original_price" required/>                                        
                                                
                                            </div>
                                        </div>
										
                                          										
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Price:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="price" required/>                                        
                                                
                                            </div>
                                        </div>  
										
								<div class="form-group">
                                    <label class="col-md-3 control-label">Cover Pic:</label>                                        
                                    <div class="col-md-3">
                                        <input type="file" class="fileinput btn-primary" name="image" title="Browse file" required/>
                                    </div>
                                </div>
								
								<div class="form-group">
                                            <label class="col-md-3 control-label">Guest capacity:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="total_person" required id="postcode"/>                                        
                                                
                                            </div>
                                </div>
								
								<div class="form-group">
                                    <label class="col-md-3 control-label">Food Menu Image:</label>                                        
                                    <div class="col-md-3">
                                        <input type="file" class="fileinput btn-primary" name="food_image" title="Browse file"/>
                                    </div>
                                </div>
                                                                                                                 
                                        <div class="btn-group pull-right">
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
@endsection

@section('supporting_files')
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

	
@endsection
