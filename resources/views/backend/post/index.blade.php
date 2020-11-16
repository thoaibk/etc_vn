@extends('backend.layouts.lte')

@section('title')
    Danh sách bài viết
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách bài viết</h3>
            <div class="card-tools">
                <a class="btn btn-outline-primary btn-sm" href="{{ route('backend.post.create') }}"><i class="fa fa-plus"></i> Thêm bài viết</a>
            </div>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th style="width: 60px">ID</th>
                    <th>Tác giả</th>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th style="width: 130px">Trạng thái</th>
                    <th style="width: 130px">Phê duyệt</th>
                    <th style="width: 150px">Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr id="row_{{ $post->id }}">
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>{{ $post->statusLabel() }}</td>
                        <td><span class="{{ $post->approveCssClass() }}"><i class="fad fa-circle text-sm"></i> {{ $post->approveLabel() }}</span></td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteTableRow('{{ $post->id }}', '{{ $post->deleteUrl() }}')"><i class="fa fa-times"></i></button>
                            <a href="{{ route('backend.post.edit', ['id' => $post->id]) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                            @if(auth()->user()->hasRole('admin'))
                                <a href="{{ $post->backendViewUrl() }}" target="_blank" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
    {{
    $posts->appends([])->links('vendor.pagination.bootstrap-4')
    }}
@stop
