<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>THENAME</title>
    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
    {!! Html::style('fonts/icomoon/style.css') !!}
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! Html::style('css/jquery-ui.css') !!}
    {!! Html::style('css/owl.carousel.min.css') !!}
    {!! Html::style('css/owl.theme.default.min.css') !!}
    {!! Html::style('css/jquery.fancybox.min.css') !!}
    {!! Html::style('css/bootstrap-datepicker.css') !!}
    {!! Html::style('fonts/flaticon/font/flaticon.css') !!}
    {!! Html::style('css/aos.css') !!}
    {!! Html::style('css/jquery.mb.YTPlayer.min.css') !!}
    {!! Html::style('css/style.css') !!}
</head>
<body>

<div class="site-wrap" style="background: #abcaeb;">
     


<div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>



        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a href="index.html" class="site-logo navbar-brand">
                    <img src="{{ URL::to('/') }}/images/logo.png" alt="" srcset="" class="the-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
                        <li class="  ">
                            <a href="{{ url('/home') }}" class="nav-link text-left">Home <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/news') }}" class="nav-link text-left">Our news</a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/about') }}" class="nav-link text-left">About us</a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/syrianArt') }}" class="nav-link text-left">Syrian art</a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/contact') }}" class="nav-link text-left">Contact us</a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/exhibitions') }}" class="nav-link text-left">Aleppo Festivals</a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/status') }}" class="nav-link text-left">Status</a>
                        </li>
                        <li class=" ">
                            <a href="{{ url('/website/video') }}" class="nav-link text-left">Videos</a>
                        </li>
                                           @if (Auth::guest())
                                        <!--  <li><a href="{{ route('login') }}">Login</a></li> -->
                                         <!--  <li><a href="{{ route('register') }}">Register</a></li> -->
                                            @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{ url('admin/posts') }}">Posts</a></li>
                                            <li><a href="{{ url('admin/categories') }}">Categories</a></li>
                                            <!--<li><a href="{{ url('admin/comments') }}">Comments</a></li>-->
                                            <li><a href="{{ url('admin/tags') }}">Tags</a></li>
                                            @if (Auth::user()->is_admin)
                                                <li><a href="{{ url('admin/users') }}">Users</a></li>
                                                @endif
                                            <li><a href="{{ url('/profile') }}">Profile</a></li>
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                                @endif
                    </ul>
                </div>
            </div>
        </nav>







         
        
        
        
     


        
        <div class="container" >
            <div class="row">
                @include('flash::message')

               
            </div>
        </div>
        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>

        
        @yield('content')




        
     
        
        
        <div class="space"></div>

        
        <footer>
            <div class="container d-flex flex-row justify-content-around align-items-center flex-wrap">
                <div class="align-self-cente">
                    <h2><span class="fa fa-google"></span>theName@gmail.com
                    </h2>
                    <h2><span class="fa fa-phone"></span>+963 940 481 087</h2>
                </div>
                <div class="align-self-cente">
                    <ul class="list-unstyled d-flex flex-row">
                        <a href="#">
                            <li class=""><span class="fa fa-facebook icon"></span></li>
                        </a>
                        <a href="#">
                            <li class=""><span class="fa fa-twitter icon"></span></li>
                        </a>
                        <a href="#">
                            <li class=""><span class="fa fa-instagram icon"></span></li>
                        </a>
                    </ul>
                </div>
                <div class="align-self-cente"><a href="https://festivaloflight.net/aleppo-syria-festival.php"><img
                            src="/images/festival-of-light.svg" alt=""></a></div>
            </div>
        </footer>







        

        <!-- loader -->
        <div id="loader" class="show fullscreen">
            <svg class="circular" width="48px" height="48px">
                <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
                <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#ff5e15" />
            </svg>
        </div>



















 

    <!-- Scripts -->

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
        <script src="{{ asset('js/aos.js') }}"></script>
        <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('js/jquery.sticky.js') }}"></script>
        <script src="{{ asset('js/jquery.mb.YTPlayer.min.js') }}"></script>

        <script src="{{ asset('js/main.js') }}"></script>






    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
