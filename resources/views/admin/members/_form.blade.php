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
                                'value' => isset($user) ? explode(' ', $user->name)[1] : ''
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
                                'group' => Form::select('phone_country', [
                    '44' => 'UK (+44)',
                    '1' => 'USA (+1)',
                    '213' => 'Algeria (+213)',
                    '376' => 'Andorra (+376)',
                    '244' => 'Angola (+244)',
                    '1264' => 'Anguilla (+1264)',
                    '1268' => 'Antigua & Barbuda (+1268)',
                    '54' => 'Argentina (+54)',
                    '374' => 'Armenia (+374)',
                    '297' => 'Aruba (+297)',
                    '61' => 'Australia (+61)',
                    '43' => 'Austria (+43)',
                    '994' => 'Azerbaijan (+994)',
                    '1242' => 'Bahamas (+1242)',
                    '973' => 'Bahrain (+973)',
                    '880' => 'Bangladesh (+880)',
                    '1246' => 'Barbados (+1246)',
                    '375' => 'Belarus (+375)',
                    '32' => 'Belgium (+32)',
                    '501' => 'Belize (+501)',
                    '229' => 'Benin (+229)',
                    '1441' => 'Bermuda (+1441)',
                    '975' => 'Bhutan (+975)',
                    '591' => 'Bolivia (+591)',
                    '387' => 'Bosnia Herzegovina (+387)',
                    '267' => 'Botswana (+267)',
                    '55' => 'Brazil (+55)',
                    '673' => 'Brunei (+673)',
                    '359' => 'Bulgaria (+359)',
                    '226' => 'Burkina Faso (+226)',
                    '257' => 'Burundi (+257)',
                    '855' => 'Cambodia (+855)',
                    '237' => 'Cameroon (+237)',
                    '1' => 'Canada (+1)',
                    '238' => 'Cape Verde Islands (+238)',
                    '1345' => 'Cayman Islands (+1345)',
                    '236' => 'Central African Republic (+236)',
                    '56' => 'Chile (+56)',
                    '86' => 'China (+86)',
                    '57' => 'Colombia (+57)',
                    '269' => 'Comoros (+269)',
                    '242' => 'Congo (+242)',
                    '682' => 'Cook Islands (+682)',
                    '506' => 'Costa Rica (+506)',
                    '385' => 'Croatia (+385)',
                    '53' => 'Cuba (+53)',
                    '90392' => 'Cyprus North (+90392)',
                    '357' => 'Cyprus South (+357)',
                    '42' => 'Czech Republic (+42)',
                    '45' => 'Denmark (+45)',
                    '253' => 'Djibouti (+253)',
                    '1809' => 'Dominica (+1809)',
                    '1809' => 'Dominican Republic (+1809)',
                    '593' => 'Ecuador (+593)',
                    '20' => 'Egypt (+20)',
                    '503' => 'El Salvador (+503)',
                    '240' => 'Equatorial Guinea (+240)',
                    '291' => 'Eritrea (+291)',
                    '372' => 'Estonia (+372)',
                    '251' => 'Ethiopia (+251)',
                    '500' => 'Falkland Islands (+500)',
                    '298' => 'Faroe Islands (+298)',
                    '679' => 'Fiji (+679)',
                    '358' => 'Finland (+358)',
                    '33' => 'France (+33)',
                    '594' => 'French Guiana (+594)',
                    '689' => 'French Polynesia (+689)',
                    '241' => 'Gabon (+241)',
                    '220' => 'Gambia (+220)',
                    '7880' => 'Georgia (+7880)',
                    '49' => 'Germany (+49)',
                    '233' => 'Ghana (+233)',
                    '350' => 'Gibraltar (+350)',
                    '30' => 'Greece (+30)',
                    '299' => 'Greenland (+299)',
                    '1473' => 'Grenada (+1473)',
                    '590' => 'Guadeloupe (+590)',
                    '671' => 'Guam (+671)',
                    '502' => 'Guatemala (+502)',
                    '224' => 'Guinea (+224)',
                    '245' => 'Guinea - Bissau (+245)',
                    '592' => 'Guyana (+592)',
                    '509' => 'Haiti (+509)',
                    '504' => 'Honduras (+504)',
                    '852' => 'Hong Kong (+852)',
                    '36' => 'Hungary (+36)',
                    '354' => 'Iceland (+354)',
                    '91' => 'India (+91)',
                    '62' => 'Indonesia (+62)',
                    '98' => 'Iran (+98)',
                    '964' => 'Iraq (+964)',
                    '353' => 'Ireland (+353)',
                    '972' => 'Israel (+972)',
                    '39' => 'Italy (+39)',
                    '1876' => 'Jamaica (+1876)',
                    '81' => 'Japan (+81)',
                    '962' => 'Jordan (+962)',
                    '7' => 'Kazakhstan (+7)',
                    '254' => 'Kenya (+254)',
                    '686' => 'Kiribati (+686)',
                    '850' => 'Korea North (+850)',
                    '82' => 'Korea South (+82)',
                    '965' => 'Kuwait (+965)',
                    '996' => 'Kyrgyzstan (+996)',
                    '856' => 'Laos (+856)',
                    '371' => 'Latvia (+371)',
                    '961' => 'Lebanon (+961)',
                    '266' => 'Lesotho (+266)',
                    '231' => 'Liberia (+231)',
                    '218' => 'Libya (+218)',
                    '417' => 'Liechtenstein (+417)',
                    '370' => 'Lithuania (+370)',
                    '352' => 'Luxembourg (+352)',
                    '853' => 'Macao (+853)',
                    '389' => 'Macedonia (+389)',
                    '261' => 'Madagascar (+261)',
                    '265' => 'Malawi (+265)',
                    '60' => 'Malaysia (+60)',
                    '960' => 'Maldives (+960)',
                    '223' => 'Mali (+223)',
                    '356' => 'Malta (+356)',
                    '692' => 'Marshall Islands (+692)',
                    '596' => 'Martinique (+596)',
                    '222' => 'Mauritania (+222)',
                    '269' => 'Mayotte (+269)',
                    '52' => 'Mexico (+52)',
                    '691' => 'Micronesia (+691)',
                    '373' => 'Moldova (+373)',
                    '377' => 'Monaco (+377)',
                    '976' => 'Mongolia (+976)',
                    '1664' => 'Montserrat (+1664)',
                    '212' => 'Morocco (+212)',
                    '258' => 'Mozambique (+258)',
                    '95' => 'Myanmar (+95)',
                    '264' => 'Namibia (+264)',
                    '674' => 'Nauru (+674)',
                    '977' => 'Nepal (+977)',
                    '31' => 'Netherlands (+31)',
                    '687' => 'New Caledonia (+687)',
                    '64' => 'New Zealand (+64)',
                    '505' => 'Nicaragua (+505)',
                    '227' => 'Niger (+227)',
                    '234' => 'Nigeria (+234)',
                    '683' => 'Niue (+683)',
                    '672' => 'Norfolk Islands (+672)',
                    '670' => 'Northern Marianas (+670)',
                    '47' => 'Norway (+47)',
                    '968' => 'Oman (+968)',
                    '680' => 'Palau (+680)',
                    '507' => 'Panama (+507)',
                    '675' => 'Papua New Guinea (+675)',
                    '595' => 'Paraguay (+595)',
                    '51' => 'Peru (+51)',
                    '63' => 'Philippines (+63)',
                    '48' => 'Poland (+48)',
                    '351' => 'Portugal (+351)',
                    '1787' => 'Puerto Rico (+1787)',
                    '974' => 'Qatar (+974)',
                    '262' => 'Reunion (+262)',
                    '40' => 'Romania (+40)',
                    '7' => 'Russia (+7)',
                    '250' => 'Rwanda (+250)',
                    '378' => 'San Marino (+378)',
                    '239' => 'Sao Tome & Principe (+239)',
                    '966' => 'Saudi Arabia (+966)',
                    '221' => 'Senegal (+221)',
                    '381' => 'Serbia (+381)',
                    '248' => 'Seychelles (+248)',
                    '232' => 'Sierra Leone (+232)',
                    '65' => 'Singapore (+65)',
                    '421' => 'Slovak Republic (+421)',
                    '386' => 'Slovenia (+386)',
                    '677' => 'Solomon Islands (+677)',
                    '252' => 'Somalia (+252)',
                    '27' => 'South Africa (+27)',
                    '34' => 'Spain (+34)',
                    '94' => 'Sri Lanka (+94)',
                    '290' => 'St. Helena (+290)',
                    '1869' => 'St. Kitts (+1869)',
                    '1758' => 'St. Lucia (+1758)',
                    '249' => 'Sudan (+249)',
                    '597' => 'Suriname (+597)',
                    '268' => 'Swaziland (+268)',
                    '46' => 'Sweden (+46)',
                    '41' => 'Switzerland (+41)',
                    '963' => 'Syria (+963)',
                    '886' => 'Taiwan (+886)',
                    '7' => 'Tajikstan (+7)',
                    '66' => 'Thailand (+66)',
                    '228' => 'Togo (+228)',
                    '676' => 'Tonga (+676)',
                    '1868' => 'Trinidad & Tobago (+1868)',
                    '216' => 'Tunisia (+216)',
                    '90' => 'Turkey (+90)',
                    '7' => 'Turkmenistan (+7)',
                    '993' => 'Turkmenistan (+993)',
                    '1649' => 'Turks & Caicos Islands (+1649)',
                    '688' => 'Tuvalu (+688)',
                    '256' => 'Uganda (+256)',
                    '380' => 'Ukraine (+380)',
                    '971' => 'United Arab Emirates (+971)',
                    '598' => 'Uruguay (+598)',
                    '7' => 'Uzbekistan (+7)',
                    '678' => 'Vanuatu (+678)',
                    '379' => 'Vatican City (+379)',
                    '58' => 'Venezuela (+58)',
                    '84' => 'Vietnam (+84)',
                    '84' => 'Virgin Islands - British (+1284)',
                    '84' => 'Virgin Islands - US (+1340)',
                    '681' => 'Wallis & Futuna (+681)',
                    '969' => 'Yemen (North)(+969)',
                    '967' => 'Yemen (South)(+967)',
                    '260' => 'Zambia (+260)',
                    '263' => 'Zimbabwe (+263)',
                ], isset($user) ? $user->info->get('phone')['country'] : '20', ['class' => 'form-control select2', 'style' => 'width: 150px'])
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
                                   'name' => 'program',
                                   'type' => 'select',
                                   'list' => [10 => 'Program 1', 40 => 'Program 2', 100 => 'Program 3'],
                                   'value' => isset($user) ? $user->program : 10,
                                   'title' => 'Chose program type',
                                   'labelClass' => 'col-md-4',
                                   'div' => '<div class="col-md-8">',
                                   'help_block' => '<span class="amount">10</span>$ per month'
                               ])@endcomponent
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
                                min: 5,
                            },
                            password_confirmation: {
                                min: 5,
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
