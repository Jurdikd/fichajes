<?php
$titulo = "Disciplinas";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php";
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div id="myCarousel" class="carousel slide mt-2" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item p-2 active">
                    <div class="container">
                        <div class="row">
                            <!-- Resto de las tarjetas -->
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/ajedrez.svg"
                                        class="card-img-top p-2" alt="ajedrez" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Ajedrez</h5>
                                        <p class="card-text">Juego de estrategia y habilidad mental que involucra
                                            movimientos de piezas en un tablero.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/baloncesto.svg"
                                        class="card-img-top p-2" alt="baloncesto" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Baloncesto</h5>
                                        <p class="card-text">Deporte de equipo que se juega con una pelota y cestas en
                                            ambos extremos de la cancha.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg"
                                        class="card-img-top p-2" alt="billar" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Billar</h5>
                                        <p class="card-text">Juego de precisión que se juega con bolas y un taco sobre
                                            una mesa cubierta de paño.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/bolas_criollas.svg"
                                        class="card-img-top p-2" alt="bolas criollas" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Bolas Criollas</h5>
                                        <p class="card-text">Deporte tradicional en el que se lanzan bolas metálicas
                                            para acercarse a un objetivo.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item p-2 ">
                    <div class="container">
                        <div class="row">
                            <!-- Resto de las tarjetas -->
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/boliche.svg"
                                        class="card-img-top p-2" alt="boliche" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Boliche</h5>
                                        <p class="card-text">Juego donde se lanzan bolas hacia un conjunto de bolos
                                            para de derribar la mayor cantidad posible.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/domino.svg"
                                        class="card-img-top p-2" alt="domino" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Domino</h5>
                                        <p class="card-text"> Juego de mesa con fichas rectangulares en las que se
                                            muestran combinaciones de puntos.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/futbol_sala.svg"
                                        class="card-img-top p-2" alt="futbol sala" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Fútbol Sala</h5>
                                        <p class="card-text">Variante del fútbol que se juega en espacios cerrados con
                                            equipos de cinco jugadores.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/kickingball.svg"
                                        class="card-img-top p-2" alt="kickingball" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Kickingball</h5>
                                        <p class="card-text">Deporte similar al béisbol, pero se golpea una pelota con
                                            el pie en lugar de un bate.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="carousel-item p-2 ">
                    <div class="container">
                        <div class="row">
                            <!-- Resto de las tarjetas -->

                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                        class="card-img-top p-2" alt="maraton" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Maratón</h5>
                                        <p class="card-text">Carrera de larga distancia que cubre generalmente una
                                            distancia de
                                            42.195 kilómetros.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/natacion.svg"
                                        class="card-img-top p-2" alt="natacion" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Natación</h5>
                                        <p class="card-text">Deporte acuático en el que los nadadores compiten en
                                            diferentes estilos y distancias.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg"
                                        class="card-img-top p-2" alt="softball" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Softball</h5>
                                        <p class="card-text">Juego similar al béisbol, pero con una pelota más grande y
                                            un campo de juego más pequeño.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tenis_de_campo.svg"
                                        class="card-img-top p-2" alt="tenis de campo" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Tenis de Campo</h5>
                                        <p class="card-text">Deporte de raqueta en el que dos jugadores o parejas se
                                            enfrentan en una cancha rectangular.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item p-2 ">
                    <div class="container">
                        <div class="row">
                            <!-- Resto de las tarjetas -->
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tenis_de_mesa.svg"
                                        class="card-img-top p-2" alt="tenis de mesa" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Tenis de Mesa</h5>
                                        <p class="card-text">Juego de raqueta en el que los jugadores golpean una pelota
                                            sobre una mesa dividida por una red.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tiro.svg"
                                        class="card-img-top p-2" alt="tiro" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Tiro</h5>
                                        <p class="card-text">Actividad en la que se dispara un proyectil hacia un
                                            objetivo utilizando armas de fuego o arcos.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/toros_coleados.svg"
                                        class="card-img-top p-2" alt="toros coleados" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Toros Coleados</h5>
                                        <p class="card-text">Competencia en la que los jinetes deben derribar un toro
                                            agarrándolo por la cola.</p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/voleibol.svg"
                                        class="card-img-top p-2" alt="voleibol" loading="lazy">
                                    <div class="card-body">
                                        <h5 class="card-title">Voleibol</h5>
                                        <p class="card-text">Deporte donde dos equipos se enfrentan en una
                                            cancha dividida por una red, golpeando una pelota.
                                        </p>
                                        <a href="#" class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
</div>

<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php";
?>

<?php
include_once "app/view/templates/app-inc-page/pie-footer.inc.php";
?>