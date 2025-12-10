<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            color: #333;
            font-size: 12px;
            line-height: 1.5;
            background-color: #FDFBF6;
            margin: 0;
            padding: 0 30px;
        }

        .header {
            text-align: center;
            border-bottom: 2px solid #555879;
            margin-bottom: 25px;
            padding-top: 20px;
        }

        .header img {
            max-height: 70px;
        }

        h1 {
            color: #555879;
            font-size: 18px;
            margin-top: 10px;
        }

        .section {
            margin-bottom: 25px;
        }

        .section-title {
            color: #555879;
            font-weight: bold;
            margin-bottom: 5px;
            border-bottom: 1px solid #98A1BC;
            display: inline-block;
            padding-bottom: 2px;
        }

        .footer {
            border-top: 1px solid #DED3C4;
            text-align: center;
            font-size: 10px;
            color: #777;
            padding-top: 10px;
            margin-top: 30px;
        }
    </style>
</head>

@php
    $logo = base64_encode(file_get_contents(public_path('website-template/images/favicon/logo_header_180x180.png')));
@endphp

<body>
    <div class="header">
        <img src="data:image/png;base64,{{ $logo }}" alt="Logo" style="max-width:100px;">
        {{-- <img src="{{ public_path('website-template/images/favicon/logo_header_180x180.png') }}" alt="Logo"> --}}
        <h1>Official Donation Receipt</h1>
        <p>World Culture Empowerment</p>
    </div>

    <div class="section">
        <div class="section-title">Donor Information</div>
        <p>
            {{ $donation->first_name }} {{ $donation->last_name }}<br>
            @if ($donation->street)
                {{ $donation->street }} {{ $donation->street_number }}<br>
                {{ $donation->zip }} {{ $donation->city }}<br>
            @endif
            {{ $donation->email }}
        </p>
    </div>

    <div class="section">
        <div class="section-title">Donation Details</div>
        <p>
            Amount: {{ number_format($donation->amount, 2) }} EUR<br>
            Date: {{ $donation->created_at->format('d.m.Y') }}<br>
            Status: {{ ucfirst($donation->payment_status) }}<br>
            @if ($donation->supported_project)
                Project: {{ $donation->supported_project }}<br>
            @endif
            Receipt ID: {{ $donation->id }}
        </p>
    </div>

    <div class="section">
        <div class="section-title">Declaration</div>
        <p>
            We hereby confirm that we have received the above donation.
            This donation is used solely for charitable and cultural purposes
            as defined in the organization's statutes.
        </p>
    </div>

    <div class="footer">
        © {{ date('Y') }} World Culture Empowerment — Registered Non-Profit Organization in Germany
    </div>
</body>

</html>
