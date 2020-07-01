@extends('admin.layouts.app')@section('title', 'Admin-Edit Profile')@section('sidebar')
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
	        <h2><span class="fa fa-cogs"></span>Edit Places To See</h2>
	    </div>
	    <!-- END PAGE TITLE -->                     
	    
	    <!-- PAGE CONTENT WRAPPER -->
	    <div class="page-content-wrap">
	        
	      
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
                                    <h3>Add Place Details</h3>                                
                                    <form class="form-horizontal" action="{{ url('admin/updateShowPlaces') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="sid" value="{{$sight_scene->id}}">
                                    <div class="panel-body">  

										<div class="form-group">
											<label class="col-md-3 col-xs-12 control-label">Select Places</label>
											<div class="col-md-6 col-xs-12">
											<p class="form-control-static">
												<select name="place">
												    @php
										                $getplace = DB::table('place')->where('id',$sight_scene->placeId)->first();
										            @endphp
												@foreach($place as $places)
												    @if($places->id == $sight_scene->placeId)
												        @php $sel = 'selected'; @endphp
												    @else
												        @php $sel = ''; @endphp
												    @endif
													<option value="{{ $places->id }}" {{$sel}}>{{ $places->place }}</option>
												@endforeach		
												</p>				
												</select>
										</div>
										</div>
									
										<div class="form-group">
                                            <label class="col-md-3 control-label">Title:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="title" placeholder="" required id="postcode" value="{{ $sight_scene->title }}"/>                                        
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Distance:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="distance" placeholder="Distnce" required id="postcode" value="{{ $sight_scene->distance }}"/>                                        
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Short Description:</label>                                        
                                            <div class="col-md-9">
                                                <Textarea type="text" class="form-contro" name="shortDescription" placeholder="Enter Short Description" required row="9" cols="80">  
												{{ $sight_scene->short_description }}</Textarea>
                                                
                                            </div>
                                        </div>
										
										<div class="form-group">
                                            <label class="col-md-3 control-label">Description:</label>                                        
                                            <div class="col-md-9">
                                                <Textarea type="text" class="summernote" name="description" placeholder="Enter Description" required id="postcode">  
												{{ $sight_scene->description }}</Textarea>
                                                
                                            </div>
                                        </div>
										
									<div class="form-group">
                                    <label class="col-md-3 control-label">Image:</label>                                        
                                    <div class="col-md-3">
                                        <input type="file" name="image" title="Browse file"/>
                                        <img src="{{asset('placebanner')}}/{{ $sight_scene->image }}" alt="" height="60" width="120">
                                    </div>
                                </div>
                                                                                                                 
                                        <div class="btn-group pull-right">
                                            <!--<button class="btn btn-primary" type="button" onClick="jvalidate.resetForm();$('#gender').next('.bootstrap-select').removeClass('error').removeClass('valid')">Hide prompts</button>-->
                                            <button class="btn btn-primary" name="submit" type="submit">Update</button>
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

@section('supporting_files')<script>            var editor = CodeMirror.fromTextArea(document.getElementById("codeEditor"), {                lineNumbers: true,                matchBrackets: true,                mode: "application/x-httpd-php",                indentUnit: 4,                indentWithTabs: true,                enterMode: "keep",                tabMode: "shift"                                                            });            editor.setSize('100%','420px');        </script>
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
