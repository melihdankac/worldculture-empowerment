<header class="top-bar">
    <div class="container">
        <div class="column left">
            <ul class="top-bar-text">
                <li><i class="icon fa fa-envelope"></i>contact@worldculture-travels.com</li>
                <li><i class="icon fa fa-phone"></i>0049 - 1775446737</li>
            </ul>
        </div>
        <div class="column center">
            <ul class="social">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div>
        <div class="column right">
            <ul class="login-info">
                <li>
                    <i class="icon flaticon-world-1"></i>
                    <a href="#">DE</a> | <a href="#">EN</a>
                </li>
                {{-- <li><a href="#"><i class="icon fa fa-arrow-circle-down"></i>login</a></li>
                <li><a href="#"><i class="icon fa fa-user"></i>signup</a></li> --}}
            </ul>
        </div>
    </div>
</header>

<section class="theme_menu stricky">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="main-logo">
                    <a href="index.html"><img src="{{ asset('website-template/images/logo/logo_header_5.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-7 menu-column">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li><a href="{{ route('startseite') }}">Home</a></li>
                            <li class="dropdown"><a href="#">Über Uns</a>
                                <ul>
                                    <li><a href="{{ route('entstehungsgeschichte') }}">Entstehungsgeschichte</a></li>
                                    <li><a href="{{ route('vorstand') }}">Vorstand</a></li>
                                    <li><a href="{{ route('team') }}">Team</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Projekte</a>
                                <ul>
                                    <li><a href="{{ route('derTraumVomHoren') }}">Der Traum vom Hören</a></li>
                                    <li><a href="{{ route('turkeiErdbebenprojekt') }}">Türkei Erdbebenprojekt</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('werdeAktiv') }}">Werde Aktiv</a></li>
                            <li><a href="{{ route('spenden') }}">Spenden </a></li>
                            <li><a href="{{ route('kontakt') }}">Kontakt</a></li>
                        </ul>

                        <ul class="mobile-menu clearfix">

                            <li class="dropdown active"><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                    <li><a href="index-3.html">Home Three</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">about us</a>
                                <ul>
                                    <li><a href="about.html">About us</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="causes.html">Causes</a>
                                <ul>
                                    <li><a href="causes.html">Causes</a></li>
                                    <li><a href="single-cause.html">Single Cause</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="event.html">Events</a>
                                <ul>
                                    <li><a href="event.html">Events</a></li>
                                    <li><a href="event-details.html">Event Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"> blog </a>
                                <ul>
                                    <li><a href="blog-large.html">Blog With Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Single Post</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">pages</a>
                                <ul>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-single.html">Product Detail Page</a></li>
                                    <li><a href="error.html">404</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="right-column">
                <div class="right-area">
                    <div class="nav_side_content">
                        <div class="search_option">
                            <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-search" aria-hidden="true"></i></button>
                            <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div> <!-- End of .conatiner -->
</section>

{{-- <section class="theme_menu stricky">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="main-logo">
                    <a href="index.html"><img src="{{ asset('website-template/images/logo/logo.png') }}"
                            alt=""></a>
                </div>
            </div>
            <div class="col-md-7 menu-column">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="dropdown active"><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                    <li><a href="index-3.html">Home Three</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">about us</a>
                                <ul>
                                    <li><a href="about.html">About us</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="causes.html">Causes</a>
                                <ul>
                                    <li><a href="causes.html">Causes</a></li>
                                    <li><a href="single-cause.html">Single Cause</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="event.html">Events</a>
                                <ul>
                                    <li><a href="event.html">Events</a></li>
                                    <li><a href="event-details.html">Event Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"> blog </a>
                                <ul>
                                    <li><a href="blog-large.html">Blog With Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Single Post</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">pages</a>
                                <ul>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-single.html">Product Detail Page</a></li>
                                    <li><a href="error.html">404</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>

                        <ul class="mobile-menu clearfix">

                            <li class="dropdown active"><a href="index.html">Home</a>
                                <ul>
                                    <li><a href="index.html">Home One</a></li>
                                    <li><a href="index-2.html">Home Two</a></li>
                                    <li><a href="index-3.html">Home Three</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">about us</a>
                                <ul>
                                    <li><a href="about.html">About us</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="causes.html">Causes</a>
                                <ul>
                                    <li><a href="causes.html">Causes</a></li>
                                    <li><a href="single-cause.html">Single Cause</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="event.html">Events</a>
                                <ul>
                                    <li><a href="event.html">Events</a></li>
                                    <li><a href="event-details.html">Event Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#"> blog </a>
                                <ul>
                                    <li><a href="blog-large.html">Blog With Sidebar</a></li>
                                    <li><a href="blog-details.html">Blog Single Post</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">pages</a>
                                <ul>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="shop-single.html">Product Detail Page</a></li>
                                    <li><a href="error.html">404</a></li>
                                </ul>
                            </li>
                            <li><a href="contact.html">contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="right-column">
                <div class="right-area">
                    <div class="nav_side_content">
                        <div class="search_option">
                            <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-search" aria-hidden="true"></i></button>
                            <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div> <!-- End of .conatiner -->
</section> --}}
