@extends('usuario.usuario_header')

@section('content')
    <div class="container-sm d-flex flex-column border rounded">
        <div class="align-self-center">
            <h4 class="my-4 ">Bienvenidos a MusicWorld</h4>
        </div>
        <hr>
        <div class="align-self-center">
            <h4>Lanzamientos Destacados</h4>
        </div>
        <div class="contain">
            <div class="row justify-content-center align-items-center g-2">
                @foreach ($lanzamientos as $lanzamiento)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage') . '/' . $lanzamiento->caratula }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $lanzamiento->nombre_lanzamiento }}</h5>
                            <p class="card-text">{{ $lanzamiento->nombre_artista }}</p>
                            <p class="card-text">{{ $lanzamiento->tipo }}</p>
                            <a href="#" class="btn btn-primary">Ir al lanzamiento</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <hr>
        <div class="align-self-center">
            <h4>Artistas Destacados</h4>
        </div>
        <div class="contain">
            <div class="row justify-content-center align-items-center g-2">
                @foreach ($artistas as $artista)
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage') . '/' . $artista->imagen_artista }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $artista->nombre_artista }}</h5>
                            <p class="card-text">{{ $artista->descripcion_artista }}</p>
                            <a href="#" class="btn btn-primary">Ir al artista</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@extends('usuario.usuario_footer')
