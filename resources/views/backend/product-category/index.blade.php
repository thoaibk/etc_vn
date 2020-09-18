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
                    <th>Tên</th>
                    <th>Danh mục cha</th>
                    <th style="width: 130px">Trạng thái</th>
                    <th style="width: 130px">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr id="row_{{ $category->id }}">
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ ($category->parent) ? $category->parent->name : '' }}</td>
                        <td>
                            <span class="pointer" title="{{ $category->statusLable() }}"><i onclick="toggleTableStatus(this, '{{ $category->toggleStatusUrl() }}')"  class="{{ $category->statusStateIcon() }}"></i></span>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm" title="Xóa" onclick="deleteTableRow('{{ $category->id }}', '{{ $category->deleteUrl() }}')"><i class="fa fa-times"></i></button>
                            <a href="{{ $category->editUrl() }}" class="btn btn-outline-primary btn-sm" title="Sửa"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{
    $categories->appends([])->links('vendor.pagination.bootstrap-4')
    }}
@stop
