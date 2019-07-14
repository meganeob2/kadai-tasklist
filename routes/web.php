<?php

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

Route::get('/', 'TasksController@index');
Route::resource('tasks', 'TasksController');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
});
/* index: showの補助ページ
Route::get('messages', 'MessagesController@index')->name('messages.index');
// create: 新規作成用のフォームページ
Route::get('messages/create', 'MessagesController@create')->name('messages.create');
// edit: 更新用のフォームページ
Route::get('messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');
*/

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

/*
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
*/


/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks/{id}', 'TasksController@show');
Route::post('tasks', 'TasksController@store');
Route::put('tasks/{id}', 'TasksController@update');
Route::delete('tasks/{id}', 'TasksController@destroy');
Route::get('tasks', 'TasksController@index')->name('tasks.index');
Route::get('tasks/create', 'TasksController@create')->name('tasks.create');
Route::get('tasks/{id}/edit', 'TasksController@edit')->name('tasks.edit');
*/
