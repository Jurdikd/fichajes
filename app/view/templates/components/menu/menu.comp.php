<?php

/**
 *
 * # Commercial License Fichaje / Licencia Comercial Fichaje
 * ## FICHAJE
 *
 * Copyright © 2023 Jesús Covo https://github.com/Jurdikd
 * 
 * Attendance Systems / Sistemas para Fichajes
 * 
 * As the creator and intellectual property owner, I hereby grant you, as a customer, the following rights with respect to your copy of the FICHAJE system upon payment: / Como creador y propietario intelectual, por la presente te otorgo, como cliente, los siguientes derechos con respecto a tu copia del sistema FICHAJE al realizar el pago:
 * 
 * 1. Sale: You have the right to sell the system to third parties. / Venta: Tienes el derecho de vender el sistema a terceros.
 * 2. Distribution: You may distribute the system to third parties. / Distribución: Puedes distribuir el sistema a terceros.
 * 3. Gift: You have the option to gift the system to third parties. / Regalo: Tienes la opción de regalar el sistema a terceros.
 * 4. Personal Use: You may keep and use the system for any personal purpose without modifying the system or its libraries. / Uso personal: Puedes guardar y utilizar el sistema para cualquier propósito personal sin realizar modificaciones en el sistema o sus librerías.
 * 
 * However, please note the following: / Sin embargo, ten en cuenta lo siguiente:
 * 
 * 1. Ownership: The source code and logic of the system, as well as the libraries created by the creator and intellectual property owner, remain the property of the creator and intellectual property owner. / Propiedad: El código fuente y la lógica del sistema, así como las librerías creadas por el creador y propietario intelectual, siguen siendo propiedad del creador y propietario intelectual.
 * 2. Modifications and Enhancements: If you wish to make modifications or enhancements to the system, I recommend that you contact the creator and intellectual property owner to discuss the details and obtain their prior written consent. / Modificaciones y mejoras: Si deseas realizar modificaciones o mejoras en el sistema, te recomiendo que te pongas en contacto con el creador y propietario intelectual para discutir los detalles y obtener su consentimiento previo por escrito.
 * 
 * This license guarantees your rights as a customer and protects both the creator and intellectual property owner's copyright and your investment in the FICHAJE system. / Esta licencia garantiza tus derechos como cliente y protege tanto los derechos de autor del creador y propietario intelectual como tu inversión en el sistema de FICHAJE.
 * 
 * Additional Terms: / Términos adicionales:
 * - The system is provided "as is," without warranty of any kind, express or implied. / El sistema se proporciona "tal cual", sin garantía de ningún tipo, expresa o implícita.
 * - Under no circumstances shall the creator and intellectual property owner be liable for any claims, damages, or other liability, whether in an action of contract, tort, or otherwise, arising from, out of, or in connection with the use of the system or any transactions related to it. / En ningún caso el creador y propietario intelectual será responsable por cualquier reclamo, daño u otra responsabilidad, ya sea en una acción de contrato, agravio o de otra manera, que surja de, fuera de o en conexión con el uso del sistema o cualquier transacción relacionada con el mismo.
 * 
 * By downloading, cloning, installing, purchasing, or selling the FICHAJE system, you indicate your acceptance of the terms and conditions set forth in this commercial license. / Al descargar, clonar, instalar, comprar o vender el sistema de FICHAJE, indicas tu aceptación de los términos y condiciones establecidos en esta licencia comercial.
 * 
 **/

