<?php
/**
 * @project VirtualClinic
 */

Breadcrumbs::for('index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->push(
        trans('pages.index.title'),
        route('index')
    );
});

Breadcrumbs::for('admin.home', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->push(
        trans('pages.admin.home.title'),
        route('admin.home')
    );
});

Breadcrumbs::for('admin.settings', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.home');

    $trail->push(
        trans('pages.admin.system.title'),
        route('admin.settings')
    );
});

Breadcrumbs::for('admin.doctors.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.home');

    $trail->push(
        trans('pages.admin.users.title'),
        route('admin.doctors.index')
    );

    $trail->push(
        trans_choice('pages.admin.users.doctors.title', 2),
        route('admin.doctors.index')
    );
});

Breadcrumbs::for('admin.doctors.create', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.doctors.index');

    $trail->push(
        trans('general.createNew', ['page' => trans_choice('pages.admin.users.doctors.title', 1)]),
        route('admin.doctors.create')
    );
});

Breadcrumbs::for('admin.doctors.edit', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, \App\User $user) {
    $trail->parent('admin.doctors.index');

    $trail->push(
        trans('general.datatable.tools.edit', ['user' => $user->name]),
        ''
    );
});

Breadcrumbs::for('admin.members.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.home');

    $trail->push(
        trans('pages.admin.users.title'),
        route('admin.members.index')
    );

    $trail->push(
        trans_choice('pages.admin.users.members.title', 2),
        route('admin.members.index')
    );
});

Breadcrumbs::for('admin.members.create', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.members.index');

    $trail->push(
        trans('general.createNew', ['page' => trans_choice('pages.admin.users.members.title', 1)]),
        route('admin.members.create')
    );
});

Breadcrumbs::for('admin.members.edit', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail, \App\User $user) {
    $trail->parent('admin.members.index');

    $trail->push(
        trans('general.datatable.tools.edit', ['user' => $user->name]),
        ''
    );
});

Breadcrumbs::for('admin.languages.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.home');

    $trail->push(
        trans('pages.admin.translation.title'),
        route('admin.languages.index')
    );
});
