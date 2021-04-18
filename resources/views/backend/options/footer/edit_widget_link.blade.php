@extends('backend.layouts.lte')
@section('title')
    Thông tin footer
@stop
@section('content')

    @include('backend.options.footer._footer_nav', ['active' => 'meta-left'])

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Thêm link</h3>
        </div>
        <div class="box-body">
            {!! Form::open([
                'route' => ['backend.footer.update_widget_link', 'meta' => $meta, 'id' => Request::get('id')]
            ]) !!}

            <div class="form-group">
                <label for="">Tiêu đề</label>
                {!! Form::text('title', $widgetLink['title'], ['class' => 'form-control', 'placeholder' => 'Tiêu đề' ]) !!}
            </div>
            <div class="form-group">
                <label for="">Link</label>
                {!! Form::text('link', $widgetLink['link'], ['class' => 'form-control', 'placeholder' => 'Link' ]) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Lưu</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

