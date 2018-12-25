@extends ('layout.metronic', [
    'class' => 'login',
    'no_loading' => true
])

@section ('metronic-content')
    <!-- BEGIN LOGO -->
    <div class="logo">
        <a href="{{ route('index') }}">
            <img src="{{ asset('assets/layout/img/logo-big.png') }}" alt=""/>
        </a>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset ($token)
        <!-- BEGIN FORGOT PASSWORD FORM -->
            {!! Form::open(['class' => 'forget-form', 'method' => 'POST', 'url' => 'auth/password/reset']) !!}
            <h3 class="font-green"></h3>

            <input type="hidden" name="token" value="{{ $token }}">

            @component ('layout.partials.components.bs3-input', [
                'name' => 'email',
                'type' => 'email',
                'placeholder' => trans('general.users.email'),
                'title' => trans('general.users.email'),
                'value' => $email,
                'labelClass' => 'visible-ie8 visible-ie9'
            ])@endcomponent

            @component('layout.partials.components.bs3-input', [
               'name' => 'password',
               'type' => 'password',
               'placeholder' => trans('general.users.password'),
               'title' => trans('general.users.password'),
               'labelClass' => 'visible-ie8 visible-ie9'
           ])@endcomponent

            @component('layout.partials.components.bs3-input', [
               'name' => 'password_confirmation',
               'type' => 'password',
               'placeholder' => trans('general.users.password_confirmation'),
               'title' => trans('general.users.password_confirmation'),
               'labelClass' => 'visible-ie8 visible-ie9'
           ])@endcomponent

            <div class="form-actions">
                <button type="submit"
                        class="btn btn-block btn-success uppercase">@lang('pages.login.forgot.submit')</button>
            </div>
            {!! Form::close() !!}
        <!-- END FORGOT PASSWORD FORM -->
        @else
            <p class="text-center font-green">@lang('passwords.reset')</p>
        @endisset
    </div>

    <div class="copyright">@lang('general.footer.copyright', ['app' => config('app.name')])</div>
@endsection

@push('customize')
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
            padding: 0;
            margin: 0;
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

        .login .content .form-title {
            font-weight: 300;
            margin-bottom: 25px;
        }

        .login .content .form-actions {
            clear: both;
            border: 0;
            border-bottom: 1px solid #eee;
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

        .login .content .forget-password {
            font-size: 14px;
            float: {{ trans('general.dir') ? 'left' : 'right' }};
            display: inline-block;
            margin-top: 10px;
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
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"></script>

    <script>
        var Login = {
            init: function () {
                this.handleForgetPassword();
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
