<!-- Template New Calulator -->
<template id="card-new-calculator">
    <div class="card bg-dark text-white shadow-hover-red">
        <div class="card-header">
            <div class="card-tittle">
                <i class="fas fa-calculator"></i> <span data-i18n="calculator.tittle">Elige la tasa y coloca el
                    monto:</span>
            </div>
            <div class="form-group">

                <select id="selectRates" class="selectRates" name="selectRates">
                    <option selected>Elegir...</option>
                </select>
                <h6 class="pt-2 text-info" data-i18n="calculator.options">Ahora puedes hacer calculos Ejemplo: <span class="text-white">10+12-5</span>
                    ó
                    <span class="text-white">3*5/2+2.5</span> ó
                    <span class="text-white">1x2÷2</span>
                </h6>
                <div class="d-flex justify-content-between align-items-center">
                    <label for="amountCalculator" class="text-success labelAmount">
                        <span data-i18n="calculator.amount">Cantidad:</span> <span class="text-sm text-white" id="totalAmount"></span>
                        <small class="newAmountRate text-info">BsD</small>
                    </label>
                    <button class="btn btn-link btn-sm" id="historyBtn" name="historyBtn" role="button" type="button">Historial</button>
                </div>

                <input id="amountNewCalculator" name="amount" class="form-control form-control-sm text-sm" type="text" placeholder="Monto a convertir" aria-label="amountCalculator" value="1">
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="resultCalculator" class="text-success labelResult">
                    <span data-i18n="calculator.result">Resultado:</span>
                    <small class="newResultRate text-info">USD</small>
                </label>
                <div class="input-group">
                    <input id="resultNewCalculator" name="result" class="form-control form-control-sm text-sm" type="number" aria-label="resultCalculator" readonly>
                    <button class="btn btn-secondary btn-sm" id="copyResult" name="copyResult" style="cursor:pointer;" type="button">
                        <i class="fas fa-copy"></i> <span>Copiar</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <div class="text-danger text-xs">

            </div>
            <button class="btn btn-primary btn-md" id="newrateInverter" name="rateInverter" role="button" type="button"><i class="fas fa-exchange-alt"></i> <span data-i18n="calculator.buttons.inverter">Invertir<span /></button>
            <button class="btn btn-success btn-sm" id="newshareRate" name="shareRate" role="button" type="button"><i class="fab fa-whatsapp"></i> <span data-i18n="calculator.buttons.share">Compartir</span></button>
        </div>
    </div>
</template>