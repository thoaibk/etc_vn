@extends('backend.layouts.lte')

@section('title')
    Dashboard admin
@stop

@section('content')
    <div>
        Chào mừng <strong>{{ auth()->user()->name }}</strong> quay trở lại
    </div>
@stop
