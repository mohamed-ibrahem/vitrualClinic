@extends ('layout.metronic', [
    'class' => 'login'
])

@section ('metronic-content')
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="{{ route('web.index') }}">
            <img src="{{ asset('assets/layout/img/logo-big.png') }}" alt=""/>
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        {!! Form::open(['class' => 'login-form', 'route' => 'web.auth.login.post', 'method' => 'POST']) !!}
        <h3 class="form-title font-green">Sign In</h3>

        @component('layout.partials.components.bs3-input', [
            'name' => 'email',
            'type' => 'email',
            'placeholder' => 'Email Address',
            'title' => 'Email Address',
            'labelClass' => 'visible-ie8 visible-ie9'
        ])@endcomponent

        @component('layout.partials.components.bs3-input', [
            'name' => 'password',
            'type' => 'password',
            'placeholder' => 'Password',
            'title' => 'Password',
            'labelClass' => 'visible-ie8 visible-ie9'
        ])@endcomponent

        <div class="form-actions">
            <button type="submit" class="btn green uppercase">Login</button>

            {!! Form::label(
                'remember',
                Form::checkbox('remember', old('remember'), false, ['id' => 'remember']) . ' Remember',
                [
                    'class' => 'rememberme check',
                    'for' => 'remember'
                ],
                false
            ) !!}

            <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
        </div>
        {!! Form::close() !!}
    <!-- END LOGIN FORM -->
        <!-- BEGIN FORGOT PASSWORD FORM -->
        {!! Form::open(['class' => 'forget-form', 'method' => 'POST', 'route' => 'web.auth.password.email']) !!}
        <h3 class="font-green">Forget Password ?</h3>
        <p>Enter your e-mail address below to reset your password.</p>

        @component ('layout.partials.components.bs3-input', [
            'name' => 'forget_email',
            'type' => 'email',
            'title' => 'Email Address',
            'placeholder' => 'Email Address',
            'labelClass' => 'visible-ie8 visible-ie9'
        ])@endcomponent

        <div class="form-actions">
            <button type="submit" class="btn btn-success uppercase">Submit</button>
            <button type="button" id="back-btn" class="btn btn-default pull-right">Back</button>
        </div>
    {!! Form::close() !!}
    <!-- END FORGOT PASSWORD FORM -->
        <div class="create-account">
            <a href="{{ route('web.auth.register') }}" class="uppercase">Create an account</a>
        </div>
    </div>

    <div class="copyright"> 2018 © {{ config('app.name') }}.</div>
@endsection

