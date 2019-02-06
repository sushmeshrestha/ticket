<!DOCTYPE html>
<body>
<div class="row">
            <h1>
                List of Users
            </h1>
    
    <div>
            <a href="{{ route('users.create')}}" class="btn btn-primary pull-left" >Create User</a>
    </div>
</div>

        <table>
            <thead>
                <tr role="row">
                    <th>Sn.</th>
                    <th>UserName</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $key => $user)
                <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $user->UserName }}</td>
                <td>{{ $user->Description}}</td>
                
                </tr>
                        @endforeach
            </tbody>
        </table>
</body>
</html>