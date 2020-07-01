<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>

			
			@php
			
			
			$sss = DB::table('sightseen')->where(['id'=>$plid])->get();
			@endphp
			@foreach($sss as $pldeta)
            <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55" >
                <div class="main_title_2" style="margin-bottom: 15px;">
                    <h2>{{ $pldeta->title }}</h2>
                    
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('placebanner')}}/{{ $pldeta->image }}" width="540px" height="365" style="float: left; margin: 4px 16px 2px 0px; border: 1px solid #0e0d0de6;" class="img-fluid" alt="">
                            <span style="font-size: 15px;text-align: justify;" >{!! $pldeta->description !!}</span>
                        </figure>
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
		@endforeach
        <!--/bg_color_1-->  

       
        <!-- /container -->  
		
		


        
            

    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   @include ('user.footer')

</body>

</html>