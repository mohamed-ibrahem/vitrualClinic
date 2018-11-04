<div class="hor-menu">
    <ul class="nav navbar-nav">
        <li class="menu-dropdown{{ \Request::is('admin') ? ' active' : '' }}">
            <a href="{{ route('admin.home') }}">@lang('pages.admin.home.title')</a>
        </li>

        <li class="menu-dropdown mega-menu-dropdown mega-menu-full{{ \Request::is('admin/users*') ? ' active' : '' }}">
            <a href="javascript:;">@lang('pages.admin.users.title') <span class="arrow"></span></a>
            <ul class="dropdown-menu">
                <li>
                    <div class="mega-menu-content">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="mega-menu-submenu">
                                    <li><h3>@choice('pages.admin.users.admins.title', 2)</h3></li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.showAll', ['page' => trans_choice('pages.admin.users.admins.title', 2)])
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-plus"></i>
                                            @lang('general.createNew', ['page' => trans_choice('pages.admin.users.admins.title', 1)])
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="mega-menu-submenu">
                                    <li><h3>@choice('pages.admin.users.doctors.title', 2)</h3></li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.showAll', ['page' => trans_choice('pages.admin.users.doctors.title', 2)])
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-plus"></i>
                                            @lang('general.createNew', ['page' => trans_choice('pages.admin.users.doctors.title', 1)])
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.reports')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.settings')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="mega-menu-submenu">
                                    <li><h3>@choice('pages.admin.users.members.title', 2)</h3></li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.showAll', ['page' => trans_choice('pages.admin.users.members.title', 2)])
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('pages.admin.users.members.programs')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('pages.admin.users.members.paymentMethods')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.reports')
                                        </a>
                                    </li>
                                    <li>
                                        <a href="components_date_time_pickers.html">
                                            <i class="fa fa-user-md"></i>
                                            @lang('general.settings')
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </li>

        <li class="menu-dropdown{{ \Request::is('mobile') ? ' active' : '' }}">
            <a href="{{ route('admin.home') }}">@lang('pages.admin.mobile.title')</a>
        </li>

        <li class="menu-dropdown{{ \Request::is('system') ? ' active' : '' }}">
            <a href="{{ url('admin/translations') }}" target="_blank">Translation Manager</a>
        </li>

        <li class="menu-dropdown{{ \Request::is('system') ? ' active' : '' }}">
            <a href="{{ route('admin.home') }}">@lang('pages.admin.system.title')</a>
        </li>
    </ul>
</div>
