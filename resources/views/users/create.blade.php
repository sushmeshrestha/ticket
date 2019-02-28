@extends('layouts.app')

@section('title', '| Add User')

@section('content')
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <div class='col-lg-4 col-lg-offset-4'>

            <h1><i class='fa fa-user-plus'></i>Create User</h1>
            <hr>

            {{ Form::open(array('url' => 'users')) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', '', array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', '', array('class' => 'form-control')) }}
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password') }}<br>
                {{ Form::password('password', array('class' => 'form-control')) }}
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            </div>

            <div class="form-group">
                {{ Form::label('password', 'Confirm Password') }}<br>
                {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

            </div>


            <h2>Assign Role</h2>


            <div class='form-group'>
                @foreach ($roles as $role)
                    {{ Form::checkbox('roles[]',  $role->id ) }}
                    {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                @endforeach

            </div>


            {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}

        </div>

        @endsection

