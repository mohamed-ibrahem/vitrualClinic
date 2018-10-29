<?php
/**
 * @project VirtualClinic
 */

Breadcrumbs::for('index', function ($trail) {
    $trail->push('Home', route('index'));
});

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('admin.home'));
});
