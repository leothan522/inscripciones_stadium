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

<h5 class="col-md-12 text-bold">ID: {{ cerosIzquierda($participante_id, 5) }}</h5>
@if($estatusPago == 0)
    <div class="alert alert-warning">
        <i class="icon fas fa-exclamation-triangle"></i> Esperando la confirmacion del Pago.
    </div>
@else
    @if($estatusPago == 1)
        <div class="alert alert-success">
            <i class="icon fas fa-check"></i> Pago Validado.
        </div>
    @else
        <div class="alert alert-danger">
            <i class="icon fas fa-ban"></i> Pago NO Verificado.
        </div>
    @endif
@endif
