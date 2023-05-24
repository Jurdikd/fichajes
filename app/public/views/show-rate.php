<?php
include_once "../app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "../libs/UrlGetTerror.libs.php";
$rate = UrlGetTerror::Getquery("rate");
$total = UrlGetTerror::Getquery("total");
$currency = UrlGetTerror::Getquery("currency");
?>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <?php echo $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include_once "../app/view/templates/components/cards/card-rates.comp.php";
    include_once "../app/view/templates/components/cards/card-calculator.comp.php";
    include_once "../app/view/templates/app-inc-page/cuerpo-body-close.inc.php";
    include_once "../app/view/templates/app-inc-page/pie-footer.inc.php";
?>