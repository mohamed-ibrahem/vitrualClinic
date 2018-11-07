<div class="portlet{{ isset($type) ? ' ' . $type : ' light' }}">
    @isset($title)
        <div class="portlet-title{{ isset($portletClass) ? $portletClass : '' }}">
            <div class="caption">
                @isset($icon)<i class="{{ $icon }}"></i>@endisset
                <span class="caption-subject bold">{!! $title !!}</span>
                @isset($subtitle)<span class="caption-helper">{!! $subtitle !!}</span>@endisset
            </div>

            @isset ($actions)
                <{{ isset($actionTag) ? $actionTag : 'div' }} class="{{ isset($actionClass) ? $actionClass : 'actions tools' }}">
                    {!! $actions !!}
                </{{isset( $actionTag) ?  $actionTag : 'div' }}>

            @else
                <div class="actions tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="fa fullscreen"></a>
                </div>
            @endisset
        </div>
    @endisset

    @isset($body)
        {!! $body !!}
    @else
        <div class="portlet-body{{ isset($bodyClass) ? ' ' . $bodyClass : '' }}">
            {!! $slot !!}
        </div>
    @endif
</div>
