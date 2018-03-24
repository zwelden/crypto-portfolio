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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/portfolios/new', 'PortfolioController@create');
Route::post('/portfolios', 'PortfolioController@store');
Route::get('/portfolios/{portfolio}', 'PortfolioController@show');
Route::post('/portfolios/{portfolio}/remove', 'PortfolioController@delete');

Route::get('/portfolios/{portfolio}/addAsset', 'AssetController@create');
Route::post('/assets', 'AssetController@store');
Route::get('/assets/{asset}', 'AssetController@edit');
Route::post('/assets/{asset}', 'AssetController@update');
Route::post('/portfolios/{portfolio}/assets/{asset}/remove', 'AssetController@delete');

Route::get('/cryptos', 'CryptoController@index');
Route::get('/cryptos/new', 'CryptoController@create');
Route::get('/cryptos/{crypto}/edit', 'CryptoController@edit');
Route::post('/cryptos/{crypto}', 'CryptoController@update');
Route::post('/cryptos', 'CryptoController@store');

Route::get('/js/test.js', function () {
  return response("console.log('hello')", 200)
        ->header('Content-Type', 'text/javascript')
        ->header('Access-Control-Allow-Origin', '*');;
  return 'it works!@!#a@';
});

Auth::routes();
