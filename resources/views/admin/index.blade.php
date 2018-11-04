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
                    'title' => trans('pages.admin.home.widgets.registrants.title'),
                    'actionClass' => 'actions',
                    'icon' => 'fa fa-users'
                ])
                    @slot('body')
                        <div id="registrants_statistics"
                             class="portlet-body portlet-body-morris-fit morris-chart"
                             style="height: 267px"></div>
                    @endslot
                    @slot('actions')
                        <div class="btn-group btn-group-devided" data-toggle="buttons" id="registrants_options">
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" value="year" class="toggle"
                                       id="option1">{{ trans('pages.admin.home.widgets.registrants.options.0') }}
                            </label>
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm">
                                <input type="radio" name="options" value="month" class="toggle"
                                       id="option2">{{ trans('pages.admin.home.widgets.registrants.options.1') }}
                            </label>
                            <label class="btn btn-transparent grey-salsa btn-outline btn-circle btn-sm active">
                                <input type="radio" name="options" value="week" class="toggle" id="option3"
                                       checked>{{ trans('pages.admin.home.widgets.registrants.options.2') }}</label>
                        </div>
                    @endslot
                @endcomponent
            </div>
            <div class="col-sm-6">
                @component('layout.partials.components.portlet', [
                    'title' => trans('pages.admin.home.widgets.specialties.title'),
                    'icon' => 'fa fa-hospital-alt',
                    'actions' => ''
                ])
                    @slot('body')
                        <div id="specialties_statistics"
                             class="portlet-body portlet-body-morris-fit"
                             style="height: 267px"></div>
                    @endslot
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @component('layout.partials.components.portlet', [
                    'title' => trans('pages.admin.home.widgets.main.title'),
                ])
                    <div class="row number-stats margin-bottom-30">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="stat-left">
                                <div class="stat-chart">
                                    <div id="sparkline_bar"></div>
                                </div>
                                <div class="stat-number">
                                    <div class="title">@lang('pages.admin.home.widgets.main.active')</div>
                                    <div class="number" data-counter="counterup" data-value="{{ $allOnline = (new \App\User)->allOnline()->count() }}">{{ $allOnline }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="stat-right">
                                <div class="stat-chart">
                                    <div id="sparkline_bar2"></div>
                                </div>
                                <div class="stat-number">
                                    <div class="title">@lang('pages.admin.home.widgets.main.sessions')</div>
                                    <div class="number" data-counter="counterup" data-value="{{ $mostRecentOnline = (new \App\User)->mostRecentOnline()->count() }}">{{ $mostRecentOnline }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse((new \App\User)->mostRecentOnline() as $users)
                                <tr>
                                    <td>{{ $users->name }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="alert-warning">
                                        <div class="">@lang('general.alerts.no_data', ['link' => '#', 'title' => 'visit users'])</div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
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
            initRegistrants: function () {
                var morris_registrants_statistics = null,
                    registrants_data = @json($registrants);

                morris_registrants_statistics = Morris.Area({
                    element: 'registrants_statistics',
                    padding: 0,
                    gridEnabled: false,
                    gridLineColor: false,
                    hideHover: true,
                    axes: false,
                    data: registrants_data['week'],
                    lineColors: ['#32c5d2', '#92e9dc'],
                    xkey: 'label',
                    ykeys: ['doctors', 'members'],
                    labels: ['Doctors', 'Members'],
                });
                $('#registrants_options input[name="options"]').on('change', function (e) {
                    e.preventDefault();
                    morris_registrants_statistics.setData(registrants_data[this.value]);
                });
            },

            initSpecialities: function () {
                new Morris.Donut({
                    element: 'specialties_statistics',
                    data: @json($specialties)
                });
            },

            init: function () {
                this.initRegistrants();
                this.initSpecialities();
            },
        };
        $(function () {
            Home.init();
        })
    </script>
@endpush
