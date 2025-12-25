<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mitgliedschaftsgenehmigung</title>
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
            <h1>Mitgliedschaftsgenehmigung</h1>
        </div>

        <div class="content">
            <p>
                Schön das du Teil unseres Vereins bist.
                <br><br>

                Wir freuen uns sehr, dich in unserem Verein begrüßen zu dürfen. Mit deiner Mitgliedschaft setzt du ein
                starkes Zeichen für Mitgefühl, Verantwortung und Zusammenhalt. Danke, dass du unsere Werte teilst und
                gemeinsam mit uns für Menschen einstehst, die sonst oft ungehört bleiben.
                <br><br>

                Auch wenn wir die Welt nicht von heute auf morgen verändern können, so können wir doch gemeinsam
                Hoffnung schenken.
                <br><br>

                Wenn du Fragen hast, Ideen einbringen oder dich aktiv engagieren möchtest, sind wir jederzeit gern für
                dich da. Wir freuen uns auf alles, was wir zusammen bewegen werden.
                <br><br>

                Herzliche Grüße <br>
                Worldculture Empowerment e.V.
            </p>

            <p>
                Ihr Mitgliedschaftsstatus:
                <strong>
                    {{ match ($membershipStatus) {
                        'pending' => 'Pending',
                        'pending_verification' => 'Pending Verification',
                        'active' => 'Active',
                        'cancelled' => 'Cancelled',
                        'expired' => 'Expired',
                        default => 'Unknown',
                    } }}
                </strong>
            </p>

            <a href="{{ url('/') }}" class="btn">Besuchen Sie unsere Website</a>
        </div>

        <div class="footer">
            © {{ date('Y') }} World Culture Empowerment. Alle Rechte vorbehalten.
        </div>
    </div>
</body>

</html>
