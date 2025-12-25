@extends('website-template.layouts.app')

@section('meta&title')
    <title>Contact Us | Worldculture Empowerment e.V.</title>

    <meta name="description" content="Get in touch with Worldculture Empowerment e.V. Contact us for volunteering, membership, partnerships or general inquiries. We look forward to hearing from you.">

    <!-- SEO: keywords (opsiyonel) -->
    <meta name="keywords" content="contact NGO, charity contact Germany, non-profit contact, Worldculture Empowerment contact">

    <!-- Open Graph -->
    <meta property="og:title" content="Contact Worldculture Empowerment e.V.">
    <meta property="og:description" content="Have questions or want to get involved? Contact Worldculture Empowerment e.V. to learn more about volunteering, membership or partnerships.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('website-template/images/home-page/banner/1.jpg') }}">
    <meta name="robots" content="index, follow">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contact Worldculture Empowerment e.V.">
    <meta name="twitter:description" content="Reach out to Worldculture Empowerment e.V. for volunteering, membership and partnership opportunities.">

    <style>
        .social-links-fa {
            margin-top: 10px;
        }

        .social-links-fa a {
            display: inline-block;
            margin: 0 10px;
            color: #666;
            font-size: 22px;
            transition: color 0.2s ease;
            text-decoration: none;
        }

        .social-links-fa a:hover {
            color: #337ab7;
            /* Bootstrap primary */
        }
    </style>
@endsection

@section('content')
    <!-- SECTION Page Banner -->
    <section class="page-banner"
        style="background-image: url('{{ asset('website-template/images/entstehungsgeschichte/1.jpg') }}');">
        <div class="container">
            <div class="title">
                <h1>Kontaktieren <span>Sie uns</span></h1>
            </div>
            <div class="text">
                <p>Ihre Unterstützung macht den Unterschied. <br>
                    Wenn Sie Fragen zu Spenden, Transparenz oder unserer Arbeit haben, stehen wir Ihnen jederzeit zur
                    Verfügung.
                </p>
            </div>
            <div class="breadcumb-wrapper">
                <ul class="list-inline link-list">
                    <li><a href="{{ route('startseite') }}">Home</a></li>
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- !SECTION Page Banner -->

    <div class="container" style="margin-top: 5rem;">
        <h4 class="text-muted">
            Sie können uns auch auf unseren sozialen Medien folgen, um über unsere Projekte und Aktivitäten informiert zu
            bleiben.
        </h4>

        <div class="social-links-fa">
            <a href="https://www.instagram.com/worldculture_empowerment" target="_blank" title="Instagram">
                <i class="fa fa-instagram"></i>
            </a>

            {{-- <a href="https://www.linkedin.com/company/YOUR_PAGE" target="_blank" title="LinkedIn">
                <i class="fa fa-linkedin"></i>
            </a>

            <a href="https://www.twitter.com/YOUR_PAGE" target="_blank" title="X / Twitter">
                <i class="fa fa-twitter"></i>
            </a>

            <a href="https://www.facebook.com/YOUR_PAGE" target="_blank" title="Facebook">
                <i class="fa fa-facebook"></i>
            </a> --}}
        </div>
    </div>

    <!-- SECTION Contact Form & Map -->
    <section class="contact_us" style="margin-top: 5rem;">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin:0;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="section-title text-center">
                <h2>Schreiben Sie uns eine Nachricht</h2>
            </div>
            <div class="default-form-area">
                <form id="contact-form" name="contact_form" class="default-form" method="POST"
                    action="{{ route('contact.send') }}">
                    @csrf

                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" value=""
                                    placeholder="Ihr Name" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control required email" value=""
                                    placeholder="Ihre E-Mail" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" value=""
                                    placeholder="Telefon" name="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" value=""
                                    placeholder="Betreff">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <textarea name="message" class="form-control textarea required" placeholder="Ihre Nachricht..."></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <input class="form-control" type="hidden" value="">
                                <button class="thm-btn" type="submit" data-loading-text="Bitte warten...">
                                    Nachricht senden
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- !SECTION Contact Form & Map -->
@endsection
