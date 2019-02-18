<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
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
        $role = Role::all();
        $permission = Permission::all();
        return view('roles.index', compact('role', 'permission'));

    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
       //dd($request->all());

       $password=Hash::make($request->password);
       $attribute=[
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$password,

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

          return view('roles.edit', compact('role'));

      }
      public function update(Request $request, $id)
      {
        if($role = Role::findOrFail($id)) {
            // admin role has everything
            if($role->name === 'Admin') {
                $role->syncPermissions(Permission::all());
                return redirect()->route('roles.index');
            }
            $permissions = $request->get('permissions', []);
            $role->syncPermissions($permissions);
            flash( $role->name . ' permissions has been updated.');
        } else {
            flash()->error( 'Role with id '. $id .' note found.');
        }
        return redirect()->route('roles.index');
    }


      public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect('/roles');
    }

}
