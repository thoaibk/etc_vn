@extends('backend.layouts.lte')
@section('title')
    Quản lý user
@stop

@section('content')
    <div class="card mb-2">
        <div class="card-header">
            <h3 class="card-title">Danh sách user</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if(count($user->roles) > 0)
                                    <ul class="p-0" style="list-style: none">
                                        @foreach($user->roles as $role)
                                            <li>{{ $role->name }}</li>
                                        @endforeach
                                    </ul>

                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('access_manager.user.edit', ['id' => $user->id]) }}"><i class="fa fa-pencil-alt"></i></a>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>

    {{
                $users->appends([
                    'id' => Request::get('id'),
                    'name' => Request::get('name'),
                    'email' => Request::get('email')
                ])->links('vendor.pagination.bootstrap-4')
            }}
@stop
