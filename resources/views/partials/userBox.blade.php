    <div id="userbox" class="userbox">
        <a href="#" data-toggle="dropdown">
            <figure class="profile-picture">
                <img {{ asset( 'octopusTemplateAssets/images/!logged-user.jpg')}}" alt="Joseph Doe" class="img-circle" data-lock-picture="/octopusTemplateAssets/images/!logged-user.jpg" />
            </figure>
            <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                <span class="name">{{Auth::user()->full_name}}</span>
                <span class="role">{{Auth::user()->role}}</span>
            </div>

            <i class="fa custom-caret"></i>
        </a>

        <div class="dropdown-menu">
            <ul class="list-unstyled">
                <li class="divider"></li>
                <li>
                    <a role="menuitem" tabindex="-1" href="{{ route('profile') }}"><i class="fa fa-user"></i> My Profile</a>
                </li>
                <li>
                    <a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
                </li>
                <li>
                    <a role="menuitem" tabindex="-1" href="{{ route('logout') }}"><i class="fa fa-power-off"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
