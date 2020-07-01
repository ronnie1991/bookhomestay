<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>
           <section class="serch-hero">
                <div class="wrapper">
                  <img src="{{ asset('user_files/images/hero_in_bg_4.jpg')}}" alt="" />      
                </div>
            </section>  

			
			@foreach($exp_adventure as $expadv)
            <div class="bg_color_1">
            <div class="container margin_55" >
                <div class="main_title_2">
                    <h2>{{ $expadv->title }}</h2>
                    
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-6 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('superstar_pic')}}/{{ $expadv->image }}" class="img-fluid" alt="">
                        </figure>
                    </div>
                    <div class="col-lg-5">
                        {{ $expadv->description }}
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
		@endforeach
        <!--/bg_color_1-->  

       
        <!-- /container -->  
		
		 <div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Popular Hotels</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                              @php
                              
                             $sls = DB::table('properties')->where('placeid',$place)->get();
							 @endphp
                              @foreach($sls as $plid)
							  
							  
                                        <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                            <div class="team-block">
                                                <div class="img-sec">
                                                    <a href="{{ url('/searchDetails/'.$plid->id.'') }}">
                                                        <img src="{{ asset('propertypic/'.$plid->image.'') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="team-info text-left">
                                                    <h3>{{ $plid->hotel_name }}</h3>
                                                    <p>From {{ $plid->price }}/- per night</p>
                                                    <ul class="ratingul">
                                                        <li><a class="textstar">{{ $plid->rating }} Stars</a></li>
                                                        
                                                    </ul>
                                                </div>
                                            </div>
                                        
                                        </div>
                                @endforeach
                                    </div>
                                    <!-- Add Pagination -->
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>

                            </div>
                        </div>
                    </div>
                </div>
        </div>


        
            

    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   @include ('user.footer')

</body>

</html>