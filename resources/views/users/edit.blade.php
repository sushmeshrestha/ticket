@extends('layouts.app')

@section('content')
    <section class="content-header">
    <h1> Update Page </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Update Data</h3>
                    </div>
                        <form method="POST" action="{{route('users.update', $user->id)}}">
                             {{ method_field("PATCH") }}
                                 @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">UserName
                                    </label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value ="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label for= "email">Email</label>
                                    <input type="text" name="email" class="form-control"  placeholder="Enter your email"  value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for= "">Password</label>
                                    <input type="password" id="password" maxlength="8" placeholder="Enter Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for= "">Confirm Password</label>
                                    <input type="password" id="password_confirmation" maxlength="8" placeholder="Confirm Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                    title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                </div>
                                <div>
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>
 

@stop