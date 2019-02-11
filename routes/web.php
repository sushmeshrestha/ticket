<?php
use App\Notifications\UserMail;

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

Route::get('/', function ()  {
    $user = App\User::first();
    $user->notify(new UserMail);
    
    return view('welcome');
});

Auth::routes();
Route::resource('users', 'UserController');
Route::get('/home', 'HomeController@index')->name('home');
