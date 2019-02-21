@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="row">
        <div class="col-sm-10">
            <div class="row">
                    <div class="col-sm-2"></div>
                        <h1>
                            Posts Lists
                        </h1>
                    </div>
            </div>
            <div class="col-md-2 text-center">
                <a href="{{ route('posts.create')}}" button id="singlebutton" name="singlebutton" class="btn btn-primary center-block" >Create Post</a>
            </div>
        </div>
</section>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-8"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="data-table" class="table table-bordered table-hover dataTable" role="grid"
                                    aria-describedby="example2_info">

                                    <thead>
                                        <tr role="row">
                                            <th>Title</th>
                                            <th>Body</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $key => $post)
                                        <tr>
                                        <td>{{ $post->Title }}</td>
                                        <td>{{ $post->Body}}</td>

                                        <td>
                                        <a class="btn btn-primary" href="{{ route('posts.edit', $post->id) }}" method="PUT"><b>Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id)}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="submit" value="Delete" onclick="return confirm('Are you sure')" class="btn btn-danger"/>
                                            </form>

                                        </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
