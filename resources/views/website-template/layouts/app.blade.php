<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('meta&title')
    @include('website-template.layouts.head')
    @yield('styles')
</head>


<body>
    <div class="boxed_wrapper">
        @include('website-template.layouts.navigation')

        @yield('content')

        @include('website-template.layouts.footer')

        <!-- Scroll Top Button -->
        <button class="scroll-top tran3s color2_bg">
            <span class="fa fa-angle-up"></span>
        </button>
        <!-- pre loader  -->
        <div class="preloader"></div>


        @include('website-template.layouts.scripts')
        @yield('customScript')
    </div>
</body>

{{-- <body class="font-sans antialiased">
    <x-cookie-banner />

    <div id="google_translate_element" style="display: none;"></div>

    <div class="min-h-screen bg-gray-100 text-justify">
        <!-- Page Content -->
        @yield('content')

    </div>

    @include('website-template.layouts.scripts')
    @yield('customScript')
</body> --}}

</html>
