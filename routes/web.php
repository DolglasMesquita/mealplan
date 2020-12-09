<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/mesa/{mesa?}','App\Http\Controllers\menuController@index')->name('cardapio.index');

Route::get('/cardapio/mesa/{mesa?}', 'App\Http\Controllers\menuController@show')->name('cardapio.show');

Route::get('/busca/mesa/{mesa?}', 'App\Http\Controllers\menuController@busca')->name('cardapio.busca');

Route::get('categoria/{categoria}/mesa/{mesa?}', 'App\Http\Controllers\menuController@category')->name('menu.categoria');

Route::post('pedido', 'App\Http\Controllers\OrderController@store')->name('order.new');

Route::get('/cesta', 'App\Http\Controllers\CestaController@index')->name('cesta.index');

Route::prefix('admin')->name('admin.')->group(function() {

    Route::resource('foods', 'App\Http\Controllers\Admin\FoodController');
    
});