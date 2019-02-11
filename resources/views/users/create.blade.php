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
    <div class="container">
    <div class="form-group">
         <label for="uname"><b>Username</label>
            <input type="text" name="name" class="form-control" id="" placeholder="Enter name" required>
    </div>
    <div class="form-group">
        <label for= "email"><b>Email</label>
            <input type="text" name="email" class="form-control" id="" placeholder="Enter your email" required>
    </div>
   
    <div class="form-group">
        <label for= "psw"><b>Password</label>
            <input type="password" name="psw" id="password" maxlength="8" placeholder="Enter password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            
    </div>
    <div class="form-group">
        <label for="psw"><b>Confirm Password</b></label>
            <input type="password" id="password_confirmation" maxlength="8" placeholder="Confirm Password" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
             title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    </div>
    <div>
    <button type="submit" class="pure-button pure-button-primary">Confirm</button>
    </div>
   
    </div>

{!! Form::close() !!}
<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

</body>
</html>
