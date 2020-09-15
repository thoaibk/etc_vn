@extends('backend.layouts.lte')

@section('title')
    Thêm danh mục
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm sản phẩm</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.product.store'],
                'method' => 'POST',
                'class' => 'form-horizontal',
                'autocomplete' => 'off'
            ]) !!}

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Tên danh mục</label>
                <div class="col-sm-6">
                    {!! Form::input('text', 'name', Request::old('name'), ['class' => 'form-control', 'placeholder' => 'Tên danh mục', 'data-lpignore' =>"true"]) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name"></label>
                <div class="col-sm-6">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop
