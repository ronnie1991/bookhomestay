<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>

			<?php 
			/*[id] => 1 [name] => test Food [title] => test Food Title [image] => food.jpg [banner] => [description]*/
			?>
			@foreach($food_blog as $fblist)
            <div class="bg_color_1" style="margin: 82px 0px 5px !important;">
            <div class="container margin_55" >
                <div class="main_title_2" style="margin-bottom: 15px;">
                    <h2>{{ $fblist->name }}</h2>
                    <p>{{ $fblist->title }}</p>
                </div>
                <div class="row justify-content-between">
                    <div class="col-lg-12 wow" data-wow-offset="150" style="visibility: unset;">
                        <figure class="block-reveal">
                            <div class="block-horizzontal"></div>
                            <img src="{{ asset('food_blog_pic')}}/{{ $fblist->image }}" width="300px" height="165" style="float: left; margin: 4px 16px 2px 0px; border: 1px solid #0e0d0de6;" class="img-fluid" alt="">
                            <span style="font-size: 15px;text-align: justify;" >{{ $fblist->description }}</span>
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
		
		<div class="location-sec similar-listing recommended-sec">
                <div class="container">
                    <h1>Similar HomeStay</h1>
                    <div class="row">
                        <div class="col-12">
                            <div class="similar-slider">
                                <div class="swiper-container swiper-container-horizontal">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        
                                        @php
                                        $fbd = DB::table('food_blog')->where('id',$foodBlogId)->first();
                                        $explodefbd = explode(",",$fbd->similar_listings);
                                        @endphp
                                        
                                        @foreach($explodefbd as $exfbd)
                                            @php
                                                $sls = DB::table('properties')->where('id',$exfbd)->first();
                                            @endphp
                                            <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">
                                                <div class="team-block">
                                                    <div class="img-sec">
                                                        <a href="{{ url('/searchDetails/'.$sls->id.'') }}" target="_blank">
                                                            <img src="{{ asset('propertypic/'.$sls->image.'') }}" alt="">
                                                        
                                                    </div>
                                                    <div class="team-info text-left">
                                                        <h3>{{ $sls->hotel_name }}</h3>
                                                        <p>From <strong style="font-family: sans-serif;">&#8377;</span> {{ $sls->price }} per person</p>
                                            <div class="rating">
                                                <?php if($sls->rating=='1') { ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($sls->rating=='2') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($sls->rating=='3') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                             <?php } if($sls->rating=='4') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i> 
                                                <?php } if($sls->rating=='5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i> 
                                                <?php } ?>  
                                            </div>
                                                    </div>
                                                    </a>
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