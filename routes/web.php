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
    $user = App\User::find(2);
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
Route::resource('tickets','TicketController');
Route::get('new_ticket', 'TicketController@create');
Route::post('new_ticket', 'TicketController@store');
Route::get('my_tickets', 'TicketController@userTickets');
Route::get('tickets/{ticket_id}', 'TicketController@show');
Route::post('comment', 'CommentController@postComment');
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function (){
Route::post('tickets', 'TicketController@index');
Route::post('close_ticket/{ticket_id}', 'TicketController@close');
});



