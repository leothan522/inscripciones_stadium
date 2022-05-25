
<!-- Widget: user widget style 2 -->
<div class="card card-widget widget-user-2">
    <!-- Add the bg color to the header using any of the bg-* classes -->
    <div class="widget-user-header bg-warning">
        <div class="widget-user-image">
            <img class="img-circle elevation-2" src="{{ verFoto($path) }}" alt="User Avatar">
        </div>
        <!-- /.widget-user-image -->
        <h3 class="widget-user-username">{{ $nombreAtleta }}</h3>
        <h5 class="widget-user-desc">{{ $cedulaAtleta }}</h5>
    </div>
    <div class="card-footer p-0">
        <ul class="nav flex-column">
            <li class="nav-item">
                <span class="nav-link">
                    Sexo
                    <span class="float-right text-bold">{{ $sexoAtleta }}</span>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                     F. Nacimiento
                    <span class="float-right text-bold">{{ fecha($fechaAtleta) }}</span>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    Edad
                    <span class="float-right badge bg-primary">{{ $edad }}</span>
                </span>
            </li>
            @if($segundoNombre)
            <li class="nav-item">
                <span class="nav-link">
                    Segundo Nombre
                    <span class="float-right text-bold">{{ $segundoNombre }}</span>
                </span>
            </li>
            @endif
            @if($segundoApellido)
            <li class="nav-item">
                <span class="nav-link">
                    Segundo Apellido
                    <span class="float-right text-bold">{{ $segundoApellido }}</span>
                </span>
            </li>
            @endif
            <li class="nav-item">
                <span class="nav-link">
                    Pais
                    <span class="float-right text-bold">{{ $paisAtleta }}</span>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    Celular
                    <span class="float-right text-bold">{{ $celularAtleta }}</span>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    Club
                    <span class="float-right text-bold">{{ $clubAtleta }}</span>
                </span>
            </li>
            <li class="nav-item">
                <span class="nav-link">
                    Talla Franela
                    <span class="float-right text-bold">{{ $tallaAtleta }}</span>
                </span>
            </li>
        </ul>
    </div>
</div>
<!-- /.widget-user -->
