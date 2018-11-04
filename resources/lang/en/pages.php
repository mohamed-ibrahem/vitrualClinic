<?php

return array (
  'admin' => 
  array (
    'home' => 
    array (
      'title' => 'Home',
      'description' => 'Welcome back :user',
      'widgets' => 
      array (
        'doctors' => 
        array (
          'title' => 'Doctors',
          'subtitle' => 'Total doctors',
        ),
        'members' => 
        array (
          'title' => 'Members',
          'subtitle' => 'Total members',
        ),
        'messages' => 
        array (
          'title' => 'Conversations',
          'subtitle' => 'Total messages',
        ),
        'ratings' => 
        array (
          'title' => 'Ratings',
          'subtitle' => 'Total Ratings',
        ),
        'registrants' => 
        array (
          'title' => 'Registrants',
          'options' => 
          array (
            0 => 'Yearly',
            1 => 'Monthly',
            2 => 'Weekly',
          ),
        ),
        'specialties' => 
        array (
          'title' => 'Top Specialties',
        ),
        'main' => 
        array (
          'title' => 'General statistics',
          'active' => 'Online users',
          'sessions' => 'Most online',
        ),
      ),
    ),
    'users' => 
    array (
      'title' => 'Users',
      'admins' => 
      array (
        'title' => '{1} Admin|[2, *] Admins',
      ),
      'doctors' => 
      array (
        'title' => '{1} Doctor|[2, *] Doctors',
        'description' => '',
      ),
      'members' => 
      array (
        'title' => '{1} Member|[2, *] Members',
        'description' => '',
        'paymentMethods' => 'Payments',
        'programs' => 'Programs',
      ),
    ),
    'mobile' => 
    array (
      'title' => 'Mobile apps',
    ),
    'system' => 
    array (
      'title' => 'System',
    ),
  ),
);
