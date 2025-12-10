@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>
    {{-- <meta name="description" content="Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.">
  <meta name="keywords" content=" worldculture, travels, partner, kundenbewertungen">
  <meta property="og:title" content="WORLDCULTURE TRAVELS">
  <meta property="og:description" content="{{ Str::limit("Komm mit uns auf Reisen und erlebe die unterschiedlichsten Farben, Traditionen, Geschmäcker, Bräuche und Kulturen dieser Welt. Werde Teil der Worldculture Travels Community und triff Frauen aus aller Welt - wir bringen Euch zusammen.", 160) }}">
  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('frontend/assets/style/images/home-page/bg-image/bg.jpg') }}"> --}}
    <style>
        :root {
            /* --primary-color: #43374e;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            --primary-hover: #646e8f; */
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
@endsection

@section('content')
    <div class="donation-container" style="zoom: 1.3; color: var(--primary-color)">
        <h3>Bağış Yap</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form id="payment-form" method="POST" action="{{ route('donation.process') }}">
            @csrf

            <!-- Desteklenen Proje -->
            <div class="form-group">
                <label for="supported_project">I would like to support</label>
                <select name="supported_project" id="supported_project" class="form-control">
                    <option value="project1">Proje 1</option>
                    <option value="project2">Proje 2</option>
                    <option value="project3">Proje 3</option>
                </select>
            </div>

            <!-- Tutar -->
            <div class="form-group">
                <label for="amount">Tutar (€)</label>
                <input type="number" name="amount" id="amount" class="form-control" min="1"
                    placeholder="Kendi tutarınızı girin">
            </div>

            <!-- Hazır Tutarlar -->
            <div class="form-group">
                <label>Hazır Tutar Seçin</label>
                <div class="radio-buttons">
                    <input type="radio" name="ready_amount" value="5" id="amount5">
                    <label for="amount5">€5</label>

                    <input type="radio" name="ready_amount" value="10" id="amount10">
                    <label for="amount10">€10</label>

                    <input type="radio" name="ready_amount" value="25" id="amount25">
                    <label for="amount25">€25</label>

                    <input type="radio" name="ready_amount" value="50" id="amount50">
                    <label for="amount50">€50</label>
                </div>
            </div>

            <!-- Bağış Türü -->
            <label>Bağış Türü</label>
            <div class="radio-buttons">
                <input type="radio" name="donation_type" id="individual" value="individual" checked>
                <label for="individual">individual</label>

                <input type="radio" name="donation_type" id="company" value="company">
                <label for="company">Company</label>
            </div>

            <!-- Bağış tipi -->
            <label>Bağış Tipi</label>
            <div class="radio-buttons">
                <input type="radio" name="recurring_interval" id="one_time" value="one_time" checked>
                <label for="one_time">Tek Seferlik</label>

                <input type="radio" name="recurring_interval" id="membership" value="membership">
                <label for="membership">Aylık</label>

                <input type="radio" name="recurring_interval" id="year" value="year">
                <label for="year">Yıllık</label>
            </div>

            <div id="company-fields" style="display:none;">
                <div class="form-group">
                    <label>Şirket Adı</label>
                    <input type="text" name="company_name" id="company_name" class="form-control">
                </div>
            </div>

            <!-- Ad / Eposta -->
            <div class="row">
                <div class="col-sm-6 form-group">
                    <label for="first_name">first Name *</label>
                    <input type="text" name="first_name" id="first_name" class="form-control">
                </div>

                <div class="col-sm-6 form-group">
                    <label for="last_name">Last Name *</label>
                    <input type="text" name="last_name" id="last_name" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>

            <!-- === Vergi indirimi bölümü (Almanya bağışçıları için) === -->
            <div class="form-group" style="margin-top: 25px;">
                <p style="font-size: 15px; color: var(--primary-color);">
                    If you reside in Germany, this donation is tax-deductible.
                    Please provide the details below to receive the necessary donation confirmation from us.
                </p>

                <div class="checkbox-buttons">
                    <input type="hidden" name="wants_invoice" value="0">
                    <input type="checkbox" id="wants_invoice" name="wants_invoice" value="1">
                    <label for="wants_invoice">
                        <span class="checkmark">✓</span>
                        I would like to receive a donation confirmation for tax deduction
                    </label>
                </div>
            </div>

            <!-- === Adres alanları (checkbox seçilince görünür) === -->
            <div id="address-fields" style="display: none; margin-top: 20px;">
                <div class="row">
                    <div class="col-sm-8 form-group">
                        <label for="street">Street *</label>
                        <input type="text" name="street" id="street" class="form-control">
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="street_number">Street No. *</label>
                        <input type="text" name="street_number" id="street_number" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label for="zip">ZIP *</label>
                        <input type="text" name="zip" id="zip" class="form-control">
                    </div>
                    <div class="col-sm-8 form-group">
                        <label for="city">City *</label>
                        <input type="text" name="city" id="city" class="form-control">
                    </div>
                </div>

                <!-- Desteklenen Proje -->
                <div class="form-group">
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="project1">Turkey</option>
                        <option value="project2">Germany</option>
                        <option value="project3">England</option>
                    </select>
                </div>
            </div>

            <!-- Mesaj -->
            <div class="form-group">
                <label for="message">Mesajınız</label>
                <textarea name="message" class="form-control" rows="3"></textarea>
            </div>

            <!-- Kart Alanı -->
            <div class="form-group">
                <label>Kredi Kartı Bilgileri</label>
                <div id="card-element" class="form-control"></div>
            </div>

            <input type="hidden" name="stripeToken" id="stripeToken">

            <button id="submit-button" type="submit" class="thm-btn style-2">
                Bağış Yap
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
        const card = elements.create('card');
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');

        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            submitButton.disabled = true;

            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: card,
                billing_details: {
                    name: form.first_name?.value || '',
                    email: form.email.value,
                },
            });

            if (error) {
                alert(error.message);
                submitButton.disabled = false;
                return;
            }

            document.getElementById('stripeToken').value = paymentMethod.id;
            form.submit();
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
                amountInput.value = '120';
                amountInput.readOnly = true;
            } else {
                amountInput.readOnly = false;
            }
        });
    </script>
@endsection
