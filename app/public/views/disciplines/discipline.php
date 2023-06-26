<?php
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
if (UrlGetTerror::Getquery("d")) {
    $titulo = "Disciplina | " . UrlGetTerror::Getquery("d");
} else {
    $titulo = "Disciplina";
}
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php";
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="form-group mb-3">
                        <label for="delegacion" class="form-label">Delegación</label>
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
    </div>
</div>

<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php";
?>
<script src=" <?php echo RUTA_JS; ?>views/disciplines/discipline.js"></script>
<?php
include_once "app/view/templates/app-inc-page/pie-footer.inc.php";
?>