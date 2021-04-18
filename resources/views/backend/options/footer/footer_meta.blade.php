@extends('backend.layouts.lte')
@section('title')
    Thông tin footer
@stop
@section('content')

    @include('backend.options.footer._footer_nav', ['active' => $meta])
    <div class="card">
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.footer.meta_link', 'meta' => $meta]
            ]) !!}
            <div class="form-group">
                <label for="">Tiêu đề</label>
                {!! Form::text('footer_widget_title', \App\Models\AppOption::getWidgetTitle($meta), ['class' => 'form-control', 'placeholder' => 'Tiêu đề footer' ]) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Lưu tiêu đề</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Link footer {{ $meta }}</h3>
            <div class="card-tools">
                <a href="{{ route('backend.footer.create_link', ['meta' => $meta]) }}" class="btn btn-primary">Thêm link</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Tiêu đề</th>
                    <th>Link</th>
                    <th style="width: 130px" >Thao tác</th>
                </tr>
                @foreach($widgetLinks as $index => $widgetLink)
                    <tr id="key_{{ $index }}">
                        <td>{{ $widgetLink['title'] }}</td>
                        <td>{{ $widgetLink['link'] }}</td>
                        <td>
                            <button class="btn btn-danger btn-sm" onclick="deleteDataItem('{{ $index }}', '{{ route('backend.footer.delete_widget_link', ['meta' => $meta, 'id' => $index]) }}')"><i class="fa fa-times"></i></button>
                            <a href="{{ route('backend.footer.edit_link', ['meta' => $meta, 'id' => $index]) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

