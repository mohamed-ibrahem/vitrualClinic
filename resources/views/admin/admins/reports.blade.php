@extends ('layout.app')

@section ('title', ucfirst($role . 's reports'))

@section ('content')
    <div class="container">
        @component('layout.partials.components.portlet', [
            'title' => 'Report form',
            'type' => 'box light',
            'icon' => 'fa fa-fw fa-chart-bar'
        ])
            {!! Form::open([]) !!}
        <h1>hello</h1>
            {!! Form::close() !!}
        @endcomponent
        @isset ($results)

        @endisset
    </div>
@endsection
