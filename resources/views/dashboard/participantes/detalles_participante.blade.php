<div class="card card-primary card-outline">
    <div class="card-body">
        {{--<h5 class="card-title text-bold mb-3">Detalles de la Inscripción</h5>--}}

        <div class="form-group">
            <label>Modalidad a participar:</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Modalidad
                                </span>
                </div>
                <span class="form-control">{{ $modalidad }}</span>
            </div>
        </div>

        @if($categorias)
            <div class="form-group">
                <label>Categoria a participar:</label>
                @foreach($categorias as $categoria)
                    @if(leerJson($categoriasAtleta, $categoria->id))
                        <div class="input-group">
                            <label class="form-control text-xs"><small>{{ $categoria->nombre }}</small></label>
                        </div>
                    @endif
                @endforeach
            </div>
        @endif



    </div>
</div><!-- /.card -->
