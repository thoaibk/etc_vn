<!-- Main Sidebar Container sidebar-dark-primary -->
<aside class="main-sidebar sidebar-dark-primary crm-sidebar-skin-dark elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('backend.dashboard') }}" class="brand-link">
{{--        <img src="/backend/lte3/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">{{ 'EviSmart'  }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
{{--                <img src="/backend/lte3/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-13" data-widget="treeview" role="menu" data-accordion="false" style="margin-bottom: 100px">
                <li class="nav-header text-uppercase text-11 pl-3">Quản lý User</li>
                <li class="nav-item">
                    <a href="{{ route('access_manager.user.index') }}" class="nav-link {{ active_class(if_route('access_manager.user.index')) }}">
                        <i class="fad fa-users-cog"></i>
                        <p>Danh sách user</p>
                    </a>
                </li>


                <li class="nav-header text-uppercase text-11 pl-3">Đơn hàng</li>
                <li class="nav-item">
                    <a href="{{ route('backend.order.index') }}" class="nav-link {{ active_class(if_route('backend.order.index')) }}">
                        <i class="fad fa-clipboard-list"></i>
                        <p>Danh sách đơn hàng</p>
                    </a>
                </li>

                <li class="nav-header text-uppercase text-11 pl-3">Quản lý sản phẩm</li>
                <li class="nav-item">
                    <a href="{{ route('backend.product.index') }}" class="nav-link {{ active_class(if_route('backend.product.index')) }}">
                        <i class="fad fa-th-list"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('backend.product_category.index') }}" class="nav-link {{ active_class(if_route('backend.product_category.index')) }}">
                        <i class="fad fa-tags"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
