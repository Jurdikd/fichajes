<!-- offcanvas-->
<div class="offcanvas offcanvas-start bg-dark text-white" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1"
    id="offcanvasCrateRate" aria-labelledby="offcanvasCrateRateLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasCrateRateLabel"
            data-i18n="app.components.offcanvas.create_rate.tittle">Crear tu
            propia
            tasa
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <p data-i18n="app.components.offcanvas.create_rate.description">¡Puedes crear tasas con el nombre de tú negocio
            o el que
            quieras y
            el valor al cambio que prefieras!</p>
        <div class="row g-3">
            <div class="col-auto">
                <label for="nameCreate" class="visually-show"
                    data-i18n="app.components.offcanvas.create_rate.inputs.name_rate">Nombre
                    de
                    negocio</label>
                <input type="text" class="form-control" id="nameCreate" name="nameCreate" placeholder="MiNegocio">
            </div>
            <div class="col-auto">
                <label for="rateCreate" class="visually-show"
                    data-i18n="app.components.offcanvas.create_rate.inputs.amount_rate">Precio
                    de tasa en VES</label>
                <input type=" number" class="form-control" id="rateCreate" name="rateCreate" placeholder="0.00"
                    value="">
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary mb-3 btnCreateRate" id="btnCreateRate"
                    data-i18n="app.components.offcanvas.create_rate.buttons.create_rate">Crear
                    tasa</button>
            </div>
            <div class="col-12">
                <input dir="ltr" type="url" class="form-control CreateLinkRate" id="resultRateCreate"
                    name="resultRateCreate" placeholder="url" readonly>
                <button class="btn btn-primary m-2" id="copyIcon" style="cursor:pointer;"><i
                        class="fas fa-copy"></i></button>
                <a id="btnUrlShare" class="btn btn-success disabled m-2" href="#" tabindex="-1" role="button"
                    aria-disabled="true" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i></a>
            </div>
            <div class="col-auto">
                <a id="btnUrl" class="btn btn-info disabled" href="#" tabindex="-1" role="button" aria-disabled="true"
                    target="_blank" rel="noopener noreferrer"
                    data-i18n="app.components.offcanvas.create_rate.buttons.see_rate">Ver
                    tasa</a>
            </div>
        </div>
    </div>
</div><!-- End offcanvas-->