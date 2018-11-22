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
                'value' => isset($user) ? explode(' ', $user->name)[1] : ''
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
                'list' => ['male' => 'Male', 'female' => 'Female']
            ])@endcomponent
            @component('layout.partials.components.bs3-input', [
                'type' => 'select',
                'name' => 'country',
                'title' => 'Country',
                'labelClass' => 'col-sm-4',
                'div' => '<div class="col-sm-8">',
                'value' => isset($user) ? $user->info->get('country', 'EG') : 'EG',
                'list' => [
                "AF" => "Afghanistan",
"AL" => "Albania",
"DZ" => "Algeria",
"AS" => "American Samoa",
"AD" => "Andorra",
"AO" => "Angola",
"AI" => "Anguilla",
"AQ" => "Antarctica",
"AG" => "Antigua and Barbuda",
"AR" => "Argentina",
"AM" => "Armenia",
"AW" => "Aruba",
"AU" => "Australia",
"AT" => "Austria",
"AZ" => "Azerbaijan",
"BS" => "Bahamas",
"BH" => "Bahrain",
"BD" => "Bangladesh",
"BB" => "Barbados",
"BY" => "Belarus",
"BE" => "Belgium",
"BZ" => "Belize",
"BJ" => "Benin",
"BM" => "Bermuda",
"BT" => "Bhutan",
"BO" => "Bolivia",
"BA" => "Bosnia and Herzegovina",
"BW" => "Botswana",
"BV" => "Bouvet Island",
"BR" => "Brazil",
"IO" => "British Indian Ocean Territory",
"BN" => "Brunei Darussalam",
"BG" => "Bulgaria",
"BF" => "Burkina Faso",
"BI" => "Burundi",
"KH" => "Cambodia",
"CM" => "Cameroon",
"CA" => "Canada",
"CV" => "Cape Verde",
"KY" => "Cayman Islands",
"CF" => "Central African Republic",
"TD" => "Chad",
"CL" => "Chile",
"CN" => "China",
"CX" => "Christmas Island",
"CC" => "Cocos (Keeling) Islands",
"CO" => "Colombia",
"KM" => "Comoros",
"CG" => "Congo",
"CD" => "Congo, the Democratic Republic of the",
"CK" => "Cook Islands",
"CR" => "Costa Rica",
"CI" => "Cote D'Ivoire",
"HR" => "Croatia",
"CU" => "Cuba",
"CY" => "Cyprus",
"CZ" => "Czech Republic",
"DK" => "Denmark",
"DJ" => "Djibouti",
"DM" => "Dominica",
"DO" => "Dominican Republic",
"EC" => "Ecuador",
"EG" => "Egypt",
"SV" => "El Salvador",
"GQ" => "Equatorial Guinea",
"ER" => "Eritrea",
"EE" => "Estonia",
"ET" => "Ethiopia",
"FK" => "Falkland Islands (Malvinas)",
"FO" => "Faroe Islands",
"FJ" => "Fiji",
"FI" => "Finland",
"FR" => "France",
"GF" => "French Guiana",
"PF" => "French Polynesia",
"TF" => "French Southern Territories",
"GA" => "Gabon",
"GM" => "Gambia",
"GE" => "Georgia",
"DE" => "Germany",
"GH" => "Ghana",
"GI" => "Gibraltar",
"GR" => "Greece",
"GL" => "Greenland",
"GD" => "Grenada",
"GP" => "Guadeloupe",
"GU" => "Guam",
"GT" => "Guatemala",
"GN" => "Guinea",
"GW" => "Guinea-Bissau",
"GY" => "Guyana",
"HT" => "Haiti",
"HM" => "Heard Island and Mcdonald Islands",
"VA" => "Holy See (Vatican City State)",
"HN" => "Honduras",
"HK" => "Hong Kong",
"HU" => "Hungary",
"IS" => "Iceland",
"IN" => "India",
"ID" => "Indonesia",
"IR" => "Iran, Islamic Republic of",
"IQ" => "Iraq",
"IE" => "Ireland",
"IL" => "Israel",
"IT" => "Italy",
"JM" => "Jamaica",
"JP" => "Japan",
"JO" => "Jordan",
"KZ" => "Kazakhstan",
"KE" => "Kenya",
"KI" => "Kiribati",
"KP" => "Korea, Democratic People's Republic of",
"KR" => "Korea, Republic of",
"KW" => "Kuwait",
"KG" => "Kyrgyzstan",
"LA" => "Lao People's Democratic Republic",
"LV" => "Latvia",
"LB" => "Lebanon",
"LS" => "Lesotho",
"LR" => "Liberia",
"LY" => "Libyan Arab Jamahiriya",
"LI" => "Liechtenstein",
"LT" => "Lithuania",
"LU" => "Luxembourg",
"MO" => "Macao",
"MK" => "Macedonia, the Former Yugoslav Republic of",
"MG" => "Madagascar",
"MW" => "Malawi",
"MY" => "Malaysia",
"MV" => "Maldives",
"ML" => "Mali",
"MT" => "Malta",
"MH" => "Marshall Islands",
"MQ" => "Martinique",
"MR" => "Mauritania",
"MU" => "Mauritius",
"YT" => "Mayotte",
"MX" => "Mexico",
"FM" => "Micronesia, Federated States of",
"MD" => "Moldova, Republic of",
"MC" => "Monaco",
"MN" => "Mongolia",
"MS" => "Montserrat",
"MA" => "Morocco",
"MZ" => "Mozambique",
"MM" => "Myanmar",
"NA" => "Namibia",
"NR" => "Nauru",
"NP" => "Nepal",
"NL" => "Netherlands",
"AN" => "Netherlands Antilles",
"NC" => "New Caledonia",
"NZ" => "New Zealand",
"NI" => "Nicaragua",
"NE" => "Niger",
"NG" => "Nigeria",
"NU" => "Niue",
"NF" => "Norfolk Island",
"MP" => "Northern Mariana Islands",
"NO" => "Norway",
"OM" => "Oman",
"PK" => "Pakistan",
"PW" => "Palau",
"PS" => "Palestinian Territory, Occupied",
"PA" => "Panama",
"PG" => "Papua New Guinea",
"PY" => "Paraguay",
"PE" => "Peru",
"PH" => "Philippines",
"PN" => "Pitcairn",
"PL" => "Poland",
"PT" => "Portugal",
"PR" => "Puerto Rico",
"QA" => "Qatar",
"RE" => "Reunion",
"RO" => "Romania",
"RU" => "Russian Federation",
"RW" => "Rwanda",
"SH" => "Saint Helena",
"KN" => "Saint Kitts and Nevis",
"LC" => "Saint Lucia",
"PM" => "Saint Pierre and Miquelon",
"VC" => "Saint Vincent and the Grenadines",
"WS" => "Samoa",
"SM" => "San Marino",
"ST" => "Sao Tome and Principe",
"SA" => "Saudi Arabia",
"SN" => "Senegal",
"CS" => "Serbia and Montenegro",
"SC" => "Seychelles",
"SL" => "Sierra Leone",
"SG" => "Singapore",
"SK" => "Slovakia",
"SI" => "Slovenia",
"SB" => "Solomon Islands",
"SO" => "Somalia",
"ZA" => "South Africa",
"GS" => "South Georgia and the South Sandwich Islands",
"ES" => "Spain",
"LK" => "Sri Lanka",
"SD" => "Sudan",
"SR" => "Suriname",
"SJ" => "Svalbard and Jan Mayen",
"SZ" => "Swaziland",
"SE" => "Sweden",
"CH" => "Switzerland",
"SY" => "Syrian Arab Republic",
"TW" => "Taiwan, Province of China",
"TJ" => "Tajikistan",
"TZ" => "Tanzania, United Republic of",
"TH" => "Thailand",
"TL" => "Timor-Leste",
"TG" => "Togo",
"TK" => "Tokelau",
"TO" => "Tonga",
"TT" => "Trinidad and Tobago",
"TN" => "Tunisia",
"TR" => "Turkey",
"TM" => "Turkmenistan",
"TC" => "Turks and Caicos Islands",
"TV" => "Tuvalu",
"UG" => "Uganda",
"UA" => "Ukraine",
"AE" => "United Arab Emirates",
"GB" => "United Kingdom",
"US" => "United States",
"UM" => "United States Minor Outlying Islands",
"UY" => "Uruguay",
"UZ" => "Uzbekistan",
"VU" => "Vanuatu",
"VE" => "Venezuela",
"VN" => "Viet Nam",
"VG" => "Virgin Islands, British",
"VI" => "Virgin Islands, U.s.",
"WF" => "Wallis and Futuna",
"EH" => "Western Sahara",
"YE" => "Yemen",
"ZM" => "Zambia",
"ZW" => "Zimbabwe"
],
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
                            password: {
                                required: true,
                                min: 5,
                            },
                            password_confirmation: {
                                required: true,
                                min: 5,
                                equalTo: "#password"
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
