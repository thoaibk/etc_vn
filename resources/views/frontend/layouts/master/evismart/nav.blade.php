<!--Navigation Var-->

<nav id="evi-nav" class="navbar navbar-expand-lg bg-white sticky-top p-0">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/image/evismart_logo.png?v=1.0.0" alt="">
        </a>

        <ul class="navbar-nav ml-auto nav-mobile d-lg-none d-flex flex">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cart.index') }}">
                    <i class="cart-icon fa fa-shopping-cart"></i>
                    <div class="nav-cart-count badge badge-pill badge-danger"></div>
                </a>
            </li>
            <!-- Authentication Links -->
            @guest
                <li class="nav-item ml-2">
                    <a class="nav-link nav-auth-login" href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                </li>
            @else
                <li class="nav-item dropdown">

                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="fa fa-user"></i> {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right " style="position: absolute;"  aria-labelledby="navbarDropdown">
                        @if(auth()->user()->can('view_admin'))
                            <a class="dropdown-item" href="{{ route('backend.dashboard') }}">
                                <i class="fad fa-cogs"></i> Admin
                            </a>
                        @endif
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="fal fa-sign-out"></i>
                            {{ __('Đăng xuất') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
        </ul>

        <!--Toggle Collapse Button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fal fa-bars"></i>
        </button>
        <!--Division for navbar-->
        <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">

            <x-category-nav></x-category-nav>

            <ul class="navbar-nav ml-auto right-nav d-none d-lg-flex">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cart.index') }}">
                        <i class="cart-icon fa fa-shopping-cart"></i>
                        <div class="nav-cart-count badge badge-pill badge-danger"></div>
                    </a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link nav-auth-login" href="{{ route('login') }}"><i class="fa fa-user"></i> Đăng nhập</a>
                    </li>
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i> {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @if(auth()->user()->can('view_admin'))
                                <a class="dropdown-item" href="{{ route('backend.dashboard') }}">
                                    <i class="fad fa-cogs"></i> Admin
                                </a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="fal fa-sign-out"></i>
                                {{ __('Đăng xuất') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
