<div class="portlet{{ isset($type) ? ' ' . $type : ' light' }}">
    @isset($title)
        <div class="portlet-title">
            <div class="caption">
                @isset($icon)<i class="{{ $icon }}"></i>@endisset
                {!! $title !!}
            </div>

            @isset ($actions)
                <div class="actions tools">
                    {!! $actions !!}
                </div>

            @else
                <div class="actions tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="fullscreen"></a>
                    <a href="javascript:;" class="remove"></a>
                </div>
            @endisset
        </div>
    @endisset

    @isset($body)
        {!! $body !!}
    @else
        <div class="portlet-body">
            {!! $slot !!}
        </div>
    @endif
</div>
