@extends('layouts.app')

@section('title', '| Users')

@section('content')
<div class="col-lg-10 col-lg-offset-1">
        <h1><i class="fa fa-users"></i> List of Users</h1> <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
        <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
        @can('write-post')
        <a href="{{ route('users.create') }}" class="btn btn-primary">Create User</a>
        @endcan
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Permission</th>
                        <th>Actions</th>
                    </tr>
                <tbody>
                    @foreach ($users as $user)
                    <tr>

                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles()->pluck('name')->implode(' ') }}  @if(!@$loop->last) , @endif</td>
                        <td>
                                @foreach($user->getAllPermissions() as $permission)
                                {{$permission->name }} @if(!@$loop->last) , @endif
                                @endforeach
                            </td>
                        <td>
                            @can('edit-post')
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}" >Edit</a>
                            @endcan
                        {!! Form::open(['method' => 'DELETE', 'route' =>['users.destroy', $user->id],'style'=>'display:inline']) !!}
                        @can('delete post')
                        {!! Form::submit('Delete', ['onclick'=>"return confirm('Are you sure')", 'class' => 'btn btn-danger']) !!}
                        @endcan
                        {!! Form::close() !!}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>
    </div>

    @endsection
