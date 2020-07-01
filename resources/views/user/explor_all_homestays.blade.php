<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>
		<?php /* ?>[id] => 16
                    [placesto_see_id] => 18
                    [placeid] => 3
                    [similar_listings] =>   
		<?php */ ?>
					
			<div class="location-sec recommended-sec" style="margin-top:50px !important;">
                    <div class="container">
                        
					
                        <h1 style="text-align: center;">Homestays in {{$place->place}}</h1>
                        
					
                        <div class="row">
                            
                            
                            
							@foreach($expAllHOmsty as $expHmStay)
							
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="{{ url('/searchDetails/'.$expHmStay->id.'') }}" target="_blank">
                                                    
                                                    <img src="{{ asset('propertypic')}}/{{ $expHmStay->image }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>{{ $expHmStay->hotel_name }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
							@endforeach
                                
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