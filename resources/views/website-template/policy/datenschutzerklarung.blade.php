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
@endsection

@section('content')
    <div class="container">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/1.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/2.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/3.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/4.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/5.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/6.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/7.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/8.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/datenschutzerklärung/9.png') }}" alt="">
    </div>
@endsection
