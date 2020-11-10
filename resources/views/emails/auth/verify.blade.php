@extends('emails.layouts.master')

@section('content')
    Chào <b>{{ $user_name }}</b>,
    <br>
    <p>Bạn vừa đăng ký tài khoản tại <b>{{ config('app.name') }}</b>, vui lòng xác minh tài khoản của bạn để tiếp tục sử dụng dịch vụ của chúng tôi.</p>
    <div style="text-align: center">
        <a href="{{ $verify_url }}" style="    box-sizing: border-box;
            font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
            border-radius: 4px;
            color: #fff;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
            background-color: #3b7dec;
            border: 8px solid #3b7dec;"
        >
        Xác minh tài khoản
        </a>
    </div>
    <p>Nếu không phải bạn đã đăng ký tài khoản, vui lòng bỏ qua</p>
    <br>
    <p>Xin cảm ơn</p>
@endsection
