@extends('website-template.layouts.app')

@section('meta&title')
    <title> WORLDCULTURE EMPOWERMENT</title>
    <meta name="robots" content="noindex, nofollow">


    <style>
        .payment-success-wrapper {
            display: table;
            width: 100%;
            margin-top: 40px;
        }

        .payment-success-box {
            display: table-cell;
            vertical-align: middle;
            text-align: center;
            padding: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="payment-success-wrapper">
                    <div class="payment-success-box">

                        <h2>
                            🎉 Vielen Dank für Ihre Unterstützung. Ihre Spende ist eingegangen.
                        </h2>
                        <br><br>

                        <p>
                            Wir danken
                            dir sehr für dein Vertrauen und deine Hilfe. Mit deinem Beitrag trägst du dazu bei, unsere
                            Projekte
                            umzusetzen und dort zu helfen, wo Hilfe dringend benötigt wird. Gemeinsam können wir helfen
                            <br><br>
                            Danke für deine Spende. Herzliche Grüße von <br>
                            Team Worldculture Empowerment e.V.
                        </p>
                        <br><br>

                        <div class="alert alert-info">
                            <span class="glyphicon glyphicon-envelope"></span>
                            Eine Bestätigungs-E-Mail wurde an Ihre E-Mail-Adresse gesendet.
                        </div>

                        <p class="text-muted">
                            Bei Fragen können Sie sich gerne an uns wenden.
                        </p>
                        <br>

                        <div class="text-center">
                            <a href="{{ route('startseite') }}" class="thm-btn">
                                Zur Startseite
                            </a>
                            <a href="{{ route('kontakt') }}" class="thm-btn style-2">
                                Kontaktieren Sie uns
                            </a>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
