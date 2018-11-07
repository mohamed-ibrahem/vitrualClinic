@extends ('layout.app', [
    'no_footer' => true
])

@section('title', trans('pages.admin.translation.title'))

@section('toolbar')
    {!! Form::open(['class' => 'inline', 'action' => 'Admin\TranslationsController@postImport', 'method' => 'POST']) !!}
    <button class="btn navbar-btn btn-danger">
        <i class="fa fa-sync-alt fa-fw"></i>
        @lang('pages.admin.translation.reload')
    </button>
    {!! Form::close() !!}

    {!! Form::open(['class' => 'inline', 'action' => 'Admin\TranslationsController@postPublish', 'method' => 'POST']) !!}
    <button class="btn navbar-btn btn-primary">
        <i class="fa fa-save fa-fw"></i>
        @lang('pages.admin.translation.publish')
    </button>
    {!! Form::close() !!}
@endsection

@section('content')
    <div class="container">
        @php
            $tabsTitle = '';
            $i = 0;

            foreach($groups as $key => $value):
                $tabsTitle .= '<li'. ($i === 0 ? ' class="active"' : '') .'><a href="#'. $key .'" data-toggle="tab">'. $value .'</a></li>';

                $i++;
            endforeach;
        @endphp
        @component('layout.partials.components.portlet', [
            'title' => trans('pages.admin.translation.title'),
            'icon' => 'fa fa-globe',
            'type' => 'box green',
            'portletClass' => '',
            'actionTag' => 'ul',
            'actionClass' => 'nav nav-tabs',
            'actions' => $tabsTitle,
        ])
            <div class="tab-content">
                @foreach($groups as $_key => $value)
                    <div class="tab-pane{{ $loop->first ? ' active' : '' }}" id="{{ $_key }}">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th width="15%">@lang('pages.admin.translation.key')</th>
                                @foreach ($locales as $locale)
                                    <th>{{ $locale }}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            <?php foreach ($translations[$_key] as $key => $translation): ?>
                            <tr id="<?php echo htmlentities($key, ENT_QUOTES, 'UTF-8', false) ?>">
                                <td><?php echo htmlentities($key, ENT_QUOTES, 'UTF-8', false) ?></td>
                                <?php foreach ($locales as $locale): ?>
                                <?php $t = isset($translation[$locale]) ? $translation[$locale] : null ?>
                                <td>
                                    <a href="#edit"
                                       class="editable status-<?php echo $t ? $t->status : 0 ?> locale-<?php echo $locale ?>"
                                       data-locale="<?php echo $locale ?>" data-name="<?php echo $locale . "|" . htmlentities($key, ENT_QUOTES, 'UTF-8', false) ?>"
                                       id="username" data-type="textarea" data-pk="<?php echo $t ? $t->id : 0 ?>"
                                       data-url="{{ action('Admin\TranslationsController@postEdit', ['group' => $_key]) }}"
                                       data-title="Enter translation"><?php echo $t ? htmlentities($t->value, ENT_QUOTES, 'UTF-8', false) : '' ?></a>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                @endforeach
            </div>
        @endcomponent
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/css/bootstrap-editable.css') }}">
@endpush

@push ('scripts')
    <script src="{{ asset('assets/global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.min.js') }}"></script>
    <script>
        $(function() {
            $('.editable').editable().on('hidden', function(e, reason){
                var locale = $(this).data('locale');
                if(reason === 'save'){
                    $(this).removeClass('status-0').addClass('status-1');
                }
                if(reason === 'save' || reason === 'nochange') {
                    var $next = $(this).closest('tr').next().find('.editable.locale-'+locale);
                    setTimeout(function() {
                        $next.editable('show');
                    }, 300);
                }
            });
            $('form').on('submit', function(e) {
                e.preventDefault();
                $.post($(this).attr('action'), function() {
                    window.location.reload();
                });
            })
        });
    </script>
@endpush
