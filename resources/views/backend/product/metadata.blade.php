@extends('backend.layouts.lte')

@section('title')
    Thuộc tính sản phẩm
@stop

@section('before-styles-end')

@stop

@section('content')

    @include('backend.includes._product_nav')

    <div class="mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thuộc tính sản phẩm</h3>
            </div>
            <div class="card-body">
                {!! Form::open([
                    'route' => ['backend.product.metadata', ['product_id' => $product->id]]
                ]) !!}
                <div class="row">
                    <div class="col-md-6">
                        @foreach(config('product.metadata') as $meta)
                            <div class="form-group">
                                <label for="">{{ $meta['name'] }}</label>
                                <input type="text" name="{{ $meta['key'] }}" value="{{ isset($productMetadata[$meta['key']]) ? $productMetadata[$meta['key']] : null }}" class="form-control" placeholder="{{ $meta['name'] }}">
                            </div>
                        @endforeach

                        <div class="form-group">
                            <button class="btn btn-primary">Lưu </button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>

@stop
