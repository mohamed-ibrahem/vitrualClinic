<div class="top-menu">
    @if ( auth()->check() )
        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN TODO DROPDOWN -->
            <li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <i class="icon-calendar"></i>
                    <span class="badge badge-default">3</span>
                </a>
                <ul class="dropdown-menu extended tasks">
                    <li class="external">
                        <h3>You have <strong>12 pending</strong> tasks</h3>
                    </li>
                    <li>
                        <ul class="dropdown-menu-list scroller" style="height: 275px;"></ul>
                    </li>
                </ul>
            </li>
            <!-- END TODO DROPDOWN -->

            <li class="droddown dropdown-separator">
                <span class="separator"></span>
            </li>

            <!-- BEGIN INBOX DROPDOWN -->
            <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                <a href="javascript:;" class="dropdown-toggle"
                   data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="circle">3</span>
                    <span class="corner"></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="external">
                        <h3>You have <strong>0 New</strong> Messages</h3>
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
                <ul class="dropdown-menu dropdown-menu-default"></ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
    @else
        <form class="navbar-form" role="form" type="post" action="{{ route('web.auth.login.post') }}">
            <div class="form-group">
                <label class="sr-only" for="exampleInputEmail22">Email address</label>
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input type="email" class="form-control" id="exampleInputEmail22" placeholder="Enter email">
                </div>
            </div>
            <div class="form-group">
                <label class="sr-only" for="exampleInputPassword42">Password</label>
                <div class="input-icon">
                    <i class="fa fa-user"></i>
                    <input type="password" class="form-control" id="exampleInputPassword42" placeholder="Password">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    @endif
</div>
