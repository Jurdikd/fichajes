<?php
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);
if ($user["id_rol"] !== "1" && $user["id_rol"] !== "2" && $user["id_rol"] !== "4") {
    # code...
    Redireccion::redirigir(RUTA_GENERAL);
}
$userEstado = UsersCrt::GetEstado(Conexion::obtener_conexion(), $userLogin["usuario"]);
$titulo = "Ver Fichajes";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php"; ?>
<link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />
<div class="container mt-5">
    <div class="row p-2">
        <div class="col-lg-12">
            <div class="card mt-5 p-4">
                <div class="card-header text-center">
                    <h5 class="card-title">FICHAJES</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="max-width: 100%;">
                        <!-- Agrega el estilo max-width -->
                        <table id="tabla-fichajes" class="table table-striped" style="width:90%">
                            <thead>
                                <tr>
                                    <th>imagen</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>Sexo</th>
                                    <th>Cédula</th>
                                    <th>FEDEAV</th>
                                    <th>INPRE</th>
                                    <th>Teléfono</th>
                                    <th>Delegación</th>
                                    <th>Disciplinas</th>
                                    <th>Acciones</th>
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

<!-- Modal Editar Usuario -->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" aria-labelledby="modalEditarUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarUsuarioLabel">Editar Fichaje</h5>
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
                                <label for="delegacion" class="form-label">Delegación</label>

                                <input type="text" class="form-control" id="delegacion" name="delegacion" value="<?php echo strtoupper($userEstado["nombre_estado"]); ?>" readonly>

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
include_once "app/view/templates/components/modals/print_ficha.modal.php";
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
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/canvas2image/canvas2image.js"></script>

<script src=" <?php echo RUTA_JS; ?>views/fichajes/show-fichajes.js"></script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>