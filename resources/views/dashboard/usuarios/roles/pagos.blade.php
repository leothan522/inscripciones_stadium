<div class="card card-gray-dark collapsed-card">
    <div class="card-header">
        <h3 class="card-title">Validar Pagos</h3>

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
                Ver Pagos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'pagos.index')"
                           @if(leerJson($roles_permisos, 'pagos.index')) checked @endif
                           class="custom-control-input" id="customSwitchRoles0Pag">
                    <label class="custom-control-label" for="customSwitchRoles0Pag"></label>
                </div>
            </li>
            <li class="list-group-item">
                Validar Pagos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'pagos.validar')"
                           @if(leerJson($roles_permisos, 'pagos.validar')) checked @endif
                           class="custom-control-input" id="customSwitchRoles1Pagn">
                    <label class="custom-control-label" for="customSwitchRoles1Pagn"></label>
                </div>
            </li>
            {{--<li class="list-group-item">
                Eliminar Eventos
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'eventos.destroy')"
                           @if(leerJson($roles_permisos, 'eventos.destroy')) checked @endif
                           class="custom-control-input" id="customSwitchRoles2Pag">
                    <label class="custom-control-label" for="customSwitchRoles2Pag"></label>
                </div>
            </li>
            <li class="list-group-item">
                Ver Atletas
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'Paginistracion.atletas')"
                           @if(leerJson($roles_permisos, 'Paginistracion.atletas')) checked @endif
                           class="custom-control-input" id="customSwitchRoles3Atl">
                    <label class="custom-control-label" for="customSwitchRoles3Atl"></label>
                </div>
            </li>
            <li class="list-group-item">
                [Registrar|Editar] Atletas
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'atletas.create')"
                           @if(leerJson($roles_permisos, 'atletas.create')) checked @endif
                           class="custom-control-input" id="customSwitchRoles4Atl">
                    <label class="custom-control-label" for="customSwitchRoles4Atl"></label>
                </div>
            </li>--}}
            {{--<li class="list-group-item">
                Roles de Usuarios
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'usuarios.roles')"
                           @if(leerJson($roles_permisos, 'usuarios.roles')) checked @endif
                           class="custom-control-input" id="customSwitchRoles8">
                    <label class="custom-control-label" for="customSwitchRoles8"></label>
                </div>
            </li>--}}
            {{--<li class="list-group-item">
                Descargar Excel
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'usuarios.excel')"
                           @if(leerJson($roles_permisos, 'usuarios.excel')) checked @endif
                           class="custom-control-input" id="customSwitchRoles5">
                    <label class="custom-control-label" for="customSwitchRoles5"></label>
                </div>
            </li>
            <li class="list-group-item">
                Descargar PDF
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'usuarios.pdf')"
                           @if(leerJson($roles_permisos, 'usuarios.pdf')) checked @endif
                           class="custom-control-input" id="customSwitchRoles7">
                    <label class="custom-control-label" for="customSwitchRoles7"></label>
                </div>
            </li>
            <li class="list-group-item">
                Eliminar Usuarios
                <div class="custom-control custom-switch custom-switch-on-success float-right">
                    <input type="checkbox" wire:click="update_roles({{ $rol_id }}, 'usuarios.destroy')"
                           @if(leerJson($roles_permisos, 'usuarios.destroy')) checked @endif
                           class="custom-control-input" id="customSwitchRoles6">
                    <label class="custom-control-label" for="customSwitchRoles6"></label>
                </div>
            </li>--}}
        </ul>

    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
