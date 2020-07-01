
@extends('admin.layouts.app')

@section('title', 'Admin-Edit Profile')

@section('sidebar')
    @parent
@endsection



@section('content')

	    <!-- START BREADCRUMB -->
	    <ul class="breadcrumb">
	        <li><a href="#">Dashboard</a></li>
            <li><a href="#">Property</a></li>
            <li class="active">Add Room Details</li>
	    </ul>
	    <!-- END BREADCRUMB -->                       
	    <!-- PAGE TITLE -->
	    <div class="page-title">                    
	        <h2><span class="fa fa-cogs"></span>Add Room Details</h2>
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
                                    <h3>Add Room Details</h3>                                
                                    <form class="form-horizontal" action="{{ url('admin/addproperty_room_details') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">   
									
										<div class="form-group">
                                            <label class="col-md-3 control-label">Poperty Id:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="property_id" value="{{ $id }}" required readonly id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Room Name:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="room_name" placeholder="Single Bed , Double Bed" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Price:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="price" placeholder="Enter Price Per person" required id="postcode"/>                                        
                                                
                                            </div>
                                        </div>
										
									
                                        
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Description</label>
                                            <div class="col-md-9">
                                                <textarea class="summernote" name="description"></textarea>
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Total Room:</label>                                        
                                            <div class="col-md-9">
                                                 <input type="text" class="form-control" name="tot_room" placeholder="Enter Total Room" required id="postcode"/> 
												</Textarea>
                                                
                                            </div>
                                        </div>
										
										
										
										
										
										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Select Aminities</label>
											<div class="col-md-6 col-xs-12">
											@foreach($aminities as $aminitieses)											
												<label class="check">
											<input type="checkbox" name="aminities[]" value="{{ $aminitieses->id }}" class="icheckbox"/>{{ $aminitieses->aminities }}</label>
											@endforeach	
											
										</div>
										</div>
										
										
										
										
										
										
								<div class="form-group">
                                    <label class="col-md-3 control-label">Image:</label>                                        
                                    <div class="col-md-3">
                                        <input type="file" name="image" title="Browse file"/>
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
@endsection

@section('supporting_files')

<script>            
var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), 
{
lineNumbers: true,    
matchBrackets: true,    
mode: "application/x-httpd-php",       
indentUnit: 4,           
indentWithTabs: true,       
enterMode: "keep",          
tabMode: "shift"             
});         
editor.setSize('100%','420px');   
</script>

<script type='text/javascript' src="{{ asset('admin_files/js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{ asset('admin_files/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>        
        
        <script type="text/javascript" src="{{ asset('admin_files/js/plugins/codemirror/codemirror.js')}}"></script>        
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/xml/xml.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/javascript/javascript.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/css/css.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/clike/clike.js')}}"></script>
        <script type='text/javascript' src="{{ asset('admin_files/js/plugins/codemirror/mode/php/php.js')}}"></script>    

        <script type="text/javascript" src="{{ asset('admin_files/js/plugins/summernote/summernote.js')}}"></script>

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
