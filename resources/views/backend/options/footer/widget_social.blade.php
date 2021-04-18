@extends('backend.layouts.lte')
@section('title')
    Thông tin footer
@stop
@section('content')

    @include('backend.options.footer._footer_nav', ['active' => 'widget-social'])


    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Social link</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.footer.widget_social']
            ]) !!}
            <div class="form-group">
                <label for="">Youtube channel</label>
                {!! Form::text('footer_widget_social_youtube', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_YOUTUBE), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="">Facebook fanpage</label>
                {!! Form::text('footer_widget_social_facebook', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_FACEBOOK), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="">Messenger</label>
                {!! Form::text('footer_widget_social_messenger', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_MESSENGER), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <label for="">Email</label>
                {!! Form::text('footer_widget_social_email', \App\Models\AppOption::getOptionValue(\App\Models\AppOption::FOOTER_WIDGET_SOCIAL_EMAIL), ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Lưu cài đặt</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@stop

