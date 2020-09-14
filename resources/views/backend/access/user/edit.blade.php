@extends('backend.layouts.lte')

@section('title')
    Cập nhật user
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cập nhật user</h3>
        </div>
        <div class="card-body">
            {!! Form::open([
                'route' => ['access_manager.user.update', ['id' => $user->id]],
                'method' => 'POST',
                'class' => 'form-horizontal',
                'autocomplete' => 'off'
            ]) !!}

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name</label>
                <div class="col-sm-6">
                    {!! Form::input('text', 'name', $user->name, ['class' => 'form-control', 'placeholder' => 'Enter name', 'data-lpignore' =>"true"]) !!}
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Email</label>
                <div class="col-sm-6">
                    {!! Form::input('email', 'email', $user->email, ['class' => 'form-control', 'placeholder' => 'Enter email', 'data-lpignore' =>"true", "autocomplete"=>"off"]) !!}
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Vai trò</label>
                <div class="col-sm-6">
                    @foreach($roles as $role)
                        <div class="">
                            <label>
                                <input type="checkbox" name="roles[]" value="{{ $role->id }}" {{ ($user->hasRole($role->name)) ? 'checked' : '' }}>
                                {{ $role->name }}
                            </label>
                        </div>
                    @endforeach

                </div>
            </div><div class="form-group">
                <label class="control-label col-sm-2" for="name"></label>
                <div class="col-sm-6">
                    {!! Form::submit('Lưu', ['class' => 'btn btn-primary']) !!}
                </div>
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop