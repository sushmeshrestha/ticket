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


<form method="POST" action="{{route('users.store')}}">

    {!! csrf_field() !!}

    <div class="form-group">
         <label for="title">Username</label>
            <input type="text" name="title" class="form-control" id="" placeholder="Enter your name">
    </div>
    <div class="form-group">
        <label for= "description">Description</label>
            <input type="text" name="description" class="form-control" id="" placeholder="Enter Description">
    </div>
    <div>
    <button type="submit">Create </button>
    </div>

</form>
</body>
</html>
