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
            
                   @foreach ($toprated_exp as $kc=>$mustnot)
            
                    @php
                    $ee = DB::table('place')->where(['id'=>$mustnot->place])->first(); 
                    @endphp
            
          
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
                        @foreach ($toprated_exp as $cl=>$mustnot)
                        @php
                        $ee = DB::table('place')->where(['id'=>$mustnot->place])->first(); 
                        @endphp
                            <div  id="{{$cl}}"></div>
                            <h1>Things to do in {{ $ee->place }}</h1>
                            <div class="row">
                                @php
                        
                                $getproperty = DB::table('toprated_exp')->where('place',$mustnot->place)->orderBy('id', 'desc')->get();
                                @endphp
                                <div class="col-12">
                                    <div class="location-slider">
                                        <div class="swiper-container swiper-slider-{{$cl}}">
                                            <div class="swiper-wrapper">
                                               @foreach ($getproperty as $showpro)
                                                <div class="swiper-slide">
                                                    <div class="team-block">
                                                        <div class="box_grid">
                                                        <figure>
                                                         <a href="{{ url('/topexp_details_front/'.$showpro->id.'') }}" target="_blank">
                                                            <img src="{{ asset('superstar_pic')}}/{{ $showpro->image }}" alt="" />
                                                            </a>
                                                        <small>{{ $showpro->name }}</small>
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
                                 <a class="show-all" href="{{ url('/toprated_all/'.$mustnot->place)}}">Show all  <i class="la la-angle-right"></i></a>
                               </div>
                            </div>
                            <br>
                            <hr>
                        
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
    @foreach ($toprated_exp as $cl=>$mustnot)
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