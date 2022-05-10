<div class="card card-primary card-outline">
    <div class="card-body">
        <h5 class="card-title text-bold"><small>Modalidad: </small>{{ $modalidad->nombre }}</h5>

        <p class="card-text">
        @if($modalidad->categorias)

            <ul class="list-group">
                @foreach($modalidad->categorias as $categoria)
                    <li class="list-group-item">{{ $categoria->nombre }}</li>
                @endforeach
            </ul>

        @endif
        </p>

        {{--<a href="#" class="card-link">Editar Modalidad</a>--}}
        @if(leerJson(Auth::user()->permisos, 'eventos.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
        <button class="btn btn-link card-link" wire:click="edit({{ $modalidad->id }})" data-toggle="modal" data-target="#modal-lg-modalidades">
            Editar Modalidad
        </button>
        <button type="button" class="btn btn-link card-link text-danger" wire:click="destroyModalidad({{ $modalidad->id  }})">
        <i class="fas fa-trash-alt"></i>
        </button>
        @endif
    </div>
</div><!-- /.card -->
