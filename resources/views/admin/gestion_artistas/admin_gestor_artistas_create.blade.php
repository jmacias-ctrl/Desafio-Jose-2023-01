@extends('admin.admin_header')

@section('content')
    <div class="container-sm border rounded shadow my-5">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Crear un nuevo artista</p>
        </div>
        <form action="{{ url('admin/gestion_artistas') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container-sm px-5">
                <div class="mb-3">
                    <label for="nombre_artista" class="form-label">Nombre del Artista</label>
                    <input type="text" placeholder="Nombre Artista" class="form-control" id='nombre_artista'
                        name='nombre_artista' required>
                </div>
                <div class="mb-3">
                    <label for="nombre_genero" class="form-label">Fecha de Inicio (o de nacimiento si es solista)</label>
                    <input type="date" placeholder="Genero" class="form-control" id='fecha' name='fecha'
                        required>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Imagen del Artista</label>
                    <input class="form-control" type="file" id="formFile" name="imagen_artista">
                </div>
                <div class="my-3">
                    <label for="descripcion_genero" class="form-label">Descripcion del Artista</label>
                    <textarea class="form-control" id='descripcion_genero' placeholder="Descripcion" name='descripcion_artista' required></textarea>
                </div>
            </div>
            <hr>
            <div class="d-grid gap-2 my-4">
                <input id="submit" name="crearArtista" class="btn btn-primary" type="submit" value="Crear Artista">
            </div>
        </form>
    </div>
@endsection
