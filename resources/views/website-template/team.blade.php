@extends('website-template.layouts.app')

@section('meta&title')
    <title>WORLDCULTURE EMPOWERMENT</title>

    <style>
        .custom-image-box {
            aspect-ratio: 3/4;
            /* dikey oran */
            overflow: hidden;
        }

        .custom-image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .text {
            height: 80px;
        }
    </style>
@endsection

@section('content')
    <!--start our-team-->
    <section class="our-team style-two">
        <div class="container">
            <div class="section-title">
                <h5>Lernen Sie unser Team kennen</h5>
                <h1>UNSER<span> TEAM</span></h1>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam,</p> --}}
            </div>

            <div class="item-box">
                <div class="row">

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="custom-image-box">
                                    <img src="{{ asset('website-template/images/team/selin.jpg') }}" alt="Selin" />
                                </div>
                                <div class="content-box">
                                    <h4>Selin Schäfer
                                        <br><br>
                                        Vorsitzende
                                    </h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="90"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <p>Gründerin - Reiseagentur Worldculture Travels</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="custom-image-box">
                                    <img src="{{ asset('website-template/images/team/jana.jpg') }}" alt="" />
                                </div>
                                <div class="content-box">
                                    <h4>Jana Valentina Hortian
                                        <br><br>
                                        Stellvertretende Vorsitzende
                                    </h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="70"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="text">
                                        <p>Stellvertretende Vorsitzende</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="custom-image-box">
                                    <img src="{{ asset('website-template/images/team/hannah.jpg') }}" alt="Hannah" />
                                </div>
                                <div class="content-box">
                                    <h4>Hannah Jaspert
                                        <br><br>
                                        Schatzmeisterin
                                    </h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="70"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="text">
                                        <p>Kundinnenmanagerin, systemische Coachin & Yogalehrerin</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12"></div>

                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item">
                            <div class="bg-area">
                                <div class="custom-image-box">
                                    <img src="{{ asset('website-template/images/team/arzu.jpg') }}" alt="Arzu" />
                                </div>
                                <div class="content-box">
                                    <h4>Arzu
                                        <br><br>
                                        Sozialpädagogin
                                    </h4>
                                    <div class="progress-levels">
                                        <!--Skill Box-->
                                        <div class="progress-box">
                                            <div class="inner">
                                                <div class="bar">
                                                    <div class="bar-innner">
                                                        <div class="bar-fill" data-percent="35"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="text">
                                        <p>Sozialpädagogin</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-6 col-xs-12"></div>

                </div>
            </div>
        </div>
    </section>
    <!--end our-team-->
@endsection

@section('customScript')
@endsection
