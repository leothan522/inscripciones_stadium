<div class="table-responsive">
    <table class="table table-hover bg-light">
        <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col">C.I./Pasaporte </th>
            <th scope="col">Nombre Completo</th>
            <th scope="col" class="text-center">Sexo</th>
            <th scope="col" class="text-center">País</th>
            <th scope="col" class="text-center">Edad</th>
            <th scope="col" class="text-center">Estatus</th>
            <th scope="col" style="width: 5%;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @if(!$listaAtletas->isEmpty())
            @foreach($listaAtletas as $participante)
                <th scope="row" class="text-center">{{ $participante->atleta->id }}</th>
                <td>{{ $participante->atleta->cedula }}</td>
                <td>{{ strtoupper($participante->atleta->primer_nombre." ".$participante->atleta->segundo_nombre." ".$participante->atleta->primer_apellido." ".$participante->atleta->segundo_apellido) }}</td>
                <td class="text-center">{{ $participante->atleta->sexo }}</td>
                <td class="text-center">{{ paises($participante->atleta->pais) }}</td>
                <td class="text-center">{{ calcularEdad($participante->atleta->fecha_nac) }}</td>
                <td class="text-center">{!! estatusPagos($participante->estatus) !!}</td>
                <td class="justify-content-end">
                    <div class="btn-group">
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg-atleta" wire:click="verParticipante({{ $participante->atletas_id }},{{ $participante->pagos_id }})">
                            <i class="fas fa-info-circle"></i>
                        </button>

                        {{--<button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg-foto" wire:click="verFoto({{ $participante->atleta->id }})">
                            <i class="fas fa-image"></i>
                        </button>--}}
                </div>
                </td>
                </tr>
            @endforeach
        @else
        <tr class="text-center">
            <td colspan="8">
                <a href="{{ route('administracion.atletas') }}">
                            <span>
                                Sin resultados para la busqueda <strong class="text-bold"> { <span class="text-danger">{{--{{ $busqueda }}--}}</span> }</strong>
                            </span>
                </a>
            </td>
        </tr>
         @endif
        </tbody>
    </table>
</div>
