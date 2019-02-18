<!DOCTYPE html>
<body>
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
                        <form method="POST" action="{{route('roles.update', $role->id)}}">
                             {{ method_field("PATCH") }}
                                 @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">UserName
                                    </label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value ="{{$role->name}}">
                                </div>
                                <div class="form-group">
                                    <label for= "email">Email</label>
                                    <input type="text" name="email" class="form-control"  placeholder="Enter your email"  value="{{ $role->email }}">
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
</body>
</html>
