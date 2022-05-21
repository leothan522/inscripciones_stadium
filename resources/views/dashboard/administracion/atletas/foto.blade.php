<div class="row justify-content-center">
    <div class="col-md-6">


        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    {{--<img class="profile-user-img img-fluid img-circle" src=" @if (!$photo) {{ asset('img/user.png') }} @else {{ $photo->temporaryUrl() }} @endif" alt="User profile picture">--}}
                    <img class="img-fluid pad" src="
                        @if(!$photo)
                            {{ verFoto($path) }}
                            @else
                            {{ $photo->temporaryUrl() }}
                        @endif
                        " alt="Foto Atleta">
                </div>


                <p class="text-bold text-center mt-2 text-danger">
                    @if($photo && $photo->temporaryUrl())
                        Sin Guardar
                    @endif
                </p>

                @if(leerJson(Auth::user()->permisos, 'atletas.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
                <form wire:submit.prevent="storeFoto">

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" wire:model="photo" class="custom-file-input" id="customFileLang" lang="es" accept="image/jpeg, image/png">
                                <label class="custom-file-label" for="customFileLang" data-browse="Elegir">Seleccionar Archivo</label>
                            </div>
                            @error('photo')
                            <span class="col-sm-12 text-sm text-bold text-danger">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </li>
                </ul>

                    @if($guardarFoto)
                        <button type="submit" class="btn btn-primary btn-block">Guardar Foto</button>
                        @else
                        <button type="button" class="btn btn-primary btn-block disabled">Guardar Foto</button>
                        <span class="col-sm-12 text-sm text-bold text-danger text-justify">
                                <i class="icon fas fa-exclamation-triangle"></i>
                                Para subir una foto primero debes llenar y guardar la Planilla de Inscripción
                            </span>
                    @endif


                </form>
                @endif
            </div>
            <!-- /.card-body -->
        </div>


    </div>
</div>



