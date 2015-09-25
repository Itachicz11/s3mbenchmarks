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

	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$host = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$database = substr($url["path"], 1);

	return $host . " " . $username . " " . $password . " " . $database;

	return app()->environment();
});

Route::resource('users','UserController');

Route::resource('companies', 'CompanyController');

Route::resource('benchmarks', 'BenchmarkController',
	['except' => ['create', 'edit']]);

Route::resource('keywordsplans', 'KeywordsPlanController',
	['except' => ['create', 'edit']]);


Route::get('benchmarks/{company}/create', [
	'as' => 'benchmarks.create',
	'uses' => 'BenchmarkController@create'
]);

Route::get('keywordsplans/{company}/create', [
	'as' => 'keywordsplans.create',
	'uses' => 'KeywordsPlanController@create'
]);

Route::get('benchmarks/{id}/{company}/edit', [
	'as' => 'benchmarks.edit',
	'uses' => 'BenchmarkController@edit'
]);

Route::post('benchmarks/compare', [
	'as' => 'benchmarks.compare',
	'uses' => 'BenchmarkController@compare'
]);


Route::get('keywordsplans/{id}/{company}/edit', [
	'as' => 'keywordsplans.edit',
	'uses' => 'KeywordsPlanController@edit'
]);

Route::get('keywordsplans/{id}/approved', [
	'as' => 'keywordsplans.approved',
	'uses' => 'KeywordsPlanController@approved'
]);



Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController'
]);
