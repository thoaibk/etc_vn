@extends('backend.layouts.lte')
@section('title')
    Banner
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cài đặt banner</h3>
            <div class="card-tools">
                <a href="{{ route('backend.banner.create') }}" class="btn btn-outline-primary btn-sm">Thêm banner</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Ảnh banner</th>
                    <th>Link</th>
                </tr>
                </thead>
                <tbody>
                @foreach($bannerConfig as $index => $banner)
                    <tr id="row_{{ $index }}">
                        <td>
                            <img src="{{ $banner->thumb }}" alt="">
                            <p class="mt-2">Link: <a href="{{ $banner->link }}" target="_blank">{{ $banner->link }}</a></p>
                        </td>
                        <td>
                            <button class="btn btn-outline-danger btn-sm" onclick="deleteTableRow('{{ $index }}', '{{ route('backend.banner.delete', ['id' => $index]) }}')"><i class="fa fa-times"></i></button>
                            <a href="{{ route('backend.banner.edit', ['id' => $index]) }}" class="btn btn-outline-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
