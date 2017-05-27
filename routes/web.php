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
Route::get('/', 'EmploiController@homepage')->name('home');

//TemplateView
Route::get('/about', 'EmploiController@showAbout')->name('about');

//Statistics (JSON)
Route::get('/statistics', 'EmploiController@showStatistics')->name('stats');

//Detail View (get)
Route::get('/{id}', 'EmploiController@showStatistics')->where('id', '[0-9]+');

//Search View (get)
Route::get('/{searchkey}', 'EmploiController@showStatistics')->where('searchkey', '[A-Za-z]+');
