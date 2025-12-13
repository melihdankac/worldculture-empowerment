@extends('website-template.layouts.app')

@section('meta&title')
    <title>KONTAKT || WORLDCULTURE EMPOWERMENT</title>
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

    <!-- SECTION Contact Form & Map -->
    <section class="contact_us" style="margin-top: 5rem;">
        <div class="container">
            <div class="section-title text-center">
                <h2>Schreiben Sie uns eine Nachricht</h2>
            </div>
            <div class="default-form-area">
                <form id="contact-form" name="contact_form" class="default-form"
                    action="https://webheady.com/Charity-sympathy/sendmail.php" method="post">
                    <div class="row clearfix">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="" placeholder="Ihr Name"
                                    required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="email" class="form-control required email" value=""
                                    placeholder="Ihre E-Mail" required="">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="" placeholder="Telefon">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <input type="text" class="form-control" value="" placeholder="Betreff">
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <textarea class="form-control textarea required" placeholder="Ihre Nachricht..."></textarea>
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
