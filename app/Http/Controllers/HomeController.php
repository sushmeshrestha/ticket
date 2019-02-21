<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;




class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::role('asmi shrestha')->get();
        // $role=Role::create(['name'=>'asme shrestha']);
        //  $permission = Permission::create(['name'=>'allow post']);
        //  $role= Role::findById(1);
        //  $permission=Permission::findById(1);
        //  $role->givePermissionTo($permission);
        // Role::create(['name'=>'write  writer']);
        auth()->$user->givePermissionTo('allow post');
        // return auth()->user()->getAllPermissions;

            return view('home');
    }

    public function email()
    {

    }
}
