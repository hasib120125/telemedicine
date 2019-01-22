<!-- Start Header Area -->
<header class="default-header">
        <div class="container">
            <div class="header-wrap">
                <div class="header-top d-flex justify-content-between align-items-center">
                    <div class="logo">
                        <a href="#home"><img src="{{asset('images/frontend_images/logo.png')}}" alt=""></a>
                    </div>
                    <div class="main-menubar d-flex align-items-center">
                        <nav>
                            <a href="{{ url('/') }}">Home</a>
                            <a href="{{ url('/show_doctor') }}">Our Doctors</a>
                            <a href="{{ url('/gellary') }}">Gellary</a>
                            <a href="{{ url('/about') }}">About Us</a>
                            <a href="{{ url('/contact') }}">Contact Us</a>
                            @guest
                            <a href="{{url('/user-login')}}">Login</a>
                            <a href="{{url('/user-registration')}}">Register</a> 
                            @else
                            <a href="{{ url('/admin/dashboard')}}">Dashboard</a>    
                            <a href="{{ route('logout') }}">Logout</a>                                    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endif
                        </nav>
                        <div class="menu-bar"><span class="lnr lnr-cross"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Header Area -->