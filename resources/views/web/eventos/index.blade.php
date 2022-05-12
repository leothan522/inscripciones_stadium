<div class="row">


    @if($eventos->isNotEmpty())
        @foreach($eventos as $evento)
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title text-bold">{{ $evento->nombre }}</h5>
                        <p class="card-text">
                            Lugar: {{ $evento->lugar }} <br>
                            Fecha: <span class="text-primary">{{ fecha($evento->fecha) }}</span> | Hora: <span class="text-primary">{{ hora($evento->hora) }}</span>
                        </p>
                        <a href="#" class="card-link"><i class="fas fa-edit"></i> Inscribirse</a>
                        <a href="#" class="card-link text-muted">Detalles del Evento</a>
                    </div>
                </div><!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        @endforeach
        @else
        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title text-bold">Información</h5>
                    <p class="card-text">
                        Por ahora no tenemos eventos disponibles.
                    </p>
                    {{--<a href="#" class="card-link"><i class="fas fa-edit"></i> Inscribirse</a>
                    <a href="#" class="card-link text-muted">Detalles del Evento</a>--}}
                </div>
            </div><!-- /.card -->
        </div>
        <!-- /.col-md-6 -->
    @endif

</div>
<!-- /.row -->

@include('web.eventos.modal_administrador')
@include('web.eventos.modal_planilla')
@include('web.eventos.modal_foto')
