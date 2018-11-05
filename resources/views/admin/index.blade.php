@extends ('layout.app')

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
                            <span
                                class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.doctors.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup"
                                  data-value="{{ $doctors->count() }}">{{ $doctors->count() }}</span>
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
                            <span
                                class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.members.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup"
                                  data-value="{{ $members->count() }}">{{ $members->count() }}</span>
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
                            <span
                                class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.messages.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup"
                                  data-value="{{ $messages->count() }}">{{ $messages->count() }}</span>
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
                            <span
                                class="widget-thumb-subtitle">@lang('pages.admin.home.widgets.ratings.subtitle')</span>
                            <span class="widget-thumb-body-stat" data-counter="counterup" data-value="0">0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                @component('layout.partials.components.portlet', [
                    'title' => trans('pages.admin.home.widgets.registrants.title')
                ])
                    @slot('body')
                        <div id="registrants_statistics"
                             class="portlet-body portlet-body-morris-fit morris-chart"
                             style="height: 267px"></div>
                    @endslot
                    @slot('actions')
                        <div class="btn-group btn-group-devided" data-toggle="buttons" id="registrants_options">
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" value="year" class="toggle" id="option1" checked>{{ trans('pages.admin.home.widgets.registrants.options.0') }}</label>
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" value="month" class="toggle" id="option2">{{ trans('pages.admin.home.widgets.registrants.options.1') }}</label>
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" value="week" class="toggle" id="option3">{{ trans('pages.admin.home.widgets.registrants.options.2') }}</label>
                        </div>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@stop


@push ('styles')
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/morris/morris.css') }}">
@endpush
@push ('scripts')
    <script src="{{ asset('assets/global/plugins/counterup/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/counterup/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/morris/raphael-min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/morris/morris.min.js') }}"></script>
    <script>
        var Home = {
            morris_registrants_statistics: null,
            registrants_data: @json($registrants),

            initRegistrants: function() {
                this.morris_registrants_statistics = Morris.Area({
                    element: 'registrants_statistics',
                    padding: 0,
                    behaveLikeLine: false,
                    gridEnabled: false,
                    gridLineColor: false,
                    axes: false,
                    fillOpacity: 1,
                    data: this.registrants_data['year'],
                    lineColors: ['#399a8c', '#92e9dc'],
                    xkey: 'date',
                    ykeys: ['doctors', 'members'],
                    labels: ['Doctors', 'Members'],
                    pointSize: 0,
                    lineWidth: 0,
                    hideHover: 'auto',
                    resize: true
                });
            },

            handleRegistrantsOptions: function() {
                var that = this;
                $('#registrants_options input[name="options"]').on('change', function(e) {
                    e.preventDefault();
                    that.morris_registrants_statistics.setData(that.registrants_data[this.value]);

                    console.log(that.morris_registrants_statistics);
                });
            },

            init: function() {
                this.handleRegistrantsOptions();
                this.initRegistrants();
            },
        };
        $(function () {
            Home.init();
        })
    </script>
@endpush
