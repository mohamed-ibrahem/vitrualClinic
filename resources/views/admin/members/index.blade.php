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
                @foreach(\App\Role::Members()->user()->get() as $user)
                    <tr class="odd gradeX">
                        <td>{{ $user->getKey() }}</td>
                        <td>
                            <div class="label label-primary pull-left" style="margin:0 10px;">#{{ str_pad($user->getKey(), 4, '0', STR_PAD_LEFT) }}</div>
                            {{ $user->name }}
                        </td>
                        <td>
                            <a href="mailto:{{ $user->email }}">
                                <i class="fa fa-fw fa-comment"></i>

                                {{ $user->email }}
                            </a>
                        </td>
                        <td class="text-right">
                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('admin.members.show', $user) }}" class="btn btn-primary tooltips" data-original-title="{{ trans('general.datatable.tools.show') }}" data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.members.edit', $user) }}" class="btn btn-warning tooltips" data-original-title="{{ trans('general.datatable.tools.edit', ['user' => $user->name]) }}" data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-edit"></i>
                                </a>
                            </div>

                            <div class="btn-group btn-group-xs">
                                <a href="{{ route('admin.members.destroy', $user) }}" class="btn btn-danger tooltips" data-original-title="{{ trans('general.datatable.tools.delete') }}" data-container="body" data-placement="top">
                                    <i class="fa fa-fw fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endcomponent
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

    <script>
        $(function () {
            var oTable = $('#members').dataTable({
                "language": @json (trans('general.datatable')),
                "columnDefs": [{
                    "targets": [0],
                    "visible": false,
                }],
                "ordering": false,
                "bStateSave": true,
                buttons: [
                    { extend: 'print', className: 'btn default' },
                    { extend: 'pdf', className: 'btn default' },
                    { extend: 'excel', className: 'btn default' },
                ],
                "order": [
                    [0, "asc"]
                ]
            });

            $('#action_tool > li > a.tool-action').on('click', function() {
                var action = $(this).attr('data-action');
                oTable.DataTable().button(action).trigger();
            });
        });
    </script>
@endpush
