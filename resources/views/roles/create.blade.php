@extends('layouts.app')

@section('content')



<h1>role Entry</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



{!! Form::open(['route' => 'roles.store', 'method' => 'post']) !!}

    {!! csrf_field() !!}
    <div class="container">
    <div class="form-group row">
         <label for="uname"><b>rolename</label>
        <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
        </div>
    </div>
    <div class="form-group row">
            <label for="email">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" placeholder="Enter your Email-Id" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

    <div class="form-group row">
            <label for="password" >{{ __('Password') }}</label>

        <div class="col-sm-10">
                <input id="password" type="password" placeholder="Enter your password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

    </div>
    <div class="form-group row">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
        <div class="col-sm-10">
                <input id="password-confirm" type="password" placeholder="Confirm your password" class="form-control" name="password_confirmation" required>
            </div>
    </div>

    <div>
    <button type="submit" class="pure-button pure-button-primary">Confirm</button>
    </div>

    </div>

{!! Form::close() !!}
@stop
