<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\CancionesController;
use App\Http\Controllers\LanzamientosController;
use App\Models\Canciones;
use App\Models\Artistas;
use App\Models\Realiza;
use Illuminate\Support\Facades\DB;
use App\Models\Lanzamientos;
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
    return redirect('inicio');
});

Route::get('/inicio', function () {
    $lanzamientos = DB::table('lanzamientos')->join('realizas', 'lanzamientos.id','=','realizas.id_lanzamiento')->join('artistas','realizas.id_artista','=','artistas.id')->where('fecha_lanzamiento', '>=', '01-01-2022')->orderBy('lanzamientos.reproducciones', 'DESC')->limit(5)->get(
        array(
            'nombre_lanzamiento',
            'nombre_artista',
            'caratula',
            'tipo'
        )
    );
    $artistas = DB::table('artistas')->orderBy('reproducciones','DESC')->limit(5)->get();
    return view('usuario.inicio')->with(compact('lanzamientos'))->with(compact('artistas'));
});

Route::get('/login', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route::get('/home', function () {
//   return view('admin.admin_index');
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/index', function () {
        return view('admin.admin_index');
    });
    Route::get('/admin/gestion_canciones/byRelease/{id}', function ($id) {
        $lanzamiento = Lanzamientos::findOrFail($id);
        $canciones = DB::table('canciones')->where('id_lanzamiento', '=', $id)->get();
        return view('admin.gestion_canciones.admin_gestor_canciones', compact('lanzamiento'))->with(compact('canciones'));
    });

    Route::get('/admin/gestion_canciones/create/{id}', function ($id) {
        return view('admin.gestion_canciones.admin_gestor_canciones_create')->with('id', $id);
    });

    Route::resource('admin/gestion_generos', GenerosController::class);

    Route::resource('admin/gestion_artistas', ArtistasController::class);

    Route::resource('admin/gestion_lanzamientos', LanzamientosController::class);

    Route::resource('admin/gestion_canciones', CancionesController::class);
});
