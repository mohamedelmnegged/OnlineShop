<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{route('user.dashboard')}}">Laravel Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.cart')}}"><i class="fa fa-shopping-cart"></i> Cart <strong>({{$ordersCount}})</strong>
                    </a>
                </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> Account
                    </a>
                    @auth('user')
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                        <a class="dropdown-item " href="{{route('user.profile')}}">Profile</a>
                        <a class="dropdown-item" href="{{route('user.logout')}}">LogOut</a>
                    </div>
                    @endauth
                    @guest
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="bd-versions">
                            <a class="dropdown-item " href="{{route('user.login')}}">LogIn</a>
                            <a class="dropdown-item" href="{{route('user.signup')}}">Sign Up</a>
                        </div>
                    @endguest
                </li>
            </ul>
        </div>
    </div>
</nav>
