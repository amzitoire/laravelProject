<div class=" container-fluid bg-dark w-100 h-15 fixed-top">
    <div class="row justify-content-center">
        <nav class="navbar bg-gray-800 navbar-expand-sm navbar-dark">
            @if (Route::has('login'))
            @auth
            <div class="col-2 col-lg-2 justify-content-start mr-3 text-center">
                <a href="{{ url('/home') }}" class="navbar-brand mr-3">
                    <span class="text-gray-400 hover:text-white"><i class="fa-solid fa-book"></i> eLIBRARY</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="justify-content-center lg:justify-content-end lg:text-lg collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    @if (Auth::user()->is_admin)
                    <li class="nav-item active">
                        <a href="/admin" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white hover:break-after-column"><i class="fa fa-desktop" aria-hidden="true"></i> Admin</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="/newsletter" class="nav-link">
                            <span class="text-gray-400 hover:text-white hover:break-after-column"><i class="fa fa-envelope" aria-hidden="true"></i> Newsletter</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item active">
                        <a href="{% url 'dashboard' %}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white hover:break-after-column"><i class="fas fa-book-reader    "></i> Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a href="{% url 'new_epreuve' %}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white"><i class="fas fa-book-open    "></i> Poster une epreuve</span>
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <span class="d-none d-md-inline"><i class="fa-solid fa-user"></i> Profil</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- Menu Footer-->
                            <li class="user-footer mx-3">
                                <a href="#" class="btn btn-default btn-flat "><i class="fa fa-cog" aria-hidden="true"></i> Profile</a>
                            </li>
                            <li class="user-footer mx-auto">
                                <a href="#" class="btn btn-default btn-flat float-right"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out" aria-hidden="true"></i> Déconnexion
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
{{--                <div class="dropdown offset-2 offset-lg-3">--}}
{{--                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"--}}
{{--                            data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        --}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
{{--                        <li><a class="dropdown-item" href="{% url 'profil' %}"> </a></li>--}}
{{--                        <li>--}}
{{--                            <hr class="dropdown-divider">--}}
{{--                        </li>--}}

{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                            @csrf--}}
{{--                            <li> <a class="dropdown-item" href=""><button> </button></a>--}}
{{--                            </li>--}}
{{--                        </form>--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}

                @else
            <div class="col-lg-2 col-lg-2 text-center">
                <a href="{% url 'home' %}" class="navbar-brand mr-5">
                    <span class="text-gray-400 hover:text-white"><i class="fa-solid fa-book"></i> eLIBRARY</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col justify-content-end text-center mx-5 lg:text-lg collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white"><i class="fa fa-sign-in" aria-hidden="true"></i> Se connecter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link mx-3">
                            <span class="text-gray-400 hover:text-white"><i class="fa fa-user-plus" aria-hidden="true"></i> S'inscrire</span>
                        </a>
                    </li>
                </ul>
            </div>
                @endif
            @endif
        </nav>

    </div>
</div>
