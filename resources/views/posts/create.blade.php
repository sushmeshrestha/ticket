@extends('layouts.app')
@section('title', '| Add Post')
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

        {!! Form::open(['route' => 'posts.store', 'method' => 'post']) !!}

            {!! csrf_field() !!}
            <div class="form-group">
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', null, array('class' => 'form-control')) }}
                    <br>

                    {{ Form::label('body', 'Post Body') }}
                    {{ Form::textarea('body', null, array('class' => 'form-control')) }}
                    <br>

                    {{ Form::submit('Create Post', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
@stop
