@extends('layouts.app')
@section('content')
<body>

    <h1><b>Table for Roles & Permissions</b>
         {!! Form::submit('Apply', ['onclick'=>"return confirm('Are you sure')", 'class' => 'btn btn-primary']) !!}</h1>
    <div class="table-responsive">
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>User_Name</th>
                    <th>Create</th>
                    <th>View</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->name}} </td>
                    <td><input type="checkbox" ></td>
                    <td><input type="checkbox" ></td>
                    <td><input type="checkbox" ></td>
                    <td><input type="checkbox" ></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    {!! Form::close() !!}

 </body>
@stop



