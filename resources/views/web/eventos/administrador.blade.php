<div class="row justify-content-center">

    <div class="col-md-12">

        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Eventos a los que te has inscrito</h3>
                {{--<div class="card-tools">
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-download"></i>
                    </a>
                    <a href="#" class="btn btn-tool btn-sm">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>--}}
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Evento</th>
                        <th>Lugar</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>

                    @if($administradorEventos)
                        @foreach($administradorEventos as $participante)

                            <tr>
                                <td class="text-xs">
                                    <small class="text-bold">{{ cerosIzquierda($participante->id, 5) }}</small>
                                </td>
                                <td class="text-xs">
                                    <small>{{ fecha($participante->evento->fecha) }}</small>
                                </td>
                                <td class="text-xs">
                                    <small>{{ $participante->evento->nombre }}</small>
                                </td>
                                <td class="text-xs">
                                    <small>{{ $participante->evento->lugar }}</small>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-link" @if($eventos->isNotEmpty()) wire:click="formInscripcion({{ $evento->id }})" @endif
                                            data-toggle="modal" data-target="#modal-lg-inscripcion">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </td>
                            </tr>

                        @endforeach
                    @else
                    <tr>
                        <td>
                            {{--<img src="dist/img/default-150x150.png" alt="Product 1" class="img-circle img-size-32 mr-2">--}}
                            Aun no te has inscrito a algun Evento.
                        </td>
                    </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @if($administradorPlanilla)
    <div class="col-md-6">
        <div class="callout callout-info">
            <h5>¡Registra tu Planilla de Inscripción!</h5>

            <p class="text-justify">Es importante que tengas guardada y actualizada tu Planilla de Inscripción para que cuando este disponible algun evento puedas registrarte fasilmente.</p>
        </div>
    </div>
    @endif
    @if($administradorFoto)
    <div class="col-md-6">
        <div class="callout callout-info">
            <h5>¡Sube tu Foto!</h5>

            <p class="text-justify">Aun no has subido una foto, te recomendamos que lo hagas.</p>
        </div>
    </div>
    @endif
</div>
