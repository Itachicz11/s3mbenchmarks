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


Route::get('/home', 'CompanyController@index');

Route::get('/', function() {

	return redirect('/auth/login');
});


Route::resource('users','UserController');

Route::resource('companies', 'CompanyController');

Route::resource('benchmarks', 'BenchmarkController',
	['except' => ['create', 'edit']]);


/*----------  Keywordsplans  ----------*/
Route::resource('keywordsplans', 'KeywordsPlanController',
	['except' => ['create', 'edit']]);

Route::get('keywordsplans/{company}/create', [
	'as' => 'keywordsplans.create',
	'uses' => 'KeywordsPlanController@create'
]);

Route::get('keywordsplans/{keywordsplan}/edit', [
	'as' => 'keywordsplans.edit',
	'uses' => 'KeywordsPlanController@edit'
]);

Route::get('keywordsplans/{id}/approved', [
	'as' => 'keywordsplans.approved',
	'uses' => 'KeywordsPlanController@approved'
]);


/*----------  Keywords  ----------*/
Route::resource('keywords', 'KeywordController',
['except' => ['create', 'edit']]);

Route::get('keywords/{company}/{keywordsplan}/create', [
	'as' => 'keywords.create',
	'uses' => 'KeywordController@create'
]);

Route::get('keywords/{keywordsplan}/{keyword}/edit', [
	'as' => 'keywords.edit',
	'uses' => 'KeywordController@edit'
]);


Route::get('benchmarks/{company}/create', [
	'as' => 'benchmarks.create',
	'uses' => 'BenchmarkController@create'
]);

Route::get('benchmarks/{id}/{company}/edit', [
	'as' => 'benchmarks.edit',
	'uses' => 'BenchmarkController@edit'
]);

Route::post('benchmarks/compare', [
	'as' => 'benchmarks.compare',
	'uses' => 'BenchmarkController@compare'
]);



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');
