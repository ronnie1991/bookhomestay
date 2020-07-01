@extends('admin.layouts.app')
@section('title', 'Things To Do')
@section('sidebar')
@parent
@endsection
@section('content')



	    <!-- START BREADCRUMB -->

	    <ul class="breadcrumb">

	        <li><a href="#">Home</a></li>

            <li><a href="#">Pages</a></li>

            <li><a href="#">Update</a></li>

            

	    </ul>

	    <!-- END BREADCRUMB -->                       

	    <!-- PAGE TITLE -->

	    <div class="page-title">                    

	        <h2><span class="fa fa-cogs"></span>Update Things To Do To Property.</h2>

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

			
				@php

				$i = 0;  

				@endphp

				

				
				@php
				$getproname = DB::table('properties')->where('id',$pid)->first();
				$proname = $getproname->hotel_name;
				$i++;
				@endphp					

									

			

	         <div class="row">

                        <div class="col-md-9">

						 <!-- START HORIZONTAL FORM SAMPLE -->
<div class="panel panel-default">
<div class="panel-body">
<h3>Details of Top Rated Experience Id: {{ $proname }}</h3>
<div class="form-group">
<label class="col-sm-4 control-label">Property name</label>
<div class="col-md-8">
<p class="form-control-static">

												<input type="text" class="form-control" name="hname" value="{{ $proname }}" required id="postcode"/> 

												</p>												

                                            </div>

                                        </div>

						</div>

                            </div>

                            <!-- END HORIZONTAL FORM SAMPLE -->

						</div>

						

                    </div>
					
					
					<div class="row"> 

                <div class="col-md-12">                            

                    <!-- START DATATABLE EXPORT -->

                    <div class="panel panel-default">

                        <div class="panel-heading">

                            <h3 class="panel-title">Similar Properties Listings</h3>

                                                              

                            

                        </div>

                        <div class="panel-body">

                            <div class="table-responsive">

                                <table id="customers2" class="table datatable">

                                    <thead>

                                        <tr>

                                           <th>Sl No</th>

                                           <th>Experience To Add</th>

                                           <th>Image</th>
										</tr>

                                    </thead>

                                    <tbody>

                @php
				$i = 1;  
				if(!empty($things))
				{
					print_r($things);
				}
				@endphp
				@foreach ($toprated_exp as $explist)
				
				

									<form class="form-horizontal" action="{{ url('admin/update_thingstopro') }}" method="post" enctype="multipart/form-data">

                                        @csrf     

												<input type="hidden" name="pid" value="{{ $pid }}"/>										

                                        <tr>

                                            <td>{{ $i }}</td>

                                            <td>

												<label class="check">

		<input type="checkbox" name="expid[]" value="{{ $explist->id }}" >

													{{$explist->name}}

												</label>

											</td>

											 <td >

											<img src="{{asset('superstar_pic')}}/{{ $explist->image }}" alt="" height="60" width="120">

											</td>

                                        </tr>  
										@php
										$i++;
										@endphp
                                            @endforeach    

										<tr>

										<div class="btn-group pull-right">

											<button class="btn btn-danger"><i class="fa fa-bars"></i>Update Properties To Superstar Listings</button>

										   

										</div> 

										</tr>

										</form>

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



	

@endsection

