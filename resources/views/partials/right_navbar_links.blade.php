<!-- Right navbar links -->
<ul class="navbar-nav ml-auto">

    <!-- Messages Dropdown Menu -->
    {{--@include('partials.messages')--}}
    <!-- ./ Message End -->

    <!-- Notifications Dropdown Menu -->
    {{--@include('partials.notifications')--}}
    <!-- ./ Notifications Dropdown Menu End-->

    {{--User--}}
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{--{{ Auth::user()->firstname.' '. Auth::user()->lastname }}--}}
            {{ Auth::user()->fullname }}
            {{--<i class="fas fa-caret-down"></i>--}}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">{{__('dashboard.My profile')}}</a>
            <a class="dropdown-item" href="#">{{__('dashboard.Change password')}}</a>
            <hr>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('dashboard.Logout') }}
            </a>
        </div>
    </li>

    {{--Logout--}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>

    {{--Right Navbar--}}
    <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
            <i class="fa fa-th-large"></i>
        </a>
    </li>

</ul>
