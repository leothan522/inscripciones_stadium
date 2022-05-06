<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="/" class="navbar-brand">
            <img src="{{ asset('img/logo_sportec.jpg') }}" alt="SPORTEC Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">SPORTEC</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                @auth
                <li class="nav-item">
                    <a href="#" class="nav-link">Administrador Personal</a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">Planilla de Inscripción</a>
                </li>
                {{-- <li class="nav-item dropdown">
                     <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
                     <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                         <li><a href="#" class="dropdown-item">Some action </a></li>
                         <li><a href="#" class="dropdown-item">Some other action</a></li>

                         <li class="dropdown-divider"></li>

                         <!-- Level two dropdown-->
                         <li class="dropdown-submenu dropdown-hover">
                             <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                             <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                                 <li>
                                     <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                                 </li>

                                 <!-- Level three dropdown-->
                                 <li class="dropdown-submenu">
                                     <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                                     <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                                         <li><a href="#" class="dropdown-item">3rd level</a></li>
                                         <li><a href="#" class="dropdown-item">3rd level</a></li>
                                     </ul>
                                 </li>
                                 <!-- End Level three -->

                                 <li><a href="#" class="dropdown-item">level 2</a></li>
                                 <li><a href="#" class="dropdown-item">level 2</a></li>
                             </ul>
                         </li>
                         <!-- End Level two -->
                     </ul>
                 </li>--}}
                @endauth
            </ul>

            <!-- SEARCH FORM -->
            {{-- <form class="form-inline ml-0 ml-md-3">
                 <div class="input-group input-group-sm">
                     <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                     <div class="input-group-append">
                         <button class="btn btn-navbar" type="submit">
                             <i class="fas fa-search"></i>
                         </button>
                     </div>
                 </div>
             </form>--}}
        </div>

        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">

            <!-- Notifications Dropdown Menu -->
            {{--<li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge">15</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-header">15 Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-envelope mr-2"></i> 4 new messages
                        <span class="float-right text-muted text-sm">3 mins</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-users mr-2"></i> 8 friend requests
                        <span class="float-right text-muted text-sm">12 hours</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-file mr-2"></i> 3 new reports
                        <span class="float-right text-muted text-sm">2 days</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>--}}
            @auth
            <li class="nav-item {{--dropdown--}} user-menu">
                <a href="{{ route('perfil') }}" class="nav-link {{--dropdown-toggle--}}" {{--data-toggle="dropdown"--}}>
                    <img src="{{ asset(verImagen(auth()->user()->profile_photo_path, auth()->user()->name)) }}" class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                {{-- <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                     <!-- User image -->
                     <li class="user-header bg-primary">
                         <img src="{{ asset('img/user.png') }}" class="img-circle elevation-2" alt="User Image">

                         <p>
                             Alexander Pierce - Web Developer
                             <small>Member since Nov. 2012</small>
                         </p>
                     </li>
                    --}}{{-- <!-- Menu Body -->
                     <li class="user-body">
                         <div class="row">
                             <div class="col-4 text-center">
                                 <a href="#">Followers</a>
                             </div>
                             <div class="col-4 text-center">
                                 <a href="#">Sales</a>
                             </div>
                             <div class="col-4 text-center">
                                 <a href="#">Friends</a>
                             </div>
                         </div>
                         <!-- /.row -->
                     </li>--}}{{--
                     <!-- Menu Footer-->
                     <li class="user-footer">
                         <a href="#" class="btn btn-default btn-flat">{{ __('Profile') }}</a>
                         <a href="#" class="btn btn-default btn-flat float-right">{{ __('Logout') }}</a>
                     </li>
                 </ul>--}}
            </li>
            <li class="nav-item">

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf

                    {{--<a class="nav-link" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                    </a>--}}
                    <button class="nav-link btn" @click.prevent="$root.submit();"><i class="fas fa-sign-out-alt"></i></button>
                    {{--<x-jet-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>--}}
                </form>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> {{ __('Login') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        <i class="fas fa-user-plus"></i> {{ __('Register') }}
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
