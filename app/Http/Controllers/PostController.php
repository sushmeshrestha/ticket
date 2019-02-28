<?php
 namespace App\Http\Controllers;
 use App\Post;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Hash;
 use Spatie\Permission\Models\Role;
 use App\Permission;


    class postController extends Controller
    {

        public function __construct(){
            $this->middleware('auth');
        }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $posts = post::all();
            return view('posts.index', compact('posts'));
        }


        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            return view('posts.create');
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
        //dd($request->all());

        $password=Hash::make($request->password);
        $attribute=[
            'title'=>$request->title,
            'body'=>$request->body,


        ];
            $post= post::create($attribute);

            return redirect()->route('posts.index');

        }



        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {

            $posts=Post::all();
            return view('posts.index', compact('posts'));
            dd(request()->all());
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $post = post::findorfail($id);
            $roles = Role::pluck('name', 'id');
            $permissions = Permission::all('name', 'id');

            return view('posts.edit', compact('post', 'roles', 'permissions'));

        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {

            $attribute=[
                'title'=>$request->title,
                'body'=>$request->body,
            ];

            $post = post::findorfail($id);


            $post->update($attribute);


            return redirect('/posts');


        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $post = post::find($id);
            $post->delete();
            return redirect('/posts');
        }
    }
