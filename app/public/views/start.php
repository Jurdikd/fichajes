<?php
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
?>
<div class="container">
    <div class="row m-4">
        <h1 class="mx-auto text-center tittle-dark m-4"><a href="<?php echo RUTA_DONATE; ?>" data-i18n="app.views.start.link.donate">Regálame un café 2$</a>
        </h1>
    </div>
    <div class="row m-2">
        <h4 class="h4 mx-auto text-center text-white" data-i18n="app.views.start.tittles.first">Calculadora para divisas
        </h4>
        <div class="col-md-4 mx-auto card-new-calculator m-2"></div>
    </div>
    <h4 class="h4 mx-auto text-center m-4 text-white" data-i18n="app.views.start.tittles.second">Tasas Principales</h4>
    <div class="row rates m-2">
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card m-2 skeeleton">
                <div class="card-header text-center">
                    <h5 class="card-tittle">Name rate</h5>
                </div>
                <div class="card-body text-center">
                    <span class="card__rate-text">Loading...</span>
                    <button class="btn btn-sm">Elegir</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-6">
            <template>
                <div class="card m-5">
                    <div class="card-header">
                        <h3 class="card-tittle text-center">Caculadora</h3>
                    </div>
                    <div class="card-body text-center">
                        <button class="btn btn-success" disabled>USD a BsD</button>
                        <button class="btn btn-warning">EUR a BsD</button>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger">Puedes escribir el valor de la tasa a la que deseas realizar el cambio.
                        </p>
                        <div class="form-group">
                            <label for="tasaOption" class="text-primary labelTasaOption text-left">Tasa
                                opcional:</label>
                            <input id="tasaOption" class="form-control form-control-sm text-sm" type="number" placeholder="Tasa optional a convertir" aria-label="tasaOption">
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <div class="col-md-6">
            <template>
                <div class="card m-5">
                    <div class="card-header">
                        <h4 class="card-tittle text-center">Caculadora de ganancias o gastos</h3>
                    </div>
                    <div class="card-body text-center">
                        <button class="btn btn-success" disabled>USD a BsD</button>
                        <button class="btn btn-warning">EUR a BsD</button>
                    </div>
                    <div class="card-footer">
                        <p class="text-danger">Puedes escribir el valor de la tasa a la que deseas realizar el cambio.
                        </p>
                        <div class="form-group">
                            <label for="tasaOption" class="text-primary labelTasaOption text-left">Tasa
                                opcional:</label>
                            <input id="tasaOption" class="form-control form-control-sm text-sm" type="number" placeholder="Tasa optional a convertir" aria-label="tasaOption">
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
    <div class="row m-4">
        <div class="col-md-10  mx-auto m-4">
            <div class="h-100 p-5 text-white bg-dark rounded-3 jumbotron">
                <h1 data-i18n="app.views.start.jumbotron.h1">En construcción... TasaToday</h1>
                <p class="lead" data-i18n="app.views.start.jumbotron.p.first">Nuestra misión no es hacer una simple
                    calculadora o
                    ver las tasas al momento...</p>
                <br>
                <p class="lead" data-i18n="app.views.start.jumbotron.p.second">Para nosotros lo importante es que puedas
                    analizar cuanto ganas o pierdes por tasas
                    ¡incluso hasta personalizadas por tí!
                    para ello estamos construyendo este sitio y puedas compartir tu tasa por whatsapp o agregarlo a tu
                    negocio y saber cuanto cotizas al instante solo espera y te sorprenderemos!!
                </p>
            </div>
        </div>
        <div class="col-md-4 mx-auto">
            <?php include_once "app/view/templates/widgets/worldip.widget.php"; ?>
        </div>
    </div>
</div>

<?php
include_once "app/view/templates/components/cards/card-rates.comp.php";
include_once "app/view/templates/components/cards/card-calculator.comp.php";
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>

<script src=" <?php echo RUTA_JS; ?>calculators/calc-rates.js" type="module"></script>
<script src=" <?php echo RUTA_JS; ?>rates/rates.js" type="module"></script>
<script src=" <?php echo RUTA_JS; ?>views/start.js"></script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>