@extends('backend.layouts.lte')

@section('title')
    Dashboard admin
@stop

@section('content')
    <div>
        Chào mừng {{ auth()->user()->name }} quay trở lại
    </div>
@stop