?>
<!-- Menu -->
<nav id="navbar" class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class=" container-fluid mx-3">
        <a class="navbar-brand" href="<?php echo RUTA_GENERAL; ?>" dir="ltr">
            <img src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
            FEDEAV
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-user"></i>
                        <span"><?php echo $userLogin["usuario"]; ?></span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav mx-auto">
                <?php
                // vista para fichajes
                if ($user["id_rol"] == 1 || $user["id_rol"] == 2 || $user["id_rol"] == 4) {
                    # si el usuario es administrador, fichador o alistador...

                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-calculators" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-exchange-alt"></i> <span>Fichajes</span>
                            <span class="badge bg-danger">Nuevo</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo RUTA_CREATE_FICHAJE; ?>">
                                    <i class="fas fa-plus-circle"></i>
                                    <span>Fichar</span>
                                    <span class="badge bg-danger">Nuevo</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo RUTA_SHOW_FICHAJES; ?>">
                                    <i class="fas fa-list"></i>
                                    <span>Ver Fichajes</span></a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo RUTA_CREATE_SEASON; ?>">
                                    <i class="fas fa-list"></i>
                                    <span>Crear Temporada</span></a>
                            </li>
                        </ul>
                    </li>
                <?php
                } # si el usuario no esta habilitado continua el menu
                // vista para usuarios
                if ($user["id_rol"] == 1 || $user["id_rol"] == 4) {
                    # si el usuario es administrador o alistador...

                ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-users"></i> <span data-i18n="app.components.navbar.rates">Usuarios</span> <span class="badge bg-danger">Nuevo</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo RUTA_CREATE_USER; ?>">
                                    <i class="fas fa-user-plus"></i>
                                    <span>Crear usuario</span> <span class="badge bg-danger">Nuevo</span>
                                </a>
                            </li>
                            <li><a class=" dropdown-item" href="<?php echo RUTA_SHOW_USERS; ?>">
                                    <i class="fas fa-users"></i>
                                    <span>Ver Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php
                } # si el usuario no esta habilitado continua el menu
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_DISCIPLINAS; ?>">
                        <i class="fas fa-book"></i> <span>Disciplinas</span>
                        <span class="badge bg-info">Ver</span>
                    </a>
                </li>

            </ul>
            <?php
            // vista para usuarios
            if ($user["id_rol"] == 1 || $user["id_rol"] == 2 || $user["id_rol"] == 4) {
                # si el usuario es administrador... NEW fichador y alistador

            ?>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-info"></i> <span>Info</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo RUTA_DONWLOAD; ?>estatutos-fedeav2024.pdf" download="estatutos-fedeav2024.pdf" class="btn btn-primary text-white">
                                    <i class="fas fa-download"></i>
                                    <span>Estatutos FEDEAV</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo RUTA_DONWLOAD; ?>estatutos-fedeav2024.pdf" download="estatutos-fedeav2024.pdf" class="btn btn-primary text-white">
                                    <i class="fas fa-download"></i>
                                    <span>Estatutos FEDEAV</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo RUTA_DONWLOAD; ?>estatutos-fedeav2024.pdf" download="estatutos-fedeav2024.pdf" class="btn btn-primary text-white">
                                    <i class="fas fa-download"></i>
                                    <span>Estatutos FEDEAV</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo RUTA_DONWLOAD; ?>carta-fundamental-y-codigo-disciplinario-fedeav2024.pdf" download="carta-fundamental-y-codigo-disciplinario-fedeav2024.pdf" class="btn btn-primary text-white">
                                    <i class="fas fa-download"></i>
                                    <span>Carta Fundamental y Código Disciplinario Fedeav2024</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo RUTA_DONWLOAD; ?>estatutos-fedeav2024.pdf" download="estatutos-fedeav2024.pdf" class="btn btn-primary text-white">
                                    <i class="fas fa-download"></i>
                                    <span>Estatutos FEDEAV</span>
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo RUTA_LICENCE; ?>">
                                    <i class="fas fa-card"></i>
                                    <span>Ver Licencia</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php
            } # si el usuario no esta habilitado continua el menu
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_HELP; ?>">
                        <i class="fas fa-question-circle"></i>
                        <span">Ayuda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTA_LOGOUT_GENERAL; ?>">
                        <i class="fas fa-sign-out"></i> <span>Salir</span>
                    </a>
                </li>
                </ul>
        </div>
    </div>
</nav>
<!-- End menu -->