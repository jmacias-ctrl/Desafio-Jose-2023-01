<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ArtistasController;
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
    return view('login');
});

Route::get('/admin', function () {
    return view('admin.admin_index');
});




Route::resource('admin/gestion_generos', GenerosController::class);

Route::resource('admin/gestion_artistas', ArtistasController::class);