@extends ('layout.app', [
    'no_breadcrumbs' => true,
    'no_header' => true,
])

@section ('header')
    <div class="page-header">
        <div class="page-header-menu" style="display: block;">
            <div class="container">
                <div class="page-title text-center">
                    <h1 class="bold">{{ config('app.name') }}</h1>
                    <ul class="list-unstyled margin-bottom-30 margin-top-30">
                        <li>2500+ doctors from 80+ specialities.</li>
                        <li>Ideal for Medical Second Opinion and Medical Advice.</li>
                        <li>Trusted by patients across 196 countries.</li>
                        <li>Consult with the comfort of your home.</li>
                        <li>It is private and secure.</li>
                    </ul>

                    <a href="javascript:;" onclick="App.scrollTo($('.phoneapp'), -100)" class="btn btn-primary">Download now</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section ('content')
    <div class="container">
        <div class="row margin-bottom-20">
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-user-follow font-red-sunglo theme-font"></i>
                    </div>
                    <div class="card-title">
                        <span>Save Time</span>
                    </div>
                    <div class="card-desc">
                    <span>
                        Helping several thousand users everyday.
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-trophy font-green-haze theme-font"></i>
                    </div>
                    <div class="card-title">
                        <span>Save Travel</span>
                    </div>
                    <div class="card-desc">
                    <span>
                        Treating patients with health issues from Psychiatry, Sexology, Radiology, Dermatology, OB/GYN, Oncology and 80+ other specialities.
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-basket font-purple-wisteria theme-font"></i>
                    </div>
                    <div class="card-title">
                        <span>Comfort of Your Home</span>
                    </div>
                    <div class="card-desc">
                    <span>
                        Trusted by millions and serving users world wide.
                    </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-layers font-blue theme-font"></i>
                    </div>
                    <div class="card-title">
                        <span>Your first query is FREE</span>
                    </div>
                    <div class="card-desc">
                    <span>
                        Most convenient for expats and travellers.
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="phoneapp">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm">
                    <img src="{{ asset('assets/layout/img/icliniq-app.png') }}" class="img-responsive">
                </div>
                <div class="col-md-8">
                    <h1>GET {{ config('app.name') }} APP</h1>
                    <h3>{{ config('app.name') }} app is now available for Android Phones and iPhone.</h3>
                    <ul class="list-inline margin-top-20">
                        <li><a href="#"><img src="{{ asset('assets/layout/img/android-btn.png') }}" alt=""></a></li>
                        <li><a href="#"><img src="{{ asset('assets/layout/img/iphone-btn.png') }}" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="about-links-cont">
        <div class="container">
            <div class="row">
                <div class="col-md-6 about-links">
                    <h1>Popular Specialists</h1>

                    <div class="row">
                        @foreach(\App\Speciality::take(14)->inRandomOrder()->get()->chunk(7) as $chunks)
                            <div class="col-sm-6 about-links-item">
                                <ul class="list-inline">
                                    @foreach($chunks as $speciality)
                                        <li>
                                            <a class="badge" href="#">{{ $speciality->display_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="about-image"
                         style="background: url({{ asset('assets/layout/img/ss.png') }}) center top no-repeat;">
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push ('styles')
    <style>
        .page-header {
            height: 70vh;
            background-image: url("{{ asset('assets/layout/img/shutterstock_202325818-e1433766480815-890x400.jpg') }}");
            background-position: center bottom;
            -webkit-background-size: cover;
            background-size: cover;
            position: relative;
        }

        .page-header:after {
            content: '';
            position: absolute;
            background-color: rgba(0, 0, 0, .7);
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        .page-header-top {
            position: relative;
            z-index: 3;
        }

        .page-header-menu {
            background-color: transparent !important;
            color: #e5e5e5;
            margin-top: calc((70vh - 60vh) + 15px);
            position: relative;
            z-index: 2;
        }

        .page-header-menu .page-title h1 {
            letter-spacing: 5px;
        }

        .portlet {
            height: 350px;
        }

        .portlet .card-desc, .portlet .card-icon, .portlet .card-title {
            text-align: center;
        }

        .portlet .card-title span {
            font-size: 18px;
            font-weight: 600;
            color: #373d43;
        }

        .portlet .card-icon {
            overflow: hidden;
        }

        .portlet .card-icon i {
            font-size: 50px;
            border: 1px solid #ecf0f4;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
            padding: 47px 30px;
            margin: 30px 0;
        }

        .portlet .card-desc {
            margin-top: 20px;
            margin-bottom: 30px;
        }

        .portlet .card-desc span {
            font-size: 14px;
            font-weight: 400;
            color: #808a94;
        }

        .phoneapp {
            margin: 95px 0 0;
            color: #e5e5e5;
        }

        .phoneapp {
            background-image: url("{{ asset('assets/layout/img/5.jpg') }}");
        }

        .phoneapp .col-md-8 {
            margin-top: calc((500px / 2) - 150px);
        }

        .phoneapp .col-md-4 {
            margin-top: -100px;
        }

        .about-links-cont {
            background-color: #fff;
        }

        .about-image {
            height: 250px;
            padding-left: 110px;
        }

        .about-links-item {
            margin-bottom: 2em;
        }

        .about-links-item h4 {
            font-size: 18px;
            font-weight: 600;
            color: #373d43;
        }

        .about-links-item ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .about-links-item ul li {
            padding-top: 5px;
            padding-left: 0;
        }

        .page-header .page-header-top .top-menu .navbar-nav>li.dropdown>.dropdown-toggle {
            background-color: transparent !important;
        }

        @media (max-width: 767px) {
            .page-header-menu {
                margin-top: 0;
                padding-top: 0 !important;
            }

            .page-header-menu .page-title h1 {
                font-size: 26px;
            }

            .top-menu {
                display: none !important;
            }
        }

        @media (max-width: 991px) {
            .page-header-menu {
                margin-top: 10vh;
                padding-top: 0 !important;
            }
        }
    </style>
@endpush
