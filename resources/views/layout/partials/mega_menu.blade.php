<div class="hor-menu">
    <ul class="nav navbar-nav">
        <li class="menu-dropdown{{ \Request::is('admin') ? ' active' : '' }}">
            <a href="{{ route('admin.home') }}">Home</a>
        </li>

        <li class="menu-dropdown classic-menu-dropdown {{ \Request::is('admin/users*') ? ' active' : '' }}">
            <a href="javascript:;">Users <span class="arrow"></span></a>
            <ul class="dropdown-menu pull-left">
                <li{!! Request::is('admin/users/doctors') ? ' class="active"' : '' !!}>
                    <a href="index.html" class="nav-link{{ Request::is('admin/users/doctors') ? ' active' : '' }}">
                        <i class="icon-bar-chart"></i> Doctors
                    </a>
                </li>

                <li{!! Request::is('admin/users/members') ? ' class="active"' : '' !!}>
                    <a href="index.html" class="nav-link{{ Request::is('admin/users/members') ? ' active' : '' }}">
                        <i class="icon-bar-chart"></i> Members
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
