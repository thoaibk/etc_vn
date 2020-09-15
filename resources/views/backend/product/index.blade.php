@extends('backend.layouts.lte')

@section('title')
    Danh mục sản phẩm
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách sản phẩm</h3>
            <div class="card-tools">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('backend.product.create') }}"><i class="fa fa-plus"></i> Thêm sản phẩm</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên danh mục</th>
                    <th style="width: 130px">Trạng thái</th>
                    <th style="width: 130px">Thao tác</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@stop
