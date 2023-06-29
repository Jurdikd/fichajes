<?php
//verificar si hay o no sesion
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";

include_once "app/view/templates/components/menu/menu.comp.php"; ?>

<div class="container mt-5">
    <img class="img-fluid mx-auto my-auto" src="<?php echo RUTA_IMG; ?>logo/mascota.fedeav-merida.png" alt="Logo fedeav" srcset="">
</div>

<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>

<script src=" <?php echo RUTA_JS; ?>views/start.js"></script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>