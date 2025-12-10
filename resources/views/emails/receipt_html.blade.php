<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Donation Confirmation</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #F4EBD3;
            color: #555879;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            max-width: 600px;
            margin: 40px auto;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #555879;
            padding: 20px;
            text-align: center;
        }

        .header img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .header h1 {
            color: #F4EBD3;
            font-size: 22px;
            margin: 0;
        }

        .content {
            padding: 30px;
        }

        .content p {
            line-height: 1.6;
            font-size: 15px;
            color: #555879;
        }

        .highlight {
            color: #98A1BC;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #555879;
            color: #F4EBD3;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .footer {
            background-color: #DED3C4;
            color: #555879;
            text-align: center;
            font-size: 13px;
            padding: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            @php
                $logoPath = public_path('website-template/images/favicon/logo_header_180x180.png');
                $logoBase64 = file_exists($logoPath) ? base64_encode(file_get_contents($logoPath)) : '';
            @endphp
            @if ($logoBase64)
                <img src="data:image/png;base64,{{ $logoBase64 }}" alt="Logo">
            @endif
            <h1>Donation Confirmation</h1>
        </div>

        <div class="content">
            <p>Dear Supporter,</p>

            <p>
                Thank you for your
                <span class="highlight">
                    {{ $donation->recurring_interval === 'one_time' ? 'one-time' : 'recurring' }}
                </span>
                donation of
                <span class="highlight">{{ number_format($donation->amount, 2) }} EUR</span>.
            </p>

            @if ($donation->supported_project)
                <p>
                    You supported the project:
                    <span class="highlight">{{ $donation->supported_project }}</span>
                </p>
            @endif

            <p>Your payment status:
                <span class="highlight">{{ ucfirst($donation->payment_status) }}</span>
            </p>

            <p>
                We truly appreciate your contribution.
                You can find your official receipt attached to this email.
            </p>

            <a href="{{ url('/') }}" class="btn">Visit our website</a>
        </div>

        <div class="footer">
            © {{ date('Y') }} World Culture Empowerment. All rights reserved.
        </div>
    </div>
</body>

</html>
