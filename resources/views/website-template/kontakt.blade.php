@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT || KONTAKT</title>
    {{-- <meta name="description" content="Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.">
  <meta name="keywords" content=" worldculture, travels, partner, kundenbewertungen">
  <meta property="og:title" content="WORLDCULTURE TRAVELS">
  <meta property="og:description" content="{{ Str::limit("Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.", 160) }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('frontend/assets/style/images/home-page/bg-image/bg.jpg') }}"> --}}
@endsection

@section('content')
    <!-- SECTION Page Banner -->
    <section class="page-banner">
        <div class="container">
            <div class="title">
                <h1>Contact <span>us</span></h1>
            </div>
            <div class="text">
                <p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                    rem aperiam eaque ipsa, quae ab illo inventore </p>
            </div>
            <div class="breadcumb-wrapper">
                <ul class="list-inline link-list">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- !SECTION Page Banner -->

    <!-- SECTION Contact Detail -->
    <section class="contact_details">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item center">
                        <div class="icon_box">
                            <span class="fa fa-object-ungroup"></span>
                        </div>
                        <h4>Drop Us A Line</h4>
                        <div class="text">
                            <p>Business standards services compliant. Users without extensible costs.</p>
                            <h5>hello@charity.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item center">
                        <div class="icon_box">
                            <span class="fa fa-user"></span>
                        </div>
                        <h4>Commercial</h4>
                        <div class="text">
                            <p>Business standards services compliant. Users without extensible costs.</p>
                            <h5>commercial@charity.com</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="item center">
                        <div class="icon_box">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <h4>Visit Our Office</h4>
                        <div class="text">
                            <p>262 Milacina Mrest Street, Behansed, Paris, France</p>
                            <h5>(+86) 6 888 888</h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- !SECTION Contact Detail -->

    <!-- SECTION Contact Form & Map -->
    <section class="contact_us">
        <div class="container">
            <div class="section-title text-center">
                <h2>Leave us a message</h2>
            </div>
            <div class="default-form-area">
                <form id="contact-form" name="contact_form" class="default-form"
                    action="https://webheady.com/Charity-sympathy/sendmail.php" method="post">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-6 col-xs-12">

                            <div class="form-group">
                                <input type="text" name="form_name" class="form-control" value=""
                                    placeholder="Your Name" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="email" name="form_email" class="form-control required email" value=""
                                    placeholder="Your Mail" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="form_phone" class="form-control" value=""
                                    placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="form_subject" class="form-control" value=""
                                    placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <textarea name="form_message" class="form-control textarea required" placeholder="Your Message...."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden"
                                    value="">
                                <button class="thm-btn" type="submit" data-loading-text="Please wait...">send
                                    message</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
        <div class="home-google-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2518.102671554642!2d7.014499376950155!3d50.8662989573344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd24b55e9b75353%3A0x4552c41783b88f70!2sWorldculture%20Travels!5e0!3m2!1str!2str!4v1758881527406!5m2!1str!2str"
                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
    <!-- !SECTION Contact Form & Map -->

    <!-- SECTION Referances -->
    <section class="clients-section style-two">
        <div class="container">
            <div class="clients-carousel">
                <div class="item">
                    <div class="image-box">
                        <img src="{{ asset('website-template/images/clients/1.png') }}" alt="">
                    </div>
                </div>

                <div class="item">
                    <div class="image-box">
                        <img src="{{ asset('website-template/images/clients/2.png') }}" alt="">
                    </div>
                </div>

                <div class="item">
                    <div class="image-box">
                        <img src="{{ asset('website-template/images/clients/3.png') }}" alt="">
                    </div>
                </div>

                <div class="item">
                    <div class="image-box">
                        <img src="{{ asset('website-template/images/clients/2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !SECTION Referances -->
@endsection
