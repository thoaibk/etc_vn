@extends('backend.layouts.lte')

@section('title')
    Cài đặt hiển thị
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cài đặt hiển thị</h3>
        </div>
        <div class="card-body">
            {!! Form::open() !!}
            <div class="form-group">
                <label for="" class="form-label">Tiêu đề site</label>
                {!! Form::text('title', $data['title'], ['class' => 'form-control', 'placeholder' => 'Tiêu đề site']) !!}
            </div>
            <div class="form-group">
                <label for="" class="form-label">Mô tả</label>
                {!! Form::textarea('description', $data['desc'], ['class' => 'form-control', 'rows' => 3, 'placeholder' => 'Mô tả site']) !!}
            </div>
            <div class="form-group">
                <label for="" class="form-label">Từ khóa</label>
                {!! Form::text('keywords', $data['keywords'], ['class' => 'form-control', 'placeholder' => 'Keywords']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Lưu cài đặt', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
