<?php
$titulo = "Crear Fichaje";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php"; ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans&display=swap');

body {
    font-family: 'Noto Sans', sans-serif;
}

.filterFichaje {
    filter: sepia(1) saturate(3) contrast(70%) hue-rotate(179deg) brightness(1.25) drop-shadow(-3px 4px 6px rgba(0, 0, 0, 0.7));
    /* grayscale(100%) color: #f32545; brightness(1.25) blur(0px)*/
}

.filterFichaje2 {
    filter: sepia(1) saturate(5) contrast(70%) hue-rotate(-50deg) drop-shadow(-3px 4px 6px rgba(0, 0, 0, 0.7));
    /* grayscale(100%) color: #f32545;*/
}

.filterFichaje3 {
    filter: sepia(1) saturate(5) contrast(70%) hue-rotate(20deg) brightness(1.25) drop-shadow(-3px 4px 6px rgba(0, 0, 0, 0.7));
    /* grayscale(100%) color: #f32545;*/
}

.filterFichaje4 {
    opacity: 0.5;
    filter: sepia(1) saturate(7) contrast(70%) hue-rotate(16deg) brightness(1.25) drop-shadow(-3px 4px 6px rgba(0, 0, 0, 0.7));
    /* grayscale(100%) color: #f32545;*/
}



.text-ficha-list {
    font-size: 0.63em;
}

.text-ficha-discipline {
    font-size: 0.78em;
}

.title-container {
    border-left: 2px solid #910909;
    padding-left: 4px;

}

.__ficha-hr {
    border: none;
    opacity: 1;
    border-top: 2px solid #910909;
    margin: 0.2rem 0;
}

.padding-0 {
    padding-left: 0 !important;
    padding-right: 0 !important;
}

.shadow-ficha {
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.25);
}

.shadow-discipline {
    filter: drop-shadow(-3px 4px 2px rgba(0, 0, 0, 0.7));
}

.text-tiro {
    color: #910909;
}

.borderColor {
    border: none !important;
}

.card-img-cover {
    object-fit: cover !important;
    background-position: center !important;
    -webkit-background-size: cover !important;
    -moz-background-size: cover !important;
    -o-background-size: cover !important;
    background-size: cover !important;
}

.__ficha-btn-plus {
    padding: 0.2rem 0.3rem 0.2rem 0.3rem;
    font-size: 0.4rem;
}

.i-stars {
    position: relative;
    display: inline-block;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml;utf8,<svg width='100%' height='100%' viewBox='0 0 100 100' fill='none' xmlns='http://www.w3.org/2000/svg'><path d='M21.6389 10.627L26.75 25.6642H43.3055L29.9166 34.9628L35.0278 50L21.6389 40.7014L8.25 50L13.3611 34.9628L0 25.6642H16.5278L21.6389 10.627Z' fill='white'/><path fill-rule='evenodd' clip-rule='evenodd' d='M41.5045 8.11724L38.8817 0L36.259 8.11724H27.7778L34.634 13.1367L32.0113 21.254L38.8817 16.2345L45.7522 21.254L43.1295 13.1367L50 8.11724H41.5045ZM40.8589 8.34549L39.1765 2.86828L37.4942 8.34549H32.054L36.4519 11.7325L34.7695 17.2097L39.1765 13.8227L43.5835 17.2097L41.9012 11.7325L46.3082 8.34549H40.8589Z' fill='white'/></svg>");
    mix-blend-mode: screen;
    color: colora;
}

/*
@media screen (max-width: 280px) {
    .__ficha-w {
        width: 20rem;
    }
}*/

