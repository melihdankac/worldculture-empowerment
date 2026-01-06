@extends('website-template.layouts.app')

@section('meta&title')
    <title>Partnerships | Collaborate with Worldculture Empowerment e.V.</title>

    <meta name="description"
        content="Partner with Worldculture Empowerment e.V. and support humanitarian, education and empowerment projects through long-term, transparent and impactful collaborations.">

    <!-- SEO: keywords (opsiyonel) -->
    <meta name="keywords"
        content="NGO partnerships, corporate partnerships charity, non-profit collaboration, CSR partnerships Germany, Worldculture Empowerment partners">

    <!-- Open Graph -->
    <meta property="og:title" content="Partnerships – Work with Worldculture Empowerment e.V.">
    <meta property="og:description"
        content="Explore partnership opportunities with Worldculture Empowerment e.V. and collaborate on sustainable humanitarian and education projects worldwide.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('website-template/images/partners/banner.jpg') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Partnerships – Worldculture Empowerment e.V.">
    <meta name="twitter:description"
        content="Collaborate with Worldculture Empowerment e.V. through meaningful and transparent partnerships creating real impact.">
    <meta name="robots" content="index, follow">


    <style>
        .text p {
            font-size: large;
            text-align: justify;
        }

        .text p {
            margin-bottom: 15px;
            /* font-size: large; */
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 3rem !important;
            }
        }
    </style>
@endsection

@section('content')
    <!-- SECTION Page Banner -->
    <section class="page-banner"
        style="background-image: url('{{ asset('website-template/images/entstehungsgeschichte/1.jpg') }}');">
        <div class="container">
            <div class="title">
                <h1 class="hero-title">Partnerschaften</h1>
            </div>
            {{-- <div class="text">
                <p>
                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem
                    accusantium doloremque laudantium, totam rem aperiam eaque ipsa,
                    quae ab illo inventore
                </p>
            </div> --}}
            <div class="breadcumb-wrapper">
                <ul class="list-inline link-list">
                    <li><a href="{{ route('startseite') }}">Home</a></li>
                    <li><a href="{{ route('team') }}">Über Uns</a></li>
                    <li>Partnerschaften</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- !SECTION Page Banner -->

    <section>
        <div class="container">
            <div class="clients-section style-two">
                <div class="clients-carousel">
                    <div class="item">
                        <div class="image-box">
                            <img src="{{ asset('website-template/images/logo/logo.png') }}" alt="" />
                        </div>
                    </div>

                    <div class="item">
                        <div class="image-box">
                            <img src="{{ asset('website-template/images/logo/logo_wct_red.jpg') }}" alt="" />
                        </div>
                    </div>

                    <div class="item">
                        <div class="image-box">
                            <img src="{{ asset('website-template/images/logo/logo.png') }}" alt="" />
                        </div>
                    </div>

                    <div class="item">
                        <div class="image-box">
                            <img src="{{ asset('website-template/images/logo/logo_wct_red.jpg') }}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
