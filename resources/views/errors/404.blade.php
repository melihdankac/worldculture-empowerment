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
                    <li><a href="{{route('startseite')}}">Startseite</a></li>
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

    <section class="page-banner" style="background-image: url('{{ asset('website-template/images/entstehungsgeschichte/1.jpg') }}');">
    <div class="container">
		<div class="title">
            <h1>4<span>0</span>4</h1>
        </div>
        <div class="text">
			<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore </p>
		</div>
		<div class="breadcumb-wrapper">
            <ul class="list-inline link-list">
                <li><a href="{{route('startseite')}}">Home</a></li>
                <li>404</li>
            </ul>
        </div>
    </div>
</section>

<section class="error-page">
	<div class="container">
		<div class="inner-box">
			<h2>Schade, dass wir es verpasst haben!!!</h2>
			<figure class="image-box">
				<img src="images/resources/404.png" alt="" />
			</figure>
			<div class="link"><a href="index.html" class="thm-btn">go to home</a></div>
		</div>
		
	</div>

</section>
@endsection
