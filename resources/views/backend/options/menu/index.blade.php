@extends('backend.layouts.lte')
@section('title')
    Cấu hình Menu
@stop

@section('before-styles-end')
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@stop

@section('content')
    <div id="MenuManagement">
    </div>
@stop

@section('after-scripts-end')
    <script src="{{ mix('/assets/backend/js/menu_management.js') }}"></script>
@stop
