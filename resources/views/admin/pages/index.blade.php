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
                    'title' => trans('pages.admin.home.widgets.registrants.title'),
                    'icon' => 'fa fa-users'
                ])
                    <div id="registrants_statistics"
                         class="portlet-body portlet-body-morris-fit morris-chart"
                         style="height: 267px"></div>

                    @slot('actions')
                        <div class="actions">
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
                    <div id="specialties_statistics"
                         class="portlet-body portlet-body-morris-fit"
                         style="height: 267px"></div>
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
                                    <div class="number" data-counter="counterup"
                                         data-value="{{ $allOnline = (new \App\User)->allOnline()->count() }}">{{ $allOnline }}</div>
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
                                    <div class="number" data-counter="counterup"
                                         data-value="{{ $mostRecentOnline = (new \App\User)->mostRecentOnline()->count() }}">{{ $mostRecentOnline }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-scrollable table-scrollable-borderless">
                        <table class="table table-hover table-light">
                            <thead>
                            <tr>
                                <th width="25%">Name</th>
                                <th width="25%">Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse((new \App\User)->mostRecentOnline() as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                        <div
                                            class="label label-primary pull-right">{{ $user->role->display_name }}</div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-right">
                                        <a href="#user_{{ $user->getKey() }}_profile" data-toggle="modal"
                                           class="btn btn-primary btn-xs"
                                           style="width: 300px;">{{ trans('general.datatable.tools.show') }}</a>

                                        <div id="user_{{ $user->getKey() }}_profile" class="modal fade"
                                             data-keyboard="false" tabindex="-1"
                                             role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg text-left">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true"></button>

                                                        <img src="{{ $user->profile_pic }}" alt="{{ $user->name }}"
                                                             width="55"
                                                             class="pull-left img-circle margin-right-10">
                                                        <h4 class="modal-title">
                                                            {{ $user->name }}<br/>
                                                            @if ($user->isDoctor())
                                                                <small>{{ str_limit(
                                                                implode(', ', $user->specialities->map(function($specialty) {
                                                                    return $specialty->display_name;
                                                                })->all())
                                                            ) }}</small>
                                                            @endif
                                                        </h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                @component('layout.partials.components.portlet', [
                                                                    'title' => 'General Information',
                                                                    'icon' => 'fa fa-user'
                                                                ])
                                                                    @slot ('body')
                                                                        <div class="portlet-body">
                                                                            <table class="table table-striped">
                                                                                <tr>
                                                                                    <td width="50%">Name</td>
                                                                                    <td width="50%">{{ $user->name }}</td>
                                                                                </tr>
                                                                                @if (! $user->isAdmin())
                                                                                <tr>
                                                                                    <td width="50%">Gender</td>
                                                                                    <td width="50%">{{ $user->gender }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="50%">Age</td>
                                                                                    <td width="50%">{{ $user->info->get('age') }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="50%">Country</td>
                                                                                    <td width="50%"><img
                                                                                            src="{{ $user->country }}"
                                                                                            alt=""></td>
                                                                                </tr>
                                                                                @endif
                                                                            </table>
                                                                        </div>
                                                                    @endslot
                                                                @endcomponent
                                                            </div>
                                                            <div class="col-md-6">
                                                                @component('layout.partials.components.portlet', [
                                                                    'title' => 'Account',
                                                                    'icon' => 'fa fa-user',
                                                                    'actions' => ''
                                                                ])
                                                                    @slot ('body')
                                                                        <div class="portlet-body">
                                                                            <table class="table table-striped">
                                                                                <tr>
                                                                                    <td width="50%">Email</td>
                                                                                    <td width="50%">{{ $user->email }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td width="50%">Phone</td>
                                                                                    <td width="50%">{{ $user->phone }}</td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                    @endslot
                                                                @endcomponent

                                                                @if ($user->isDoctor())
                                                                    @component('layout.partials.components.portlet', [
                                                                        'title' => 'Specialities',
                                                                        'icon' => 'fa fa-user',
                                                                        'actions' => ''
                                                                    ])
                                                                        @slot ('body')
                                                                            <div class="portlet-body">
                                                                                <table class="table table-striped">
                                                                                    @foreach ($user->specialities as $speciality)
                                                                                        <tr>
                                                                                            <td>{{ $speciality->display_name }}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                </table>
                                                                            </div>
                                                                        @endslot
                                                                    @endcomponent
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="alert-warning">
                                        <div
                                            class="">@lang('general.alerts.no_data', ['link' => '#', 'title' => trans('general.showAll', ['page' => trans_choice('pages.admin.users.doctors.title', 2)])])</div>
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
