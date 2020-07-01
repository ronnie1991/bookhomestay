<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>  
        
        @foreach($top as $fblist)
            <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55">
               
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('superstar_pic')}}/{{ $fblist->image }}" class="img-fluid" alt="" style="width:1200px;height:350px;" >
                           
                        </figure>
                         
                    </div>
                   
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
        <div class="bg_color_1" style="margin: 2px 0px 5px !important;">
            <div class="container margin_55">
               
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <div class="main_title_2" style="margin-bottom: 15px;">
                            <h4>{{ $fblist->name }}</h4>
                            <p>{{ $fblist->title }}</p>
                            </div>
                            
                           
                        </figure>
                        <span style="font-size: 15px;text-align: justify;" >{!! $fblist->description !!}</span>
                         
                    </div>
                   
                </div>
                <!--/row-->
            </div>
            <!--/container-->
        </div>
		@endforeach
        <!--/bg_color_1--> 

       
        <!-- /container -->  
		@php
                                        $chk = DB::table('toprated_exp')->where('id',$topid)->first();
                                        
										if(!empty($chk->similar_listings)){
                                        @endphp
		
		<div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Experience all of the above activities at :</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        
                                        @php
                                        $fbd = DB::table('toprated_exp')->where('id',$topid)->first();
                                        $explodefbd = explode(",",$fbd->similar_listings);
                                        @endphp
                                        
                                        @foreach($explodefbd as $exfbd)
                                            @php
                                                $sls = DB::table('properties')->where('id',$exfbd)->first();
                                            @endphp
                                            <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="{{ url('/searchDetails/'.$sls->id.'') }}">
                                                            <img src="{{ asset('propertypic/'.$sls->image.'') }}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3>{{ $sls->hotel_name }}</h3>
                                                        <p>From {{ $sls->price }}/- per night</p>
                                                        <ul class="ratingul">
                                                            <li><a class="textstar">{{ $sls->rating }} Stars</a></li>
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
										@php } @endphp

        
          

    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   @include ('user.footer')

</body>

</html>