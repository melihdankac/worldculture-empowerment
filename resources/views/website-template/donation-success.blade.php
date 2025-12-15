@extends('website-template.layouts.app')

@section('meta&title')
    <title>Payment Successful | WORLDCULTURE EMPOWERMENT</title>

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

        .success-icon {
            width: 80px;
            height: 80px;
            line-height: 80px;
            margin: 0 auto 20px;
            border-radius: 50%;
            background: #e6f7ee;
            color: #28a745;
            font-size: 40px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="payment-success-wrapper">
                    <div class="payment-success-box">

                        <!-- Icon -->
                        <div class="success-icon">
                            ✓
                        </div>

                        <h2>Payment Successful</h2>

                        <p class="text-muted">
                            Thank you for your support! Your donation / membership payment has been
                            successfully completed. We truly appreciate your contribution to
                            <strong>Worldculture Empowerment</strong>.
                        </p>

                        <div class="alert alert-info">
                            <span class="glyphicon glyphicon-envelope"></span>
                            A confirmation email has been sent to your email address.
                        </div>

                        <p class="text-muted">
                            If you have any questions, feel free to contact us.
                        </p>

                        <div class="text-center">
                            <a href="{{ route('startseite') }}" class="btn btn-primary">
                                Go to Homepage
                            </a>
                            <a href="{{ route('kontakt') }}" class="btn btn-link">
                                Contact Us
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
