<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>

            <a class="navbar-brand" href=""> @yield('headTitle') </a>
            @yield('login')
            @auth('admin')
                <div> Welcome {{auth('admin')->user()->name}}</div>
            @endauth
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="ti-settings"></i>
                        @auth('admin')
                            <p>Account</p>
                        @endauth
                        @guest('admin')
                            <p> Register </p>
                        @endguest
                            <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        @auth('admin')
                            <li><a href="{{route('admin.profile', auth('admin')->id())}}">Profile</a></li>
                            <li><a href="{{route('admin.logout')}}">Logout</a></li>
                            <li><a href="{{route('admin.signup')}}"> Add Account </a> </li>
                        @endauth
                        @guest('admin')
                            <li><a href="{{route('admin.login')}}"> LogIn </a> </li>
                        @endguest
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
