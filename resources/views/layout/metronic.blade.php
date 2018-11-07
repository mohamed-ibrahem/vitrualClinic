<!DOCTYPE html>
<!--[if IE 8]> <html lang="{{ app()->getlocale() }}" class="ie8 no-js" dir="{{ trans('general.dir') ?: 'ltr' }}"> <![endif]-->
<!--[if IE 9]> <html lang="{{ app()->getlocale() }}" class="ie9 no-js" dir="{{ trans('general.dir') ?: 'ltr' }}"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getlocale() }}" dir="{{ trans('general.dir') ?: 'ltr' }}">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ config('app.name') }}</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="{{ config('app.name') }}" name="description" />
    <meta content="{{ config('app.name') }}" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    @unless (isset($no_loading) && $no_loading)
        <script src="{{ asset('assets/global/plugins/pace/pace.min.js') }}"></script>
        <link rel="stylesheet" href="{{ assets_dir('assets/global/plugins/pace/themes/pace-theme-flash.css') }}">
    @endunless
    <link href="{{ asset('assets/global/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_dir('assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    @stack ('styles')
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ assets_dir('assets/global/css/components.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ assets_dir('assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ assets_dir('assets/layout/css/layout.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layout/css/blue-hoki.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/layout/css/custom.css') }}" rel="stylesheet" type="text/css" />
    @if (trans('general.dir') === 'rtl')
        <link href="{{ asset('assets/layout/css/custom-rtl.css') }}" rel="stylesheet" type="text/css" />
    @endif
    @stack ('customize')
    <!-- END THEME LAYOUT STYLES -->

    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" />
</head>
<!-- END HEAD -->

<body{!! isset($class) ? ' class="'. $class .'"' : '' !!}>
@yield ('metronic-content')

<!--[if lt IE 9]>
<script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('assets/global/scripts/app.min.js') }}?001" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
@stack ('scripts')
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('assets/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-104484443-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-104484443-1');
</script>
</body>
</html>
