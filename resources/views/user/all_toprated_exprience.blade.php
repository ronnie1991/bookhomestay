<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main> 

            
            <div id="unique" class="explor-sec margin_80_0" style="margin-top:50px;">
                    <div class="container clearfix">                        
                    <h1>Newly added top rated experiences</h1>
                        <div class="row">
                             @foreach ($topRatedExprience as $alltopRatedExprience)
                                <div class="col-sm-6 col-md-3">
                                    <div class="holidayspot-list">
                                        <div class="team-block">
                                            <div class="img-sec">
                                                <a href="{{ url('/exp_details_front/'.$alltopRatedExprience->id)}}">
                                                    <img src="{{ asset('superstar_pic')}}/{{ $alltopRatedExprience->image }}" alt="" />
                                                </a>
                                                <small>{{ $alltopRatedExprience->name }}</small>
                                            </div>
                                            <div class="team-info text-left">
                                                <h3>{{ $alltopRatedExprience->title }}</h3>
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