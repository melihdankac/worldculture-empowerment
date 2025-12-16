@extends('website-template.layouts.app')

@section('meta&title')
    <title> WORLDCULTURE EMPOWERMENT</title>

    <style>
        .payment-success-wrapper {
            display: table;
            width: 100%;
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
                        @if (session()->has('member_name'))
                            <h2>
                                🎉 {{ session('member_name') }}, Herzlich willkommen in unserer Community!
                            </h2>
                            <p>
                                Ihre Mitgliedschaft wurde erfolgreich erstellt.
                            </p>
                        @endif

                        <p>
                            Schön das du Teil unseres Vereins bist.
                            <br><br>

                            Wir freuen uns sehr, dich in unserem Verein begrüßen zu dürfen. Mit deiner Mitgliedschaft setzt
                            du ein
                            starkes Zeichen für Mitgefühl, Verantwortung und Zusammenhalt. Danke, dass du unsere Werte
                            teilst und
                            gemeinsam mit uns für Menschen einstehst, die sonst oft ungehört bleiben.
                            <br><br>

                            Auch wenn wir die Welt nicht von heute auf morgen verändern können, so können wir doch gemeinsam
                            Hoffnung schenken.
                            <br><br>

                            Wenn du Fragen hast, Ideen einbringen oder dich aktiv engagieren möchtest, sind wir jederzeit
                            gern für
                            dich da. Wir freuen uns auf alles, was wir zusammen bewegen werden.
                            <br><br>

                            Herzliche Grüße <br>
                            Worldculture Empowerment e.V.
                        </p>
                        <br><br>

                        <div class="alert alert-info">
                            <span class="glyphicon glyphicon-envelope"></span>
                            Eine Bestätigungs-E-Mail wurde an Ihre E-Mail-Adresse gesendet.
                        </div>

                        <p class="text-muted">
                            Bei Fragen können Sie sich gerne an uns wenden.
                        </p>

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


@section('customScript')
@endsection
