<meta charset="UTF-8">
<title>Charity sympathy || Responsive HTML 5 Template</title>

<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="{{ asset('website-template/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('website-template/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('website-template/fonts/flaticon.css') }}">


<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('website-template/images/favicon/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" href="{{ asset('website-template/images/favicon/favicon-32x32.png') }}"
    sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('website-template/images/favicon/favicon-16x16.png') }}"
    sizes="16x16">

<meta name="author" content="Selin Schäfer">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    .instagram .img-holder img {
        width: 80px !important;
        height: 80px !important;
        /* Sabit yükseklik */
        object-fit: cover !important;
        /* Görseli kırparak sığdırır */
        border-radius: 5px;
        /* İsteğe bağlı yuvarlatma */
    }

    .big-donate {
        font-weight: 400 !important;
        font-size: 25px !important;
        line-height: 10px !important;
    }
</style>
