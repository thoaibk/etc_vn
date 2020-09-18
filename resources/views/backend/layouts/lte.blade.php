<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    @yield('before-styles-end')

    <link rel="stylesheet" href="/assets/plugins/awesome/css/all.min.css">
    <link rel="stylesheet" href="/assets/plugins/overlayscrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="{{ mix('assets/backend/css/lte.scss') }}">

    <link rel="stylesheet" href="/assets/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" href="/assets/plugins/jquery-confirm/jquery-confirm.css">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @yield('after-styles-end')
</head>
<body class="hold-transition sidebar-mini layout-fixed {{ isset($hidden_sidebar) ? 'sidebar-collapse' : '' }}">
<div class="wrapper">
    @include('backend.layouts.lte3.nav')

    @include('backend.layouts.lte3.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                @yield('page-header')
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @include('backend.includes.fash_message')
                @yield('content')
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @include('backend.layouts.lte3.footer')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('includes.partials.params')

@yield('before-scripts-end')
<script type="text/javascript">
    {{--window.user = {id: {{\auth()->user()->id}} };--}}
</script>

<script src="{{ mix('assets/backend/js/backend.js') }}"></script>

<script src="/assets/plugins/bootstrap-notify-3.1.3/dist/bootstrap-notify.min.js"></script>

<script src="/assets/plugins/overlayscrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/assets/plugins/toastr/toastr.min.js"></script>
<script src="/assets/plugins/jquery-confirm/jquery-confirm.js"></script>


<script src="{{ mix('assets/backend/js/common.js') }}"></script>


@yield('after-scripts-end')

</body>
</html>
