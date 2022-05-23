<div class="row justify-content-center">

    <div class="col-md-8">


        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    Pagos Registrados
                </h3>

                <div class="card-tools">

                    {{--<li class="btn dropdown">
                        <button data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                class="btn btn-tool dropdown-toggle ">Filtar por Estatus</button>
                        <ul class="dropdown-menu border-0 shadow">
                            <li>
                                <button type="button" class="dropdown-item" wire:click="listarPagos({{ 1 }})">Por Confirmar</button>
                            </li>
                            <li><a href="#" class="dropdown-item">Validados</a></li>
                            <li><a href="#" class="dropdown-item">NO Verificados</a></li>
                        </ul>
                    </li>--}}
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @include('dashboard.pagos.table')
                @include('dashboard.pagos.modal')

            </div>
        </div>

    </div>

</div>
