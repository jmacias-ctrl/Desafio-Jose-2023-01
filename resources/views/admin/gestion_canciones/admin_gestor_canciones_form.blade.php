<div class="container-sm px-5">
    <input type="hidden" name='id_lanzamiento' value="{{ isset($cancion->id_lanzamiento) ? $cancion->id_lanzamiento : $id }}">
    <div class="mb-3">
        <label for="nombre_artista" class="form-label">Titulo de la cancion</label>
        <input type="text" placeholder="Titulo" class="form-control" id='titulo' name='titulo'
            value="{{ isset($cancion->titulo) ? $cancion->titulo : '' }}" required>
    </div>
    <div class="mb-3">
        <label for="num_pista" class="form-label">Numero de Pista</label>
        <input type="number" placeholder="Ej: 1" class="form-control" id='num_pista' name='num_pista'
            value="{{ isset($cancion->num_pista) ? $cancion->num_pista : '' }}" required>
    </div>
    <div class="mb-3">
        <label for="duracion" class="form-label">Duracion (en segundos)</label>
        <div class="input-group">
            <input type="number" placeholder="Ej: 120" class="form-control" id='duracion' name='duracion'
                value="{{ isset($cancion->duracion) ? $cancion->duracion : '' }}" required>
            <span class="input-group-text" id="basic-addon2">Segundo(s)</span>
        </div>
    </div>
</div>
