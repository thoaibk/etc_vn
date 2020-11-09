@extends('emails.layouts.master')

@section('content')
    Chào <b>{{ $user_name }}</b>,
    <br>
    <p>Bạn vừa yêu cầu đặt lại mật khẩu cho tài khoản của bạn tại Evico</p>
    <div>
        <a href="{{ url('password/reset', $token) }}" style="    box-sizing: border-box;
            font-family: -apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol';
            border-radius: 4px;
            color: #fff;
            display: inline-block;
            overflow: hidden;
            text-decoration: none;
            background-color: #3b7dec;
            border: 8px solid #3b7dec;"
        >
        Đặt lại mật khẩu
        </a>
    </div>
    <p>Liên kết đăt lại mật khẩu này sẽ hết hạn sau 60 phút</p>
    <p>Nếu không phải bạn đã yêu cầu đặt lại mật khẩu, vui lòng bỏ qua</p>
    <br>
    <p>Xin cảm ơn</p>
@endsection
