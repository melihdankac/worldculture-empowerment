@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>
    {{-- <meta name="description" content="Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.">
  <meta name="keywords" content=" worldculture, travels, partner, kundenbewertungen">
  <meta property="og:title" content="WORLDCULTURE TRAVELS">
  <meta property="og:description" content="{{ Str::limit("Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.", 160) }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('frontend/assets/style/images/home-page/bg-image/bg.jpg') }}"> --}}
    <style>
        .rev_slider_wrapper .tparrows {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <!-- SECTION Hero Banner  -->
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/home-page/banner/1.jpg') }}" alt="" width="1920"
                        height="882" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        data-bgparallax="1">

                    <div class="tp-caption  tp-resizeme" data-x="center" data-hoffset="15" data-y="top" data-voffset="680"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="700">
                        <div class="slide-content-box">
                            {{-- <h4>Thousand of children are waiting for help!</h4>
                            <h1>help the <span>poor</span> people</h1>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium
                                doloremque la<br>udantium, totam rem aperiam eaque ipsa, quae ab illo inventore </p> --}}

                            <h4 style="padding-left: 10rem;">Wir können nicht das Leid der Weit verhindern,<br> aber wir
                                können daran arbeiten, es
                                zusammen zu mindern</h4>
                            <h1>WORLDCULTURE EMPOWERMENT e.V.</h1>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- !SECTION Hero Banner -->

    <section class="our-missions">
        <div class="container">
            <div class="section-title">
                <h1>Unsere <span>missions</span></h1>
                <p style="font-size: 1.8rem; max-width: 800px; margin: 0 auto;">
                    Wir setzen uns für eine Welt ein, in der kulturelle Vielfalt geschätzt, Gleichberechtigung
                    selbstverständlich und jedes Kind geschützt und gefördert wird. Wir möchten ethnischen Minderheiten eine
                    starke Stimme geben, Frauen weltweit in ihrer Selbstbestimmung stärken und Kindern die unter Armut,
                    Krisen oder Diskriminierung leiden, faire Zukunftschancen eröffnen.
                    Gemeinsam mit Partnern weltweit arbeiten wir daran, nachhaltige Strukturen zu schaffen und Menschen zu
                    befähigen, ihr Leben und ihre Gemeinschaften selbstbestimmt zu gestalten - für eine gerechte, friedliche
                    und solidarische Zukunft.
                </p>
            </div>

            <div class="item-box" style="margin-top: 5rem;">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="content-box">
                                <h2>Mitglieder</h2>
                                <p>Werden Sie Teil unseres Vereins und geben Sie Minderheiten, Frauen und
                                    Kindern eine Stimme.</p>
                            </div>
                            <div class="link"><a href="{{ route('spenden') }}" class="thm-btn style-2">Jetzt mitmachen</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="content-box">
                                <h2>Spenden</h2>
                                <p>Jede Spende zählt. Gemeinsam schaffen wir Chancen, verändern Leben und gestalten eine
                                    bessere Zukunft für alle.</p>
                            </div>
                            <div class="link"><a href="{{ route('spenden') }}" class="thm-btn style-2">Jetzt spenden</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="content-box">
                                <h2>Freiwillige</h2>
                                <p>Ihr Einsatz zählt. Teilen Sie Ihr Wissen, schenken Sie Ihre Zeit und schaffen Sie
                                    gemeinsam Chancen für eine gerechtere Zukunft.</p>
                            </div>
                            <div class="link"><a href="{{ route('werdeAktiv') }}" class="thm-btn style-2">Jetzt helfen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
