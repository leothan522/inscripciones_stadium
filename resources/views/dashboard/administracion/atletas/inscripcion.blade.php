<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title text-bold mb-3">Evento</h5>
                <div class="form-group">
                {!! Form::select('SelectEvento', $listarEvento, null , ['class' => 'custom-select', 'wire:model' => 'evento', 'placeholder' => 'Seleccione']) !!}
                </div>
                {{--<p class="card-text">
                    Lugar: {{ $lugarEvento }} <br>
                    Fecha: <span class="text-primary">{{ fecha($fechaEvento) }}</span> | Hora: <span class="text-primary">{{ hora($horaEvento) }}</span>
                </p>
                <a href="#" class="card-link text-muted">Detalles del Evento</a>--}}
            </div>
        </div><!-- /.card -->

        {{--@if($participante_id && $pago_id)
            <h5 class="col-md-12 text-bold">ID: {{ cerosIzquierda($participante_id, 5) }}</h5>
            @if($estatusPago == 0)
                <div class="alert alert-warning">
                    <i class="icon fas fa-exclamation-triangle"></i> Esperando la confirmacion del Pago.
                </div>
                @else
                @if($estatusPago == 1)
                    <div class="alert alert-success">
                        <i class="icon fas fa-check"></i> Inscripción Completa.
                    </div>
                    @else
                    <div class="alert alert-danger">
                        <i class="icon fas fa-ban"></i> Pago NO Validado. Verifique los datos
                    </div>
                @endif
            @endif

        @endif--}}

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
                    F. Nacimiento: <span class="text-bold">{{ fecha($fechaNac) }}</span><br>
                    CLub: <span class="text-bold">{{ $nombreClub }}</span>
                </p>
                {{--<a href="#" class="card-link text-muted">Detalles del Evento</a>--}}
            </div>
        </div><!-- /.card -->
    </div>
    <!-- /.col-md-6 -->

</div>
<form wire:submit.prevent="storeIncripcion">
    <div class="row">
        @if($inscribir)
        <div class="col-lg-6">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <h5 class="card-title text-bold mb-3">Detalles de la Inscripción</h5>



                    <div class="form-group">
                        <label>Seleccione la Modalidad a participar:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                        <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                            Modalidad
                        </span>
                            </div>
                            {!! Form::select('selectModalidades', $listaModalidades, null , ['class' => 'custom-select', 'wire:model' => 'modalidad', 'placeholder' => 'Seleccione']) !!}
                            @error('modalidad')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                @if($categorias)
                    <div class="form-group">
                            <label>Seleccione la Categoria a participar:</label>
                            @foreach($categorias as $categoria)
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <input type="checkbox" @if(leerJson($categoriasAtleta, $categoria->id)) checked @endif wire:click="categoriasParticipante({{ $categoria->id }})">
                                    </span>
                                    </div>
                                    <label class="form-control text-xs"><small>{{ $categoria->nombre }}</small></label>
                                </div>
                                {{--<div class="form-check">
                                    <input class="form-check-input" type="checkbox">
                                    <label class="form-check-label">{{ $categoria->nombre }}</label>
                                </div>--}}
                            @endforeach
                            <input type="hidden" wire:model.defer="categoriasAtleta">
                            @error('categoriasAtleta')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                            {{--{{ $categoriasAtleta }}--}}
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
                        {!! Form::select('banco', bancos(), null , ['class' => 'custom-select', 'wire:model.defer' => 'banco', 'placeholder' => 'Seleccione']) !!}
                        @error('banco')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Tipo Pago
                                </span>
                        </div>
                        {!! Form::select('tipoPago', tipoPago(), null , ['class' => 'custom-select', 'wire:model.defer' => 'tipoPago', 'placeholder' => 'Seleccione']) !!}
                        @error('tipoPago')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Fecha Pago</span>
                        </div>
                        <input type="date" class="form-control" placeholder="dd/mm/yyyy" wire:model.defer="fechaPago">
                        @error('fechaPago')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Comprobante</span>
                        </div>
                        <input type="text" class="form-control" wire:model.defer="comprobante" placeholder="[texto]">
                        @error('comprobante')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Monto</span>
                        </div>
                        <input type="text" class="form-control" wire:model.defer="monto" placeholder="[texto]">
                        @error('monto')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
        </div><!-- /.card -->

            <div class="form-group text-right">
                <input type="submit" class="btn btn-block btn-success" value="Guardar">
                {{--@if(!$participante_id && !$pago_id)
                    <input type="submit" class="btn btn-block btn-success" value="Guardar">
                @else
                    @if($estatusPago != 1)
                    <input type="submit" class="btn btn-block btn-primary --}}{{--@if($estatusPago == 0) disabled @endif--}}{{--" value="Guardar Cambios">
                    @endif
                @endif--}}
            </div>

    </div>
        @endif
    </div>
</form>
