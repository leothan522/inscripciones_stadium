<form @if(!$atleta_id) wire:submit.prevent="storePlanilla" @else wire:submit.prevent="updatePlanilla" @endif>
    <div class="row">

        <div class="col-lg-6">
            <div class="card card-primary card-outline">
                <div class="card-body">

                    <h5 class="card-title text-bold mb-3">Datos Personales</h5>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    C.I./Pasaporte
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="cedula" placeholder="[numerico]">
                            @error('cedula')
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
                                    Sexo
                                </span>
                            </div>
                            <select class="custom-select" wire:model.defer="sexo">
                                <option value="">Seleccione</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                            @error('sexo')
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
                                    F. Nacimiento
                                </span>
                            </div>
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy" wire:model.defer="fechaNac">
                            @error('fechaNac')
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
                                    Primer Nombre
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="primerNombre" placeholder="[texto]">
                            @error('primerNombre')
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
                                <span class="input-group-text text-bold">
                                    Segundo Nombre</span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="segundoNombre" placeholder="[texto]">
                            @error('segundoNombre')
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
                                    Primer Apellido
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="primerApellido" placeholder="[texto]">
                            @error('primerApellido')
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
                                <span class="input-group-text text-bold">
                                    Segundo Apellido
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="segundoApellido" placeholder="[texto]">
                            @error('segundoApellido')
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
                                    País
                                </span>
                            </div>
                            {!! Form::select('pais', paises(), null , ['class' => 'custom-select', 'wire:model.defer' => 'pais', 'placeholder' => 'Seleccione']) !!}
                            @error('pais')
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
                                    Celular
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="telefonoCelular" placeholder="[telefono]">
                            @error('telefonoCelular')
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
                                <span class="input-group-text text-bold">
                                    Tlf. Residencia
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="telefonoResidencia" placeholder="[telefono]">
                            @error('telefonoResidencia')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Dirección:</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" cols="1" rows="1" wire:model.defer="direccion"></textarea>
                            @error('direccion')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                    <i class="icon fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>




                </div>
            </div><!-- /.card -->


            @if($registrarUsuario)

            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title text-bold mb-3">Datos de Usuario</h5>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    <i class="fas fa-envelope"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="email" placeholder="[{{ __('Email') }}]">
                            @error('email')
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
                                    <i class="fas fa-lock"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="password" placeholder="[{{ __('Password') }}]">
                            <span class="input-group-append">
                                <button type="button" wire:click="generarClave" class="btn btn-info btn-flat btn-sm text-sm">Generar!</button>
                            </span>
                            @error('password')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>


                </div>
            </div><!-- /.card -->
            @endif


        </div>
        <!-- /.col-md-6 -->

        <div class="col-lg-6">

            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title text-bold mb-3">Datos del Club</h5>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Club
                                </span>
                            </div>
                            <input type="hidden" wire:model="registrarClub">
                            {!! Form::select('clubes', $listaClub, null, ['class' => 'custom-select', 'wire:model' => 'clubes', 'placeholder' => 'Seleccione']) !!}
                            @error('clubes')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    @if($registrarClub)

                        <div class="form-group">
                        <span class="col-sm-12 text-sm text-bold text-justify">
                                En caso de no aparecer se hara su registro
                            </span>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Nombre Club
                                </span>
                                </div>
                                <input type="text" class="form-control" wire:model.defer="nombreClub" placeholder="[texto]">
                                @error('nombreClub')
                                <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                                @enderror
                            </div>
                        </div>

                    @endif

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold"><span class="text-danger">*</span>&nbsp;
                                    Talla Franela
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="tallaFranela" placeholder="[texto]">
                            @error('tallaFranela')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>


                </div>
            </div><!-- /.card -->

            <div class="card card-primary card-outline">
                <div class="card-body">
                    <h5 class="card-title text-bold mb-3">Datos Medicos</h5>

                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold">
                                    Grupo Sanguineo y RH
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="grupoSanguineo" placeholder="[texto]">
                            @error('grupoSanguineo')
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
                                <span class="input-group-text text-bold">
                                    ¿Alergico?
                                </span>
                            </div>
                            <select class="custom-select" wire:model.defer="alergico">
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            </select>
                            @error('alergico')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Alergias:</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" cols="1" rows="1" wire:model.defer="alergias"></textarea>
                            @error('alergias')
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
                                <span class="input-group-text text-bold">
                                    ¿Antecedentes Médicos?
                                </span>
                            </div>
                            <select class="custom-select" wire:model.defer="antecedentesMedicos">
                                <option value="NO">NO</option>
                                <option value="SI">SI</option>
                            </select>
                            @error('antecedentesMedicos')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">Observaciones:</label>
                        <div class="input-group mb-3">
                            <textarea class="form-control" cols="1" rows="1" wire:model.defer="observaciones"></textarea>
                            @error('observaciones')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                    <i class="icon fas fa-exclamation-triangle"></i>
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">En caso de Emergencia llamar a:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold">
                                    Nombre
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="contactoEmergencia" placeholder="[texto]">
                            @error('contactoEmergencia')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-bold">
                                    Telefono
                                </span>
                            </div>
                            <input type="text" class="form-control" wire:model.defer="telefonoEmergencia" placeholder="[telefono]">
                            @error('telefonoEmergencia')
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
                @if(leerJson(Auth::user()->permisos, 'atletas.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
                    @if(!$atleta_id)
                        <input type="submit" class="btn btn-block btn-success" value="Guardar">
                    @else
                        <input type="submit" class="btn btn-block btn-primary" value="Guardar Cambios">
                    @endif
                @endif
            </div>

        </div>
        <!-- /.col-md-6 -->

    </div>
</form>

