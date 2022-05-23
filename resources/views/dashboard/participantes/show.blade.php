<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Participantes Inscritos</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body">

    @if(!$evento_id)
            Seleccione un Evento.

        @else


            <div class="row">

                <div class="col-md-12">
                    @include('dashboard.participantes.table')
                </div>

            </div>


            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="form-group text-right">
                        {{--@if(leerJson(Auth::user()->permisos, 'eventos.destroy') || Auth::user()->role == 1 || Auth::user()->role == 100)
                        <button type="button" class="btn btn-danger" wire:click="destroy({{ $evento_id }})">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                        @endif--}}
                        <button type="button" class="btn btn-default" wire:click="limpiar()">
                            <i class="fas fa-times"></i> Cerrar
                        </button>
                    </div>
                </div>
            </div>



    @endif

    </div>
</div>
