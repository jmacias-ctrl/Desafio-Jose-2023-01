<?php

use Illuminate\Support\Facades\Route;
use App\Models\Lanzamientos;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\CancionesController;
use App\Http\Controllers\LanzamientosController;
use App\Models\Canciones;
use Illuminate\Support\Facades\DB;

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



Route::get('/admin/index', function () {
    return view('admin.admin_index');
});

Route::get('/admin/gestion_canciones/byRelease/{id}', function ($id) {
    $lanzamiento = Lanzamientos::findOrFail($id);
    $canciones = DB::table('canciones')->where('id_lanzamiento', '=', $id)->get();
    return view('admin.gestion_canciones.admin_gestor_canciones', compact('lanzamiento'))->with(compact('canciones'));
});

Route::get('/admin/gestion_canciones/create/{id}', function($id){
    return view('admin.gestion_canciones.admin_gestor_canciones_create')->with('id',$id);
});

Route::resource('admin/gestion_generos', GenerosController::class);

Route::resource('admin/gestion_artistas', ArtistasController::class);

Route::resource('admin/gestion_lanzamientos', LanzamientosController::class);

Route::resource('admin/gestion_canciones', CancionesController::class);