
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
	        <h2><span class="fa fa-cogs"></span>Add Room Pics</h2>
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
                                    <h3>Add Room Pics</h3>                                
                                    <form class="form-horizontal" action="{{ url('admin/add_room_pics_submit') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="panel-body">   
									
										<div class="form-group">
                                            <label class="col-md-3 control-label">Poperty Id:</label>                                        
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="property_id" value="{{ $id }}" required readonly id="postcode"/>                                        
                                                
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
                            <h3 class="panel-title">Room Pics Listings</h3>
                            <div class="btn-group pull-right">
                                <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                <ul class="dropdown-menu">
                                   
                                    
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});">
                                        <img src='{{ url('admin_files/img/icons/csv.png')}}' width="24"/> CSV
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});">
                                        <img src='{{ url('admin_files/img/icons/xls.png')}}' width="24"/> XLS
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});">
                                    <img src='{{ url('admin_files/img/icons/ppt.png')}}' width="24"/> PowerPoint
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});">
                                        <img src='{{ url('admin_files/img/icons/pdf.png')}}' width="24"/> PDF
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
                                            <th>Room Pic</th>
                                           
                                           <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($room as $rooms)
                                         <?php $i++; ?>                
                                        <tr>
                                            <td>{{ $i }}</td>
                                            <td >
											<!--<img src="{{ asset('rooms_multiple_pics')}}/{{ $rooms->pics }}" alt="" height="60" width="120">-->
											<img src="{{asset('rooms_multiple_pics')}}/{{ $rooms->pics }}" alt="" height="60" width="120">
											</td>
                                           
                                            <td >
                                                
												<p><a href="{{ url('admin/del_room_pic/'.$rooms->id)}}" class="btn btn-danger btn-xs" role="button">Delete</a></p>
												
                                                <?php /* ?>@if($promotion->activated == 1)

                                                    <a href="#" class="btn btn-success" role="button">Activated</a>
                                                @else
                                                    <a href="{{ url('admin/ActivatePromo/'.$promotion->id.'/1')}}" class="btn btn-info" role="button">Activate</a>

                                                @endif <?php */ ?>
                                                
                                            </td>                   
                                        </tr>  
                                    @endforeach                                         
                                    </tbody>
                                </table>                                    
                            </div>
                        </div>
                    </div>
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
