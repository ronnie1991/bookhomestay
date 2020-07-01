<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main>
		<?php /* ?>[place] => 1 [property] => 1 [rank] => 1 [similar_listings] => [id] => 2 [name] => First Experience Added [title] => Title check [image] => Lighthouse.jpg [description]   
		<?php */ ?>
					
			<div class="location-sec recommended-sec" style="margin-top:50px !important;">
                    <div class="container">
					@foreach($toprated_all as $pp)
					@php
						$place = DB::table('place')->where('id',$pp->place)->first();
					@endphp
					@endforeach
                        <h1 style="text-align: center;"> Things to do in  {{ $place->place }}</h1>
					
                        <div class="row">
                            
							@foreach($toprated_all as $exfbd)
							@php
								
							@endphp
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="{{ url('/topexp_details_front/'.$exfbd->id)}}">
                                                    
                                                    <img src="{{ asset('superstar_pic')}}/{{ $exfbd->image }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>{{ $exfbd->name }}</h3>
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