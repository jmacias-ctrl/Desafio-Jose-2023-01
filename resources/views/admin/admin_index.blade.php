@extends('admin.admin_header')

@section('content')
<div class="container-sm d-flex flex-column border rounded">
    <div class="align-self-center">
        <h4 class="my-4 ">Listado de Generos Musicales</h4>
    </div>
    <div class="table-responsive caption-top">
        <table class="table" id="infoGestion">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Estado</th>
                    <th scope="col mx-auto">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

</div>
@endsection