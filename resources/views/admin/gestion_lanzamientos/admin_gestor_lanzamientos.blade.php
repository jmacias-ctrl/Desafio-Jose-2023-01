@extends('admin.admin_header')

@section('content')
    <div class="container-sm d-flex flex-column border rounded shadow">
        <div class="align-self-center">
            <h4 class="my-4 ">Listado de Lanzamientos Musicales</h4>
        </div>

        <div class="table-responsive caption-top">
            <div class="d-flex">
                <label for="search" class="form-label fs-4 me-3">Buscar</label>
                <input class="form-control me-2" id="inputFilter" type="search" placeholder="Filtrar.." aria-label="Search">
                <a id="crearButton" class="btn btn-primary" href="{{ url('admin/gestion_lanzamientos/create') }}"
                    role="button">Crear nuevo lanzamiento</a>
            </div>
            <table class="table" id="infoGestion">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha Lanzamiento</th>
                        <th scope="col">Duracion</th>
                        <th scope="col">Cantidad Canciones</th>
                        <th scope="col">Caratula</th>
                        <th scope="col">Tipo</th>
                        <th scope="col mx-auto">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lanzamientos as $lanzamiento)
                        <tr>
                            <td>{{ $lanzamiento->id }}</td>
                            <td>{{ $lanzamiento->nombre_lanzamiento }}</td>
                            <td>{{ $lanzamiento->fecha_lanzamiento }}</td>
                            <td>{{ $lanzamiento->duracion }}</td>
                            <td>{{ $lanzamiento->cantidad_canciones }}</td>
                            <td><img src="{{ asset('storage') . '/' . $lanzamiento->caratula }}" alt="none"
                                    style="width: 50px"></td>
                            <td>{{ $lanzamiento->tipo }}</td>
                            <td>
                                <div class="btn-group dropend">
                                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Acciones</button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/gestion_canciones/byRelease/' . $lanzamiento->id) }}">Gestionar
                                                Canciones</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ url('admin/gestion_lanzamientos/' . $lanzamiento->id . '/edit') }}">Editar
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ url('admin/gestion_lanzamientos/' . $lanzamiento->id) }}"
                                                method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <div class="d-flex">
                                                    <button type="submit" class="btn btn-light">Eliminar</button>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#inputFilter").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#infoGestion tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
