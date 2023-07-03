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
                                            <p class="text-center text-ficha-footer m-0"><b>XL JUEGOS DEPORTIVOS
                                                    NACIONALES
                                                    INTERCOLEGIOS DE ABOGADOS DE VENEZUELA - MERIDA 2023</b>
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