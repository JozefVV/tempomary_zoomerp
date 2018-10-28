<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
			 with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    {{--<i class="right fa fa-angle-left"></i>--}}
                </p>
            </a>
        </li>
        @if ( Auth::user()->hasRole('admin') or Auth::user()->hasRole('superadmin') )
        <li class="nav-header">ADMIN CENTER</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Settings
                    {{--<span class="right badge badge-danger">New</span>--}}
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-plug"></i>
                <p>
                    Modules
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>List</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>
                        <p>New module</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                    User roles
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../UI/general.html" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>General</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../UI/icons.html" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>Icons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../UI/buttons.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Buttons</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../UI/sliders.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Sliders</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif
        <li class="nav-header">USER MODULES</li>
        <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                    Calendar
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../mailbox/mailbox.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>List users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../mailbox/compose.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>New user</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>Documents</p>
            </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-danger"></i>
                <p class="text">Important</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-warning"></i>
                <p>Warning</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-circle text-info"></i>
                <p>Informational</p>
            </a>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
