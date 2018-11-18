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
            {{--<ul class="nav nav-treeview">--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon far fa-circle"></i>--}}
                        {{--<p>Dashboard v1</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="nav-link">--}}
                        {{--<i class="nav-icon far fa-circle"></i>--}}
                        {{--<p>Dashboard v2</p>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                    {{__('dashboard.Widgets')}}
                    <span class="right badge badge-danger">{{__('dashboard.New')}}</span>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-line"></i>
                <p>
                    {{__('dashboard.Charts')}}
                    <i class="right fa fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.ChartJS')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.Flot')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.Inline')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-tree"></i>
                <p>
                    {{__('dashboard.UI Elements')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../UI/general.html" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.General')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../UI/icons.html" class="nav-link">
                        <i class="nav-icon far fa-circle"></i>

                        <p>{{__('dashboard.Icons')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../UI/buttons.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Buttons')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../UI/sliders.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Sliders')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                    {{__('dashboard.Forms')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../forms/general.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.General Elements')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../forms/advanced.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Advanced Elements')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../forms/editors.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Editors')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-table"></i>
                <p>
                    {{__('dashboard.Tables')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../tables/simple.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Simple Tables')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../tables/data.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Data Tables')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">{{__('dashboard.EXAMPLES')}}</li>
        <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
                <i class="nav-icon fa fa-calendar"></i>
                <p>
                    {{__('dashboard.Calendar')}}
                    <span class="badge badge-info right">2</span>
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-envelope"></i>
                <p>
                    {{__('dashboard.Mailbox')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../mailbox/mailbox.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Inbox')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../mailbox/compose.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Compose')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../mailbox/read-mail.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Read')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-book"></i>
                <p>
                    {{__('dashboard.Pages')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../examples/invoice.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Invoice')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../examples/profile.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Profile')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../examples/login.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Login')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../examples/register.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Register')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../examples/lockscreen.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Lockscreen')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-plus-square"></i>
                <p>
                    {{__('dashboard.Extras')}}
                    <i class="fa fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="../examples/404.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Error 404')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../examples/500.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Error 500')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../examples/blank.html" class="nav-link active">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Blank Page')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../../starter.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>{{__('dashboard.Starter Page')}}</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-header">{{__('dashboard.MISCELLANEOUS')}}</li>
        <li class="nav-item">
            <a href="https://adminlte.io/docs" class="nav-link">
                <i class="nav-icon fa fa-file"></i>
                <p>{{__('dashboard.Documentation')}}</p>
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
