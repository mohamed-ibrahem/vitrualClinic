@extends ('layout.app')

@section('title', trans('pages.admin.settings.title'))

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                @component('layout.partials.components.portlet', [
                    'title' => trans('pages.admin.settings.title'),
                    'icon' => 'fa fa-cogs',
                    'bodyClass' => 'form'
                ])
                                    {!! Form::open(['class' => 'form-horizontal', 'role' => 'form']) !!}
                                    <div class="form-body">
                                        @component('layout.partials.components.bs3-input', [
                                            'title' => 'Site name',
                                            'type' => 'text',
                                            'name' => 'name',
                                            'labelClass' => 'col-md-3',
                                            'div' => '<div class="col-md-9">',
                                            'icon' => 'fa fa-users'
                                        ])@endcomponent
                                    </div>
                                    {!! Form::close() !!}
                                @endcomponent
            </div>

            <div class="col-sm-3"></div>
        </div>
    </div>
@endsection
