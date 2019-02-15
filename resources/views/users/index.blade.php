@extends('layouts.app')

@section('content')
<div class="row">
            <h1>
                List of Users
            </h1>

    <div>
            <a href="{{ route('users.create')}}" class="btn btn-primary pull-left" >Create User</a>
    </div>
</div>
<meta name="viewport" content="width=device-width, initial-scale=1">

        <table>
            <thead>
                <tr role="row">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email}}</td>

                <td>
                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}" method="PUT"><b>Edit</a>
                    <form action="{{ route('users.destroy', $user->id)}}" method="POST">
                     @csrf
                    {{ method_field('DELETE') }}
                     <input type="submit" value="Delete" onclick="return confirm('Are you sure')" class="btn btn-danger"/>
                     </form>

                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