/* Estilos para dispositivos con ancho de pantalla menor o igual a 280px */
@media (max-width: 330px) {
    .card {
        width: 19.2rem;
    }
}
</style>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-12 col-sm-7 col-md-7 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-tittle mb-4">Formulario de Registro</h2>
                </div>
                <div class="card-body">
                    <form role="form" id="form_register_user">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="primer-nombre" class="form-label">Primer Nombre</label>
                                    <input type="text" class="form-control" id="primer-nombre" name="primer-nombre"
                                        required>
                                </div>
                            </div>

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="segundo-nombre" class="form-label">Segundo Nombre</label>
                                    <input type="text" class="form-control" id="segundo-nombre" name="segundo-nombre">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="primer-apellido" class="form-label">Primer Apellido</label>
                                    <input type="text" class="form-control" id="primer-apellido" name="primer-apellido"
                                        required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="segundo-apellido" class="form-label">Segundo Apellido</label>
                                    <input type="text" class="form-control" id="segundo-apellido"
                                        name="segundo-apellido">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="fecha-nacimiento" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" id="fecha-nacimiento"
                                        name="fecha-nacimiento" required>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label for="sexo" class="form-label">Sexo</label>
                                    <select class="form-select" id="sexo" name="sexo" required>
                                        <option value="">Seleccione una opción</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenino</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="cedula" class="form-label">Cédula Venezolana</label>
                                <input type="text" class="form-control" id="cedula" name="cedula" required>
                            </div>
                            <div class="mb-3">
                                <label for="fedeav" class="form-label">FEDEAV</label>
                                <input type="text" class="form-control" id="fedeav" name="fedeav">
                            </div>
                            <div class="mb-3">
                                <label for="inpre-abogado" class="form-label">INPRE ABOGADO</label>
                                <input type="text" class="form-control" id="inpre-abogado" name="inpre-abogado">
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono" required>
                            </div>
                            <div class="mb-3">
                                <label for="delegacion" class="form-label">Delegación</label>
                                <input type="text" class="form-control" id="delegacion" name="delegacion" required>
                            </div>
                            <div class="mb-3">
                                <label for="disciplinas" class="form-label">Disciplinas</label>
                                <select multiple class="form-control" id="disciplinas" name="disciplinas[]" required>
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
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-5 col-md-5 col-lg-3">
            <div class="card shadow-ficha text-tiro" id="userFicha">
                <div class="card-body">
                    <h5 class="card-tittle text-center">
                        <span class="fas fa-star text-ficha-discipline"></span>
                        ATLETA
                        <span class="fas fa-star text-ficha-discipline"></span>
                    </h5>
                    <img class="card-img-top card-img-cover rounded filterFichaje2 "
                        src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="300" height="300"
                        loading="lazy">
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
                                    <li>EDAD: <span class="age">## ####</span></li>
                                    <li>SEXO: <span class="sex">######</span></li>
                                    <li>CEDULA: <span class="cedula">V-#######</span></li>
                                </ul>
                            </div>
                            <div class="col-12 ps-0">
                                <ul class="list-unstyled list-group text-left text-ficha-list">
                                    <li>FEDEAV: <span class="fedeav">#######</span></li>
                                    <li>INPRE ABOGADO: <span class="inpre">#######</span></li>
                                    <li>TELÉFONO: <span class="telephone">#######</span></li>
                                    <li>DELEGACIÓN: <span class="delegacion">#######</span></li>
                                </ul>
                            </div>

                            <div class="col-4 mt-4 ps-0">
                                <p class="text-ficha-discipline">DISCIPLINAS:</p>

                            </div>
                            <div class="col-6 mt-3 ps-0 pe-0">
                                <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Tiro">
                                    <img class="img-fluid shadow-discipline"
                                        src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tiro.svg"
                                        alt="tiro" srcset="" width="30" loading="lazy">
                                </button>
                                <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Dominó">
                                    <img class="img-fluid shadow-discipline"
                                        src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/domino.svg"
                                        alt="Dominó" srcset="" width="30" loading="lazy">
                                </button>
                                <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Ajedrez">
                                    <img class="img-fluid shadow-discipline"
                                        src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/ajedrez.svg"
                                        alt="Ajedrez" srcset="" width="30" loading="lazy">
                                </button>
                                <button class="btn btn-secondary __ficha-btn-plus rounded-circle text-ficha-list"
                                    type="button" data-bs-target="#collapseDiscipline" aria-expanded="false"
                                    aria-controls="collapseDiscipline" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-custom-class="custom-tooltip" data-bs-title="Ver más">
                                    <i class="fas fa-plus"></i>
                                </button>

                            </div>

                            <div class="col-2 mt-2 pe-0">
                                <img class="img-fluid rounded" src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG"
                                    alt="Logo FEDEAV" srcset="">
                            </div>
                            <div class="col-12 p-0">
                                <div class="text-center collapse p-1 pt-0" id="collapseDiscipline">
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Softball">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg"
                                            alt="Softball" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Billar">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg"
                                            alt="Billar" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Maraton">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                            alt="Maraton" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Softball">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg"
                                            alt="Softball" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Billar">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg"
                                            alt="Billar" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Maraton">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                            alt="Maraton" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Softball">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg"
                                            alt="Softball" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Billar">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg"
                                            alt="Billar" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Maraton">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                            alt="Maraton" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Softball">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg"
                                            alt="Softball" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Billar">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg"
                                            alt="Billar" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Maraton">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                            alt="Maraton" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip"
                                        data-bs-placement="top" data-bs-custom-class="custom-tooltip"
                                        data-bs-title="Maraton">
                                        <img class="img-fluid shadow-discipline"
                                            src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                            alt="Maraton" srcset="" width="30" loading="lazy">
                                    </button>
                                </div>
                            </div>
                            <hr class="__ficha-hr">
                            <div class="col-12">
                                <p class="text-center text-ficha-discipline m-0"><b>XL Juegos Nacionales de
                                        Abogados</b>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>

<script src=" <?php echo RUTA_JS; ?>views/create-fichaje.js"></script>
<script>
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
document.addEventListener("DOMContentLoaded", function() {
    // Inicializa los tooltips
    [...document.querySelectorAll('[data-bs-toggle="tooltip"]')]
    .forEach(el => new bootstrap.Tooltip(el));

    // Selecciona todos los botones con la clase .__ficha-btn-plus
    const collapseButtons = document.querySelectorAll('.__ficha-btn-plus');

    // Recorre todos los botones y agrega el evento click
    collapseButtons.forEach(collapseButton => {
        const collapseTarget = document.querySelector(collapseButton.getAttribute(
            'data-bs-target'));
        const collapse = new bootstrap.Collapse(collapseTarget, {
            toggle: false
        });

        collapseButton.addEventListener('click', () => {
            collapse.toggle();
        });
    });
});
new SlimSelect({
    select: '#disciplinas'
});
</script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>