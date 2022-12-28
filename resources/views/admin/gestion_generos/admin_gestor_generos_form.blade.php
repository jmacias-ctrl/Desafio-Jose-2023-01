<div class="container-sm px-5">
    <div class="mb-3">
        <label for="nombre_genero" class="form-label">Nombre del Genero</label>
        <input type="text" placeholder="Genero" class="form-control" id='nombre_genero' name='nombre_genero' value='{{$genero->nombre_genero}}' required>
    </div>
    <div class="my-3">
        <label for="descripcion_genero" class="form-label">Descripcion del Genero</label>
        <textarea class="form-control" id='descripcion_genero' placeholder="Descripcion" name='descripcion_genero' required>{{$genero->descripcion_genero}} </textarea>
    </div>
    <hr>
</div>