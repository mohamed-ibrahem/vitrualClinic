@extends ('layout.app')

@section('title', trans_choice('pages.admin.users.members.title', 2))

@section('toolbar')
    <a href="{{ route('admin.members.create') }}" class="btn navbar-btn btn-primary">
        <i class="fa fa-user-plus fa-fw"></i>
        @lang('general.createNew', ['page' => trans_choice('pages.admin.users.members.title', 1)])
    </a>
@endsection

@section ('content')
    <div class="container">
        @component('layout.partials.components.dataTable', [
            'title' => trans_choice('pages.admin.users.members.title', 2)
        ])
            <table class="table table-striped table-hover order-column" id="members">
                <thead>
                <tr>
                    <th colspan="2" width="25%">{{ trans_choice('pages.admin.users.members.title', 1) }}</th>
                    <th>Contacts</th>
                    <th width="20%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Role::Members()->user()->withoutBanned()->get() as $user)
                    <tr class="odd gradeX">
                        <td>{{ $user->getKey() }}</td>
                        <td>
                            <div class="label label-primary pull-left" style="margin:0 10px;">
                                #{{ str_pad($user->getKey(), 4, '0', STR_PAD_LEFT) }}</div>
                            {{ $user->name }}
                        </td>
                        <td>
                            <a href="mailto:{{ $user->email }}">
                                <i class="fa fa-fw fa-comment"></i>
                            </a>
                            @if ($user->phone)
                                <a href="tel:{{ $user->phone }}">
                                    <i class="fa fa-fw fa-phone"></i>
                                </a>
                            @endif
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-xs">
                                <a href="#user_{{ $user->getKey() }}_profile"
                                   class="btn btn-primary tooltips" data-toggle="modal"
                                   data-original-title="{{ trans('general.datatable.tools.show') }}"
                                   data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.members.edit', $user) }}" class="btn btn-warning tooltips"
                                   data-original-title="{{ trans('general.datatable.tools.edit', ['user' => $user->name]) }}"
                                   data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                                <a href="#ban_user_{{ $user->getKey() }}" class="btn btn-danger tooltips"
                                   data-toggle="modal"
                                   data-original-title="{{ trans('general.datatable.tools.ban', ['user' => $user->name]) }}"
                                   data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-user-slash"></i>
                                </a>
                            </div>

                            <div class="btn-group btn-group-xs">
                                <a href="#delete_user_{{ $user->getKey() }}" class="btn btn-danger tooltips"
                                   data-toggle="modal"
                                   data-original-title="{{ trans('general.datatable.tools.delete') }}"
                                   data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endcomponent

        @if (\App\Role::Members()->user()->onlyBanned()->count())
            @component('layout.partials.components.dataTable', [
                'title' => 'Banned ' .trans_choice('pages.admin.users.members.title', 2)
            ])
                <table class="table table-striped table-hover order-column" id="banned_members">
                    <thead>
                    <tr>
                        <th colspan="2" width="25%">{{ trans_choice('pages.admin.users.members.title', 1) }}</th>
                        <th>Contacts</th>
                        <th>Ban reason</th>
                        <th>Ban expire at</th>
                        <th width="20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Role::Members()->user()->onlyBanned()->get() as $user)
                        <tr class="odd gradeX">
                            <td>{{ $user->getKey() }}</td>
                            <td>
                                <div class="label label-primary pull-left" style="margin:0 10px;">
                                    #{{ str_pad($user->getKey(), 4, '0', STR_PAD_LEFT) }}</div>
                                {{ $user->name }}
                            </td>
                            <td>
                                <a href="mailto:{{ $user->email }}">
                                    <i class="fa fa-fw fa-comment"></i>
                                </a>
                                @if ($user->phone)
                                    <a href="tel:{{ $user->phone }}">
                                        <i class="fa fa-fw fa-phone"></i>
                                    </a>
                                @endif
                            </td>
                            <td>
                                {!! implode('<br />', $user->bans()->withTrashed()->get()->map(function($ban){
                                return ($ban->trashed() ? '<strike>' : '' ) . $ban->comment . ($ban->trashed() ? '</strike>' : '' );
                                })->all()) !!}
                            </td>
                            <td>
                                {!! implode('<br />', $user->bans()->withTrashed()->get()->map(function($ban){
                                if ($ban->trashed())
                                    return '<strike>' . \Carbon\Carbon::parse($ban->expired_at)->format('Y-m-d') .'</strike>';
                                    else
                                return \Carbon\Carbon::parse($ban->expired_at)->diffForHumans();
                                })->all()) !!}
                            </td>
                            <td class="text-right">
                                <div class="btn-group btn-group-xs">
                                    <a href="{{ route('admin.members.edit', $user) }}" class="btn btn-warning tooltips"
                                       data-original-title="{{ trans('general.datatable.tools.edit', ['user' => $user->name]) }}"
                                       data-container="body" data-placement="top">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <a href="#unban_user_{{ $user->getKey() }}" class="btn btn-success tooltips"
                                       data-toggle="modal"
                                       data-original-title="{{ trans('general.datatable.tools.unban', ['user' => $user->name]) }}"
                                       data-container="body" data-placement="top">
                                        <i class="fa fa-fw fa-user"></i>
                                    </a>

                                    <a href="#delete_user_{{ $user->getKey() }}" class="btn btn-danger tooltips"
                                       data-toggle="modal"
                                       data-original-title="{{ trans('general.datatable.tools.delete') }}"
                                       data-container="body" data-placement="top">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endcomponent
        @endif

        @foreach(\App\Role::Members()->user()->get() as $user)
            <div id="delete_user_{{ $user->getKey() }}" class="modal fade" data-keyboard="false" tabindex="-1"
                 role="dialog" aria-hidden="true"
                 data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.members.destroy', $user]]) !!}
                        <div class="modal-header text-center">
                            <h4 class="modal-title">Are you sure you want to delete <u>{{ $user->name }}</u> and all his
                                files and data?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-outline dark">
                                Cancel
                            </button>
                            <button type="submit" class="btn red delete">Delete forever</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div id="user_{{ $user->getKey() }}_profile" class="modal fade" data-keyboard="false" tabindex="-1"
                 role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>

                            <img src="{{ $user->profile_pic }}" alt="{{ $user->name }}" width="55" class="pull-left img-circle margin-right-10">
                            <h4 class="modal-title">
                                {{ $user->name }}<br />
                                <small>{{ str_limit(
                                    implode(', ', $user->specialities->map(function($specialty) {
                                        return $specialty->display_name;
                                    })->all())
                                ) }}</small>
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
                                                    <tr>
                                                        <td width="50%">Gender</td>
                                                        <td width="50%">{{ $user->info->get('gender') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Age</td>
                                                        <td width="50%">{{ $user->info->get('age') }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td width="50%">Country</td>
                                                        <td width="50%"><img src="{{ $user->country }}" alt=""></td>
                                                    </tr>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($user->isNotBanned())
                <div id="ban_user_{{ $user->getKey() }}" class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true"
                     data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['class' => 'form-horizontal ban-form', 'method' => 'patch', 'route' => ['admin.members.ban', $user]]) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true"></button>
                                <h4 class="modal-title">Are you sure you want to ban
                                    <u>{{ $user->name }}</u>?</h4>
                            </div>
                            <div class="modal-body">
                                @component('layout.partials.components.bs3-input', [
                                    'title' => 'Expired at',
                                    'name' => 'expired_at',
                                    'type' => 'date',
                                    'labelClass' => 'col-md-3',
                                    'div' => '<div class="col-md-9">'
                                ])@endcomponent
                                @component('layout.partials.components.bs3-input', [
                                    'title' => 'Comment',
                                    'name' => 'comment',
                                    'type' => 'textarea',
                                    'labelClass' => 'col-md-3',
                                    'div' => '<div class="col-md-9">',
                                    'extra' => [
                                        'rows' => 2
                                    ]
                                ])@endcomponent
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-outline dark">
                                    Cancel
                                </button>
                                <button type="submit" class="btn red delete">Ban</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @else
                <div id="unban_user_{{ $user->getKey() }}" class="modal fade" tabindex="-1" role="dialog"
                     aria-hidden="true"
                     data-backdrop="static">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            {!! Form::open(['class' => 'form-horizontal ban-form', 'method' => 'patch', 'route' => ['admin.members.unban', $user]]) !!}
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true"></button>
                                <h4 class="modal-title">Are you sure you want to unban
                                    <u>{{ $user->name }}</u>?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-outline dark">
                                    Cancel
                                </button>
                                <button type="submit" class="btn red delete">Unban</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection

@push ('styles')
    <link href="{{ asset('assets/global/plugins/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ assets_dir('assets/global/plugins/datatables/plugins/bootstrap/datatables_bootstrap.css') }}"
          rel="stylesheet" type="text/css"/>
@endpush

@push ('scripts')
    <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>

    <script>
        $(function () {
            var oTable = $('#members, #banned_members').dataTable({
                "language": @json (trans('general.datatable')),
                "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                }],
                "ordering": false,
                "bStateSave": true,
                buttons: [
                    {extend: 'print', className: 'btn default'},
                    {extend: 'pdf', className: 'btn default'},
                    {extend: 'excel', className: 'btn default'},
                ],
                "order": [
                    [0, "asc"]
                ]
            });

            $('#action_tool > li > a.tool-action').on('click', function () {
                var action = $(this).attr('data-action');
                oTable.DataTable().button(action).trigger();
            });

            $('.ban-form').validate({

                errorElement: 'span',
                errorClass: 'help-block',
                rules: {
                    expired_at: {
                        required: true
                    },
                    comment: {
                        required: true
                    }
                },
                errorPlacement: function (error, element) {
                    $('button[type="submit"]', this.form).button('reset');
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }.bind(this),
                highlight: function (element) {
                    $(element).closest('.form-group').addClass('has-error');
                },
                success: function (label) {
                    label.closest('.form-group').removeClass('has-error');
                    label.remove();
                }
            })
        });
    </script>
@endpush
