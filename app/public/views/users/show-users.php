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
<!-- Agrega el siguiente código HTML al lugar donde deseas mostrar la modal -->

<!-- Modal Editar Usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form role="form" id="form_edit_user">
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
                                <label for="rol" class="form-label">Rol</label>
                                <select class="form-select" id="rol" name="rol">
                                    <option value="">Seleccione una opción</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">FICHADOR</option>
                                    <option value="3">FICHADO</option>
                                    <option value="4">ALISTADOR</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group mb-3">
                                <label for="delegacion" class="form-label">Delegación</label>

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

                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group mb-3">
                                <label for="clave" class="form-label">Clave</label>
                                <input type="pass" class="form-control" id="clave" name="clave">
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group mb-3">
                                <img id="img-user" class="img-fluid" src="" alt="" width="80" height="80" loading="lazy">
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
                            </select>
                        </div>
                        <button type="submit" id="btn-actualizar" data-id="" class="btn btn-warning">Actualizar</button>

                    </div>
                </form>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
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