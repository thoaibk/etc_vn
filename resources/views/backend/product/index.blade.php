@extends('backend.layouts.lte')

@section('title')
    Danh sách sản phẩm
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
                    <th style="width: 60px">ID</th>
                    <th style="width: 100px">Thumb</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th style="width: 130px">Trạng thái</th>
                    <th style="width: 150px">Thao tác</th>
                </tr>
                </thead>
                <tbody>

                    @foreach($products as $product)
                        <tr id="row_{{ $product->id }}">
                            <td>{{ $product->id }}</td>
                            <td>
                                <img src="{{ $product->thumb('small') }}" class="img-fluid" alt="">
                            </td>
                            <td>
                                <a class="text-bold text-decoration-none" href="" target="_blank">{{ $product->name }}</a>
                            </td>
                            <td>{{ number_format($product->price) }}</td>
                            <td>
                                <span class="pointer" title="{{ $product->statusLable() }}"><i onclick="toggleTableStatus(this, '{{ $product->toggleStatusUrl() }}')"  class="{{ $product->statusStateIcon() }}"></i></span>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger btn-sm" onclick="deleteTableRow('{{ $product->id }}', '{{ $product->deleteUrl() }}')"><i class="fa fa-times"></i></button>
                                <a href="{{ route('backend.product.edit', ['id' => $product->id]) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{
    $products->appends([])->links('vendor.pagination.bootstrap-4')
    }}
@stop
