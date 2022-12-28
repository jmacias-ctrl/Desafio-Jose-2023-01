<div class="container-sm px-5">
    <div class="mb-3">
        <label for="nombre_artista" class="form-label">Nombre del Artista</label>
        <input type="text" placeholder="Nombre Artista" class="form-control" id='nombre_artista'
            name='nombre_artista' value="{{$artista->nombre_artista}}" required>
    </div>
    <div class="mb-3">
        <label for="nombre_genero" class="form-label">Fecha de Inicio (o de nacimiento si es solista)</label>
        <input type="date" placeholder="Genero" class="form-control" id='fecha' name='fecha' value="{{$artista->fecha}}"
            required>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Imagen del Artista</label>
        {{$artista->imagen_artista}}<input class="form-control" type="file" id="formFile" name="imagen_artista">
    </div>
    <div class="my-3">
        <label for="descripcion_genero" class="form-label">Descripcion del Artista</label>
        <textarea class="form-control" id='descripcion_genero' placeholder="Descripcion" name='descripcion_artista' required>{{$artista->descripcion_artista}}</textarea>
    </div>
</div>