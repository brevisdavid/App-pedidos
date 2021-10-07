<?php

use Illuminate\Support\Facades\Route;
//use  App\Http\Controllers\TestController;
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

//Route::get('/',[TestController::class,'welcome']);
Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','admin'])->prefix('admin')->group(function () {
    Route::get('/products', 'ProductController@index');//listar
    Route::get('/products/create', 'ProductController@create');//formulario
    Route::post('/products', 'ProductController@store');//registrar
    Route::get('/products/{id}/edit', 'ProductController@edit');//editar los registros
    Route::post('/products/{id}/edit', 'ProductController@update');//actualizar
    Route::post('/products/{id}/delete', 'ProductController@destroy');//eliminar form  
    Route::get('/products/{id}/images', 'ImageController@index');//registrar imagenes
    Route::post('/products/{id}/images', 'ImageController@store');//formulario
    Route::delete('/products/{id}/images', 'ImageController@destroy');//Eliminar imagenes
    Route::get('/products/{id}/images/select/{image}', 'ImageController@select');//Eliminar imagenes


});

/*  Route::get('/admin/products', 'ProductController@index');//listar 
 Route::get('/admin/products/create', 'ProductController@create');//formulario
 Route::post('/admin/products', 'ProductController@store');//registrar
 Route::get('/admin/products/{id}/edit', 'ProductController@edit');//editar los registros
 Route::post('/admin/products/{id}/edit', 'ProductController@update');//actualizar
 Route::post('/admin/products/{id}/delete', 'ProductController@destroy');//eliminar form  
 Route::get('/admin/products/{id}/images', 'ImageController@index');//registrar imagenes
 Route::post('/admin/products/{id}/images', 'ImageController@store');//formulario
 Route::delete('/admin/products/{id}/images', 'ImageController@destroy');//Eliminar imagenes
  
 */