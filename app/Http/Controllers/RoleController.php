<?php

namespace App\Http\Controllers;

use App\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;



class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles', 'permission'));

    }

    public function create()
    {
        $permissions = Permission::all();
        return view('roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
       //dd($request->all());

       $password=Hash::make($request->password);
       $attribute=[
        'name'=>$request->name,


     ];

      $role= Role::create($attribute);
        return redirect()->route('roles.index');

      }
      public function show($id)
      {

          return view('roles.index');
      }

      public function edit($id)
      {
          $role = Role::findorfail($id);
          $permissions = Permission::all();

          return view('roles.edit', compact('role', 'permissions'));

      }
      public function update(Request $request, $id)
      {
        $password=Hash::make($request->password);
        $attribute=[
            'name'=>$request->name, ''.$id,
        ];
        $role = Role::findOrFail($id);
        $role->update($attribute);

        return redirect()->route('roles.index');
    }


      public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/roles');
    }

}
