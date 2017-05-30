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



//homeListView
Route::get('/', 'EmploiController@index')->name('home');
Route::get('/emploi', 'EmploiController@index')->name('home');

//Detail View (get)
Route::get('emploi/show/{id}', 'EmploiController@show')->where('id', '[0-9]+')->name('detail');

//TemplateView
Route::get('/about', 'EmploiController@aboutPage')->name('about');

//Downloading a JSON file view 
Route::get('download', 'EmploiController@download')->name('download');



//Statistics (JSON)
Route::get('/statistics', 'EmploiController@showStatistics')->name('stats');
Route::get('/statistics/{annee}/{mois}/{jour}', 'EmploiController@showStatisticsJSON')->name('statsJSON');

//Search View (get)
Route::get('search/{searchkey}', 'EmploiController@search')->where('searchkey', '[A-Za-z]+')->name('search');
