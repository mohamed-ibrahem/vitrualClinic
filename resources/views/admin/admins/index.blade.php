@extends ('layout.app')

@section('title', trans_choice('pages.admin.users.admins.title', 2))

@section('toolbar')
    <a href="{{ route('admin.admins.create') }}" class="btn navbar-btn btn-primary">
        <i class="fa fa-user-plus fa-fw"></i>
        @lang('general.createNew', ['page' => trans_choice('pages.admin.users.admins.title', 1)])
    </a>
@endsection

@section ('content')
    <div class="container">
        @component('layout.partials.components.dataTable', [
            'title' => trans_choice('pages.admin.users.admins.title', 2)
        ])
            <table class="table table-striped table-hover order-column" id="admins">
                <thead>
                <tr>
                    <th colspan="2" width="25%">{{ trans_choice('pages.admin.users.admins.title', 1) }}</th>
                    <th>Email</th>
                    <th width="10%">Contacts</th>
                    <th width="15%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach(\App\Role::Admins()->user()->get() as $user)
                    <tr class="odd gradeX">
                        <td>{{ $user->getKey() }}</td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                            <a class="btn btn-xs btn-default tooltips"
                               data-container="body" data-original-title="Email {{ $user->name }}"
                               href="mailto:{{ $user->email }}">
                                <i class="fa fa-fw fa-comment"></i>
                            </a>
                            @if ($user->phone)
                                <a class="btn btn-xs btn-default tooltips"
                                   data-container="body" data-original-title="Call {{ $user->name }}"
                                   href="tel:{{ $user->phone }}">
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
                                <a href="{{ route('admin.admins.edit', $user) }}" class="btn btn-warning tooltips"
                                   data-original-title="{{ trans('general.datatable.tools.edit', ['user' => $user->name]) }}"
                                   data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-edit"></i>
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

        @foreach(\App\Role::Admins()->user()->get() as $user)
            <div id="delete_user_{{ $user->getKey() }}" class="modal fade" data-keyboard="false" tabindex="-1"
                 role="dialog" aria-hidden="true"
                 data-backdrop="static">
                <div class="modal-dialog">
                    <div class="modal-content">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.admins.destroy', $user]]) !!}
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
                                        <table class="table table-striped">
                                            <tr>
                                                <td width="50%">Name</td>
                                                <td width="50%">{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Email</td>
                                                <td width="50%">{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td width="50%">Phone</td>
                                                <td width="50%">{{ $user->phone }}</td>
                                            </tr>
                                        </table>
                                    @endcomponent
                                </div>
                                <div class="col-md-6">
                                    @component('layout.partials.components.portlet', [
                                        'title' => 'Activities',
                                        'icon' => 'fa fa-user',
                                        'actions' => ''
                                    ])@endcomponent
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
            var oTable = $('#admins').dataTable({
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
