@extends('website-template.layouts.app')

@section('meta&title')
    <title>Entstehungsgeschichte || WORLDCULTURE EMPOWERMENT </title>

    <style>
        .text p {
            font-size: large;
            text-align: justify;
        }

        .text p {
            margin-bottom: 15px;
            /* font-size: large; */
        }
    </style>
@endsection

@section('content')
    <!-- SECTION Page Banner -->
    <section class="page-banner"
        style="background-image: url('{{ asset('website-template/images/entstehungsgeschichte/1.jpg') }}');">
        <div class="container">
            <div class="title">
                <h1>Partnerschaften</h1>
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
