<!DOCTYPE html>
<body>
        <section class="content-header">
            <h1>
                Update Page
                <small>Preview</small>
            </h1>
        </section>
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Project</h3>
                        </div>
                        <form method="POST" action="{{route('users.update', $users->id)}}">
                             {{ method_field("PATCH") }}
                                 @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">UserName
                                    </label>
                                    <input type="text" name="UserName" class="form-control" placeholder="Enter Name" value ="{{$user->Username}}">
                                </div>
                                <div class="form-group">
                                    <label for= "Description">Description</label>
                                    <input type="text" name="Description" class="form-control"  placeholder="Enter Description" value="{{ $user->Description }}">
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