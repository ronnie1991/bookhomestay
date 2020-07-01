<!DOCTYPE html>
<html lang="en">

@include ('user.head')

    <style type="text/css">
    .recommended-sec .ratingul li i {
    color: #008489 ;
    }
    </style>


<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>

            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                <div class="container clearfix">
                    <div class="row">
                    <div class="col-12">
                    <div class="explore-slider">
                    <div class="swiper-container">
                    <div class="swiper-wrapper">
            
            <?php 
            
            
                                        
            ?>
            
            @foreach ($grace as $kc=>$mustnot)
            
            @php
            $ee = DB::table('place')->where(['id'=>$mustnot->placeid])->first();
            $getproperty = DB::table('sightseen')->where('placeId',$mustnot->placeid)->limit(1)->get();
            @endphp
            @if (count($getproperty) > 0)
                        <div class="swiper-slide">
                            <div class="explor-media">
                                <a href="#{{$kc}}" class="scroll-to">
                                <div class="media">
                                    <img class="d-flex align-self-center mr-3" src="{{ asset('placebanner')}}/{{ $ee->banner }}" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <h5 class="mt-0">{{ $ee->place }}</h5>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
            @endif
            @endforeach   
                       
    
                    </div>
                    </div>
                    <div class="swiper-button-next swiper-button-disabled"></div>
                    <div class="swiper-button-prev swiper-button-disabled"></div>
                    </div>
                    </div>    
                    </div>
                </div>
            </div>
            
            <div class="location-sec recommended-sec" style="padding-top:0px !important;">
                    <div class="container">
                        @foreach ($grace as $cl=>$mustnot)
                        @php
                        $ee = DB::table('place')->where(['id'=>$mustnot->placeid])->first(); 
                    
                        $getproperty = DB::table('grace')->where('placeId',$mustnot->placeid)->limit(10)->get();
                        @endphp
                        @if (count($getproperty) > 0)
                            <div  id="{{$cl}}"></div>
                            <h1>Places to see in {{ $ee->place }}</h1>
                            <div class="row">
                                <div class="col-12">
                                    <div class="location-slider">
                                        <div class="swiper-container swiper-slider-{{$cl}}">
                                            <div class="swiper-wrapper">
                                                @foreach ($getproperty as $showpro)
                                                @php
                                                $sightSenDils =DB::table('sightseen')->where('id',$showpro->placesto_see_id)->first();
                                                @endphp
                                                <div class="swiper-slide">
                                                    <div class="team-block">
                                                        <div class="box_grid">
                                                        <figure>
                                                            <a href="{{ url('/grace_details_front/'.$sightSenDils->id)}}" target="_blank">
                                                                <img src="{{ asset('placebanner')}}/{{ $sightSenDils->image }}" alt="" />
                                                                </a>
                                                            <small>{{ $sightSenDils->title }}</small>
                                                        </figure>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach   

                                            </div>
                                            <!-- Add Pagination -->
                                        </div>
                                        <div class="swiper-button-next swiper-button-disabled swiper-slider-prev-{{$cl}}"></div>
                                        <div class="swiper-button-prev swiper-button-disabled swiper-slider-next-{{$cl}}"></div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <a class="show-all" href="{{ url('/grace_all/'.$mustnot->placeid)}}">Show all   <i class="la la-angle-right"></i></a>
                                </div>  
                            </div>
                            <br>
                            <hr>
                        @endif
                        @endforeach
                    </div>
            </div> 
            


            

    </div>

    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

    @include ('user.footer')
    @foreach ($grace as $cl=>$mustnot)
    <script>
        var locationSwiper{{$cl}} = new Swiper('.location-slider .swiper-slider-{{$cl}}', {
            slidesPerView: 3,
            spaceBetween: 30,
            // init: false,
            navigation: {
                nextEl: '.location-slider .swiper-slider-prev-{{$cl}}',
                prevEl: '.location-slider .swiper-slider-next-{{$cl}}',
            },
            breakpoints: {
            1024: {
                slidesPerView: 3,
                spaceBetween: 40,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            399: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            }
        });
    </script>
    @endforeach
</body>

</html>