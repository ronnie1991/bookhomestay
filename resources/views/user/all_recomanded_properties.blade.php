<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>
            <div class="container-fluid smap-sec margin_80_0" style="margin-top:50px;" >
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                               @foreach ($recomdProperty as $allrecomandedPropDtls)     
                                <div class="col-sm-6 col-md-4">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="{{ url('/searchDetails/'.$allrecomandedPropDtls->id.'') }}" target="_blank"><img src="{{ asset('propertypic')}}/{{ $allrecomandedPropDtls->image }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Explore</span></div></a>
                                        </figure>
                                        <div class="wrapper">
                                           <div class="rating">
                                                
                                            <?php if($allrecomandedPropDtls->rating=='3') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                             <?php } if($allrecomandedPropDtls->rating=='4') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i> 
                                                <?php } if($allrecomandedPropDtls->rating=='5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i> 
                                                <?php } ?>  
                                            </div>
                                            <h3><a href="{{ url('/searchDetails/'.$allrecomandedPropDtls->id.'') }}" target="_blank">{{ $allrecomandedPropDtls->hotel_name }}</a></h3>
                                            <span class="price">From <strong style="font-family: sans-serif;">&#8377;</strong> {{ $allrecomandedPropDtls->price }}/per person</span>
                                        </div>
                                       <ul>
                                            <li><i class="la la-user" style="font-size: 19px;">{{ $allrecomandedPropDtls->total_person_can_stay }}</i><span style="padding: 2px;font-size: 12px;">Capacity</span>  </li>
                                              @php
                                              $placeDtls = DB::table('place')->where('id',$allrecomandedPropDtls->placeid)->first();
                                              @endphp
                                            <li><div class="score"><span><i class="la  la-map-marker" style="font-size: 19px;"></i>{{ $placeDtls->place}}</span></div></li>
                                        </ul>
                                    </div>
                                </div>
                                 @endforeach
                                
                               </div>    
                            </div>
                            
                            

                        </div>
                        <!-- /row -->
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