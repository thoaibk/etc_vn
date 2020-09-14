@extends('backend.layouts.lte')

@section('title')
    Danh mục sản phẩm
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh mục sản phẩm</h3>
            <div class="card-tools">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('backend.product_category.create') }}"><i class="fa fa-plus"></i> Thêm danh mục</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
