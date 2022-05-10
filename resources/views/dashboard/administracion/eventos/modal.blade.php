<div wire:ignore.self class="modal fade" id="modal-lg-modalidades">
    <div class="modal-dialog modal-lg">
        <div class="modal-content fondo">
            <div class="modal-header">
                <h4 class="modal-title">Modalidades</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                <div wire:loading>
                    <div class="overlay">
                        <i class="fas fa-2x fa-sync-alt"></i>
                    </div>
                </div>


                <div class="row justify-content-center">

                    <div class="col-lg-8">


                        <form @if($modal == 'create') wire:submit.prevent="storeModalidad" @else wire:submit.prevent="updateModalidad" @endif>

                            <div class="form-group">
                                {{--<label>Cierre de Inscripciones:</label>--}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text text-bold">Nombre{{--<i class="fas fa-code"></i>--}}</span>
                                    </div>
                                    <input type="text" class="form-control" wire:model.defer="nombreModalidad" placeholder="[string]">
                                    @error('nombreModalidad')
                                    <span class="col-sm-12 text-sm text-bold text-danger">
                            <i class="icon fas fa-exclamation-triangle"></i>
                            {{ $message }}
                            </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group text-right">
                                @if($modal == 'create')
                                <input type="submit" class="btn btn-success btn-sm" value="Crear Modalidad">
                                 @else
                                     <input type="submit" class="btn btn-primary btn-sm" value="Guardar Cambios">
                                 @endif
                            </div>

                        </form>

                        @if($modal != 'create')
                            <div class="form-group">
                                <label>Categorias:</label>
                                @if($categorias)
                                    <form wire:submit.prevent="editarCategorias">
                                    @foreach($categorias as $categoria)

                                        <div class="input-group input-group-sm">
                                            <input type="text" class="form-control" value="{{ ucfirst($categoria->nombre) }}"
                                               {{-- wire:model.defer="nombreCategoria"--}}>
                                            {{--@error('nombreCategoria')
                                            <span class="col-sm-12 text-sm text-bold text-danger">
                                                <i class="icon fas fa-exclamation-triangle"></i>
                                                {{ $message }}
                                            </span>
                                            @enderror--}}
                                            <span class="input-group-append">
                                        {{--<button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-sync"></i></button>--}}
                                        <button type="button" class="btn btn-danger btn-flat" wire:click="destroyCategoria({{ $categoria->id }})"><i class="fas fa-trash-alt"></i></button>
                                    </span>
                                        </div>

                                    @endforeach
                                    </form>

                                @endif

                            </div>

                            <form wire:submit.prevent="storeCategorias" {{--@if($view == 'create') wire:submit.prevent="store" @else wire:submit.prevent="update" @endif--}}>
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" wire:model.defer="nombreCategoria">
                                        @error('nombreCategoria')
                                        <span class="col-sm-12 text-sm text-bold text-danger">
                                        <i class="icon fas fa-exclamation-triangle"></i>
                                        {{ $message }}
                                    </span>
                                        @enderror
                                        <span class="input-group-append">
                            <button type="submit" class="btn btn-success btn-flat"><i class="fas fa-save"></i></button>
                            {{--<button type="button" class="btn btn-default btn-flat">Go!</button>--}}
                            </span>
                                    </div>
                                </div>
                            </form>

                        @endif




                    </div>

                </div>


            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
