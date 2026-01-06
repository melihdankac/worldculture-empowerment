@extends('website-template.layouts.app')

@section('meta&title')
    <title>Membership | Support Worldculture Empowerment e.V.</title>

    <meta name="description"
        content="Become a supporting member of Worldculture Empowerment e.V. and help strengthen education, intercultural exchange and empowerment projects worldwide. Join our non-profit organization today.">

    <!-- SEO: keywords (opsiyonel) -->
    <meta name="keywords"
        content="NGO membership, supporting member non-profit, join NGO Germany, Worldculture Empowerment membership, become a member charity">

    <!-- Open Graph -->
    <meta property="og:title" content="Become a Member – Worldculture Empowerment e.V.">
    <meta property="og:description"
        content="Support education, intercultural exchange and empowerment by becoming a supporting member of Worldculture Empowerment e.V. Join our mission and create lasting impact.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('website-template/images/home-page/banner/1.jpg') }}">
    <meta name="robots" content="index, follow">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Become a Member – Worldculture Empowerment e.V.">
    <meta name="twitter:description"
        content="Join Worldculture Empowerment e.V. as a supporting member and help create positive global change.">

    <style>
        :root {
            --primary-color: #203364;
            --primary-hover: #838ba5;

            --border-color: #ccc;
            --bg-light: #f9f9f9;
        }

        .donation-container {
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
            padding: 25px;
            font-family: Arial, sans-serif;
            color: #333;
            box-sizing: border-box;
        }

        .donation-container h3 {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
        }

        /* Genel input stili */
        .form-control {
            border-radius: 6px;
            border: 1px solid var(--border-color);
            font-size: 16px;
            padding: 10px 14px;
            height: auto;
        }

        .form-group label {
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }


        /* === Radio Butonlar (Hazır Tutarlar) === */
        .radio-buttons {
            display: flex;
            justify-content: flex-start;
            flex-wrap: wrap;
            gap: 10px;
        }

        .radio-buttons input[type="radio"] {
            display: none;
        }

        .radio-buttons label {
            display: inline-block;
            padding: 10px 25px;
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            color: var(--primary-color);
            background-color: #fff;
            transition: all 0.2s ease;
        }

        .radio-buttons label:hover {
            transform: scale(1.05);
        }

        .radio-buttons input[type="radio"]:checked+label {
            background-color: var(--primary-color);
            color: #fff;
        }

        /* === Checkbox Buton Stili (geliştirilmiş görünüm) === */
        .checkbox-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
            align-items: center;
        }

        .checkbox-buttons input[type="checkbox"] {
            display: none;
        }

        .checkbox-buttons label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            cursor: pointer;
            font-size: 15px;
            color: var(--primary-color);
            background-color: #fff;
            transition: all 0.2s ease;
            user-select: none;
            position: relative;
        }

        .checkbox-buttons label .checkmark {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            color: #fff;
            font-weight: bold;
            line-height: 16px;
            text-align: center;
            background: transparent;
            transition: all 0.2s ease;
        }

        .checkbox-buttons input[type="checkbox"]:checked+label {
            background-color: var(--primary-color);
            color: #fff;
        }

        .checkbox-buttons input[type="checkbox"]:checked+label .checkmark {
            background: #fff;
            color: var(--primary-color);
            border-color: #fff;
        }

        .checkbox-buttons label:hover {
            transform: scale(1.05);
        }

        /* Mobil uyum */
        @media (max-width: 767px) {
            .checkbox-buttons {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* === Checkbox Modern Görünüm === */
        .form-check {
            position: relative;
            display: flex;
            align-items: center;
            padding-left: 25px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 15px;
            user-select: none;
        }

        .form-check input[type="checkbox"] {
            position: absolute;
            left: 0;
            top: 3px;
            width: 18px;
            height: 18px;
            opacity: 0;
            cursor: pointer;
        }

        .form-check span.box {
            position: absolute;
            left: 0;
            top: 2px;
            width: 18px;
            height: 18px;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            background: #fff;
            transition: background 0.2s ease;
        }

        .form-check:hover span.box {
            background: #ffe5e5;
        }

        .form-check input:checked+span.box {
            background: var(--primary-color);
        }

        .form-check input:checked+span.box::after {
            content: "";
            position: absolute;
            left: 5px;
            top: 1px;
            width: 4px;
            height: 9px;
            border: solid #fff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        /* === Stripe alanı === */
        #card-element {
            padding: 12px;
            border-radius: 6px;
            border: 1px solid var(--border-color);
            background: #fff;
        }

        /* === Gönder butonu === */
        #submit-button {
            font-size: 16px;
            padding: 12px 25px;
            display: block;
            margin: 25px auto 0;
            border: none;
            border-radius: 6px;
            background-color: var(--primary-color);
            color: #fff;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        #submit-button:hover {
            background-color: var(--primary-hover);
        }

        /* === Responsive === */
        @media (max-width: 767px) {
            .radio-buttons {
                flex-direction: column;
            }

            .radio-buttons {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

    <style>
        .text-box {
            margin-top: 25px;
        }

        .text-box p {
            font-weight: bold;
            margin-bottom: 15px;
        }

        @media (max-width: 768px) {
            .custom-title {
                font-size: 3rem !important;
            }
        }
    </style>
@endsection

@section('content')
    <div class="donation-container" style="zoom: 1.3; color: var(--primary-color)">
        <div style="text-align: center">
            <h1 class="custom-title">MITGLIEDSCHAFT</h1>
        </div>

        <div class="text-box" style="text-align: justify;">
            <p>
                Vielen Dank für Ihr Interesse an einer Mitgliedschaft bei Worldculture Empowerment e.V.!
            </p>

            <p>
                Wir freuen uns sehr, dass Sie unsere Arbeit zur Stärkung von interkulturellem Austausch, Bildung und
                Empowerment unterstützen möchten.
                Um Fördermitglied bei Worldculture Empowerment e.V. zu werden, bitten wir Sie,
                {{-- das untenstehende --}}
                Onlineformular auszufüllen. Ihre Angaben werden an den zuständigen Ansprechpartner innerhalb unseres Vereins
                weitergeleitet. Wir setzen uns zeitnah mit Ihnen in Verbindung und lassen Ihnen alle erforderlichen
                Informationen und Unterlagen zu Ihrer Fördermitgliedschaft zukommen.
                Selbstverständlich werden Ihre Daten vertraulich
                {{-- behandelt und ausschlie --}}
                ßlich für vereinsinterne Zwecke
                verwendet. Eine Weitergabe an Dritte erfolgt nicht.
            </p>

            <p>
                Die mit * gekennzeichneten Felder sind Pflichtfelder.
            </p>
        </div>

        {{-- <h3>
            Sehr bald...
        </h3> --}}

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form id="payment-form" action="{{ route('membership.process') }}" method="POST">
            @csrf

            <!-- Name / E-Mail -->
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="first_name">Vorname *</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div>

                <div class="col-sm-6 form-group">
                    <label for="last_name">Nachname *</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8 form-group">
                    <label for="email">E-Mail-Adresse *</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="col-sm-4 form-group">
                    <label for="phone">Telefonnummer *</label>
                    <input type="text" name="phone" id="phone" class="form-control" required>
                </div>
            </div>

            <!-- Adressfelder (sichtbar bei Auswahl) -->
            <div id="address-fields">
                <div class="row">
                    <div class="col-sm-8 form-group">
                        <label for="street">Straße *</label>
                        <input type="text" name="street" id="street" class="form-control">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="street_number">Hausnummer *</label>
                        <input type="text" name="street_number" id="street_number" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label for="zip">PLZ *</label>
                        <input type="text" name="zip" id="zip" class="form-control">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="city">Stadt *</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>

                    <div class="col-sm-4 form-group">
                        <label for="country">Land *</label>
                        <input type="text" name="country" id="country" class="form-control" required>
                    </div>
                </div>
            </div>

            <!-- Kreditkartenfeld -->
            <div class="form-group">
                <label>Kreditkarteninformationen *</label>
                <div id="card-element" class="form-control"></div>
            </div>

            <input type="hidden" name="stripeToken" id="stripeToken">
            <input type="hidden" name="stripe_payment_method" id="stripe_payment_method">

            <div class="price-info"
                style="text-align:center; margin:20px 0; font-size:18px; font-weight:bold; color:var(--primary-color)">
                Jahresbeitrag: 120 € <br>
                {{-- <span style="font-size:16px; color:#555">(entspricht nur 10 € pro Monat)</span> --}}
                <br>
                <span style="font-size:16px; color:#555"> 30€ Aufnahmegebühr (einmalig)</span>
            </div>

            <button id="submit-button" class="thm-btn style-2">
                Jetzt Absenden
            </button>
        </form>
    </div>
@endsection

@section('customScript')
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();

        const card = elements.create('card', {
            hidePostalCode: true
        });
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            submitButton.disabled = true;

            /* 1️⃣ Payment Method oluştur */
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    name: `${form.first_name?.value || ''} ${form.last_name?.value || ''}`,
                    email: form.email.value,
                }
            });

            if (error) {
                alert(error.message);
                submitButton.disabled = false;
                return;
            }

            /* 2️⃣ Backend'e gönder */
            const formData = new FormData(form);
            formData.set('stripe_payment_method', paymentMethod.id);

            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                },
                body: formData
            });

            const result = await response.json();

            if (!result.success) {
                alert(result.message || 'Ödeme başlatılamadı');
                submitButton.disabled = false;
                return;
            }

            console.log(result);
            // Eğer client_secret geldiyse → confirmCardPayment yap
            if (result.client_secret) {
                const {
                    error: confirmError,
                    paymentIntent
                } =
                await stripe.confirmCardPayment(result.client_secret);

                if (confirmError) {
                    alert(confirmError.message);
                    submitButton.disabled = false;
                    return;
                }

                if (paymentIntent.status === 'succeeded' || paymentIntent.status === 'processing') {
                    window.location.href = "{{ route('membership.success') }}";
                }
            } else if (result.invoice_status === 'paid' || result.invoice_status === 'active') {
                // client_secret yoksa → ödeme zaten başarılıdır
                window.location.href = "{{ route('membership.success') }}";
            }
        });
    </script>

    <script>
        // Radio buton tıklanınca input değiştir
        document.querySelectorAll('input[name="ready_amount"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                const amount = this.value;
                const input = document.getElementById('amount');
                input.value = amount;
            });
        });

        // Inputa yazınca radio seçimini kaldır
        document.getElementById('amount').addEventListener('input', function() {
            document.querySelectorAll('input[name="ready_amount"]').forEach((radio) => {
                if (this.value != radio.value) {
                    radio.checked = false;
                } else {
                    radio.checked = true;
                }
            });
        });

        document.querySelectorAll('input[name="donation_type"]').forEach(el => {
            el.addEventListener('change', e => {
                document.getElementById('company-fields').style.display = e.target.value === 'company' ?
                    'block' : 'none';
            });
        });

        // Checkbox seçildiğinde adres alanlarını göster/gizle
        document.addEventListener('DOMContentLoaded', function() {
            var checkbox = document.getElementById('wants_invoice');
            var addressFields = document.getElementById('address-fields');

            checkbox.addEventListener('change', function() {
                addressFields.style.display = this.checked ? 'block' : 'none';
            });
        });

        // Abonelik tipi değiştiğinde amount'u güncelle
        document.getElementById('recurring_interval').addEventListener('change', function() {
            const amountInput = document.getElementById('amount');
            if (this.value === 'membership') {
                amountInput.value = 120;
                amountInput.readOnly = true;
            } else {
                amountInput.readOnly = false;
            }
        });
    </script>
@endsection
