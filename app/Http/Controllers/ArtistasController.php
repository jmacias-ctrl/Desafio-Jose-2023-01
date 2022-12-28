<?php

namespace App\Http\Controllers;

use App\Models\Artistas;
use Illuminate\Http\Request;

class ArtistasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['artistas'] = Artistas::paginate(5);
        return view('admin.gestion_artistas.admin_gestor_artistas', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gestion_artistas.admin_gestor_artistas_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosArtista = request()->except(['_token', 'crearArtista']);

        if($request->hasFile('imagen_artista')){
            $datosArtista['imagen_artista']=$request->file('imagen_artista')->store('uploads', 'public');
        }

        Artistas::insert($datosArtista);

        return redirect('admin/gestion_generos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function show(Artistas $artistas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artista=Artistas::findOrFail($id);
        return view('admin.gestion_artistas.admin_gestor_artistas_edit', compact('artista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosArtista = request()->except(['_token','editarArtistas','_method']);
        Artistas::where('id','=',$id)->update($datosArtista);
        return redirect('admin/gestion_artistas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artistas  $artistas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Artistas::destroy($id);
        return redirect('admin/gestion_artistas');
    }
}
