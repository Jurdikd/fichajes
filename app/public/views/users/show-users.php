<?php
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();
$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);
if ($user["id_rol"] !== "1" && $user["id_rol"] !== "4") {
    // Código si el id_rol no es igual a 1 ni a 4

    Redireccion::redirigir(RUTA_GENERAL);
}

$titulo = "Ver Usuarios";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php"; ?>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-2">
                <div class="card-header text-center">
                    <h5 class="card-title">USUARIOS | FEDEAV</h5>
                </div>
                <div class="card-body">
                    <div style="max-width: 82%;">
                        <!-- Agrega el estilo max-width -->
                        <table id="tabla-usuarios" class="table table-striped table-responsive" style="max-width: 80%">
                            <thead>
                                <tr>
                                    <th>Imágen</th>
                                    <th>Nombres:</th>
                                    <th>Apellidos:</th>
                                    <th>Fecha de nacimiento:</th>
                                    <th>Sexo:</th>
                                    <th>Cédula:</th>
                                    <th>Usuario:</th>
                                    <th>FEDEAV:</th>
                                    <th>INPRE:</th>
                                    <th>Contacto:</th>
                                    <th>Rol:</th>
                                    <th>Delegación:</th>
                                    <th>Disciplinas:</th>
                                    <th>Registro:</th>
                                    <th>Acciones:</th>
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
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
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
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.js"></script>
<script src=" <?php echo RUTA_JS; ?>views/users/show-users.js"></script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>