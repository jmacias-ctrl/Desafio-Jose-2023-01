<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use App\Models\Lanzamientos;
use App\Models\Realiza;
use App\Models\Generos;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LanzamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['lanzamientos'] = Lanzamientos::paginate(10);
        return view('admin.gestion_lanzamientos.admin_gestor_lanzamientos', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datos['generos'] = Generos::paginate(5);
        $datos2['artistas'] = Artistas::paginate(2);
        return view('admin.gestion_lanzamientos.admin_gestor_lanzamientos_create',$datos,$datos2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosLanzamiento = request()->except(['_token', 'crearLanzamiento']);

        if ($request->hasFile('caratula')) {
            $datosLanzamiento['caratula'] = $request->file('caratula')->store('uploads', 'public');
        }
        $lanzamiento = new Lanzamientos();
        $lanzamiento->nombre_lanzamiento= $datosLanzamiento['nombre_lanzamiento'];
        $lanzamiento->id_genero= $datosLanzamiento['id_genero'];
        $lanzamiento->fecha_lanzamiento= $datosLanzamiento['fecha_lanzamiento'];
        $lanzamiento->descripcion_lanzamiento= $datosLanzamiento['descripcion_lanzamiento'];
        $lanzamiento->duracion = 0;
        $lanzamiento->cantidad_canciones = 0;
        $lanzamiento->reproducciones = 0;
        $lanzamiento->caratula = $datosLanzamiento['caratula'];
        $lanzamiento->tipo = $datosLanzamiento['tipo'];
        $lanzamiento->save();

        $id_lanzamiento = $lanzamiento->id;

        $realiza = new Realiza();
        $realiza->id_artista= $datosLanzamiento['id_artista'];
        $realiza->id_lanzamiento = $id_lanzamiento;
        $realiza->save();
        
        return redirect('admin/gestion_lanzamientos')->with('mensaje','Lanzamiento creado exitosamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lanzamientos  $lanzamientos
     * @return \Illuminate\Http\Response
     */
    public function show(Lanzamientos $lanzamientos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lanzamientos  $lanzamientos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lanzamiento = Lanzamientos::findOrFail($id);
        $query = DB::table('realizas')->where('id_lanzamiento','=',$id)->first();
        $getIdartista = $query->id_artista;

        $datos['generos'] = Generos::paginate(5);
        $datos2['artistas'] = Artistas::paginate(2);
        return view('admin.gestion_lanzamientos.admin_gestor_lanzamientos_edit', compact('lanzamiento'), $datos)->with($datos2)->with($getIdartista);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lanzamientos  $lanzamientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosLanzamiento = request()->except(['_token', 'editarlanzamiento', '_method']);
        $lanzamiento = Lanzamientos::findOrFail($id);
        
        if ($request->hasFile('caratula')) {
            Storage::delete('public/' . $lanzamiento->caratula);

            $datosLanzamiento['caratula'] = $request->file('caratula')->store('uploads', 'public');
        }
        $lanzamiento->nombre_lanzamiento= $datosLanzamiento['nombre_lanzamiento'];
        $lanzamiento->id_genero= $datosLanzamiento['id_genero'];
        $lanzamiento->fecha_lanzamiento= $datosLanzamiento['fecha_lanzamiento'];
        $lanzamiento->descripcion_lanzamiento= $datosLanzamiento['descripcion_lanzamiento'];
        if(isset($datosLanzamiento['caratula'])){
            $lanzamiento->caratula = $datosLanzamiento['caratula'];
        }
        $lanzamiento->tipo = $datosLanzamiento['tipo'];
        $lanzamiento->save();

        DB::table('realizas')->where('id_lanzamiento','=',$id)->updateOrInsert(['id_artista'=> $datosLanzamiento['id_artista']]);

        return redirect('admin/gestion_lanzamientos')->with('mensaje','Lanzamiento modificado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lanzamientos  $lanzamientos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lanzamiento = Lanzamientos::findOrFail($id);
        if( Storage::delete('public/' . $lanzamiento->caratula)){
            Lanzamientos::destroy($id);
        }
        
        return redirect('admin/gestion_lanzamientos')->with('mensaje','Lanzamiento eliminado exitosamente');
    }
}
