<table>
    <thead>
    <tr><td colspan="7">Evento:&nbsp; <strong>{{ $evento->nombre }}</strong></td></tr>
    <tr><td colspan="7">Lugar:&nbsp; <strong>{{ $evento->lugar }}</strong></td></tr>
    <tr>
        <td colspan="4">Fecha:&nbsp; <strong>{{ fecha($evento->fecha) }}</strong></td>
        <td colspan="3">Hora:&nbsp; <strong>{{ hora($evento->hora) }}</strong></td>
    </tr>
    <tr>
        <td>&ensp;</td>
    </tr>
    <tr>
        <th style="border: 1px solid #000000; text-align: center">ID</th>
        <th style="border: 1px solid #000000; text-align: center">C.I./Pasaporte</th>
        <th style="border: 1px solid #000000; text-align: center">Primer Nombre</th>
        <th style="border: 1px solid #000000; text-align: center">Segundo Nombre</th>
        <th style="border: 1px solid #000000; text-align: center">Primer Apellido</th>
        <th style="border: 1px solid #000000; text-align: center">Segundo Apellido</th>
        <th style="border: 1px solid #000000; text-align: center">Sexo</th>
        <th style="border: 1px solid #000000; text-align: center">País</th>
        <th style="border: 1px solid #000000; text-align: center">F. Nacimiento</th>
        <th style="border: 1px solid #000000; text-align: center">Edad</th>
        <th style="border: 1px solid #000000; text-align: center">Celular </th>
        <th style="border: 1px solid #000000; text-align: center">Club</th>
        <th style="border: 1px solid #000000; text-align: center">Talla Franela</th>
        <th style="border: 1px solid #000000; text-align: center">Modalidad</th>
        <th style="border: 1px solid #000000; text-align: center">Correo</th>
        <th style="border: 1px solid #000000; text-align: center">Estatus</th>
        <th style="border: 1px solid #000000; text-align: center">Banco</th>
        <th style="border: 1px solid #000000; text-align: center">Tipo</th>
        <th style="border: 1px solid #000000; text-align: center">Fecha</th>
        <th style="border: 1px solid #000000; text-align: center">Comprobante</th>
    </tr>
    </thead>
    <tbody>
    @foreach($participantes as $participante)
        <tr>
            <td style="border: 1px solid #000000; text-align: center">{{ cerosIzquierda($participante->id, 5) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->atleta->cedula }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ strtoupper($participante->atleta->primer_nombre) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ strtoupper($participante->atleta->segundo_nombre) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ strtoupper($participante->atleta->primer_apellido) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ strtoupper($participante->atleta->segundo_apellido) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ strtoupper($participante->atleta->sexo) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ paises($participante->atleta->pais) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ fecha($participante->atleta->fecha_nac) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ calcularEdad($participante->atleta->fecha_nac) }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->atleta->telefono_celular}}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->atleta->club->nombre}}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->atleta->talla_franela}}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->modalidad }}</td>
            <td style="border: 1px solid #000000; text-align: center; background-color: yellow;">{{ $participante->atleta->user->email }}</td>
            <td style="border: 1px solid #000000; text-align: center">
                @if($participante->estatus == 0)
                        Esperando la confirmacion del Pago.
                @else
                    @if($participante->estatus == 1)
                        Pago Validado.
                    @else
                        Pago NO Verificado.
                    @endif
                @endif
            </td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->p_banco }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ $participante->p_tipo }}</td>
            <td style="border: 1px solid #000000; text-align: center">{{ fecha($participante->p_fecha) }}</td>
            <td style="border: 1px solid #000000; text-align: center; background-color: yellow;">{{ $participante->p_comprobante }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
