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


// Event::listen('illuminate.query', function($sql) {
// 	var_dump($sql);
// });


Route::get('/home', 'CompanyController@index');


Route::get('/neco', ['as' => 'neco', 'uses' => 'CompanyController@get_something']);

Route::resource('users','UserController');

Route::resource('companies', 'CompanyController');

Route::resource('benchmarks', 'BenchmarkController',
	['except' => ['create', 'edit']]);


/*----------  Keywordsplans  ----------*/

Route::group(['prefix' => 'companies/{company}'], function() {

	Route::get('keywordsplans/create', ['as' => 'keywordsplans.create', 'uses' => 'KeywordsPlanController@create' ]);


	Route::get('keywordsplans/{keywordsplan}', ['as' => 'keywordsplans.show', 'uses' => 'KeywordsPlanController@show']);

	Route::get('keywordsplans/{keywordsplan}/keywords/remove', ['as' => 'keywordsplans.keywords.remove', 'uses' => 'KeywordsPlanController@remove_keywords' ]);

	Route::get('keywordsplans/{keywordsplan}/cities/edit', ['as' => 'keywordsplans.cities.edit', 'uses' => 'KeywordsPlanController@edit_cities' ]);

});

Route::get('keywordsplans/{id}/approved', ['as' => 'keywordsplans.approved', 'uses' => 'KeywordsPlanController@approved' ]);

Route::post('keywordsplans/store', ['as' => 'keywordsplans.store', 'uses' => 'KeywordsPlanController@store' ]);

Route::delete('keywordsplans/{keywordsplan}', ['as' => 'keywordsplans.destroy', 'uses' => 'KeywordsPlanController@destroy' ]);

Route::delete('keywordsplans/{keywordsplan}/{keyword}', ['as' => 'keywordsplans.keywords.delete', 'uses' => 'KeywordsPlanController@delete_keyword' ]);

Route::put('keywordsplans/{keywordsplan}/keywords/{keyword}', [ 'as' => 'keywords.update', 'uses' => 'KeywordController@update' ]);

Route::put('keywordsplans/{keywordsplan}/cities/{city}', [ 'as' => 'keywordsplans.cities.update', 'uses' => 'KeywordsPlanController@update_city' ]);



/*----------  charts data  ----------*/
Route::get('callrail/users_companies_data', ['as' => 'callrail.users_companies', 'uses' => 'CallrailController@users_companies']);


/*----------  Keywords  ----------*/
Route::resource('keywords', 'KeywordController',
['except' => ['create', 'edit', 'update', 'destroy']]);


Route::get('companies/{company}/keywordsplans/{keywordsplan}/keywords/create', [ 'as' => 'keywords.create', 'uses' => 'KeywordController@create' ]);

Route::get('companies/{company}/keywordsplans/{keywordsplan}/keywords/edit', [ 'as' => 'keywords.edit', 'uses' => 'KeywordController@edit' ]);


Route::get('companies/{company}/keywordsplans/{keywordsplan}/keywords/edit', ['as' => 'keywordsplans.keywords.edit', 'uses' => 'KeywordsPlanController@edit_keywords' ]);


/*----------  Cities  ----------*/
Route::get('companies/{company}/keywordsplans/{keywordsplan}/cities/create', [ 'as' => 'keywordsplans.cities.add', 'uses' => 'KeywordsPlanController@add_cities' ]);

Route::get('companies/{company}/keywordsplans/{keywordsplan}/cities/remove', [ 'as' => 'keywordsplans.cities.remove', 'uses' => 'KeywordsPlanController@remove_cities' ]);

Route::post('keywordsplans/{keywordsplan}/cities', [ 'as' => 'keywordsplans.cities.store', 'uses' => 'KeywordsPlanController@attach_cities' ]);

Route::delete('cities/{city}/{keywordsplan}', [ 'as' => 'keywordsplans.cities.delete', 'uses' => 'KeywordsPlanController@detach_city' ]);


/*----------  Benchmarks  ----------*/
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
