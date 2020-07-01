<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main> 

            
            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                    <div class="container clearfix">                        
                    <h1>Homestays according to your mood of travel</h1>
                        <div class="row">
                             @foreach ($holidayspot as $allholidayspot)
							 
							 @php
							
							 @endphp
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
											<form method="post" action="{{ url('/search_property') }}" name="myHolidays" id="myHolidays">
											@csrf
											<input type="hidden" name="myHoliday" id="myHoliday">
											</form>
                                                <a href="{{ url('/myHoliday/'.$allholidayspot->id) }}" onclick="myHoliday({{$allholidayspot->id}})">
                                                    <img src="{{ asset('site_images/holiday_category')}}/{{ $allholidayspot->image }}" alt="" />
													
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>{{ $allholidayspot->holiday_category }}</h3>
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
	<script>
        function myFunction() {
          document.myform.submit();
        }
        function myPlace(id) {
            $("#myPlace").val(id);
            $("#myPlaces").submit();
        }

        function myHoliday(id) {
            $("#myHoliday").val(id);
            $("#myHolidays").submit();
        }

        function myComfort(id) {            
            $("#myComfort").val(id);
            $("#myComforts").submit();
        }

        function mySeason(id) {            
            $("#mySeason").val(id);
            $("#mySeasons").submit();
        }
    </script>

   @include ('user.footer')

</body>

</html>