@push ('styles')
    <link rel="stylesheet" href="{{ asset('assets/global/plugins/uniform/css/uniform.default.css') }}">
    <style>
        .login {
            background-color: #364150 !important;
        }

        .login .logo {
            margin: 0 auto;
            margin-top: 60px;
            padding: 15px;
            text-align: center;
        }

        .login .content form {
            position: relative;
            padding: 0;
            margin: 0;
            min-height: 260px;
        }

        .login .content {
            background-color: #eceef1;
            -webkit-border-radius: 7px;
            -moz-border-radius: 7px;
            -ms-border-radius: 7px;
            -o-border-radius: 7px;
            border-radius: 7px;
            width: 400px;
            margin: 40px auto 10px auto;
            padding: 10px 30px 30px;
            overflow: hidden;
            position: relative;
        }

        .login .content h3 {
            color: #4db3a5;
            text-align: center;
            font-size: 28px;
            font-weight: 400 !important;
        }

        .login .content .form-control {
            background-color: #dde3ec;
            height: 43px;
            color: #8290a3;
        }

        .login .content .form-group:not(.has-error) .form-control:focus,
        .login .content .form-group:not(.has-error) .form-control:active {
            border: 1px solid #c3ccda;
        }

        .login .content .form-control::-moz-placeholder {
            color: #8290a3;
            opacity: 1;
        }

        .login .content .form-control:-ms-input-placeholder {
            color: #8290a3;
        }

        .login .content .form-control::-webkit-input-placeholder {
            color: #8290a3;
        }

        @if ($errors->has('forget_email'))
    .login .content .login-form {
            display: none;
        }

        @else
    .login .content .forget-form {
            display: none;
        }

        @endif

    .login .content .form-title {
            font-weight: 300;
            margin-bottom: 25px;
        }

        .login .content .form-actions {
            clear: both;
            border: 0;
            border-bottom: 1px solid #eee;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .login .content .form-actions .checkbox {
            margin-left: 0;
            padding-left: 0;
        }

        .login .content .form-actions .btn {
            margin-top: 1px;
            font-weight: 600;
            padding: 10px 20px !important;
        }

        .login .content .form-actions .btn-default {
            font-weight: 600;
            padding: 10px 25px !important;
            color: #6c7a8d;
            background-color: #ffffff;
            border: none;
        }

        .login .content .form-actions .btn-default:hover {
            background-color: #fafaff;
            color: #45b6af;
        }

        .login .content .forget-password {
            font-size: 14px;
            float: right;
            display: inline-block;
            margin-top: 10px;
        }

        .login .content .check {
            color: #8290a3;
        }

        .login .content .rememberme {
            margin-left: 8px;
            margin-top: 10px;
        }

        .login .content .create-account {
            margin: 0 -40px -30px -40px;
            padding: 15px 0 17px 0;
            text-align: center;
            background-color: #6c7a8d;
            -webkit-border-radius: 0 0 7px 7px;
            -moz-border-radius: 0 0 7px 7px;
            -ms-border-radius: 0 0 7px 7px;
            -o-border-radius: 0 0 7px 7px;
            border-radius: 0 0 7px 7px;
        }

        .login .content .create-account a {
            font-weight: 600;
            font-size: 14px;
            color: #c3cedd;
            display: inline-block;
            margin-top: 5px;
        }

        /* footer copyright */
        .login .copyright {
            text-align: center;
            margin: 0 auto 30px 0;
            padding: 10px;
            color: #7a8ca5;
            font-size: 13px;
        }

        @media (max-width: 440px) {
            .login .logo {
                margin-top: 10px;
            }

            .login .content {
                width: 280px;
                margin-top: 10px;
            }

            .login .content h3 {
                font-size: 22px;
            }

            .forget-password {
                display: inline-block;
                margin-top: 20px;
            }

            .login .checkbox {
                font-size: 13px;
            }
        }
    </style>
@endpush

@push ('scripts')
    <script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>

    <script>
        var Login = {
            init: function () {
                this.handleLogin();
                this.handleForgetPassword();

                jQuery('#forget-password').click(function () {
                    jQuery('.login-form').hide();
                    jQuery('.forget-form').show();
                });

                jQuery('#back-btn').click(function () {
                    jQuery('.login-form').show();
                    jQuery('.forget-form').hide();
                });
            },

            handleLogin: function () {
                $('.login-form').validate({
                    errorElement: 'span',
                    errorClass: 'help-block',

                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true
                        },
                        remember: {
                            required: false
                        }
                    },
                    messages: {
                        email: {
                            required: "{{ trans('validation.required', ['attribute' => 'Email']) }}",
                            email: "{{ trans('validation.email', ['attribute' => 'Email']) }}",
                        },
                        password: {
                            required: "{{ trans('validation.required', ['attribute' => 'Email']) }}"
                        }
                    },

                    errorPlacement: function (error, element) {
                        if (element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    },

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

                $('.login-form input').keypress(function (e) {
                    if (e.which == 13) {
                        if ($('.login-form').validate().form())
                            $('.login-form').submit();

                        return false;
                    }
                });
            },

            handleForgetPassword: function () {
                $('.forget-form').validate({
                    errorElement: 'span',
                    errorClass: 'help-block',

                    rules: {
                        forget_email: {
                            required: true,
                            email: true
                        }
                    },
                    messages: {
                        forget_email: {
                            required: "{{ trans('validation.required', ['attribute' => 'Email']) }}",
                            email: "{{ trans('validation.email', ['attribute' => 'Email']) }}",
                        },
                    },

                    errorPlacement: function (error, element) {
                        if (element.parent('.input-group').length) {
                            error.insertAfter(element.parent());
                        } else {
                            error.insertAfter(element);
                        }
                    },

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

                $('.forget-form input').keypress(function (e) {
                    if (e.which == 13) {
                        if ($('.forget-form').validate().form()) {
                            $('.forget-form').submit();
                        }
                        return false;
                    }
                });
            }
        };

        jQuery(document).ready(function () {
            Login.init();
        });
    </script>
@endpush
