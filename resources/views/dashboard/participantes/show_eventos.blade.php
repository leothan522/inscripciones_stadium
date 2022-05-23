@if($evento_id)

    <div class="col-lg-12">
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
                {{--@if(leerJson(Auth::user()->permisos, 'eventos.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
                    <button class="btn btn-link card-link" wire:click="limpiarModalidad" data-toggle="modal" data-target="#modal-lg-modalidades">
                        Agregar Modalidad
                    </button>
                @endif--}}

            </div>
        </div><!-- /.card -->
    </div>


@endif
