<div class="card card-gray-dark collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Administración</h3>

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
                Ver Eventos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'administracion.eventos')"
                           @if(leerJson($user_permisos, 'administracion.eventos')) checked @endif
                           class="custom-control-input" id="customSwitch0Adm">
                    <label class="custom-control-label" for="customSwitch0Adm"></label>
                </div>
            </li>
            <li class="list-group-item">
                [Crear|Editar] Eventos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'eventos.create')"
                           @if(leerJson($user_permisos, 'eventos.create')) checked @endif
                           class="custom-control-input" id="customSwitch1Admn">
                    <label class="custom-control-label" for="customSwitch1Admn"></label>
                </div>
            </li>
            <li class="list-group-item">
                Eliminar Eventos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'eventos.destroy')"
                           @if(leerJson($user_permisos, 'eventos.destroy')) checked @endif
                           class="custom-control-input" id="customSwitch2Adm">
                    <label class="custom-control-label" for="customSwitch2Adm"></label>
                </div>
            </li>
            {{--<li class="list-group-item">
                Reestablecer Contraseña
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'usuarios.update')"
                           @if(leerJson($user_permisos, 'usuarios.update')) checked @endif
                           class="custom-control-input" id="customSwitch3">
                    <label class="custom-control-label" for="customSwitch3"></label>
                </div>
            </li>--}}
            {{--<li class="list-group-item">
                Permisos de Usuario
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_permisos({{ $user_id }}, 'usuarios.permisos')"
                           @if(leerJson($user_permisos, 'usuarios.permisos')) checked @endif
                           class="custom-control-input" id="customSwitch4">
                    <label class="custom-control-label" for="customSwitch4"></label>
                </div>
            </li>
            <li class="list-group-item">
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
