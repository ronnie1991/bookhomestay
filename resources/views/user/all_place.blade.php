<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main> 

            
            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                    <div class="container clearfix">                        
                    <h1>Homestays at the best tourist districts in Karnataka</h1>
                        <div class="row">
                             @foreach ($place as $allPlace)
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
											<form method="post" action="{{ url('/search_property') }}" name="myPlaces" id="myPlaces">
											@csrf
											<input type="hidden" name="myPlace" id="myPlace">
											</form>
                                                <a href="{{ url('/myPlace/'.$allPlace->id) }}" onclick="myPlace({{ $allPlace->id }})">
                                                    <img src="{{ asset('placebanner')}}/{{ $allPlace->banner }}" alt="" />
                                                </a>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>{{$allPlace->place}}</h3>
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

       
    </script>

   @include ('user.footer')

</body>

</html>