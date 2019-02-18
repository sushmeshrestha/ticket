<?php
use App\Notifications\UserMail;
use App\Mail\SendMail;
use Illuminate\Support\Facades\View;

if (View::exists('roles.index')) {
    //
}


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $user = App\User::find(4);
    $user->notify(new UserMail);

    return view('welcome');
});

Auth::routes();
Route::resource('users', 'UserController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email', 'HomeController@email')->name('sendEmail');
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('roles', 'RoleController');
Route::resource('posts', 'PostController');
Route::resource('permissions','PermissionController');

