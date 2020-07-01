<?php 
    $sortedData = $results;
?>

<!DOCTYPE html>
<html lang="en">

@include ('user.head')

   

<body>
    <div id="page" class="theia-exception">
       @include ('user.header')

        <main>
        
            <div class="container-fluid">
                <div class="clearfix">
                    <div class="search-grid">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-7">
                                <div class="row" id="searchResults">
                                @php
									if(!empty($sortedData))
									
									{ @endphp
                                    @foreach ($sortedData as $result)
                                    
									
									
                                    @php
                                        $locations[]=array( 'lat'=>$result->latitude, 'lng'=>$result->longitude );
                                        $markers = json_encode( $locations );
                                        
                                        $notAvailable = DB::table('na_dated')
                                                ->where('proid',$result->id)
                                                ->get();
                                                
                                        $dates = array();
                                        
                                        foreach($notAvailable as $na) {
                                            $start = $na->fromdate;
                                            $end = $na->todate;
                                            $dates = array($start);
                                            while(end($dates) < $end){
                                                array_push($dates,date('Y-m-d', strtotime(end($dates).' +1 day')));
                                            }
                                        }
                                        
                                    @endphp
                                    
                                    <?php
                                    

                                    if (in_array(session('checkIn'), $dates))  {
                                    	$match = 1;
                                    }
                                   
                                    ?>

                                    
                                        <div class="col-sm-6 col-md-6">
                                            <div class="box_grid">
                                                <figure>
                                                    <!--<a href="#0" class="wish_bt"></a>-->
                                                    @php
                                                        if(!isset($match)) { @endphp
                                                            <a href="{{ url('/searchDetails/'.$result->id.'') }}" target="_blank"> @php } 
                                                        else {  @endphp
                                                            <a href="#" >
                                                        @php } 
                                                    @endphp
                                                        <img src="{{ asset('propertypic')}}/{{ $result->image }}" class="img-fluid" alt="" width="800" height="533"><div class="read_more"><span>Explore</span></div></a>
                                                    <!--<small>Historic</small>-->
                                                </figure>
                                                <div class="wrapper">
                                                    <div class="rating">
                                                <?php if($result->rating=='1') { ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($result->rating=='2') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            <?php } if($result->rating=='3') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                             <?php } if($result->rating=='4') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star"></i> 
                                                <?php } if($result->rating=='5') {  ?>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i>
                                                <i class="fa fa-star voted"></i> 
                                                <?php } ?>  
                                            </div>
                                                    <h3>
                                                    @php
                                                        if(!isset($match)) { @endphp
                                                           <a href="{{ url('/searchDetails/'.$result->id.'') }}">{{ $result->hotel_name }}</a> @php } 
                                                        else { @endphp
                                                            <a href="#" style="cursor:not-allowed;">{{ $result->hotel_name }}</a>
                                                        @php } 
                                                    @endphp
                                                        </h3>
                                                    <span class="price">From <strong>&#8377;{{ $result->price }}</strong>  per person</span>
                                                    <br>
                                                    <h6 style="color: red;">
                                                        @php
                                                            if(isset($match)) { @endphp
                                                                Not Available
                                                            @php   } 
                                                        @endphp
                                                    </h6>
													
                                                </div>
                                                <ul>
                                                    <li><i class="la la-user" style="font-size: 19px;">{{ $result->total_person_can_stay }}</i><span style="padding: 2px;font-size: 12px;">Capacity</span>  </li>
                                                      @php
                                                      $placeDtls = DB::table('place')->where('id',$result->placeid)->first();
                                                      @endphp
                                                <li><div class="score"><span><i class="la  la-map-marker" style="font-size: 19px;"></i>{{ $placeDtls->place}}</span></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    <?php unset($match); ?>
                                    @endforeach
									
									@php }
									@endphp
                                </div>    
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-5">
                                <div id="map" class="show-map" style="width:100%;height:800px;position:relative;display:block;"></div>
                            </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDT_LmCgQrsLKDjs3zQGU2ZWHgVr6j9Npg&callback=initMap"></script>
    <script>
        var map;
        var Markers = {};
        var infowindow;
        var locations = [
        @php
        if(!empty($results))
        {
            $i = 0;
            @endphp
            @foreach ($results as $result)    
            [
                '<div class="property-thumbnail"><img src="{{ asset('propertypic')}}/{{ $result->image }}"></div><h4><a href="{{ url('/searchDetails/'.$result->id.'') }}">{{ $result->hotel_name }}</a></h4><div class="property-rating">@php if($result->rating==1){ echo '<i class="fa fa-star voted"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}if($result->rating==2){ echo '<i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}if($result->rating==3){ echo '<i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>';}if($result->rating==4){ echo '<i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star"></i>';}if($result->rating==5){ echo '<i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i><i class="fa fa-star voted"></i>';}@endphp</div><p>From <strong>&#8377;{{ $result->price }}</strong> per person</p><p><strong>{{ $result->total_person_can_stay }}</strong> Capacity</p>',
                {{ $result->latitude }},
                {{ $result->longitude }},
                {{ $result->price }},
                {{ $i }}
            ],
            @php
            $i++;
            @endphp
            @endforeach
        ];

        @php }
        @endphp
        var origin = new google.maps.LatLng(locations[0][1], locations[0][2]);

        function initialize(){
            var mapOptions = {
                zoom: 9,
                center: origin
            };

            map = new google.maps.Map(document.getElementById('map'), mapOptions);

            infowindow = new google.maps.InfoWindow();

            for(i=0; i<locations.length; i++) {
                var position = new google.maps.LatLng(locations[i][1], locations[i][2]);
                var marker = new google.maps.Marker({
                    position: position,
                    icon: "http://www.bookhomestays.in/user_files/images/location-marker-1.png",
                    label: "₹"+locations[i][3],
                    map: map,
                });
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infowindow.setContent(locations[i][0]);
                        infowindow.setOptions({maxWidth: 300});
                        infowindow.open(map, marker);
                    }
                }) (marker, i));
                Markers[locations[i][4]] = marker;
            }
            locate(0);
            
            google.maps.event.addListener(map, "click", function(event) {
                infowindow.close();
            });
        }

        function locate(marker_id) {
            var myMarker = Markers[marker_id];
            var markerPosition = myMarker.getPosition();
            map.setCenter(markerPosition);
            //google.maps.event.trigger(myMarker, 'click');
        }

        google.maps.event.addDomListener(window, 'load', initialize);
        

    </script>

   
</body>



</html>