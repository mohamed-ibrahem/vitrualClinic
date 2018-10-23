<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    {!! Form::label($name, $title, [
        'class' => 'control-label' . (isset($labelClass) ? ' ' . $labelClass : ''),
        'for' => $name
    ], false) !!}

    @php
        $options = [
            'class' => 'form-control placeholder-no-fix' . (isset($inputClass) ? ' ' . $inputClass : ''),
            'id' => $name
        ];

        if (isset($placeholder))
            $options['placeholder'] = $placeholder;
    @endphp

    @isset($icon)
        <div class="input-icon">
            <i class="{{ $icon }}"></i>
            @endisset
            @isset($group)
                <div class="input-group">
                    <span class="input-group-addon">{!! $group !!}</span>
                    @endisset
                    @if ($type == 'select')
                        {!! Form::select($name, $list, old($name, isset($value) ? $value : ''), isset($extra) ? array_merge($options, $extra) : $options) !!}
                    @elseif ($type == 'textarea')
                        {!! Form::textarea($name, old($name, isset($value) ? $value : ''), isset($extra) ? array_merge($options, $extra) : $options) !!}
                    @else
                        {!! Form::input($type, $name, old($name, isset($value) ? $value : ''), isset($extra) ? array_merge($options, $extra) : $options) !!}
                    @endif
                    @isset($group)
                </div>
            @endisset
                    @isset($icon)
                </div>
            @endisset

            @if ($errors->has($name))
                <span class="help-block">{{ $errors->first($name) }}</span>
            @endif
        </div>
