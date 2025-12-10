<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr" data-startbar="dark" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="Login | Worldculture Admin" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Login | Worldculture Dashboard</title>

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('website-template/images/logo/logo_header.png') }}">

    <!-- App css -->
    <link href="{{ asset('admin-template/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin-template/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    @yield('content')
</body>

</html>
