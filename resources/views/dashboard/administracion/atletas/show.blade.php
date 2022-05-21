<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">
            @if($busqueda)
                Resultados de la Busqueda { <b class="text-danger">{{ $busqueda }} </b>}
            @else
                Últimos Altetas Registrados
            @endif
        </h3>

        <div class="card-tools">
            @if(leerJson(Auth::user()->permisos, 'atletas.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
                <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#modal-lg-datos-atletas" wire:click="verPlanilla()">
                    <i class="fas fa-edit"></i> Registrar Atleta
                </button>
            @endif
            @if($busqueda)

                <a href="{{ route('administracion.atletas') }}"
                   class="btn btn-tool btn-outline-primary text-danger" {{--target="_blank"--}}>
                    <i class="fas fa-list"></i> Ver Todos
                </a>
            @endif
            <button type="button" class="btn btn-tool" data-card-widget="maximize">
                <i class="fas fa-expand"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        @include('dashboard.administracion.atletas.table')

    </div>
</div>
