<header class="header menu_fixed">
            <div class="container-fluid">
                <div id="logo">
                    <a href="{{ url('')}}">
                        <img src="{{ asset('user_files/images/logo2.png')}}" width="200" height="48" data-retina="true" alt="" class="logo_normal">
                        <img src="{{ asset('user_files/images/logo_sticky_2.png')}}" width="200" height="48" data-retina="true" alt="" class="logo_sticky">
                    </a>
                </div>
                <a href="#menu" class="btn_mobile">
                    <div class="hamburger hamburger--spin" id="hamburger">
                        <div class="hamburger-box">
                            <div class="hamburger-inner"></div>
                        </div>
                    </div>
                </a>
                <nav id="menu" class="main-menu">
                    <ul>
                        <li><a href="{{ url('host/')}}">Become a Host</a></li>                      
                        <li>
                            @if(Session::has('session_id'))
                            
                            
                            <a href="{{ url('user/dashboard')}}">{{ session('name') }}</a>
                            @else 
                            <a href="{{ url('customer_signup/')}}">Login</a>
                            @endif
                            
                        </li>
                        <li><a href="{{ url('contact/')}}">Contact Us</a></li>
                    </ul>
                </nav>
            </div>
        </header>