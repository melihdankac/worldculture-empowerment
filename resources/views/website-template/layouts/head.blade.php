<meta charset="UTF-8">
<title>WORLDCULTURE EMPOWERMENT</title>

<!-- mobile responsive meta -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Stylesheets -->
<link rel="stylesheet" href="{{ asset('website-template/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('website-template/css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('website-template/fonts/flaticon.css') }}">

<!-- Logo -->
<link rel="icon" sizes="180x180" href="{{ asset('website-template/images/favicon/logo_header_180x180.png') }}">
<link rel="icon" type="image/png" href="{{ asset('website-template/images/favicon/logo_header_32x32.png') }}"
    sizes="32x32">
<link rel="icon" type="image/png" href="{{ asset('website-template/images/favicon/logo_header_16x16.png') }}"
    sizes="16x16">

<!-- Meta tags -->
<meta name="author" content="Selin Schäfer">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Instagram Photos */
    .instagram .img-holder img {
        width: 80px !important;
        height: 80px !important;
        /* Sabit yükseklik */
        object-fit: cover !important;
        /* Görseli kırparak sığdırır */
        border-radius: 5px;
        /* İsteğe bağlı yuvarlatma */
    }

    /* Custom Hero Banner */
    .custom-hero-banner {
        position: relative;
        width: 100%;
        height: 85vh;
        /* resim yüksekliği */
        overflow: hidden;
    }

    .custom-hero-banner img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .banner-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
    }

    .banner-content h1,
    .banner-content h4 {
        padding-bottom: 1.2rem;
    }
</style>
