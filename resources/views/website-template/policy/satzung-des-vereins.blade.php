@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>

    <style>
        h1,
        h2,
        h3 {
            margin: 1.2em 0 0.5em;
            line-height: 1.3;
        }

        p {
            margin: 0.8em 0;
        }

        ul,
        ol {
            margin: 0.8em 0 0.8em 1.2em;
        }

        blockquote {
            margin: 1em 0;
            padding: 0.5em 1em;
            border-left: 3px solid #ddd;
            color: #555;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/1.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/2.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/3.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/4.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/5.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/6.png') }}" alt="">
        <img src="{{ asset('website-template/images/policys/satzung-des-vereins/7.png') }}" alt="">
    </div>
@endsection
