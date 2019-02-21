@extends('layouts.app')

@section('title', '| Users')

@section('content')
<div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> List of Users <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User</th>
                        <th>Admin</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><input type="checkbox" {{$user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                        <td><input type="checkbox" {{$user->hasRole('Admin') ? 'checked' : '' }} name="admin"></td>
                        <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>

    </div>

    @endsection
