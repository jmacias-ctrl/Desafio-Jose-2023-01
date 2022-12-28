@extends('admin.admin_header')

@section('content')
    <div class="container-sm border rounded shadow">
        <div class="align-self-center">
            <p class="my-4 p text-center fw-bold fs-3">Crear un nuevo genero</p>
        </div>
        <form action="{{url('admin/gestion_generos')}}" method="POST">
            @csrf
            <div class="container-sm px-5">
                <div class="mb-3">
                    <label for="nombre_genero" class="form-label">Nombre del Genero</label>
                    <input type="text" placeholder="Genero" class="form-control" id='nombre_genero' name='nombre_genero' required>
                </div>
                <div class="my-3">
                    <label for="descripcion_genero" class="form-label">Descripcion del Genero</label>
                    <textarea class="form-control" id='descripcion_genero' placeholder="Descripcion" name='descripcion_genero' required></textarea>
                </div>
                <hr>
            </div>
            <div class="d-grid gap-2 my-4">
                <input name="crearGenero" id="submit" class="btn btn-primary" type="submit" value="Crear Genero">
            </div>
        </form>
    </div>
@endsection
