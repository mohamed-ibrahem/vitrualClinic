@extends ('layout.app', [
    'no_footer' => true
])

@section ('title', trans('pages.admin.home.title'))
@section ('description', trans('pages.admin.home.description', ['user' => auth()->user()->name]))

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20">
                    <h4 class="widget-thumb-heading">@lang('pages.admin.home.widgets.doctors.title')</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-green fa fa-user-md"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.doctors.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $doctors->count() }}">{{ $doctors->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20">
                    <h4 class="widget-thumb-heading">@lang('pages.admin.home.widgets.members.title')</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-blue fa fa-user"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.members.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $members->count() }}">{{ $members->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20">
                    <h4 class="widget-thumb-heading">@lang('pages.admin.home.widgets.messages.title')</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-purple fa fa-comments"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.messages.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="{{ $messages->count() }}">{{ $messages->count() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20">
                    <h4 class="widget-thumb-heading">@lang('pages.admin.home.widgets.ratings.title')</h4>
                    <div class="widget-thumb-wrap">
                        <i class="widget-thumb-icon bg-red fa fa-star-half-alt"></i>
                        <div class="widget-thumb-body">
                            <span class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.ratings.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="0">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                {!! $registrants->container() !!}
            </div>
        </div>
    </div>
@stop

@push ('scripts')
    <script src="{{ asset('assets/global/plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/charts/Chart.min.js') }}"></script>
    {!! $registrants->script() !!}
    <script>

    </script>
@endpush
