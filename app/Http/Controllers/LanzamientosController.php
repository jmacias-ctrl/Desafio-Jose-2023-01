<?php

namespace App\Http\Controllers;

use App\Models\Lanzamientos;
use Illuminate\Http\Request;

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
        return view('admin.gestion_lanzamientos.admin_gestor_lanzamientos_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Lanzamientos $lanzamientos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lanzamientos  $lanzamientos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lanzamientos $lanzamientos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lanzamientos  $lanzamientos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lanzamientos $lanzamientos)
    {
        //
    }
}
