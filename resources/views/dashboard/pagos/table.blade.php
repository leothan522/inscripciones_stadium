<div class="table-responsive">
    <table class="table table-hover bg-light">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Banco</th>
            <th scope="col">Tipo Pago</th>
            <th scope="col" class="text-center">Fecha Pago</th>
            <th scope="row" class="text-center">Comprobante</th>
            <th scope="col" class="text-right">Monto</th>
            <th scope="col" class="text-center">Estatus</th>
            <th scope="col" style="width: 5%;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @if(!$listaPagos->isEmpty())
            @foreach($listaPagos as $pago)
                <td>{{ $pago->banco }}</td>
                <td>{{ $pago->tipo }}</td>
                <td class="text-center">{{ fecha($pago->fecha) }}</td>
                <td class="text-center">{{ $pago->comprobante }}</td>
                <td class="text-right">{{ formatoMillares($pago->monto) }}</td>
                <td class="text-center">{!! estatusPagos($pago->estatus) !!}</td>
                <td class="justify-content-end">
                    <div class="btn-group">
                        <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-lg-pagos" wire:click="verPago({{ $pago->id }})">
                            <i class="fas fa-info-circle"></i>
                        </button>
                </div>
                </td>
                </tr>
            @endforeach
        @else
        <tr class="text-center">
            <td colspan="6">
                <a href="{{ route('pagos.index') }}">
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
