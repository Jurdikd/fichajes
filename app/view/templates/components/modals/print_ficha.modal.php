<?php

/**
 *
 * # Commercial License Fichaje / Licencia Comercial Fichaje
 * ## FICHAJE
 *
 * Copyright © 2023 Jesús Covo https://github.com/Jurdikd
 * 
 * Attendance Systems / Sistemas para Fichajes
 * 
 * As the creator and intellectual property owner, I hereby grant you, as a customer, the following rights with respect to your copy of the FICHAJE system upon payment: / Como creador y propietario intelectual, por la presente te otorgo, como cliente, los siguientes derechos con respecto a tu copia del sistema FICHAJE al realizar el pago:
 * 
 * 1. Sale: You have the right to sell the system to third parties. / Venta: Tienes el derecho de vender el sistema a terceros.
 * 2. Distribution: You may distribute the system to third parties. / Distribución: Puedes distribuir el sistema a terceros.
 * 3. Gift: You have the option to gift the system to third parties. / Regalo: Tienes la opción de regalar el sistema a terceros.
 * 4. Personal Use: You may keep and use the system for any personal purpose without modifying the system or its libraries. / Uso personal: Puedes guardar y utilizar el sistema para cualquier propósito personal sin realizar modificaciones en el sistema o sus librerías.
 * 
 * However, please note the following: / Sin embargo, ten en cuenta lo siguiente:
 * 
 * 1. Ownership: The source code and logic of the system, as well as the libraries created by the creator and intellectual property owner, remain the property of the creator and intellectual property owner. / Propiedad: El código fuente y la lógica del sistema, así como las librerías creadas por el creador y propietario intelectual, siguen siendo propiedad del creador y propietario intelectual.
 * 2. Modifications and Enhancements: If you wish to make modifications or enhancements to the system, I recommend that you contact the creator and intellectual property owner to discuss the details and obtain their prior written consent. / Modificaciones y mejoras: Si deseas realizar modificaciones o mejoras en el sistema, te recomiendo que te pongas en contacto con el creador y propietario intelectual para discutir los detalles y obtener su consentimiento previo por escrito.
 * 
 * This license guarantees your rights as a customer and protects both the creator and intellectual property owner's copyright and your investment in the FICHAJE system. / Esta licencia garantiza tus derechos como cliente y protege tanto los derechos de autor del creador y propietario intelectual como tu inversión en el sistema de FICHAJE.
 * 
 * Additional Terms: / Términos adicionales:
 * - The system is provided "as is," without warranty of any kind, express or implied. / El sistema se proporciona "tal cual", sin garantía de ningún tipo, expresa o implícita.
 * - Under no circumstances shall the creator and intellectual property owner be liable for any claims, damages, or other liability, whether in an action of contract, tort, or otherwise, arising from, out of, or in connection with the use of the system or any transactions related to it. / En ningún caso el creador y propietario intelectual será responsable por cualquier reclamo, daño u otra responsabilidad, ya sea en una acción de contrato, agravio o de otra manera, que surja de, fuera de o en conexión con el uso del sistema o cualquier transacción relacionada con el mismo.
 * 
 * By downloading, cloning, installing, purchasing, or selling the FICHAJE system, you indicate your acceptance of the terms and conditions set forth in this commercial license. / Al descargar, clonar, instalar, comprar o vender el sistema de FICHAJE, indicas tu aceptación de los términos y condiciones establecidos en esta licencia comercial.
 * 
 **/

?>
<!-- Modal Editar Usuario -->
<div class="modal fade" id="modalPrintFicha" tabindex="-1" aria-labelledby="modalPrintFichaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title" id="modalPrintFichaLabel">Imprimir Ficha</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-12 col-sm-5 col-md-5 col-lg-5 mx-auto">
                        <div class="card shadow-ficha text-tiro" id="userFichaPrint">
                            <div class="card-body">
                                <h5 class="card-tittle text-center">
                                    <span class="fas fa-star text-ficha-discipline"></span>
                                    ATLETA
                                    <span class="fas fa-star text-ficha-discipline"></span>
                                </h5>
                                <img id="previewImg" class="card-img-top card-img-cover rounded filterFichaje2" src="" alt="" srcset="" width="300" height="300" loading="lazy">
                                <div class="container-fluid mt-3">
                                    <div class="row">
                                        <div class="col-7 ps-0">
                                            <div class="title-container">
                                                <h5 class="card-tittle text-left name">####</h5>
                                                <h5 class="card-tittle text-left lastname">#######</h5>
                                            </div>
                                        </div>
                                        <div class="col-5 pe-0">
                                            <ul class="list-unstyled list-group text-end text-ficha-list me-auto">
                                                <li>F. N.: <span class="age">## ####</span></li>
                                                <li>SEXO: <span class="sex">######</span></li>
                                                <li>CEDULA: <span class="cedula">V-#######</span></li>
                                            </ul>
                                        </div>
                                        <div class="col-12 ps-0">
                                            <ul class="list-unstyled list-group text-left text-ficha-list">
                                                <li>FEDEAV: <span class="fedeav">#######</span></li>
                                                <li>INPRE ABOGADO: <span class="inpre">#######</span></li>
                                                <li>TELÉFONO: <span class="telephone">#######</span></li>
                                                <li>DELEGACIÓN: <span class="delegacion">#######"</span></li>
                                            </ul>
                                        </div>

                                        <div class="col-4  mt-4 ps-0">
                                            <p class="text-ficha-discipline">DISCIPLINAS:</p>

                                        </div>
                                        <div id="discpliplines-show" class="col-6 mt-3 ps-0 pe-0">


                                        </div>

                                        <div class="col-2 mt-2 pe-0">
                                            <img class="img-fluid rounded" src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="Logo fedeav" srcset="">
                                        </div>
                                        <div class="col-12 p-0">
                                            <div class="text-center collapse p-1 pt-0" id="collapseDiscipline">

                                            </div>
                                        </div>
                                        <hr class="__ficha-hr">
                                        <div class="col-12">
                                            <p class="text-center text-ficha-footer m-0"><b>XLI JUEGOS DEPORTIVOS NACIONALES INTERCOLEGIOS DE ABOGADOS DE VENEZUELA CARABOBO 2024</b>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-success float-left" id="btn-printFicha" data-id="">Imprimir
                    Ficha</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>