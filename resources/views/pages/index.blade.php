@extends ('layout.app', [
    'class' => 'about_page',
    'no_breadcrumbs' => true,
    'no_header' => true,
    'no_footer' => false,
    'no_loading' => true
])

@section('title', 'Download App')

@section ('header')
    <div class="page-header">
        <div class="page-header-menu" style="display: block;">
            <div class="container">
                <div class="page-title text-center">
                    <h1 class="bold">{{ config('app.name') }}</h1>
                    @lang('pages.index.description')

                    <a href="javascript:;" onclick="App.scrollTo($('.phoneapp'), -100)" class="btn btn-primary">@lang('pages.index.main_button')</a>
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
                        <span>@lang('pages.index.features.0.title')</span>
                    </div>
                    <div class="card-desc">
                    <span>@lang('pages.index.features.0.body')</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-trophy font-green-haze theme-font"></i>
                    </div>
                    <div class="card-title">
                        <span>@lang('pages.index.features.1.title')</span>
                    </div>
                    <div class="card-desc">
                        <span>@lang('pages.index.features.1.body')</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-basket font-purple-wisteria theme-font"></i>
                    </div>

                    <div class="card-title">
                        <span>@lang('pages.index.features.2.title')</span>
                    </div>
                    <div class="card-desc">
                        <span>@lang('pages.index.features.2.body')</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="portlet light">
                    <div class="card-icon">
                        <i class="icon-layers font-blue theme-font"></i>
                    </div>
                    <div class="card-title">
                        <span>@lang('pages.index.features.3.title')</span>
                    </div>
                    <div class="card-desc">
                        <span>@lang('pages.index.features.3.body')</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="phoneapp">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm">
                    <img src="{{ asset('assets/layout/img/icliniq-app.png') }}" alt="VC LOGO" class="img-responsive">
                </div>
                <div class="col-md-8">
                    <h1>@lang('pages.index.phone.download', ['app' => config('app.name')])</h1>
                    <h3>@lang('pages.index.phone.availability', ['app' => config('app.name')])</h3>
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
                    <h1>@lang('pages.index.top_specialties')</h1>

                    <div class="row">
                        @foreach(\App\Speciality::Top()->take(12)->chunk(6) as $chunks)
                            <div class="col-sm-6 about-links-item">
                                <ul class="list-unstyled" style="margin-top: 15px">
                                    @foreach($chunks as $speciality)
                                        <li>
                                            <a class="badge badge-info" href="#" style="display: block;font-size: 13px !important;height: auto;padding: 7px;">{{ $speciality['label'] }}</a>
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

@push ('customize')
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

        .page-content {
            padding: 30px 0 0;
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
            height: 304px;
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
