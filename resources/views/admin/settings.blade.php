@extends ('layout.app')

@section('title', trans('pages.admin.system.title'))

@section ('content')
    @php
        $tabsTitle = '';
        $i = 0;

        foreach($locales as $value):
            $tabsTitle .= '<li'. ($i === 0 ? ' class="active margin-right-10"' : '') .'><a class="btn-circle" href="#'. $value .'" data-toggle="tab">'. $value .'</a></li>';

            $i++;
        endforeach;
    @endphp

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @component('layout.partials.components.portlet', [
                    'title' => trans('pages.admin.system.general.title'),
                    'icon' => 'fa fa-cogs fa-fw',
                    'type' => 'box green',
                    'actionTag' => 'ul',
                    'actionClass' => 'nav nav-tabs',
                    'actions' => $tabsTitle
                ])
                    <div class="tab-content">
                        @foreach($locales as $locale)
                            <div class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{ $locale }}">
                                {!! Form::open(['class' => 'form-horizontal']) !!}
                                @component('layout.partials.components.bs3-input', [
                                    'title' => trans('pages.admin.system.general.form.0', [], $locale),
                                    'name' => 'name',
                                    'type' => 'text',
                                    'value' => setting('app.name', config('app.name')),
                                    'icon' => 'fa fa-language',
                                    'labelClass' => 'col-sm-3',
                                    'div' => '<div class="col-sm-9">'
                                ])@endcomponent
                                {!! Form::close() !!}
                            </div>
                        @endforeach
                    </div>
                @endcomponent
            </div>
        </div>
    </div>
@endsection
