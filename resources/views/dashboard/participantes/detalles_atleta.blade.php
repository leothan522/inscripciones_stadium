
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
                <a href="#" class="nav-link">
                    Edad
                    <span class="float-right badge bg-primary">{{ $edad }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Sexo
                    <span class="float-right ">{{ $sexoAtleta }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Celular
                    <span class="float-right ">{{ $celularAtleta }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Club
                    <span class="float-right ">{{ $clubAtleta }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    Pais
                    <span class="float-right ">{{ $paisAtleta }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /.widget-user -->
