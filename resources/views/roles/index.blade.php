@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-sm-4">
            <div class="row">
                        <h1>
                            List of Roles
                        </h1>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{ route('roles.create')}}" button id="singlebutton" name="singlebutton" class="btn btn-primary center-block" >Create Role</a>
            </div>
        </div>
</section>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data-table" class="table table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">

                                    <thead>
                                        <tr role="row">
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($roles as $role)
                                    {{-- @foreach($roles->$key () as $role) --}}

                                        <tr>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->email}}</td>
                                        <td><input type="checkbox" {{$user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                                        <td><input type="checkbox" {{$user->hasRole('Admin') ? 'checked' : '' }} name="admin"></td>

                                        <td>
                                        <a class="btn btn-primary" href="{{ route('roles.edit', $role->id) }}" method="PUT"><b>Edit</a>
                                            <form action="{{ route('roles.destroy', $role->id)}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure')" class="btn btn-danger"/>
                                            </form>

                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
