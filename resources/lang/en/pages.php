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
      'general' => 
      array (
        'title' => 'General settings',
        'form' => 
        array (
          0 => 'Site name',
        ),
      ),
    ),
    'translation' => 
    array (
      'title' => 'Translations',
      'key' => 'Key',
      'reload' => 'Reload from files',
      'publish' => 'Publish',
    ),
  ),
  'index' => 
  array (
    'description' => '<ul class="list-unstyled margin-bottom-30 margin-top-30">
                        <li>2500+ doctors from 80+ specialities.</li>
                        <li>Ideal for Medical Second Opinion and Medical Advice.</li>
                        <li>Trusted by patients across 196 countries.</li>
                        <li>Consult with the comfort of your home.</li>
                        <li>It is private and secure.</li>
                    </ul>',
    'main_button' => 'Download now',
    'features' => 
    array (
      0 => 
      array (
        'title' => 'Save Time',
        'body' => 'Helping several thousand users everyday.',
      ),
      1 => 
      array (
        'title' => 'Save Travel',
        'body' => 'Treating patients with health issues from Psychiatry, Sexology, Radiology, Dermatology, OB/GYN, Oncology and 80+ other specialities.',
      ),
      2 => 
      array (
        'title' => 'Comfort of Your Home',
        'body' => 'Trusted by millions and serving users world wide.',
      ),
      3 => 
      array (
        'title' => 'Your first query is FREE',
        'body' => 'Most convenient for expats and travellers.',
      ),
    ),
    'phone' => 
    array (
      'download' => 'GET :app APP',
      'availability' => ':app app is now available for Android Phones and iPhone.',
    ),
    'top_specialties' => 'Popular Specialists',
  ),
  'login' => 
  array (
    'title' => 'Sign in',
    'forgot' => 
    array (
      'link' => 'Forgot password?',
      'title' => 'Forget Password ?',
      'subtitle' => 'Enter your e-mail address below to reset your password.',
      'back' => 'Back',
      'submit' => 'Submit',
    ),
    'remember' => 'Remember',
    'submit' => 'Login',
    'register' => 
    array (
      'title' => 'Register',
      'or' => 'OR',
      'buttons' => 
      array (
        'back' => 'Back',
        'continue' => 'continue',
        'register' => 'Register',
      ),
    ),
  ),
);
