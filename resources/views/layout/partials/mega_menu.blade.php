<div class="hor-menu">
    <ul class="nav navbar-nav">
        <li class="menu-dropdown{{ \Request::is('admin') ? ' active' : '' }}">
            <a href="{{ route('admin.home') }}">@lang('pages.admin.home.title')</a>
        </li>

        <li class="menu-dropdown classic-menu-dropdown {{ \Request::is('admin/users*') ? ' active' : '' }}">
            <a href="javascript:;">@lang('pages.admin.users.title') <span class="arrow"></span></a>
            <ul class="dropdown-menu pull-left">
                <li{!! Request::is('admin/users/doctors') ? ' class="active"' : '' !!}>
                    <a href="index.html" class="nav-link{{ Request::is('admin/users/doctors') ? ' active' : '' }}">
                        <i class="fa fa-user-md"></i> @lang('pages.admin.users.doctors.title')
                    </a>
                </li>

                <li{!! Request::is('admin/users/members') ? ' class="active"' : '' !!}>
                    <a href="index.html" class="nav-link{{ Request::is('admin/users/members') ? ' active' : '' }}">
                        <i class="fa fa-user"></i> @lang('pages.admin.users.members.title')
                    </a>
                </li>
            </ul>
        </li>

        <li class="menu-dropdown{{ \Request::is('admin/settings') ? ' active' : '' }}">
            <a href="{{ route('admin.settings') }}">@lang('pages.admin.settings.title')</a>
        </li>
    </ul>
</div>
