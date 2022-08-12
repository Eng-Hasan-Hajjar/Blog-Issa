<div class="site-mobile-menu site-navbar-target">
            <div class="site-mobile-menu-header">
                <div class="site-mobile-menu-close mt-3">
                    <span class="icon-close2 js-menu-toggle"></span>
                </div>
            </div>
            <div class="site-mobile-menu-body"></div>
        </div>

        <div class="header-top" style="background: #abcaeb;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-6 d-flex">
                        <a href="/" class="site-logo">
                            <img src="{{ URL::to('/') }}/images/logo.png" alt="" srcset="" class="the-logo">
                        </a>

                        <a href="#"
                            class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a>
                    </div>
                </div>
            </div>

            <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">
                <div class="container">
                    <div class="d-flex align-items-center">
                       
                    <a href="index.html" class="site-logo navbar-brand">
                    <img src="./images/logo.png" alt="" srcset="" class="the-logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
                    aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                    
                    <div class="mr-auto">
                            <nav class="site-navigation position-relative text-right" role="navigation">
                                <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                    <li class="active">
                                        <a href="{{ url('/home') }}" class="nav-link text-left">Home</a>
                                    </li>
                                    <li class=" ">
                                       <a href="{{ url('/website/news') }}" class="nav-link text-left">News</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/website/about') }}" class="nav-link text-left">About</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/website/syrianArt') }}" class="nav-link text-left">Syrian art</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/website/contact') }}" class="nav-link text-left">Contact</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/website/exhibitions') }}" class="nav-link text-left">Exhibitions</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/website/status') }}" class="nav-link text-left">Status</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/viewGallery') }}" class="nav-link text-left">Gallery</a>
                                    </li>
                                <!--   -->
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
                                </ul>
                            </li>
                        @endif
                                </ul>

                 


                  
                      
                
                         

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>