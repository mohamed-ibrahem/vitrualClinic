<div class="row">
    <div class="col-sm-8">
        @component('layout.partials.components.portlet', [
            'title' => 'Add new User',
            'icon' => 'fa fa-fw fa-user-md',
        ])
            @component('layout.partials.components.bs3-input', [
                                'name' => 'fname',
                                'type' => 'text',
                                'icon' => 'fa fa-address-card',
                                'placeholder' => 'First name',
                                'title' => 'First name',
                                'div' => '<div class="col-sm-8">',
                                'labelClass' => 'col-sm-4',
                                'value' => isset($user) ? explode(' ', $user->name)[0] : ''
                            ])@endcomponent
            @component('layout.partials.components.bs3-input', [
                'name' => 'lname',
                'type' => 'text',
                'icon' => 'fa fa-address-card',
                'placeholder' => 'Last name',
                'title' => 'Last name',
                'div' => '<div class="col-sm-8">',
                'labelClass' => 'col-sm-4',
                'value' => isset($user) ? (isset(explode(' ', $user->name)[1]) ? explode(' ', $user->name)[1] : '') : ''
            ])@endcomponent
            @component('layout.partials.components.bs3-input', [
                    'type' => 'email',
                    'name' => 'email',
                    'title' => 'Email address',
                    'placeholder' => 'Email address',
                    'icon' => 'fa fa-at',
                    'div' => '<div class="col-sm-8">',
                    'labelClass' => 'col-sm-4',
                    'value' => isset($user) ? $user->email : '',
                ])@endcomponent

            @component('layout.partials.components.bs3-input', [
                'type' => 'password',
                'name' => 'password',
                'title' => 'Password',
                'placeholder' => 'Password',
                'icon' => 'fa fa-key',
                'labelClass' => 'col-sm-4',
                'div' => '<div class="col-sm-8">'
            ])@endcomponent
            @component('layout.partials.components.bs3-input', [
                    'type' => 'password',
                    'name' => 'password_confirmation',
                    'title' => 'Password confirmation',
                    'placeholder' => 'Password confirmation',
                    'icon' => 'fa fa-key',
                    'labelClass' => 'col-sm-4',
                    'div' => '<div class="col-sm-8">'
                ])@endcomponent

            @component('layout.partials.components.bs3-input', [
                'type' => 'select',
                'name' => 'gender',
                'title' => 'Gender',
                'icon' => 'fa fa-user',
                'div' => '<div class="col-sm-8">',
                'labelClass' => 'col-sm-4',
                'value' => isset($user) ? $user->info->get('gender') : '',
                'list' => [0 => 'Male', 1 => 'Female']
            ])@endcomponent
            @component('layout.partials.components.bs3-input', [
                'type' => 'select',
                'name' => 'country',
                'title' => 'Country',
                'labelClass' => 'col-sm-4',
                'div' => '<div class="col-sm-8">',
                'value' => isset($user) ? $user->info->get('country', 'EG') : 'EG',
                'list' => countries(),
                'inputClass' => 'select2',
                'extra' => [
                    'style' => 'width: 100%'
                ]
            ])@endcomponent
        @endcomponent
    </div>
    <div class="col-sm-4">
        @component('layout.partials.components.portlet', [
            'title' => 'Display picture',
            'icon' => '',
            'type' => 'light fileinput fileinput-new',
            'extra' => [
                'data-provides="fileinput"',
                'style="display: block;"'
            ],
            'bodyClass' => 'text-center'
        ])
            @slot ('actions')
                <div class="actions">
                    <span class="btn default btn-file">
                        <span class="fileinput-new">Select image</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="profile_pic">
                    </span>

                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
                        Remove
                    </a>
                </div>
            @endslot
            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                <img src="{{ isset($user) ? $user->profile_pic : asset('assets\layout\img\avatar.png') }}"
                     alt="User image" width="100%"/></div>
            <div class="fileinput-preview fileinput-exists thumbnail"
                 style="max-width: 200px; max-height: 200px;"></div>
        @endcomponent
    </div>
</div>

@push ('scripts')
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>

    <script>
        FormWizard = function () {
            return {
                form: $('form#register_admin'),

                select2: function () {
                    function format(state) {
                        if (!state.id) return state.text;
                        return "<img class='flag' src='{{ asset('assets/global/img/flags') }}/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
                    }

                    if (jQuery().select2 && $('.select2').size() > 0) {
                        $(".select2#country").select2({
                            templateResult: format,
                            templateSelection: format,
                            escapeMarkup: function (m) {
                                return m;
                            }
                        });
                    }
                },
                validate: function () {
                    this.form.validate({
                        errorElement: 'span',
                        errorClass: 'help-block',
                        rules: {
                            fname: {
                                required: true
                            },
                            lname: {
                                required: true
                            },
                            gender: {
                                required: true
                            },
                            country: {
                                required: true
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            @if (! isset($user))
                            password: {
                                required: true
                            },
                            password_confirmation: {
                                required: true,
                                equalTo: "#password"
                            },
                            @endif
                        },
                        errorPlacement: function (error, element) {
                            $('button[type="submit"]', this.form).button('reset');
                            if (element.parent('.input-group').length) {
                                error.insertAfter(element.parent());
                            } else {
                                error.insertAfter(element);
                            }
                        }.bind(this),
                        highlight: function (element) {
                            $(element).closest('.form-group').addClass('has-error');
                        },
                        success: function (label) {
                            label.closest('.form-group').removeClass('has-error');
                            label.remove();
                        },
                        submitHandler: function (form) {
                            form.submit();
                        }
                    });
                },

                init: function () {
                    this.validate();
                    this.select2();
                }
            };
        }();
        jQuery(document).ready(function () {
            FormWizard.init();
        });
    </script>
@endpush

@push ('styles')
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/select2/css/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') }}">

    <style>
        .input-group-addon {
            padding: 0;
        }
    </style>
@endpush
