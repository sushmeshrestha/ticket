<?php

namespace App\Http\Controllers;
use App\User;
use App\Permission;
use App\Mail\SendMail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Mail;
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
        $permission=Permission::all();
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

       $attribute=[
        'name'=>$request->name,
     ];

    //   $role= Role::create($attribute);
      $role = Role::create($attribute, $request->except('permission'));
      $permissions = $request->input('permission') ? $request->input('permission') : [];
      $role->givePermissionTo($permissions);

    //   Mail::to($role)->send(new SendMail($role));
        return redirect()->route('roles.index');

      }
      public function show(Request $request,$id )
      {

          $users=User::all();
          $roles=Role::all();
          return view('roles.show',compact('users'));
      }

      public function edit($id)
      {

          $role = Role::findorfail($id);
          $permissions = Permission::all();

          return view('roles.edit', compact('role', 'permissions'));

      }
      public function update(Request $request, $id)
      {
        $attribute=$request->except('permissions');
        $role = Role::findOrFail($id);
        $role->update($attribute);

        if($request->input('permissions')){
            $role->syncPermissions($request->input('permissions'));
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
