<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title text-bold">{{ $nombreEvento }}</h5>
                <p class="card-text">
                    Lugar: {{ $lugarEvento }} <br>
                    Fecha: <span class="text-primary">{{ fecha($fechaEvento) }}</span> | Hora: <span class="text-primary">{{ hora($horaEvento) }}</span>
                </p>
                {{--<a href="#" class="card-link text-muted">Detalles del Evento</a>--}}
            </div>
        </div><!-- /.card -->

            <h5 class="col-md-12 text-bold">ID: {{ cerosIzquierda($participante_id, 5) }}</h5>
            @if($estatusPago == 0)
                <div class="alert alert-warning">
                    <i class="icon fas fa-exclamation-triangle"></i> Esperando la confirmacion del Pago.
                </div>
            @else
                @if($estatusPago == 1)
                    <div class="alert alert-success">
                        <i class="icon fas fa-check"></i> Pago Validado.
                    </div>
                @else
                    <div class="alert alert-danger">
                        <i class="icon fas fa-ban"></i> Pago NO Verificado.
                    </div>
                @endif
            @endif



    </div>
    <!-- /.col-md-6 -->

    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--<h5 class="card-title">Datos del Participante</h5>--}}
                <p class="card-text">
                    C.I./Pasaporte: <span class="text-bold">{{ $cedula }}</span> <br>
                    Nombres: <span class="text-bold">{{ $primerNombre.' '. $segundoNombre }}</span> <br>
                    Apellidos: <span class="text-bold">{{ $primerApellido.' '.$segundoApellido }}</span> <br>
                    Sexo: <span class="text-bold">{{ $sexo }}</span> <br>
                    F. Nacimiento: <span class="text-bold">{{ fecha($fechaNac) }}</span>
                    <span class="float-right">Edad: <span class="text-bold">{{ calcularEdad($fechaNac) }}</span> </span>
                    <br>
                    CLub: <span class="text-bold">{{ $nombreClub }}</span>
                </p>
                {{--<a href="#" class="card-link text-muted">Detalles del Evento</a>--}}
            </div>
        </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->
</div>

<div class="row">

    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-body">
                {{--<h5 class="card-title text-bold mb-3">Detalles de la Inscripción</h5>--}}

                <div class="form-group">
                    <label>Modalidad a participar:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Modalidad
                                </span>
                        </div>
                        <span class="form-control">{{ $modalidad }}</span>
                    </div>
                </div>

                @if($categorias)
                    <div class="form-group">
                        <label>Categoria a participar:</label>
                        @foreach($categorias as $categoria)
                            @if(leerJson($categoriasAtleta, $categoria->id))
                            <div class="input-group">
                                {{--<div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <input type="checkbox" @if(leerJson($categoriasAtleta, $categoria->id)) checked @endif disabled>
                                    </span>
                                </div>--}}
                                <label class="form-control text-xs"><small>{{ $categoria->nombre }}</small></label>
                            </div>
                            @endif
                        @endforeach
                    </div>
                @endif



            </div>
        </div><!-- /.card -->
    </div>
    <div class="col-lg-6">

        <div class="card card-primary card-outline">
            <div class="card-body">

                <h5 class="card-title text-bold mb-3">Datos del Pago</h5>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Banco
                                </span>
                        </div>
                        <span class="form-control">{{ $banco }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Tipo Pago
                                </span>
                        </div>
                        <span class="form-control">{{ $tipo }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Fecha Pago</span>
                        </div>
                        <span class="form-control">{{ fecha($fecha) }}</span>

                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Comprobante</span>
                        </div>
                        <span class="form-control">{{ $comprobante }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Monto</span>
                        </div>
                        <span class="form-control">{{ $monto }}</span>
                    </div>
                </div>

            </div>
        </div>

        @if(leerJson(Auth::user()->permisos, 'pagos.validar') || Auth::user()->role == 1 || Auth::user()->role == 100)

        <div class="form-group text-right">
            @if($estatusPago == 0)
                <button class="btn btn-danger" wire:click="validarPago({{ $pago_id }}, {{ 2 }})"><i class="fa fa-ban"></i> Pago NO Verificado</button>
                <button class="btn btn-success" wire:click="validarPago({{ $pago_id }}, {{ 1 }})"><i class="fa fa-check-circle"></i> Validar Pago</button>
            @else
                <button class="btn btn-info" wire:click="validarPago({{ $pago_id }}, {{ 0 }})"><i class="icon fas fa-exclamation-triangle"></i> Restablecer Pago</button>
            @endif
        </div>

        @endif
    </div>

</div>
