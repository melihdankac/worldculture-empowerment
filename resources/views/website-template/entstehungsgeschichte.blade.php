@extends('website-template.layouts.app')

@section('meta&title')
    <title>Entstehungsgeschichte | Worldculture Empowerment e.V.</title>

    <meta name="description"
        content="Learn about the origins of Worldculture Empowerment e.V. and how years of voluntary engagement, transparency and sustainable impact led to the creation of our non-profit organization in Germany.">

    <!-- SEO: keywords opsiyonel -->
    <meta name="keywords"
        content="Worldculture Empowerment history, NGO origin story, non-profit Germany, humanitarian organization background, empowerment projects">

    <!-- Open Graph -->
    <meta property="og:title" content="Our Story – The Origin of Worldculture Empowerment e.V.">
    <meta property="og:description"
        content="Discover how Worldculture Empowerment e.V. was founded through years of voluntary work, international experience and the vision to create transparent and impactful humanitarian projects.">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('website-template/images/entstehungsgeschichte/2.jpg') }}">
    <meta name="robots" content="index, follow">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="The Story Behind Worldculture Empowerment e.V.">
    <meta name="twitter:description"
        content="From voluntary engagement to real impact: discover the story and values behind Worldculture Empowerment e.V.">

    <style>
        .text p {
            font-size: large;
            text-align: justify;
        }

        .text p {
            margin-bottom: 15px;
            /* font-size: large; */
        }

        @media (max-width: 1199px) {
            .single-cause .content-box {
                padding: 0px 15px 30px !important;
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem !important;
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
                <h1 class="hero-title">Entstehungsgeschichte</h1>
            </div>
            <div class="breadcumb-wrapper">
                <ul class="list-inline link-list">
                    <li><a href="{{ route('startseite') }}">Home</a></li>
                    <li><a href="{{ route('team') }}">Über Uns</a></li>
                    <li>Entstehungsgeschichte</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- !SECTION Page Banner -->

    <!-- SECTION Content -->
    <section class="single-cause">
        <div class="container">
            <figure class="image-box">
                <img src="{{ asset('website-template/images/entstehungsgeschichte/2.jpg') }}" alt="" />
            </figure>
            <div class="content-box">
                <div class="title">
                    <h2>
                        Entstehungsgeschichte <br> von <span>Worldculture Empowerment e.V.</span>
                    </h2>
                </div>
                <div class="text">
                    <p>
                        Worldculture Empowerment e.V. ist aus jahrelanger ehrenamtlicher Arbeit entstanden, die von starkem
                        persönlichem Engagement, internationalen Erfahrungen und dem Wunsch nach nachhaltiger Wirkung
                        geprägt war. Während dieser Zeit wurde deutlich, dass ehrenamtliches Engagement nicht immer die
                        Anerkennung und strukturelle Unterstützung erhält, die es benötigt. Zudem fehlt es vielen
                        Institutionen in Deutschland häufig an Transparenz und konkretem Einblick, wo und wie Hilfe vor Ort
                        tatsächlich ankommt.
                    </p>

                    <p>
                        Aus diesem Grund entstand der Anspruch, Hilfe direkter, greifbarer und nachvollziehbarer zu
                        gestalten. Worldculture Empowerment e.V. steht für Projekte, die real existieren, besucht werden
                        können und bei denen Unterstützung unmittelbar spürbar ist. Unsere Arbeit versteht sich nicht als
                        abstrakte Förderung, sondern als aktive Begleitung von Projekten vor Ort - gemeinsam mit unseren
                        Partnern und in enger Verbindung zu Worldculture Travels. Interessierte haben dadurch die
                        Möglichkeit, selbst vor Ort mitzuwirken, Projekte kennenzulernen und Teil der Veränderung zu werden.
                    </p>

                    <p>
                        Im Mittelpunkt unserer Arbeit steht das Ziel, Menschen weltweit eine Stimme zu geben, deren Stimmen
                        oft überhört werden. Ein besonderer Fokus liegt auf der Stärkung von Frauen sowie der Förderung und
                        Ermutigung von Kindern, ihre Träume zu verwirklichen und selbstbewusst ihren Weg zu gehen.
                    </p>

                    <p>
                        Worldculture Empowerment e.V. ist unsere Antwort auf die Erkenntnis, dass wir das Leid der Welt
                        nicht vollständig verhindern können - aber gemeinsam daran arbeiten können, es zu mindern. Durch
                        konkrete Projekte, partnerschaftliche Zusammenarbeit und echtes Empowerment wollen wir nachhaltige
                        Impulse setzen und Verantwortung übernehmen.
                    </p>
                </div>

                {{-- <div class="clients-section style-two">
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
                </div> --}}
            </div>
        </div>
    </section>
    <!-- !SECTION Content -->
@endsection
