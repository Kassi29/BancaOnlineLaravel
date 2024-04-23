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

Route::get('/', function () {
    return view('welcome');
});
// Rutas para PersonaController
Route::get('/personas', 'App\Http\Controllers\PersonaController@index')->name('personas.index');
Route::get('/personas/create', 'App\Http\Controllers\PersonaController@create')->name('personas.create');
Route::post('/personas', 'App\Http\Controllers\PersonaController@store')->name('personas.store');
Route::get('/personas/{id}', 'App\Http\Controllers\PersonaController@show')->name('personas.show');
Route::get('/personas/{id}/edit', 'App\Http\Controllers\PersonaController@edit')->name('personas.edit');
Route::delete('/personas/{id}', 'App\Http\Controllers\PersonaController@destroy')->name('personas.destroy');
Route::put('/personas/{id}', 'App\Http\Controllers\PersonaController@update')->name('personas.update');



// Rutas para CuentaController
Route::get('/cuentas', 'App\Http\Controllers\CuentaController@index')->name('cuentas.index');
Route::get('/cuentas/create', 'App\Http\Controllers\CuentaController@create')->name('cuentas.create');
Route::post('/cuentas', 'App\Http\Controllers\CuentaController@store')->name('cuentas.store');
Route::get('/cuentas/{id}', 'App\Http\Controllers\CuentaController@show')->name('cuentas.show');
Route::get('/cuentas/{id}/edit', 'App\Http\Controllers\CuentaController@edit')->name('cuentas.edit');
Route::delete('/cuentas/{id}', 'App\Http\Controllers\CuentaController@destroy')->name('cuentas.destroy');
Route::put('/cuentas/{id}', 'App\Http\Controllers\CuentaController@update')->name('cuentas.update');



// Rutas para TransaccionController 
Route::get('/transaccions', 'App\Http\Controllers\TransaccionController@index')->name('transaccions.index');
Route::get('/transaccions/create', 'App\Http\Controllers\TransaccionController@create')->name('transaccions.create');
Route::post('/transaccions', 'App\Http\Controllers\TransaccionController@store')->name('transaccions.store');
Route::get('/transaccions/{id}', 'App\Http\Controllers\TransaccionController@show')->name('transaccions.show');
Route::get('/transaccions/{id}/edit', 'App\Http\Controllers\TransaccionController@edit')->name('transaccions.edit');
Route::delete('/transaccions/{id}', 'App\Http\Controllers\TransaccionController@destroy')->name('transaccions.destroy');
Route::put('/transaccions/{id}', 'App\Http\Controllers\TransaccionController@update')->name('transaccions.update');



