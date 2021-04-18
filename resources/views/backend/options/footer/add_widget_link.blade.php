@extends('backend.layouts.lte')
@section('title')
    Thông tin footer
@stop
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thêm link</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'route' => ['backend.footer.store_link', 'meta' => $meta]
            ]) !!}

            <div class="form-group">
                <label for="">Tiêu đề</label>
                {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Tiêu đề' ]) !!}
            </div>
            <div class="form-group">
                <label for="">Link</label>
                {!! Form::text('link', null, ['class' => 'form-control', 'placeholder' => 'Link' ]) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-primary text-uppercase"> Thêm link</button>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

