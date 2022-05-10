<form @if($view == 'create') wire:submit.prevent="store" @else wire:submit.prevent="update" @endif>

    @if($view == 'create')
        <div class="info-box bg-success">
            {{--<span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>--}}

            <div class="info-box-content">
                {{--<span class="info-box-text">Crear Evento</span>--}}
                <span class="info-box-number">Crear uno Nuevo</span>
            </div>
            <!-- /.info-box-content -->
        </div>
    @else
        <div class="info-box bg-primary">
            {{--<span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>--}}

            <div class="info-box-content">
                {{--<span class="info-box-text">Crear Evento</span>--}}
                <span class="info-box-number">
                    Editar Evento
                    <button type="button" class="btn btn-outline-light float-right" wire:click="limpiar"><i class="fas fa-times"></i></button>
                </span>

            </div>
            <!-- /.info-box-content -->
        </div>
    @endif

    <div class="form-group">

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text text-bold">Nombre{{--<i class="fas fa-code"></i>--}}</span>
            </div>
            <input type="text" class="form-control" wire:model.defer="nombre" placeholder="[string]">
            @error('nombre')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </div>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text text-bold">Lugar{{--<i class="fas fa-code"></i>--}}</span>
            </div>
            <input type="text" class="form-control" wire:model.defer="lugar" placeholder="[string]">
            @error('lugar')
            <span class="col-sm-12 text-sm text-bold text-danger">
                <i class="icon fas fa-exclamation-triangle"></i>
                {{ $message }}
            </span>
            @enderror
        </div>

    </div>

    <div class="form-group">
        <label>Fecha del Evento:</label>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" wire:model.defer="fecha">
                        @error('fecha')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                        </div>
                        <input type="time" class="form-control" wire:model.defer="hora">
                        @error('hora')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Apertura de Inscripciones:</label>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" wire:model.defer="apertura">
                        @error('apertura')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                        </div>
                        <input type="time" class="form-control" wire:model.defer="h_apertura">
                        @error('h_apertura')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Cierre de Inscripciones:</label>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <input type="date" class="form-control" wire:model.defer="cierre">
                        @error('cierre')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-clock"></i></span>
                        </div>
                        <input type="time" class="form-control" wire:model.defer="h_cierre">
                        @error('h_cierre')
                        <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="form-group text-right">
        @if($view == 'create')
            <input type="submit" class="btn btn-block btn-success" value="Crear Evento">
            @else
            <input type="submit" class="btn btn-block btn-primary" value="Guardar Cambios">
        @endif
    </div>

</form>
