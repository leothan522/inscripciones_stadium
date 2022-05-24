<div class="card card-gray-dark collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Participantes</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0" wire:ignore.self>

        <ul class="list-group text-sm">
            <li class="list-group-item">
                Ver Participantes
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'participantes.index')"
                           @if(leerJson($user_permisos, 'participantes.index')) checked @endif
                           class="custom-control-input" id="customSwitch0Part">
                    <label class="custom-control-label" for="customSwitch0Part"></label>
                </div>
            </li>
            <li class="list-group-item">
                Descargar Excel
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'participantes.excel')"
                           @if(leerJson($user_permisos, 'participantes.excel')) checked @endif
                           class="custom-control-input" id="customSwitch1Partn">
                    <label class="custom-control-label" for="customSwitch1Partn"></label>
                </div>
            </li>
            {{--<li class="list-group-item">
                Eliminar Eventos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'eventos.destroy')"
                           @if(leerJson($user_permisos, 'eventos.destroy')) checked @endif
                           class="custom-control-input" id="customSwitch2Part">
                    <label class="custom-control-label" for="customSwitch2Part"></label>
                </div>
            </li>
            <li class="list-group-item">
                Ver Atletas
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'Partinistracion.atletas')"
                           @if(leerJson($user_permisos, 'Partinistracion.atletas')) checked @endif
                           class="custom-control-input" id="customSwitch3Atl">
                    <label class="custom-control-label" for="customSwitch3Atl"></label>
                </div>
            </li>
            <li class="list-group-item">
                [Registrar|Editar] Atletas
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'atletas.create')"
                           @if(leerJson($user_permisos, 'atletas.create')) checked @endif
                           class="custom-control-input" id="customSwitch4Atl">
                    <label class="custom-control-label" for="customSwitch4Atl"></label>
                </div>
            </li>--}}
            {{--<li class="list-group-item">
                Roles de Usuarios
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'usuarios.roles')"
                           @if(leerJson($user_permisos, 'usuarios.roles')) checked @endif
                           class="custom-control-input" id="customSwitch8">
                    <label class="custom-control-label" for="customSwitch8"></label>
                </div>
            </li>--}}
            {{--<li class="list-group-item">
                Descargar Excel
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'usuarios.excel')"
                           @if(leerJson($user_permisos, 'usuarios.excel')) checked @endif
                           class="custom-control-input" id="customSwitch5">
                    <label class="custom-control-label" for="customSwitch5"></label>
                </div>
            </li>
            <li class="list-group-item">
                Descargar PDF
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'usuarios.pdf')"
                           @if(leerJson($user_permisos, 'usuarios.pdf')) checked @endif
                           class="custom-control-input" id="customSwitch7">
                    <label class="custom-control-label" for="customSwitch7"></label>
                </div>
            </li>
            <li class="list-group-item">
                Eliminar Usuarios
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'usuarios.destroy')"
                           @if(leerJson($user_permisos, 'usuarios.destroy')) checked @endif
                           class="custom-control-input" id="customSwitch6">
                    <label class="custom-control-label" for="customSwitch6"></label>
                </div>
            </li>--}}
        </ul>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
