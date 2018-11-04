<div class="top-menu">
    <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <i class="fa fa-globe"></i>
            </a>
            <ul class="dropdown-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li{!! LaravelLocalization::getCurrentLocaleName() === $properties['name'] ? ' class="active"' : '' !!}>
                        <a rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            <i class="fa fa-flag fa-fw"></i>
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="droddown dropdown-separator">
            <span class="separator"></span>
        </li>
        <!-- BEGIN INBOX DROPDOWN -->
        <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
            <a href="javascript:;" class="dropdown-toggle"
               data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <span class="circle">{{ auth()->user()->unreadNotifications->count() }}</span>
                <span class="corner"></span>
            </a>
            <ul class="dropdown-menu">
                <li class="external">
                    <h3>@lang('general.auth.notifications.title', ['count' => auth()->user()->unreadNotifications->count()])</h3>
                </li>
                <li>
                    <ul class="dropdown-menu-list scroller" style="height: 275px;"></ul>
                </li>
            </ul>
        </li>
        <!-- END INBOX DROPDOWN -->
        <!-- BEGIN USER LOGIN DROPDOWN -->
        <li class="dropdown dropdown-user dropdown-dark">
            <a href="javascript:;" class="dropdown-toggle"
               data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img alt="{{ auth()->user()->name }}" class="img-circle"
                     src="{{ auth()->user()->profile_pic }}">
                <span class="username username-hide-mobile">{{ auth()->user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-default">
                <li>
                    <a class="dropdown-item" href="{{ route('admin.logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        @lang('general.auth.logout')
                    </a>

                    {!! Form::open(['id' => 'logout-form', 'route' => 'admin.logout', 'style' => 'display: none;']) !!}
                    {!! Form::close() !!}
                </li>
            </ul>
        </li>
        <!-- END USER LOGIN DROPDOWN -->
    </ul>
</div>
