<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>
            <div class="container-fluid smap-sec margin_80_0" style="margin-top:50px;" >
                <h1>{!! "Homestays that own the seasons" !!}</h1>
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="row">
                               @foreach ($allBigDataData as $allBigDayDetils)   
                                <div class="col-sm-6 col-md-4">
                                    <div class="box_grid">
                                        <figure>
                                            <a href="{{ url('/bigday/'.$allBigDayDetils->id)}}" >   
                                                <img src="{{ asset('superstar_pic')}}/{{ $allBigDayDetils->image }}" class="img-fluid" alt="" width="800" height="533">
                                                <div class="read_more"><span>Explore</span></div></a>
                                              @php
                                              $placeDtls = DB::table('place')->where('id',$allBigDayDetils->placeid)->first();
                                              @endphp
                                                <small>{{ $placeDtls->place}}</small>
                                        </figure>
                                       <ul>
                                            <li><i class="la la-bookmark-o" style="font-size: 19px;">{{ $allBigDayDetils->title }}</i>  </li>
                                            
                                            <li><div class="score"><span><i class="la  la-calendar" style="font-size: 19px;"></i>{{ date('d M Y', strtotime($allBigDayDetils->date))  }}</span></div></li>
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