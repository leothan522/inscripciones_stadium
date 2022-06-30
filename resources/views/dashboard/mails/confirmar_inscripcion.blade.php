<img src="{{ $message->embed(asset('img/cabecera.jpg')) }}" alt="">
<center><p><strong>COMPROBANTE DE INSCRIPCI&Oacute;N</strong></p></center>
<p>&nbsp;Por medio de la presente se hace constar que el ciudadano {{--{Nombre completo}--}}<strong>{{ $participante->nombre }}</strong>,
    portador del C.I/pasaporte: {{--{cedula}--}}<strong>{{ $participante->cedula }}</strong> nacido en fecha {{--{fecha de nacimiento}--}}
    <strong>{{ fecha($participante->fecha) }}</strong> inscrito en miranda y que participar&aacute; por el club {{--{club}--}}<strong>{{ $participante->club }}</strong>,
    despu&eacute;s de haber verificado los datos del pago realizado en fecha {{--{fecha de pago}--}}<strong>{{ fecha($pago->fecha) }}</strong>, por la cantidad de 25 USD
    americanos o su equivalente en Bol&iacute;vares a la tasa de cambio oficial del d&iacute;a del dep&oacute;sito, DEPOSITO realizado
    en Banesco cuyo n&uacute;mero de comprobante es {{--{comprobante}--}}<strong>{{ $pago->comprobante }}</strong>, se encuentra debidamente inscrito en el evento
    Denominado {{--I V&Aacute;LIDA 5K NOCTURNA DE MIRANDA--}}<strong>{{ $evento->nombre }}</strong> en la Modalidad <strong>{{ $modalidad->nombre }} {{ $participante->sexo }}</strong> Categoria
    @foreach($categorias as $categoria)
        @if(leerJson($categoriasAtleta, $categoria->id))
            <strong>{{ $categoria->nombre }}</strong>
        @endif
    @endforeach
    {{--Categor&iacute;a--}} {{--Masculino--}} {{--{categoria}--}}.</p>
<p>&nbsp;</p>
<p>Nos encanta contar contigo como protagonista del evento <strong>{{ $evento->nombre }}</strong>, al lado de los mejores corredores de carreras de Calles. Miranda potencia deportiva y de grandes eventos de deportivos de calle.</p>
<p>RECOMENDACIONES PARA LA COMPETICION.</p>
<p>&nbsp;</p>
<p>Estas son algunas de las normas b&aacute;sicas que todo nadador de aguas abiertas debe tener en cuenta tanto a la hora de entrenarse como a la hora de competir en una traves&iacute;a.</p>
<ul>
    <li>Aprende a hidratarte antes, durante y despu&eacute;s de la Carrera.</li>
    <li>Usar calzado adecuado.</li>
    <li>Usar ropa adecuada para esta carrera nocturna.</li>
    <li>Conocer la ruta de la carrera.</li>
    <li>Disfruta del deporte.</li>
</ul>
<p>&nbsp;&nbsp;</p>
<p>Atte.</p>
<p>Coordinaci&oacute;n de Inscripciones</p>
