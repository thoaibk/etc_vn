<!--Navigation Var-->

<nav id="evico-nav" class="navbar navbar-expand-lg bg-white sticky-top p-0">
    <div class="container">
        <a class="navbar-brand p-2" href="/">
            <img style="height: 28px" src="/image/etc.png" alt="">
        </a>
        <!--Toggle Collapse Button-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fad fa-bars"></i>
        </button>
        <!--Division for navbar-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav mr-auto"></ul>
            <!--UL for links-->
            <ul class="nav navbar-nav navbar-right">
                <x-category-nav></x-category-nav>
                <li class="nav-item dropdown mr-3">
                    <a class="nav-link category" href="{{ route('post.index') }}">
                        <span class="nav-text"> Tin tức</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link category" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="nav-text"> Giới thiệu</span>
                    </a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link nav-auth-login " href="{{ route('login') }}"><i class="fad fa-user-alt"></i> Đăng nhập</a>
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
