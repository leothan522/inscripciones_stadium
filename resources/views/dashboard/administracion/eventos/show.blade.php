<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Detalles del Evento</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

    @if(!$evento_id)
            Seleccione un Evento ó cree uno nuevo.

        @else


            <div class="row">

                <div class="col-lg-6">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h5 class="card-title text-bold">{{ $nombre }}</h5>

                            <p class="card-text">
                                Lugar: {{ $lugar }} <br>
                                Fecha: <span class="text-primary">{{ fecha($fecha) }}</span> | Hora: <span class="text-primary">{{ hora($hora) }}</span>
                            </p>
                            <p class="card-text">
                                Inscripciones:
                            <ul class="list-group">
                                <li class="list-group-item">Apertura: {{ fecha($apertura) }} | Hora: {{ hora($h_apertura) }}</li>
                                <li class="list-group-item">Cierre: {{ fecha($cierre) }} | Hora: {{ hora($h_cierre) }}</li>
                            </ul>


                            </p>

                            {{--<a href="#" class="card-link">Agregar Modalidad</a>--}}
                            <button class="btn btn-link card-link" wire:click="limpiarModalidad" data-toggle="modal" data-target="#modal-lg-modalidades">
                                Agregar Modalidad
                            </button>

                        </div>
                    </div><!-- /.card -->
                </div>

                <div class="col-lg-6">

                    @if($modalidades->isNotEmpty())

                        @foreach($modalidades as $modalidad)

                            @include('dashboard.administracion.eventos.modalidades')

                        @endforeach

                    @endif

                    @include('dashboard.administracion.eventos.modal')
                </div>


            </div>







            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="form-group text-right">
                        <button type="button" class="btn btn-danger" wire:click="destroy({{ $evento_id }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        {{--<button type="button" class="btn btn-primary @if($rol_id == null) d-none @endif" wire:click="actualRol()">
                            --}}{{--<i class="fas fa-level-up"></i>--}}{{-- Actualizar Usuarios
                        </button>--}}
                        <button type="button" class="btn btn-default" wire:click="limpiar()">
                            <i class="fas fa-times"></i> Cerrar
                        </button>
                    </div>
                </div>
            </div>



    @endif

    </div>
</div>
