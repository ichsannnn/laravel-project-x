<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('auth/register', function() {
	return redirect(url('home'));
});
Route::get('logout', function() {
	return redirect(url('auth/logout'));
});
Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('user/mail', function() {
	return view('administrator.email');
});

Route::get('/images/{filename}', function($filename) {
  $path = storage_path() . '/' . $filename;
  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});

Route::get('/images/head/{filename}', function($filename) {
  $path = storage_path() . '/head/' . $filename;
  $file = File::get($path);
  $type = File::mimeType($path);

  $response = Response::make($file, 200);
  $response->header("Content-Type", $type);

  return $response;
});

Route::get('client/project', 'ClientController@viewProject');
Route::get('client/user', 'ClientController@viewUser');
Route::get('client/about', 'ClientController@viewAbout');
Route::get('client/searchProject', 'ClientController@searchProject');
Route::get('client/searchUser', 'ClientController@searchUser');
Route::get('client/addproject', 'ClientController@create');
Route::post('client/saveproject', 'ClientController@store');
Route::get('client/success', function() {
	return view('client.success');
});

Route::get('user', 'UserController@index');
Route::get('user/add', 'UserController@create');
Route::post('user/save', 'UserController@store');
Route::get('user/profile/{id}', 'UserController@show');
Route::get('user/{id}', 'UserController@showOther');
Route::post('user/update/{id}', 'UserController@update');
Route::post('user/updateother/{id}', 'UserController@updateOther');
Route::post('user/password/{id}', 'UserController@password');
Route::get('user/edit/{id}', 'UserController@edit');
Route::get('user/deleteuser/{id}', 'UserController@deleteUser');
Route::get('user/delete/{id}', 'UserController@destroy');
Route::get('user/active', function() {
	\DB::update('update users set activated = "Y"');
	return redirect(url('user'));
});

Route::get('project', 'ProjectController@index');
Route::get('project/show', 'ProjectController@all');
Route::get('project/add', 'ProjectController@create');
Route::post('project/save', 'ProjectController@store');
Route::get('project/edit/{id}', 'ProjectController@edit');
Route::post('project/update/{id}', 'ProjectController@update');
Route::get('project/delete/{id}', 'ProjectController@destroy');
Route::post('project/update/{id}', 'ProjectController@update');
