<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
			 with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    {{__('dashboard.Dashboard')}}
                    {{--<i class="right fa fa-angle-left"></i>--}}
                </p>
            </a>
        </li>
        @if ( Auth::user()->hasRole('admin') or Auth::user()->hasRole('superadmin') )
        <li class="nav-header">{{__('dashboard.ADMIN CENTER')}}</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    {{__('dashboard.Settings')}}
                    {{--<span class="right badge badge-danger">New</span>--}}
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plug"></i>
                <p>
                    {{__('dashboard.Modules')}}
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>{{__('dashboard.List')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>{{__('dashboard.New module')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                    {{__('dashboard.User roles')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.General')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.Icons')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Buttons')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Sliders')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-header">{{__('dashboard.USER MODULES')}}</li>
        <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    {{__('dashboard.Calendar')}}
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    {{__('dashboard.Users')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>{{__('dashboard.List users')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>{{__('dashboard.New user')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-warehouse"></i>
                <p>
                    {{__('dashboard.Warehouse')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>{{__('dashboard.Show inventory')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>{{__('dashboard.Documents')}}</p>
            </a>
        </li>
        <li class="nav-header">{{__('dashboard.LABELS')}}</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">{{__('dashboard.Important')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>{{__('dashboard.Warning')}}</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>{{__('dashboard.Informational')}}</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
