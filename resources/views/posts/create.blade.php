@extends('layouts.app')

@section('content')



<h1>Post Entry</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



{!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}

    {!! csrf_field() !!}
    <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('body', 'Post Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Create Post', array('class' => 'btn btn-primary btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>

{!! Form::close() !!}
@stop
