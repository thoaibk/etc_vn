<!-- Main Sidebar Container sidebar-dark-primary -->
<aside class="main-sidebar sidebar-dark-primary crm-sidebar-skin-dark elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
{{--        <img src="/backend/lte3/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">{{ config('app.name', 'Admin')  }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-13" data-widget="treeview" role="menu" data-accordion="false" style="margin-bottom: 100px">
                @if(auth()->user()->hasRole('admin'))
                    <li class="nav-header text-uppercase text-11 pl-3">Quản lý User</li>
                    <li class="nav-item">
                        <a href="{{ route('access_manager.user.index') }}" class="nav-link {{ active_class(if_route('access_manager.user.index')) }}">
                            <i class="fad fa-users-cog"></i>
                            <p>Danh sách user</p>
                        </a>
                    </li>
                @endif

                @if(auth()->user()->can('product_manager'))
                    <li class="nav-header text-uppercase text-11 pl-3">Quản lý dịch vụ</li>
                    <li class="nav-item">
                        <a href="{{ route('backend.product.index') }}" class="nav-link {{ active_class(if_route('backend.product.index')) }}">
                            <i class="fad fa-th-list"></i>
                            <p>Danh sách dịch vụ</p>
                        </a>
                    </li>
                @endif
                <li class="nav-header text-uppercase text-11 pl-3">Quản lý bài viết</li>
                <li class="nav-item">
                    <a href="{{ route('backend.post.index') }}" class="nav-link {{ active_class(if_route('backend.post.index')) }}">
                        <i class="fad fa-th-list"></i>
                        <p>Danh sách bài viết</p>
                    </a>
                </li>

                @if(auth()->user()->hasRole('admin'))
                    <li class="nav-header text-uppercase text-11 pl-3">Cấu hình</li>
                    <li class="nav-item">
                        <a href="{{ route('backend.config.meta') }}" class="nav-link {{ active_class(if_route('backend.config.meta')) }}">
                            <i class="fad fa-th-list"></i>
                            <p>Hiển thị</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.banner.index') }}" class="nav-link {{ active_class(if_route('backend.banner.index')) }}">
                            <i class="fad fa-th-list"></i>
                            <p>Banner</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.footer.info') }}" class="nav-link {{ active_class(if_route('backend.footer.info')) }}">
                            <i class="fad fa-th-list"></i>
                            <p>Footer</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
