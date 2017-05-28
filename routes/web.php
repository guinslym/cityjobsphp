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

//TemplateView
Route::get('/about', 'EmploiController@aboutPage')->name('about');

//Statistics (JSON)
Route::get('/statistics', 'EmploiController@showStatistics')->name('stats');

//Detail View (get)
Route::get('emploi/show/{id}', 'EmploiController@show')->where('id', '[0-9]+')->name('detail');

//Search View (get)
Route::get('search/{searchkey}', 'EmploiController@search')->where('searchkey', '[A-Za-z]+')->name('search');
