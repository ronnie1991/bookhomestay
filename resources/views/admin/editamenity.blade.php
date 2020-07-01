

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

	        <h2><span class="fa fa-cogs"></span>Update Amenity</h2>

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
                                <h3>Update Amenity</h3>
                                <form class="form-horizontal" action="{{ url('admin/updateamenity') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="id" class="form-control" value="{{$data->id}}" name="id" required /> 
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Amenity Name:</label>       
                                            <div class="col-md-9">
                                                <input type="text" id="aminities" class="form-control" value="{{$data->aminities}}" name="aminities" required/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-4 control-label">Amenity Image</label>
                                            <div class="col-md-8">
                                                <p class="form-control-static">
												    <img src="{{asset('propertypic')}}/{{ $data->image }}" alt="" height="60" width="120">
												</p>
                                            </div>
                                        </div>

										<div class="form-group">
											<label class="col-md-3 control-label">Upload New Image:</label> 
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
		 </div>

	    <!-- END PAGE CONTENT WRAPPER -->     

@endsection



@section('supporting_files')
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
@endsection

