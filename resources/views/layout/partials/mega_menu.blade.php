<div class="hor-menu">
    <ul class="nav navbar-nav">
        <li class="menu-dropdown{{ \Request::is('*admin') ? ' active' : '' }}">
            <a href="{{ route('admin.home') }}">@lang('pages.admin.home.title')</a>
        </li>

        <li class="menu-dropdown mega-menu-dropdown mega-menu-full{{ \Request::is(['*doctor*', '*member*', '*admins*']) ? ' active' : '' }}">
            <a href="javascript:;">@lang('pages.admin.users.title') <span class="arrow"></span></a>
            <ul class="dropdown-menu">
                <li>
                    <div class="mega-menu-content">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="mega-menu-submenu">
                                    <li><h3>@choice('pages.admin.users.admins.title', 2)</h3></li>
                                    <li{!! Request::is('*admins') ? ' class="active"' : '' !!}>
                                        <a href="{{ route('admin.admins.index') }}">
                                            <i class="fa fa-user"></i>
                                            @lang('general.showAll', ['page' => trans_choice('pages.admin.users.admins.title', 2)])
                                        </a>
                                    </li>
                                    <li{!! Request::is('*admins/create') ? ' class="active"' : '' !!}>
                                        <a href="{{ route('admin.admins.create') }}">
                                            <i class="fa fa-user-plus"></i>
                                            @lang('general.createNew', ['page' => trans_choice('pages.admin.users.admins.title', 1)])
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="mega-menu-submenu">
                                    <li><h3>@choice('pages.admin.users.doctors.title', 2)</h3></li>
                                    <li{!! Request::is('*doctors') ? ' class="active"' : '' !!}>
                                        <a href="{{ route('admin.doctors.index') }}">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.showAll', ['page' => trans_choice('pages.admin.users.doctors.title', 2)])
                                        </a>
                                    </li>
                                    <li{!! Request::is('*doctors/create') ? ' class="active"' : '' !!}>
                                        <a href="{{ route('admin.doctors.create') }}">
                                            <i class="fa fa-user-plus"></i>
                                            @lang('general.createNew', ['page' => trans_choice('pages.admin.users.doctors.title', 1)])
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="mega-menu-submenu">
                                    <li><h3>@choice('pages.admin.users.members.title', 2)</h3></li>
                                    <li{!! Request::is('*members') ? ' class="active"' : '' !!}>
                                        <a href="{{ route('admin.members.index') }}">
                                            <i class="fa fa-user"></i>
                                            @lang('general.showAll', ['page' => trans_choice('pages.admin.users.members.title', 2)])
                                        </a>
                                    </li>
                                    <li{!! Request::is('*members/create') ? ' class="active"' : '' !!}>
                                        <a href="{{ route('admin.members.create') }}">
                                            <i class="fa fa-user-plus"></i>
                                            @lang('general.createNew', ['page' => trans_choice('pages.admin.users.members.title', 2)])
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>

        <li class="menu-dropdown{{ \Request::is('*admin/languages') ? ' active' : '' }}">
            <a href="{{ url('admin/languages') }}">@lang('pages.admin.translation.title')</a>
        </li>
    </ul>
</div>
