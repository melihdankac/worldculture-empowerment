@extends('website-template.layouts.app')

@section('meta&title')
    <title>Werde Aktiv || WORLDCULTURE EMPOWERMENT</title>

    <style>
        .rev_slider_wrapper .tparrows {
            display: none !important;
        }
    </style>
@endsection

@section('content')
    <section class="page-banner"
        style="background-image: url('{{ asset('website-template/images/entstehungsgeschichte/1.jpg') }}');">
        <div class="container">
            <div class="title">
                <h1>Werde <span>Aktiv</span></h1>
            </div>
            <div class="breadcumb-wrapper">
                <ul class="list-inline link-list">
                    <li><a href="{{route('startseite')}}">Home</a></li>
                    <li>Werde Aktiv</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="feature-three">
        <div class="container">
            <div class="item-list">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="item">
                            <div class="section-title">
                                <h2 style="line-height: 5rem; font-size: 2.5rem; font-weight: bold;">
                                    In Zukunft möchten wir unseren Mitgliedern die Möglichkeit geben, sich ehrenamtlich zu
                                    engagieren, weltweite Projekte zu besuchen und direkt vor Ort zu helfen.
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="align-items: center; display: flex; justify-content: center; margin-top: 2rem;">
                    <a class="thm-btn" href="{{ route('kontakt') }}">
                        Kontaktieren Sie uns
                    </a>

                </div>
            </div>

        </div>
    </section>
@endsection
