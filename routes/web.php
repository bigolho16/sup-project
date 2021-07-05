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

// Route::get('/', function () { return view("welcome"); });

// Pagina principal:
Route::get('supermercado-x', 'App\Http\Controllers\Home\HomeController@index');
// Pagina principal.

// Users and Admin:
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Users and Admin.

// templates:
Route::resource('templates/categorias', App\Http\Controllers\Templates\CategoryController::class);
// templates.