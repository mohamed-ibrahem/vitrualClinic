<?php
/**
 * @project VirtualClinic
 */

Breadcrumbs::for('web.index', function ($trail) {
    $trail->push('Home', route('web.index'));
});

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('Home', route('admin.home'));
});
