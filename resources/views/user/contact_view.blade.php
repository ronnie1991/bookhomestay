<!DOCTYPE html>
<html lang="en">

@include ('user.head')

<body>
    <div id="page" class="theia-exception">
        @include ('user.header')

        <main style="margin-top:80px;" >
             
            <div class="contact_info">
            <div class="container">
                <ul class="clearfix">
                    <li>
                        <i class="fa fa-map-marker"></i>
                        <h4>Office address</h4>
                        <span>7th Block. kormangla<br>Bangalore</span>
                    </li>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <h4>Email address</h4>
                        <span>info@bookhomestays.in<br>bookhomestays@gmail.com</span>

                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <h4>Contacts</h4>
                        <span>(+91) 99 3382 0006  / &nbsp; 99 3382 0006<br><small>24/7 Customer Support</small></small></span>
                    </li>
                </ul>
            </div>
        </div>
        <!--/contact_info-->
        <div class="bg_color_1">
            <div class="container margin_80_55">
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
                <div class="row justify-content-between">
				
                    <div class="col-lg-5">
                        <div class="map_contact">
                        </div>
                        <!-- /map -->
                    </div>
					
					
                    <div class="col-lg-6">
                        <h4>Send us a message</h4>
                        <p>We will give you a call back</p>
                        <div id="message-contact"></div>
                        <form action="{{ url('user/contact_msg') }}" class="form-horizontal" method="post">
						@csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" type="text" id="name_contact" name="name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input class="form-control" type="text" id="lastname_contact" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email-ID</label>
                                        <input class="form-control" type="email" id="email_contact" name="email">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" type="text" id="phone_contact" name="phone">
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
                            <div class="form-group">
                                <label>Type a  Message..</label>
                                <textarea class="form-control" id="message_contact" name="msg" style="height:150px;"></textarea>
                            </div>
                            
                            <p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"></p>
                        </form>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bg_color_1 -->
        </main>

   </div>

    

    @include ('user.footer_content')

    </div>

    <div id="toTop"></div>

    <!-- JavaScript Libraries -->

   @include ('user.footer')

</body>

</html>