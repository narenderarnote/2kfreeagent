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

Route::get('/userLogout', 'IndexController@userLogout');
Auth::routes();
Route::get('/', 'IndexController@topplayers');
Route::post('/team-search', 'IndexController@teamSearch')->name('teamsearch');
Route::get('/autoSearch', 'IndexController@profileSearchFiels')->name('autoSearch');
Route::get('/platform/{name}', 'IndexController@plateformBasedSerch')->name('platefome-name');
Route::get('/addmyplayer', 'AddmyplayerController@addmyplayer')->name('addmyplayer');
Route::post('/addmyplayer', 'AddmyplayerController@store')->name('addmyplayer');
Route::get('/editmyplayer', 'EditplayerController@editplayer')->name('editmyplayer');
Route::get('/search-all-player', 'SearchallplayerController@searchallplayer')->name('search-all-player');

Route::get('/settings', function() {return view('user.settings'); });
Route::post('/settings', 'Auth\UpdatePasswordController@update');

Route::get('/forgotpassword', function() {return view('user.forgotpassword'); });
Route::get('/editsingleplayer/{id}', 'EditplayerController@editsingleplayer')->name('editsingleplayer');
Route::get('/editmyplayer/{id}', 'EditplayerController@destroy');
Route::post('/editsingleplayer/{id}', 'EditplayerController@update')->name('editsingleplayer');
Route::post('/update-gametag', 'EditplayerController@updateGametag')->name('update-gametag');
Route::get('/myplayer/{id}', 'MyplayerController@showmyplayer')->name('myplayer');
Route::get('/justadded', 'SearchallplayerController@searchallplayer')->name('justadded');

Route::get('/test-email', 'EmailController@index');
