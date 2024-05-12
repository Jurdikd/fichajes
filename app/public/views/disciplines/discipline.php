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
if (UrlGetTerror::Getquery("d")) {
    $titulo = "Disciplina | " . strtoupper(UrlGetTerror::Getquery("d"));
    $disciplina = preg_replace("/\s/", "+", strtoupper(UrlGetTerror::Getquery("d"))); // Reemplazar espacios por "+" con expresión regular
} else {
    Redireccion::redirigir(RUTA_DISCIPLINAS);
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);

include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php";
?>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<div class="container mt-5 mb-5">
    <div class="row">
        <?php
        if ($user["id_rol"] == 1) {
            # colocar select para estados...

        ?>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="delegacion" class="form-label">Delegación:</label>
                            <select class="form-control" id="delegacion" name="delegacion">
                                <option></option>
                                <option value="524">Amazonas</option>
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
                                <option value="535">Guárico</option>
                                <option value="536">Lara</option>
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
                                <option value="547">Zulia</option>

                            </select>
                        </div>
                    </div>
                </div>

            </div>
        <?php
        } # MOSTRAR SI ES ADMIN
        ?>
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="sexo" class="form-label">Género:</label>
                        <select class="form-control" id="sexo" name="sexo">
                            <option></option>
                            <option value="1">FEMENINO</option>
                            <option value="2">MASCULINO</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row p-2">
        <div class="col-lg-12">
            <div class="card mt-5 p-4">
                <div class="card-header text-center">
                    <h5 class="card-title">FICHAJES<?php echo " - " . $disciplina; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-width: 100%;">
                        <!-- Agrega el estilo max-width -->
                        <table id="tabla-disciplinas" class="table table-striped" style="width:90%">
                            <thead>
                                <tr>
                                    <th>Imágen</th>
                                    <th>Nombres:</th>
                                    <th>Apellidos:</th>
                                    <th>Fecha de nacimiento:</th>
                                    <th>Sexo:</th>
                                    <th>Cédula:</th>
                                    <th>FEDEAV:</th>
                                    <th>INPRE:</th>
                                    <th>Teléfono:</th>
                                    <th>Delegación:</th>
                                    <th>Disciplina:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí se llenarán dinámicamente los datos de los usuarios -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php";
?>
<!-- Tabulator -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js">
</script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.js"></script>
<!-- Incluye la biblioteca jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src=" <?php echo RUTA_JS; ?>views/disciplines/discipline.js"></script>
<?php
include_once "app/view/templates/app-inc-page/pie-footer.inc.php";
?>