@extends ('layout.metronic', [
    'class' => (isset($class) ? $class : 'page-header-menu-fixed')  . ' page-container-bg-solid page-boxed'
])

@section ('metronic-content')
    @if ( !isset($no_header) || ! $no_header)
        <!-- BEGIN HEADER -->
        <div class="page-header">
            <!-- BEGIN HEADER TOP -->
            <div class="page-header-top">
                <div class="container">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/layout/img/logo-default.jpg') }}"
                                 alt="{{ config('app.name') }}" class="logo-default"/>
                        </a>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler"></a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                @include ('layout.partials.top_navigation')
                <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <!-- END HEADER TOP -->
            <!-- BEGIN HEADER MENU -->
            <div class="page-header-menu">
                <div class="container">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <form class="search-form" action="page_general_search.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="@lang('general.search')" name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN MEGA MENU -->
                @include ('layout.partials.mega_menu')
                <!-- END MEGA MENU -->
                </div>
            </div>
            <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
    @else
        @yield ('header')
    @endif
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            {!! isset($wrapper) ? $wrapper : '' !!}
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                @hasSection('title')
                    <!-- BEGIN PAGE TITLE -->
                        <div class="page-title">
                            <h1>
                                @yield('title')
                                @hasSection('description')
                                    <small>@yield('description')</small>
                                @endif
                            </h1>
                        </div>
                        <!-- END PAGE TITLE -->
                @endif

                @hasSection('toolbar')
                    <!-- BEGIN PAGE TOOLBAR -->
                        <div class="page-toolbar">
                            @yield ('toolbar')
                        </div>
                        <!-- END PAGE TOOLBAR -->
                    @endif
                </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
                <div class="container">
                @if (! isset($no_breadcrumbs) || ! $no_breadcrumbs)
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    {!! Breadcrumbs::render() !!}
                    <!-- END PAGE BREADCRUMBS -->
                    @endif
                </div>

                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                    @yield ('content')
                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
            {!! isset($endOfWrapper) ? $endOfWrapper : '' !!}
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    @include ('layout.partials.footer')
    <!-- END FOOTER -->
@stop
