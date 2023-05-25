<nav id="navbar" class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class=" container-fluid mx-3">
        <a class="navbar-brand" href="<?php echo RUTA_GENERAL; ?>" dir="ltr">
            <img src="<?php echo RUTA_IMG; ?>/logo/tasatodaypro.png" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
            Tasatoday pro
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
                        <i class="fas fa-calculator"></i> <span
                            data-i18n="app.components.navbar.calculators">Calculadoras</span>
                        <span class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?php echo RUTA_CALCULATOR; ?>">
                                <span data-i18n="app.components.navbar.rate_calculator">Calculadora para tasas</span>
                                <span class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                                <span data-i18n="app.components.navbar.international_calculator">Calculadora
                                    internacional</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-coins"></i> <span data-i18n="app.components.navbar.rates">Tasas</span> <span
                            class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasCrateRate" role="button"
                                aria-controls="offcanvasCrateRate">
                                <span data-i18n="app.components.navbar.create_rate">Crear tasa</span> <span
                                    class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#">
                                <span data-i18n="app.components.navbar.see_rate">Ver
                                    Tasas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_DONATE; ?>">
                        <i class="fas fa-coffee"></i> <span data-i18n="app.components.navbar.donate">Regalar café</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_GENERAL; ?>app/public/apps/tasatodaypro.apk" download>
                        <i class="fas fa-download"></i> <span data-i18n="app.components.navbar.donwload_apk">Descargar
                            APK</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_API; ?>">
                        <i class="fas fa-cogs"></i> <span data-i18n="app.components.navbar.api">Api</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fas fa-globe"></i> <span data-i18n="app.components.navbar.language">Idioma</span>
                        <span class="badge bg-danger" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('es')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/ve.svg" alt="Español"
                                    width="16" height="11" class="me-1"> Español
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('en')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/us.svg" alt="English"
                                    width="16" height="11" class="me-1"> English
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('pt')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/br.svg" alt="Português"
                                    width="16" height="11" class="me-1"> Português
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('zh')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/cn.svg" alt="中国人"
                                    width="16" height="11" class="me-1"> 中国人
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('ar')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/sy.svg" alt="عرب"
                                    width="16" height="11" class="me-1"> عرب
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('ko')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/ko.svg" alt="한국인"
                                    width="16" height="11" class="me-1"> 한국인
                            </a>
                        </li>
                        <li><a class="dropdown-item" href="#" onclick="changeLanguage('ja')">
                                <img src="<?php echo RUTA_IMG; ?>img-flags/svg-flags-circular/jp.svg" alt="日本"
                                    width="16" height="11" class="me-1"> 日本
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_HELP; ?>">
                        <i class="fas fa-question-circle"></i> <span data-i18n="app.components.navbar.help">Ayuda</span>
                        <span class="badge bg-info" data-i18n="app.components.navbar.badge.new">Nuevo</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>