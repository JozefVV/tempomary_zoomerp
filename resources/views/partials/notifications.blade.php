<!-- Notifications Dropdown Menu -->
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa fa-bell-o"></i>
        <span class="badge badge-warning navbar-badge">15</span>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
    <span class="dropdown-item dropdown-header">{{trans_choice('dashboard.Notifications', 15)}}</span>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> {{trans_choice('dashboard.new messages', 4)}}
            <span class="float-right text-muted text-sm">{{trans_choice('dashboard.minutes', 3)}}</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i>{{trans_choice('dashboard.friend requests', 8)}}
            <span class="float-right text-muted text-sm">{{trans_choice('dashboard.hours', 12)}}</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i>{{trans_choice('dashboard.new reports', 3)}}
            <span class="float-right text-muted text-sm">{{trans_choice('dashboard.days', 2)}}</span>
        </a>
        <div class="dropdown-divider"></div>
        <a href="#" class="dropdown-item dropdown-footer">{{__('dashboard.See All Notifications')}}</a>
    </div>
</li>
