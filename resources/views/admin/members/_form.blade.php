<div class="row">
    <div class="col-sm-8">
        @component('layout.partials.components.portlet', [
            'title' => 'Add new User',
            'icon' => 'fa fa-fw fa-user-md',
        ])
            @slot ('actions')
                <div class="actions">
                    <a href="javascript:;" class="btn default button-previous">
                        <i class="fa fa-angle-left fa-fw"></i>
                        Back
                    </a>

                    <a href="javascript:;" class="btn btn-outline green button-next">
                        Continue
                        <i class="fa fa-angle-right fa-fw"></i>
                    </a>
                </div>
            @endslot
            <div class="form-wizard">
                <div class="form-body">
                    <ul class="nav nav-pills nav-justified steps">
                        <li>
                            <a href="#tab1" data-toggle="tab" class="step">
                                <span class="number"> 1 </span>
                                <span class="desc">
                                            <i class="fa fa-check"></i> Profile Setup
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab" class="step">
                                <span class="number"> 2 </span>
                                <span class="desc">
                                            <i class="fa fa-check"></i> Account Setup
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="#tab3" data-toggle="tab" class="step active">
                                <span class="number"> 3 </span>
                                <span class="desc">
                                            <i class="fa fa-check"></i> More Information
                                        </span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
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
                                'name' => 'age',
                                'type' => 'number',
                                'icon' => 'fa fa-sort-numeric-up',
                                'placeholder' => 'Age',
                                'title' => 'Age',
                                'div' => '<div class="col-sm-8">',
                                'labelClass' => 'col-sm-4',
                                'value' => isset($user) ? $user->info->get('age') : '',
                                'extra' => [
                                    'min' => 0,
                                    'max' => 200
                                ]
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
                        </div>
                        <div class="tab-pane" id="tab2">
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
                                'type' => 'number',
                                'name' => 'phone',
                                'title' => 'Phone',
                                'placeholder' => 'Phone number',
                                'labelClass' => 'col-sm-4',
                                'value' => isset($user) ? $user->info->get('phone')['number'] : '',
                                'div' => '<div class="col-sm-8">',
                                'icon' => 'fa fa-fw fa-globe',
                                'extra' => ['style' => 'height: 36px;'],
                                'group' => Form::select('phone_country', phone_countries(), isset($user) ? $user->info->get('phone')['country'] : '20', ['class' => 'form-control select2', 'style' => 'width: 150px'])
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
                        </div>
                        <div class="tab-pane" id="tab3">
                            @component('layout.partials.components.bs3-input', [
                            'name' => 'description',
                            'type' => 'textarea',
                            'title' => 'Description',
                            'placeholder' => 'Description',
                            'labelClass' => 'col-sm-4',
                            'value' => isset($user) ? $user->info->get('description') : '',
                            'div' => '<div class="col-sm-8">',
                            'extra' => [
                                'rows' => 5
                            ]
                        ])@endcomponent
                        </div>
                    </div>
                </div>
            </div>
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
                <img src="{{ isset($user) ? $user->profile_pic : asset('assets\layout\img\avatar.png') }}" alt="User image" width="100%"/></div>
            <div class="fileinput-preview fileinput-exists thumbnail"
                 style="max-width: 200px; max-height: 200px;"></div>
        @endcomponent
    </div>
</div>

@push ('scripts')
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}"></script>

    <script>
        FormWizard = function () {
            return {
                form: $('form#register_member'),

                bootstrapWizard: function () {
                    if (!jQuery().bootstrapWizard)
                        return;

                    var handleTitle = function (tab, navigation, index) {
                        var total = navigation.find('li').length;
                        var current = index + 1;
                        jQuery('li', this.form).removeClass("done");
                        var li_list = navigation.find('li');
                        jQuery(li_list[current]).addClass('active');
                        for (var i = 0; i < index; i++) {
                            jQuery(li_list[i]).addClass("done");
                        }
                        if (current == 1) {
                            this.form.find('.button-previous').hide();
                        } else {
                            this.form.find('.button-previous').show();
                        }
                        if (current >= total) {
                            this.form.find('.button-next').hide();
                            this.form.find('.button-submit').removeAttr('disabled');
                        } else {
                            this.form.find('.button-next').show();
                            this.form.find('.button-submit').attr('disabled', true);
                        }
                    }.bind(this);
                    var wizard = this.form.bootstrapWizard({
                        'nextSelector': '.button-next',
                        'previousSelector': '.button-previous',
                        'tabClass': '.steps',
                        onTabClick: function (tab, navigation, index, clickedIndex) {
                            return false;
                            if (this.form.valid() === false)
                                return false;
                            handleTitle(tab, navigation, clickedIndex);
                        }.bind(this),
                        onNext: function (tab, navigation, index) {
                            if (this.form.valid() === false)
                                return false;
                            handleTitle(tab, navigation, index);
                        }.bind(this),
                        onPrevious: function (tab, navigation, index) {
                            handleTitle(tab, navigation, index);
                        },
                    });
                    this.form.find('.button-previous').hide();
                    this.form.find('.button-submit').attr('disabled', true);
                    $('input', this.form).keypress(function (e) {
                        if (e.which == 13) {
                            e.preventDefault();

                            wizard.bootstrapWizard('next');
                        }
                    });
                },
                select2: function () {
                    function format(state) {
                        if (!state.id) return state.text;
                        return "<img class='flag' src='{{ asset('assets/global/img/flags') }}/" + state.id.toLowerCase() + ".png'/>&nbsp;&nbsp;" + state.text;
                    }

                    if (jQuery().select2 && $('.select2').size() > 0) {
                        $(".select2").select2();
                        $(".select2#country").select2({
                            templateResult: format,
                            templateSelection: format,
                            escapeMarkup: function (m) {
                                return m;
                            }
                        });
                        $('.select2#specialities').select2({
                            multiple: true
                        });
                        $('.select2').change(function () {
                            this.form.validate().element($(this));
                        }.bind(this));
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
                            age: {
                                required: true,
                                min: 0,
                                max: 200
                            },
                            country: {
                                required: true
                            },
                            email: {
                                required: true,
                                email: true
                            },
                            phone_country: {
                                required: true
                            },
                            phone: {
                                required: true
                            },
                            password: {
                                required: true
                            },
                            password_confirmation: {
                                required: true,
                                equalTo: "#password"
                            },
                            specialities: {
                                required: true
                            },
                            description: {
                                required: true,
                                minLength: 10
                            }
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
                    this.bootstrapWizard();
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
