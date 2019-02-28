@extends('layouts.app')

@section('title', '| Add Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Add Role</h1>role
    <hr>

    {{ Form::open(array('url' => 'roles')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>


    <div class="table-responsive">
            <div class='form-group'>
                    @foreach ($permissions as $permission)
                    {{ Form::checkbox('permissions[]',  $permission->name ) }}
                    {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endforeach
                </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
