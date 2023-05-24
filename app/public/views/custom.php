<?php
include_once "libs/CurlTerror.libs.php";
include_once "libs/FunctionTerror.libs.php";
include_once "libs/UrlGetTerror.libs.php";
if (UrlGetTerror::Getquery("name")) {
    $titulo = UrlGetTerror::Getquery("name") . " - Custom";
} else {
    $titulo = "Custom";
}
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";

?>
<div class="container mt-5">
    <div class="row m-2">
        <h1 class="display-4 text-center text-white"><?php echo UrlGetTerror::Getquery("name"); ?></h1>
        <div class="col-md-4 card-new-calculator mx-auto">

        </div>

    </div>
</div>
<?php
include_once "app/view/templates/components/cards/card-rates.comp.php";
include_once "app/view/templates/components/cards/card-calculator.comp.php";
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php";
?>
<script src="<?php echo RUTA_JS ?>custom.js" type="module">
</script>
<?php
include_once "app/view/templates/app-inc-page/pie-footer.inc.php";
?>