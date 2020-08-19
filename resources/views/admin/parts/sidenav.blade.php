<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <!-- <img alt="image" class="rounded-circle" src="/images/user.jpg"/> -->
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold"></span>
                        <span class="text-muted text-xs block">
                            {{ Auth::user()->name }}
                            <!-- <b class="caret"></b> -->
                        </span>
                    </a>
                    <!-- <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item"
                               href=""></a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href=""></a>
                        </li>
                    </ul> -->
                </div>
                <div class="logo-element">
                    {{ config('app.name', 'Laravel') }}
                </div>
            </li>
            <li class="{{ \Request::is('/*') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.index') }}">
                    <i class="fa fa-home"></i>
                    <span class="nav-label">{{ __('admin.home') }}</span>
                </a>
            </li>
            <li class="{{ \Request::is(['company', 'company/*']) ? 'mm-active' : '' }}">

                <a href="{{ route('admin.company.index') }}">
                    <i class="fa fa-industry"></i>
                    <span class="nav-label">{{ __('admin.company') }}</span>
                </a>
            </li>
            <li class="{{ \Request::is(['employee','*/employee','*/employee/*']) ? 'mm-active' : '' }}">
                <a href="{{ route('admin.employee.list') }}">
                    <i class="fa fa-house-user"></i>
                    <span class="nav-label">{{ __('admin.employee') }}</span>
                </a>
            </li>
        </ul>

    </div>
</nav>
