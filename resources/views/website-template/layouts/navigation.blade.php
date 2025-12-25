<header class="top-bar">
    <div class="container">
        <div class="column left">
            <ul class="top-bar-text">
                <li><i class="icon fa fa-envelope"></i>contact@worldculture-empowerment.international</li>
                {{-- <li><i class="icon fa fa-phone"></i>0049 - 01775446737</li> --}}
            </ul>
        </div>
        <div class="column center">
            <ul class="social">
                <li><a style="font-size: 2rem !important;" href="https://www.instagram.com/worldculture_empowerment"><i
                            class="fa fa-instagram"></i></a></li>
                {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li> --}}
            </ul>
        </div>
        <div class="column right">
            <a class="thm-btn" href="{{ route('spenden') }}">
                Spenden
            </a>
            {{-- <ul class="login-info">
                <li>
                    <i class="icon flaticon-world-1"></i>
                    <a href="#">DE</a> | <a href="#">EN</a>
                </li>
                @auth
                    <li><a href="{{ route('login') }}"><i class="icon fa fa-arrow-circle-down"></i>login</a></li>
                    <li><a href="{{ route('register') }}"><i class="icon fa fa-user"></i>signup</a></li>
                @endauth
            </ul> --}}
        </div>
    </div>
</header>

<section class="theme_menu stricky">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="main-logo">
                    <a href="{{ route('startseite') }}">
                        <img src="{{ asset('website-template/images/logo/logo_header_5.png') }}"
                            alt="Worldculture Empowerment"></a>
                </div>
            </div>
            <div class="col-md-10 menu-column">
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
                            <li><a href="{{ route('startseite') }}">Startseite</a></li>
                            <li class="dropdown"><a href="#">Über Uns</a>
                                <ul>
                                    <li><a href="{{ route('entstehungsgeschichte') }}">Entstehungsgeschichte</a></li>
                                    <li><a href="{{ route('team') }}">Team</a></li>
                                    <li><a href="{{ route('partnerschaften') }}">Partnerschaften</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Projekte</a>
                                <ul>
                                    <li><a href="{{ route('frauenkooperative-noyanlar') }}">Frauenkooperative -
                                            Südosttürkei</a></li>
                                    <li><a href="{{ route('derTraumVomHoren') }}">Der Traum vom Hören</a></li>
                                    <li><a href="{{ route('children-in-village') }}">Kinderförderung in abgelegenen
                                            Bergdörfern der Südost- und Osttürkei</a></li>
                                    <li><a href="{{ route('autonomy-foundation') }}">Zukunft gestalten: Bildung &
                                            Jugendarbeit in Istanbul</a>
                                    </li>
                                    <li><a href="{{ route('patenschaft') }}">Patenschaftsprogramm</a></li>
                                    <li><a href="{{ route('turkeiErdbebenprojekt') }}">Erdbebenprojekt Türkei</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('werdeAktiv') }}">Werde Aktiv</a></li>
                            <li><a href="{{ route('spenden') }}">Spenden </a></li>
                            <li><a href="{{ route('werden-sie-mitglied') }}">Mitgliedschaft</a></li>
                            <li><a href="{{ route('kontakt') }}">Kontakt</a></li>
                        </ul>

                        <ul class="mobile-menu clearfix">
                            <li><a href="{{ route('startseite') }}">Startseite</a></li>
                            <li class="dropdown"><a href="#">Über Uns</a>
                                <ul>
                                    <li><a href="{{ route('entstehungsgeschichte') }}">Entstehungsgeschichte</a></li>
                                    <li><a href="{{ route('team') }}">Team</a></li>
                                    <li><a href="{{ route('partnerschaften') }}">Partnerschaften</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Projekte</a>
                                <ul>
                                    <li><a href="{{ route('frauenkooperative-noyanlar') }}">Frauenkooperative -
                                            Südosttürkei</a></li>
                                    <li><a href="{{ route('derTraumVomHoren') }}">Der Traum vom Hören</a></li>
                                    <li><a href="{{ route('children-in-village') }}">Kinderförderung in abgelegenen
                                            Bergdörfern der Südost- und Osttürkei</a></li>
                                    <li><a href="{{ route('autonomy-foundation') }}">Zukunft gestalten: Bildung &
                                            Jugendarbeit in Istanbul</a>
                                    </li>
                                    <li><a href="{{ route('patenschaft') }}">Patenschaftsprogramm</a></li>
                                    <li><a href="{{ route('turkeiErdbebenprojekt') }}">Erdbebenprojekt Türkei</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('werdeAktiv') }}">Werde Aktiv</a></li>
                            <li><a href="{{ route('spenden') }}">Spenden </a></li>
                            <li><a href="{{ route('werden-sie-mitglied') }}">Mitgliedschaft</a></li>
                            <li><a href="{{ route('kontakt') }}">Kontakt</a></li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="right-column">
                <div class="right-area">
                    <div class="nav_side_content">
                        <div class="search_option">
                            {{-- <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                    class="fa fa-search" aria-hidden="true"></i></button>
                            <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div> <!-- End of .conatiner -->
</section>
