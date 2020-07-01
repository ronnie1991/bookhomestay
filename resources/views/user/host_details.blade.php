<!DOCTYPE html>
<html lang="en">
@include ('user.head')
<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

		@if (session('status'))                        
                       <div class="alert alert-{{ session('code') }} text-center">
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

        <main>
            <div class="smap-sec margin_80_0" style="margin-top:50px;">
                <div class="container clearfix">
                    <div class="search-dtl-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                            <div id="section1" class="cd-section">
                            <h2 style="font-size: 1.5rem;">{{ $host->name }}</h2>
                            <div class="room_type first">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="{{ asset('host_pic')}}/{{ $host->image }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-8">                                       
                                        <p><strong>Host Description</strong>{!! $host->view !!}<br>
                                    </div>
                                </div>
                                <!-- /row -->
                              </div>
                              <br>
                              <h2 style="font-size: 1.5rem;">Visit our homestay</h2>
                              @foreach($properties as $property)
                              <div class="room_type first">
                                  <div class="row">
                                      
                                      <div class="col-md-4">
                                        <a href="{{ url('/searchDetails/'.$property->id.'') }}">
                                            <img src="{{ asset('propertypic/'.$property->image.'') }}" class="img-fluid" alt="">
                                        </a>
                                        <p style="font-size: 17px;font-weight: 600;" >{{$property->hotel_name}}</p>
                                      </div>
                                      <?php /*?><div class="col-md-8">
                                          <h4>{{$property->hotel_name}}</h4>
                                          <p>{{$property->view}}</p>
                                          @php
                                          $details = DB::table('room_details')->where('property_id',$property->id)->get();
                                          @endphp
                                          @foreach ($details as $detail)
                                            <ul class="hotel_facilities">
                                              <li><img src="{{ asset('/propertyrooms_pic/'.$detail->image.'') }}" alt="">{{$detail->romm_name}}</li>
                                            </ul>
                                          @endforeach
                                          
                                      </div><?php */?>
                                  </div>
                                  <!-- /row -->
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="clearfix"></div>
                            <hr>

                            </div>
                            
                            

                        </div>
                        <!-- /row -->
                        </div>
                </div>
            </div>
            

        <!--    <div class="location-sec similar-listing recommended-sec">-->
        <!--        <div class="container">-->
        <!--            <h1>Similar listings</h1>-->
        <!--            <div class="row">-->
        <!--                <div class="col-12">-->
        <!--                    <div class="similar-slider">-->
        <!--                        <div class="swiper-container swiper-container-horizontal">-->
        <!--                            <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">-->
        <!--                                <div class="swiper-slide swiper-slide-active" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-3.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                            <h3>Homestay within the woods</h3>-->
        <!--                                            <p>From 1000/- per night</p>-->
        <!--                                            <ul class="ratingul">-->
        <!--                                                <li><a class="textstar">3.5 Stars</a></li>-->
        <!--                                                <li><i class="la la-star"></i></li>-->
        <!--                                                <li><i class="la la-star"></i></li>-->
        <!--                                                <li><i class="la la-star"></i></li>-->
        <!--                                                <li><i class="la la-star-half-o"></i></li>-->
        <!--                                                <li><i class="la la-star-o"></i></li>-->
        <!--                                            </ul>-->
        <!--                                        </div>-->
        <!--                                    </div>-->

        <!--                                </div>-->
        <!--                                <div class="swiper-slide swiper-slide-next" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-1.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                                <h3>Homestay within the woods</h3>-->
        <!--                                                <p>From 1000/- per night</p>-->
        <!--                                                <ul class="ratingul">-->
        <!--                                                    <li><a class="textstar">4.5 Stars</a></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star-half-o"></i></li>-->
        <!--                                                </ul>-->
        <!--                                            </div>                                          -->
        <!--                                        </div>-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-5.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                                <h3>Homestay within the woods</h3>-->
        <!--                                                <p>From 1000/- per night</p>-->
        <!--                                                <ul class="ratingul">-->
        <!--                                                    <li><a class="textstar">3.5 Stars</a></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star-half-o"></i></li>-->
        <!--                                                    <li><i class="la la-star-o"></i></li>-->
        <!--                                                </ul>-->
        <!--                                            </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-2.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                                <h3>Homestay within the woods</h3>-->
        <!--                                                <p>From 1000/- per night</p>-->
        <!--                                                <ul class="ratingul">-->
        <!--                                                    <li><a class="textstar">3.5 Stars</a></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star-half-o"></i></li>-->
        <!--                                                    <li><i class="la la-star-o"></i></li>-->
        <!--                                                </ul>-->
        <!--                                            </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-3.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                                <h3>Homestay within the woods</h3>-->
        <!--                                                <p>From 1000/- per night</p>-->
        <!--                                                <ul class="ratingul">-->
        <!--                                                    <li><a class="textstar">5 Stars</a></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                </ul>-->
        <!--                                            </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-4.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                                <h3>Homestay within the woods</h3>-->
        <!--                                                <p>From 1000/- per night</p>-->
        <!--                                                <ul class="ratingul">-->
        <!--                                                    <li><a class="textstar">3.5 Stars</a></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star-half-o"></i></li>-->
        <!--                                                    <li><i class="la la-star-o"></i></li>-->
        <!--                                                </ul>-->
        <!--                                            </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                                <div class="swiper-slide" style="width: 255px; margin-right: 30px;">-->
        <!--                                    <div class="team-block">-->
        <!--                                        <div class="img-sec">-->
        <!--                                            <a href="#">-->
        <!--                                                <img src="images/destination-5.jpg" alt="">-->
        <!--                                            </a>-->
        <!--                                        </div>-->
        <!--                                        <div class="team-info text-left">-->
        <!--                                                <h3>Homestay within the woods</h3>-->
        <!--                                                <p>From 1000/- per night</p>-->
        <!--                                                <ul class="ratingul">-->
        <!--                                                    <li><a class="textstar">4.5 Stars</a></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star"></i></li>-->
        <!--                                                    <li><i class="la la-star-half-o"></i></li>-->
        <!--                                                </ul>-->
        <!--                                            </div>-->
        <!--                                    </div>-->
        <!--                                </div>-->
        <!--                            </div>-->
                                    <!-- Add Pagination -->
        <!--                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>-->
        <!--                        <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>-->
        <!--                        <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>-->

        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--</div>-->



   </div>

    </main>

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   @include ('user.footer')

</body>

</html>