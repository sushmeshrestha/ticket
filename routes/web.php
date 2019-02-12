<?php
use App\Notifications\UserMail;
use App\Mail\SendMail;



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
    $user = App\User::first();
    $user->notify(new UserMail);
    return view('welcome');
})->middleware('verified');

Auth::routes(['verify'=> true]);
Route::resource('users', 'UserController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/email', 'HomeController@email')->name('sendEmail');
