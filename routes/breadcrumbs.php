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
        route('index')
    );
});
