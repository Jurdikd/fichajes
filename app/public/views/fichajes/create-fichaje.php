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

if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);
if (intval($user["id_rol"]) !== 1 && intval($user["id_rol"]) !== 2 && intval($user["id_rol"]) !== 4) {
    # code...
    Redireccion::redirigir(RUTA_GENERAL);
}
$titulo = "Crear Fichaje";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php"; ?>

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12 col-sm-7 col-md-7 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-tittle mb-4">Formulario de Registro FICHAJE FEDEAV</h2>
                </div>
                <div class="card-body">
                    <form role="form" id="form_register_user">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="primer-nombre" class="form-label">Primer Nombre</label>
                                    <input type="text" class="form-control" id="primer-nombre" name="primer-nombre">
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="segundo-nombre" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" id="segundo-nombre" name="segundo-nombre">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="primer-apellido" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" id="primer-apellido" name="primer-apellido">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="segundo-apellido" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="segundo-apellido" name="segundo-apellido">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="fecha-nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha-nacimiento" name="fecha-nacimiento">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select class="form-select" id="sexo" name="sexo">
                                        <option value="">Seleccione una opción</option>
                                        <option value="1">FEMENINO</option>
                                        <option value="2">MASCULINO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="cedula" class="form-label">Cédula Venezolana</label>
                                    <input type="text" class="form-control" id="cedula" name="cedula">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="correo" class="form-label">CORREO</label>
                                    <input type="email" class="form-control" id="correo" name="correo">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="inpre-abogado" class="form-label">INPRE ABOGADO</label>
                                    <input type="text" class="form-control" id="inpre-abogado" name="inpre-abogado">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="telefono" class="form-label">Teléfono</label>
                                    <input type="text" class="form-control" id="telefono" name="telefono">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="imagen" class="form-label">Imagen</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group mb-3">
                                    <label for="delegacion" class="form-label">Delegación</label>
                                    <?php
                                    if ($user["id_rol"] == 1) {
                                        # colocar select para estados...

                                    ?>
                                        <select class="form-control" id="delegacion" name="delegacion">
                                            <option></option>
                                            <option value="524">Amazonas</option>
                                            <option value="537">Mérida</option>
                                            <option value="538">Miranda</option>
                                            <option value="539">Monagas</option>
                                            <option value="540">Nueva Esparta</option>
                                            <option value="541">Portuguesa</option>
                                            <option value="542">Sucre</option>
                                            <option value="543">Táchira</option>
                                            <option value="544">Trujillo</option>
                                            <option value="545">Vargas</option>
                                            <option value="546">Yaracuy</option>
                                            <option value="536">Lara</option>
                                            <option value="535">Guárico</option>
                                            <option value="525">Anzoátegui</option>
                                            <option value="526">Apure</option>
                                            <option value="527">Aragua</option>
                                            <option value="528">Barinas</option>
                                            <option value="529">Bolívar</option>
                                            <option value="530">Carabobo</option>
                                            <option value="531">Cojedes</option>
                                            <option value="532">Delta Amacuro</option>
                                            <option value="533">Distrito Capital</option>
                                            <option value="534">Falcón</option>
                                            <option value="547">Zulia</option>
                                        </select>
                                    <?php   } else {
                                        # colocar input text para estado...
                                        $userEstado = UsersCrt::GetEstado(Conexion::obtener_conexion(), $userLogin["usuario"]);
                                    ?>
                                        <input type="text" class="form-control" id="delegacion" name="delegacion" value="<?php echo strtoupper($userEstado["nombre_estado"]); ?>" readonly>
                                    <?php }; ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="disciplinas" class="form-label">Disciplinas</label>
                                <select multiple class="form-control" id="disciplinas" name="disciplinas[]">
                                    <option value="ajedrez">Ajedrez</option>
                                    <option value="baloncesto">Baloncesto</option>
                                    <option value="billar">Billar</option>
                                    <option value="bolas_criollas">Bolas Criollas</option>
                                    <option value="boliche">Boliche</option>
                                    <option value="domino">Domino</option>
                                    <option value="futbol_sala">Fútbol Sala</option>
                                    <option value="kickingball">Kickingball</option>
                                    <option value="maraton">Maratón</option>
                                    <option value="natacion">Natación</option>
                                    <option value="softball">Softball</option>
                                    <option value="tenis_de_campo">Tenis de Campo</option>
                                    <option value="tenis_de_mesa">Tenis de Mesa</option>
                                    <option value="tiro">Tiro</option>
                                    <option value="toros_coleados">Toros Coleados</option>
                                    <option value="voleibol">Voleibol</option>
                                    <option value="golf">Golf</option>
                                    <option value="natacion_aguas_abiertas">Natación Aguas Abiertas</option>
                                    <option value="beach_tenis">Beach Tenis</option>
                                    <option value="padel">Pádel</option>
                                    <option value="futbol_campo_libre">Fútbol campo libre</option>
                                    <option value="futbol_campo_+50">Fútbol campo +50</option>
                                </select>
                            </div>
                            <div class="col-6">

                                <button type="button" class="btn btn-warning mb-3" id="resetButton">Resetear
                                    formulario</button>
                            </div>
                            <button id="btn-submit" type="submit" class="btn btn-primary">Registrar</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-5 col-md-5 col-lg-3">
            <div class="card shadow-ficha text-tiro" id="userFicha">
                <div class="card-body">
                    <h5 class="card-tittle text-center">
                        <span class="fas fa-star text-ficha-discipline"></span>
                        ATLETA
                        <span class="fas fa-star text-ficha-discipline"></span>
                    </h5>
                    <img id="preview" class="card-img-top card-img-cover rounded filterFichaje2" src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="" srcset="" width="300" height="300" loading="lazy">
                    <div class="container-fluid mt-3">
                        <div class="row">
                            <div class="col-7 ps-0">
                                <div class="title-container">
                                    <h5 class="card-tittle text-left name">####</h5>
                                    <h5 class="card-tittle text-left lastname">#######</h5>
                                </div>
                            </div>
                            <div class="col-5 pe-0">
                                <ul class="list-unstyled list-group text-end text-ficha-list me-auto">
                                    <li>EDAD: <span class="age">## ####</span></li>
                                    <li>SEXO: <span class="sex">######</span></li>
                                    <li>CEDULA: <span class="cedula">V-#######</span></li>
                                </ul>
                            </div>
                            <div class="col-12 ps-0">
                                <ul class="list-unstyled list-group text-left text-ficha-list">
                                    <li>FEDEAV: <span class="fedeav">#######</span></li>
                                    <li>INPRE ABOGADO: <span class="inpre">#######</span></li>
                                    <li>TELÉFONO: <span class="telephone">#######</span></li>
                                    <li>DELEGACIÓN: <span class="delegacion"><?php
                                                                                if (isset($userEstado["nombre_estado"])) {
                                                                                    # code...
                                                                                    echo strtoupper($userEstado["nombre_estado"]);
                                                                                } else {
                                                                                    echo "#######";
                                                                                } ?></span>

                                    </li>
                                </ul>
                            </div>

                            <div class="col-4  mt-4 ps-0">
                                <p class="text-ficha-discipline">DISCIPLINAS:</p>

                            </div>
                            <div id="discpliplines-show" class="col-6 mt-3 ps-0 pe-0">


                            </div>

                            <div class="col-2 mt-2 pe-0">
                                <img class="img-fluid rounded" src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="Logo fedeav" srcset="">
                            </div>
                            <div class="col-12 p-0">
                                <div class="text-center collapse p-1 pt-0" id="collapseDiscipline">

                                </div>
                            </div>
                            <hr class="__ficha-hr">
                            <div class="col-12">
                                <p class="text-center text-ficha-discipline m-0"><b>XL JUEGOS DEPORTIVOS NACIONALES
                                        INTERCOLEGIOS DE ABOGADOS DE VENEZUELA - MERIDA 2023</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
<script src=" <?php echo RUTA_JS; ?>views/fichajes/create-fichaje.js"></script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    document.addEventListener("DOMContentLoaded", function() {
        // Inicializa los tooltips
        [...document.querySelectorAll('[data-bs-toggle="tooltip"]')]
        .forEach(el => new bootstrap.Tooltip(el));

        // Selecciona todos los botones con la clase .__ficha-btn-plus
        const collapseButtons = document.querySelectorAll('.__ficha-btn-plus');

        // Recorre todos los botones y agrega el evento click
        collapseButtons.forEach(collapseButton => {
            const collapseTarget = document.querySelector(collapseButton.getAttribute(
                'data-bs-target'));
            const collapse = new bootstrap.Collapse(collapseTarget, {
                toggle: false
            });

            collapseButton.addEventListener('click', () => {
                collapse.toggle();
            });
        });
    });
</script>




<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>
