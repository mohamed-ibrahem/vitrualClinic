@extends ('layout.app', [
    'wrapper' => Form::open(['class' => 'form-horizontal', 'id' => 'main-settings']),
    'endOfWrapper' => form::close()
])

@section('title', trans('pages.admin.system.title'))

@section('toolbar')
    <button class="btn navbar-btn btn-primary" type="submit">
        <i class="fa fa-save fa-fw"></i>
        @lang('general.save')
    </button>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @component('layout.partials.components.portlet', [
                    'title' => trans('pages.admin.system.general.title'),
                    'icon' => 'fa fa-cogs fa-fw',
                    'type' => 'box green',
                ])
                    <div class="tab-content">
                        @foreach($locales as $locale)
                            <div class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{ $locale }}">
                                @component('layout.partials.components.bs3-input', [
                                    'title' => trans('pages.admin.system.general.form.0', [], $locale),
                                    'name' => $locale . '.name',
                                    'type' => 'text',
                                    'value' => setting($locale . '.name')[0],
                                    'icon' => 'fa fa-language',
                                    'labelClass' => 'col-sm-3',
                                    'div' => '<div class="col-sm-9">'
                                ])@endcomponent
                            </div>
                        @endforeach
                    </div>

                    @slot ('actions')
                        <ul class="nav nav-tabs">
                            @foreach($locales as $value)
                            <li{!! ($loop->first ? ' class="active margin-right-10"' : '') !!}>
                                <a class="btn-circle" href="#{{ $value }}" data-toggle="tab">{{ $value }}</a>
                            </li>
                            @endforeach
                        </ul>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection
