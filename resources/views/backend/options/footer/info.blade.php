@extends('backend.layouts.lte')
@section('title')
    Thông tin footer
@stop
@section('content')

    @include('backend.options.footer._footer_nav', ['active' => 'info'])

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Thông tin chung</h3>
        </div>
        <div class="box-body">
            {!! Form::open([
                'route' => ['backend.footer.info']
            ]) !!}

            <div class="form-group">
                <label for="">Tên</label>
                {!! Form::text('footer_name', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_NAME), ['class' => 'form-control', 'placeholder' => 'Tên' ]) !!}
            </div>
            <div class="form-group">
                <label for="">Hotline</label>
                {!! Form::text('footer_hotline', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_HOTLINE), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Hotline' ]) !!}
            </div>
            <div class="form-group">
                <label for="">Điện thoại</label>
                {!! Form::text('footer_phone', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_PHONE), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Điện thoại' ]) !!}
            </div>
            <div class="form-group">
                <label for="">Email</label>
                {!! Form::text('footer_email', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_EMAIL), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Email' ]) !!}
            </div>
            <div class="form-group">
                <label for="">Address</label>
                {!! Form::text('footer_address', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_ADDRESS), ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Địa chỉ' ]) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Lưu cài đặt</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
