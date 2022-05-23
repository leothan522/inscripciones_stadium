<div class="row justify-content-center">


    <div class="col-md-4">


        <div class="card card-gray-dark" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
            <div class="card-header">
                <h3 class="card-title">Datos del Evento</h3>
                <div class="card-tools">
                    {{--<button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                    </button>--}}
                    <span class="btn btn-tool"><i class="fas fa-list"></i></span>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">


                @if($eventos->isNotEmpty())
                    <div class="form-group">
                        <label for="exampleInputEmail1">Seleccionar Evento:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-cog"></i></span>
                            </div>
                            {!! Form::select('roles', $eventos, null , ['class' => 'custom-select', 'wire:model' => 'select', 'placeholder' => 'Seleccione']) !!}
                        </div>
                    </div>
                    <hr>
                @endif

                {{--@if(leerJson(Auth::user()->permisos, 'eventos.create') || Auth::user()->role == 1 || Auth::user()->role == 100)
                    --}}{{--@include('dashboard.administracion.eventos.form')--}}{{--
                @endif--}}

                @include('dashboard.participantes.show_eventos')


            </div>
            <!-- /.card-body -->
            <div class="overlay-wrapper" wire:loading>
                <div class="overlay">
                    <i class="fas fa-2x fa-sync-alt"></i>
                </div>
            </div>
        </div>

    </div>


    <div class="col-md-8">

        @include('dashboard.participantes.show')
        @include('dashboard.participantes.modal')

    </div>



</div>
