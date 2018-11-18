<div class="portlet{{ isset($type) ? ' ' . $type : ' light' }}">
    @if(isset($title) || isset($actions))
        <div class="portlet-title{{ isset($portletClass) ? $portletClass : '' }}">
            <div class="caption">
                @isset($icon)<i class="{{ $icon }}"></i>@endisset
                @isset($title)<span class="caption-subject bold">{!! $title !!}</span>@endisset
                @isset($subtitle)<span class="caption-helper">{!! $subtitle !!}</span>@endisset
            </div>

            @isset ($actions)
                {!! $actions !!}
            @else
                <div class="actions tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="fa fullscreen"></a>
                </div>
            @endisset
        </div>
    @endif

    @isset($body)
        {!! $body !!}
    @else
        <div class="portlet-body{{ isset($bodyClass) ? ' ' . $bodyClass : '' }}">
            {!! $slot !!}
        </div>
    @endif
</div>
