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
@endsection

@section('content')
    <section class="rev_slider_wrapper">
        <div id="slider1" class="rev_slider" data-version="5.0">
            <ul>
                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/3.jpg') }}" alt=""
                        width="1920" height="882" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat"
                        data-bgparallax="1">

                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="center" data-voffset="-70"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="500">
                        <div class="slide-content-box center">
                            <h4>Thousand of children are waiting for help!</h4>
                            <h1>help the <span>poor</span> people</h1>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque
                                la<br>udantium, totam rem aperiam eaque ipsa, quae ab illo inventore </p>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="80"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box">
                            <div class="button">
                                <a class="thm-btn" href="{{ route('werdeAktiv') }}">Seien Sie mit uns aktiv</a>
                            </div>
                        </div>
                    </div>

                </li>

                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/2.jpg') }}" alt=""
                        width="1920" height="882" data-bgposition="top center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="1">


                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="center" data-voffset="-70"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="500">
                        <div class="slide-content-box center">
                            <h4>Thousand of children are waiting for help!</h4>
                            <h1>help the <span>poor</span> people</h1>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque
                                la<br>udantium, totam rem aperiam eaque ipsa, quae ab illo inventore </p>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center" data-voffset="80"
                        data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box">
                            <div class="button">
                                <a class="thm-btn" href="{{ route('spenden') }}">Spenden</a>
                            </div>
                        </div>
                    </div>

                </li>

                <li data-transition="fade">
                    <img src="{{ asset('website-template/images/projects/der-Traum-Vom-Horen/10.png') }}" alt=""
                        width="1920" height="882" data-bgposition="top center" data-bgfit="cover"
                        data-bgrepeat="no-repeat" data-bgparallax="1">


                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="" data-y="center" data-voffset="-70"
                        data-transform_idle="o:1;"
                        data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                        data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none" data-splitout="none"
                        data-responsive_offset="on" data-start="500">
                        <div class="slide-content-box center">
                            <h4>Thousand of children are waiting for help!</h4>
                            <h1>help the <span>poor</span> people</h1>
                            <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque
                                la<br>udantium, totam rem aperiam eaque ipsa, quae ab illo inventore </p>
                        </div>
                    </div>
                    <div class="tp-caption tp-resizeme" data-x="center" data-hoffset="0" data-y="center"
                        data-voffset="80" data-transform_idle="o:1;"
                        data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                        data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" data-splitin="none"
                        data-splitout="none" data-responsive_offset="on" data-start="1500">
                        <div class="slide-content-box">
                            <div class="button">
                                <a class="thm-btn" href="{{ route('spenden') }}">Spenden</a>
                            </div>
                        </div>
                    </div>

                </li>
            </ul>
        </div>
    </section>

    <section class="urgent-cause">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-sm-12 col-md-offset-1">
                    <div class="urgent-cause-slide">
                        <div class="item">

                            <div class="clearfix bg-area">
                                <figure class="img-box">
                                    <img src="images/feature/f.jpg" alt="">
                                </figure>


                                <div class="content">
                                    <h4>Helping for <span>education</span> to syrian <br>child & <span>food planting</span>
                                    </h4>

                                    <div class="progress-levels">

                                        <!--Skill Box-->
                                        <div class="progress-box">

                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="76">
                                                            <span class="percent">76%</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="donate-price"><b>$44,210</b>&nbsp; Raised of <span>$99,541</span> Goal
                                    </div>
                                    <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate
                                            now</a></div>
                                </div>
                            </div>

                        </div>
                        <div class="item">
                            <div class="clearfix bg-area">
                                <figure class="img-box">
                                    <img src="images/feature/f.jpg" alt="">
                                </figure>

                                <div class="content">
                                    <h4>Helping for <span>education</span> to syrian <br>child & <span>food planting</span>
                                    </h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="76">
                                                            <span class="percent">76%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="donate-price"><b>$44,210</b>&nbsp; Raised of <span>$99,541</span> Goal
                                    </div>
                                    <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate
                                            now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="our-missions">
        <div class="container">
            <div class="section-title">
                <h1>our <span>missions</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>
            <div class="item-box">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="image-box">
                                <img src="images/missions/1.png" alt="" />
                            </div>
                            <div class="content-box">
                                <h2>Donation</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="link"><a href="#" class="thm-btn style-2">join now</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="image-box">
                                <img src="images/missions/2.png" alt="" />
                            </div>
                            <div class="content-box">
                                <h2>volunteers</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="link"><a href="#" class="thm-btn style-2">join now</a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="image-box">
                                <img src="images/missions/3.png" alt="" />
                            </div>
                            <div class="content-box">
                                <h2>fundraising</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="link"><a href="#" class="thm-btn style-2">join now</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="recent-causes">
        <div class="container">
            <div class="section-title">
                <h5>HELP to THE poor People</h5>
                <h1>recent <span>causes</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>


            <div class="recent-causes-carousel">

                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/causes/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">

                                <!--Skill Box-->
                                <div class="progress-box">

                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>

                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/3.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>

                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>

                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/3.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>

                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>
                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>

                <div class="item">
                    <div class="clearfix bg-area">
                        <div class="image-box">
                            <img src="images/causes/3.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="single-cause.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <div class="progress-levels">
                                <!--Skill Box-->
                                <div class="progress-box">
                                    <div class="inner">
                                        <div class="bar">
                                            <div class="bar-innner">
                                                <div class="bar-fill" data-percent="45">
                                                    <span class="percent">45%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="donate-price"><b>$44,210 </b>&nbsp; Raised of <span>$99,541</span></div>
                            <h4>Help to reach <span>food!</span></h4>
                            <p>Lorum ipsum iure reprhe pu nderit sit amet,consectetur neque. Lorum ipsum iure reprhepu
                                nderitsit amet,onsectetur neque.</p>
                            <div class="link"><a href="single-cause.html" class="thm-btn style-2">donate now</a></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="item-list">
                <div class="row">
                    <div class="col-md-6">
                        <div class="item">
                            <div class="section-title">

                                <h1>WHERE <span> MONEY </span> GOES</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>
                            </div>
                            <div class="content-box">
                                <ul class="default-list">
                                    <li><i class="flaticon-check-mark-square-button"></i><span>60% </span>money goes for
                                        <span>Food Donation</span> in <span>Syria</span>
                                    </li>
                                    <li><i class="flaticon-check-mark-square-button"></i><span>35%</span> money goes for
                                        <span>Educational Fund </span>in <span>Bihar</span>
                                    </li>
                                    <li><i class="flaticon-check-mark-square-button"></i><span>15%</span> money goes for
                                        <span>Health Donation </span>in <span>Bangladesh</span>
                                    </li>
                                    <li><i class="flaticon-check-mark-square-button"></i><span>20% </span>money goes for
                                        <span>Building house </span>for shelter
                                    </li>
                                </ul>
                                <div class="link"><a href="#" class="thm-btn">JOIN TODAY</a></div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="item">
                            <div class="image-box">
                                <img src="images/feature/4.png" alt="">
                            </div>
                            <ul class="list">
                                <li><i class="icon flaticon-stop"></i>Food Donation</li>
                                <li><i class="icon flaticon-stop"></i>Educational Fund</li>
                                <li><i class="icon flaticon-stop"></i>Health Donation</li>
                                <li><i class="icon flaticon-stop"></i>Building Shelter</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <!--start parallax-sec-one-->
    <section class="parallax-sec-one">
        <div class="container">
            <div class="section-title">
                <h1>we help many people</h1>
                <h4>want to become a <span>volunteer!</span></h4>
            </div>
            <div class="content-box text-center">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididun labore dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud </p>
            </div>
            <div class="link"><a href="single-cause.html" class="thm-btn">Apply now</a></div>
        </div>
    </section>
    <!--end parallax-sec-one-->

    <!--start upcoming-event-->
    <section class="upcoming-event">
        <div class="container">
            <div class="section-title">
                <h5>going to raise humanity</h5>
                <h1>upcoming <span>event</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>

            <div class="upcoming-event-carousel">

                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/event/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="event-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="title-area">
                                <div class="date">18<br><span>jan</span></div>
                                <h3><a href="event-details.html">Going for <span>Food Donation</span></a></h3>
                                <ul class="event-info">
                                    <li><span class="fa fa-calendar"></span>&ensp; January 18, 2017&ensp; - </li>
                                    <li><span class="fa fa-clock-o"></span>&ensp; 5;00 pm&ensp; -</li>
                                    <li><span class="fa fa-map-marker"></span>&ensp; NewDelhi, IN</li>
                                </ul>

                            </div>


                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, incididunt ut labore et
                                    dolore.</p>
                            </div>
                            <div class="link"><a href="#" class="thm-btn">buy ticket</a></div>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/event/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="event-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="content-box">
                            <div class="title-area">
                                <div class="date">12 <br><span>Feb</span></div>
                                <h3><a href="event-details.html">Going for <span>Food Donation</span></a></h3>
                                <ul class="event-info">
                                    <li><span class="fa fa-calendar"></span>&ensp; January 18, 2017&ensp; - </li>
                                    <li><span class="fa fa-clock-o"></span>&ensp; 5;00 pm&ensp; -</li>
                                    <li><span class="fa fa-map-marker"></span>&ensp; NewDelhi, IN</li>
                                </ul>

                            </div>


                            <div class="text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, incididunt ut labore et
                                    dolore.</p>
                            </div>
                            <div class="link"><a href="#" class="thm-btn">buy ticket</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--end upcoming-event-->

    <!--start our-team-->
    <section class="our-team">
        <div class="container">
            <div class="section-title">
                <h5>meet our team to help today</h5>
                <h1>our<span> volunteer</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>

            <div class="item-box">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="image-box">
                                    <img src="images/team/1.jpg" alt="" />
                                </div>
                                <div class="content-box">
                                    <h4>Dr. Adam Chohan</h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="70"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do edu.</p>
                                    </div>
                                    <ul class="social">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                        <li><a href="#"><span class="fa fa-behance"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="image-box">
                                    <img src="images/team/2.jpg" alt="" />
                                </div>
                                <div class="content-box">
                                    <h4>Prof. Fredric Roman</h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="79"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do edu.</p>
                                    </div>
                                    <ul class="social">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                        <li><a href="#"><span class="fa fa-behance"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="image-box">
                                    <img src="images/team/3.jpg" alt="" />
                                </div>
                                <div class="content-box">
                                    <h4>Dr. Adam Chohan</h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="70"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do edu.</p>
                                    </div>
                                    <ul class="social">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                        <li><a href="#"><span class="fa fa-behance"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="image-box">
                                    <img src="images/team/4.jpg" alt="" />
                                </div>
                                <div class="content-box">
                                    <h4>Sara Lian</h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="36"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Lorem ipsum dolor sit amet, adipiscing elit, sed do edu.</p>
                                    </div>
                                    <ul class="social">
                                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                                        <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
                                        <li><a href="#"><span class="fa fa-behance"></span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--end our-team-->

    <!--start our features-->
    <section class="our-features">
        <div class="container">
            <div class="section-title">
                <h5>HELP to THE poor People</h5>
                <h1>our <span>features</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>

            <div class="item-list">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <div class="icon">
                                <span class="flaticon-heart-2"></span>
                            </div>
                            <h3>Giving Food</h3>
                            <div class="link"><a href="#" class="thm-btn style-3">read more<i
                                        class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <div class="icon">
                                <span class="flaticon-house"></span>
                            </div>
                            <h3>Making Home</h3>
                            <div class="link"><a href="#" class="thm-btn style-3">read more<i
                                        class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <div class="icon">
                                <span class="flaticon-ecology"></span>
                            </div>
                            <h3>Help to Poor</h3>
                            <div class="link"><a href="#" class="thm-btn style-3">read more<i
                                        class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <div class="icon">
                                <span class="flaticon-world-1"></span>
                            </div>
                            <h3>Feed to World</h3>
                            <div class="link"><a href="#" class="thm-btn style-3">read more<i
                                        class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <div class="icon">
                                <span class="flaticon-heart-1"></span>
                            </div>
                            <h3>Supply Water</h3>
                            <div class="link"><a href="#" class="thm-btn style-3">read more<i
                                        class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <div class="icon">
                                <span class="flaticon-sprout"></span>
                            </div>
                            <h3>Tree Plantation</h3>
                            <div class="link"><a href="#" class="thm-btn style-3">read more<i
                                        class="fa fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end our features-->

    <section class="news-update">
        <div class="container">
            <div class="section-title">
                <h1>News <span>update</span></h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p>
            </div>


            <div class="news-carousel">

                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/3.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/4.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/3.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/4.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/1.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/2.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/3.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="bg-area">
                        <div class="image-box">
                            <img src="images/news/4.jpg" alt="Awesome Image" />
                            <div class="overlay">
                                <div class="box">
                                    <div class="content">
                                        <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-box">
                            <ul class="news-info">
                                <li><i class="fa fa-user"></i>By <span>John Doe </span> </li>
                                <li><i class="fa fa-calendar"></i> January 18, 2017</li>
                            </ul>
                            <h4><a href="blog-details.html">Children’s National festival for learning</a></h4>
                            <div class="link"><a href="single-cause.html" class="thm-btn">donate now</a></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="clients-section">
        <div class="container">
            <div class="clients-carousel">
                <div class="item">
                    <div class="image-box">
                        <img src="images/clients/1.png" alt="">
                    </div>
                </div>

                <div class="item">
                    <div class="image-box">
                        <img src="images/clients/2.png" alt="">
                    </div>
                </div>

                <div class="item">
                    <div class="image-box">
                        <img src="images/clients/3.png" alt="">
                    </div>
                </div>

                <div class="item">
                    <div class="image-box">
                        <img src="images/clients/2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
