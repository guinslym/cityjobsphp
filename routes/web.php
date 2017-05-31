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

/*
Route::get('/', function () {
    return view('welcome');
});


Route::resource('notebook', 'NotebookController');

*/

Route::group(['middleware' => ['web']], function () {



	// Patterns
	Route::pattern('id', '\d+');
	Route::pattern('hash', '[a-z0-9]+');
	Route::pattern('hex', '[a-f0-9]+');
	Route::pattern('uuid', '[0-9a-f]{8}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{4}-[0-9a-f]{12}');
	Route::pattern('base', '[a-zA-Z0-9]+');
	Route::pattern('slug', '[a-z0-9-]+');
	Route::pattern('username', '[a-z0-9_-]{3,16}');
	// make more of your own to suit your needs: email, password, etc.

	//homeListView
	Route::get('/{ordering?}', 'EmploiController@index')->name('home');
	Route::get('/emploi/{ordering?}', 'EmploiController@index')->name('home');

	//Detail View (get)
	Route::get('emploi/show/{id}', 'EmploiController@show')->where('id', '[0-9]+')->name('detail');

	//TemplateView
	Route::get('/about', 'EmploiController@aboutPage')->name('about');

	//Downloading a JSON file view 
	Route::get('download', 'EmploiController@download')->name('download');



	//Statistics (JSON)
	Route::get('/statistics', 'EmploiController@showStatistics')->name('stats');
	Route::get('/statistics/{annee}/{mois}/{jour}', 'EmploiController@showStatisticsJSON')->name('statsJSON')->where('annee', '^(19|20)\d{2}$')->where('mois', '^(19|20)\d{2}$')->where('jour', '^(19|20)\d{2}$');

	//Search View (get)
	Route::get('search/{searchkey}', 'EmploiController@search')->where('searchkey', '[A-Za-z]+')->name('search');


    
});