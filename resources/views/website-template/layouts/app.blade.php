<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @yield('meta&title')
    @include('website-template.layouts.head')
    @yield('styles')
</head>

<body>
    <div class="boxed_wrapper">
        <x-cookie-banner />
        <div id="google_translate_element" style="display: none;"></div>

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

</html>
