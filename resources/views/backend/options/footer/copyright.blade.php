@extends('backend.layouts.lte')
@section('title')
    Thông tin footer
@stop
@section('content')

    @include('backend.options.footer._footer_nav', ['active' => 'copyright'])


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Social link</h3>
        </div>
        <div class="box-body">
            {!! Form::open([
                'route' => ['backend.footer.copyright']
            ]) !!}
            <div class="form-group">
                <label for="">Copyright</label>
                {!! Form::text('copyright', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_COPYRIGHT), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Lưu cài đặt</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

