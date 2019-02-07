<!DOCTYPE html>

<title>Create </title>
<body>

<h1>User</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



{!! Form::open(['route' => 'users.store', 'method' => 'post']) !!}

    {!! csrf_field() !!}

    <div class="form-group">
         <label for="title">name</label>
            <input type="text" name="name" class="form-control" id="" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for= "email">email</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Enter email">
    </div>
   
    <div class="form-group">
        <label for= "">password</label>
            <!-- <input type="password" name="password" id="password" maxlength="6" placeholder="Enter password"> -->
            {!! Form::password('password', ['class' => 'awesome']) !!}
    </div>
    <div>
    <button type="submit">Create </button>
    </div>

{!! Form::close() !!}
</body>
</html>
