<!-- Main Sidebar Container sidebar-dark-primary -->
<aside class="main-sidebar sidebar-dark-primary crm-sidebar-skin-dark elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
{{--        <img src="/backend/lte3/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"--}}
{{--             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">{{ 'Admin '  }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
{{--                <img src="/backend/lte3/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">--}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ 'Admin' }}</a>
            </div>

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column text-13" data-widget="treeview" role="menu" data-accordion="false" style="margin-bottom: 100px">
                <li class="nav-header text-uppercase text-11 pl-3">Quản lý User</li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('business.user_manager.index') }}" class="nav-link {{ active_class(if_route('business.user_manager.index')) }}">--}}
{{--                        <i class="nav-icon fas fa-user"></i>--}}
{{--                        <p>Danh sách user</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>