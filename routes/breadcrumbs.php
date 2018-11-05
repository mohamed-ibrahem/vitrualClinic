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

Breadcrumbs::for('admin.languages.index', function (\DaveJamesMiller\Breadcrumbs\BreadcrumbsGenerator $trail) {
    $trail->parent('admin.home');

    $trail->push(
        trans('pages.admin.translation.title'),
        route('admin.languages.index')
    );
});
