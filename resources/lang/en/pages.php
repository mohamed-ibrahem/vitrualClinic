<?php

return [
    'index' => [],
    'login' => [],
    'admin' => [
        'home' => [
            'title' => 'Home',
            'description' => 'Welcome back :user',

            'widgets' => [
                'doctors' => [
                    'title' => 'Doctors',
                    'subtitle' => 'Total doctors'
                ],
                'members' => [
                    'title' => 'Members',
                    'subtitle' => 'Total members'
                ],
                'messages' => [
                    'title' => 'Conversations',
                    'subtitle' => 'Total messages'
                ],
                'ratings' => [
                    'title' => 'Ratings',
                    'subtitle' => 'Total Ratings'
                ],

                'registrants' => [
                    'title' => 'Registrants',

                    'options' => [
                        'Yearly', 'Monthly', 'Weekly'
                    ]
                ],

                'specialties' => [
                    'title' => 'Top Specialties',
                ],

                'main' => [
                    'title' => 'General statistics',
                    'active' => 'Online users',
                    'sessions' => 'Most online'
                ]
            ]
        ],

        'users' => [
            'title' => 'Users',
            'doctors' => [
                'title' => 'Doctors',
                'description' => ''
            ],
            'members' => [
                'title' => 'Members',
                'description' => ''
            ]
        ],

        'mobile' => [
            'title' => 'Mobile apps'
        ],

        'system' => [
            'title' => 'System'
        ]
    ],
];
