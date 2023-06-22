<!-- Menu -->
<nav id="navbar" class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class=" container-fluid mx-3">
        <a class="navbar-brand" href="<?php echo RUTA_GENERAL; ?>" dir="ltr">
            <img src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
            FEDEAV
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle nav-calculators" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i> <span
                            data-i18n="app.components.navbar.calculators">Fichajes</span>
                        <span class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo RUTA_CREATE_FICHAJE; ?>">
                                <i class="fas fa-plus-circle"></i>
                                <span data-i18n="app.components.navbar.rate_calculator">Fichar</span>
                                <span class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="<?php echo RUTA_SHOW_FICHAJES; ?>">
                                <i class="fas fa-list"></i>
                                <span data-i18n="app.components.navbar.international_calculator">Ver Fichajes</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-users"></i> <span data-i18n="app.components.navbar.rates">Usuarios</span> <span
                            class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo RUTA_CREATE_FICHAJE; ?>">
                                <i class="fas fa-user-plus"></i>
                                <span data-i18n="app.components.navbar.create_rate">Crear usuario</span> <span
                                    class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                                <i class="fas fa-users"></i>
                                <span data-i18n="app.components.navbar.see_rate">Ver Usuarios</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_DISCIPLINAS;?>">
                        <i class="fas fa-book"></i> <span data-i18n="app.components.navbar.help">Disciplinas</span>
                        <span class="badge bg-info" data-i18n="app.components.navbar.badge.new">Ver</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_HELP; ?>">
                        <i class="fas fa-question-circle"></i> <span data-i18n="app.components.navbar.help">Ayuda</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- End menu -->