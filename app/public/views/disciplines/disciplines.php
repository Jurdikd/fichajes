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

if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);
$titulo = "Disciplinas";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php";
?>

<div class="container mt-5 mb-5">
<button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLegend" aria-expanded="false" aria-controls="collapseLegend">
    Leyenda de íconos
  </button>
</p>
<div class="collapse show" id="collapseLegend">
  <div class="card card-body bg-dark text-white">
    <div class="row">

   
    <div class="col-3 col-md-3">
    <ul class="list-group list-group-flush">
    <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/ajedrez.svg" alt="ajedrez" width="30" class="img-fluid me-3">
    Ajedrez
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/baloncesto.svg" alt="baloncesto" width="30" class="img-fluid me-3">
    Baloncesto
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/boliche.svg" alt="boliche" width="30" class="img-fluid me-3">
    Boliche
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/domino.svg" alt="domino" width="30" class="img-fluid me-3">
    Domino
  </li>
  </ul>
    </div>
    <div class="col-3 col-md-3">
    <ul class="list-group list-group-flush">
    <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/futbol_sala.svg" alt="futbol_sala" width="30" class="img-fluid me-3">
    Fútbol Sala
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/kickingball.svg" alt="kickingball" width="30" class="img-fluid me-3">
    Kickingball
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/natacion.svg" alt="natacion" width="30" class="img-fluid me-3">
    Natación
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="softball" width="30" class="img-fluid me-3">
    Softball
  </li>
  </ul>
    </div>
    <div class="col-3 col-md-3">
    <ul class="list-group list-group-flush">
    <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tenis_de_campo.svg" alt="tenis_de_campo" width="30" class="img-fluid me-3">
    Tenis de Campo
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tenis_de_mesa.svg" alt="tenis_de_mesa" width="30" class="img-fluid me-3">
    Tenis de Mesa
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tiro.svg" alt="tiro" width="30" class="img-fluid me-3">
    Tiro
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/.svg" alt="" width="30" class="img-fluid me-3">
    
  </li>
  </ul>
    </div>
    <div class="col-3 col-md-3">
    <ul class="list-group list-group-flush">
    <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/toros_coleados.svg" alt="toros_coleados" width="30" class="img-fluid me-3">
    Toros Coleados
  </li>
  <li class="d-flex align-items-center mb-3">
    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/voleibol.svg" alt="voleibol" width="30" class="img-fluid me-3">
    Voleibol
  </li>
  </ul>
    </div>
    </div>
  </div>
</div>
<h2 class="text-white text-center">Disciplinas</h2>
    <div class="row">
        <div id="diciplinesCarousel" class="carousel slide mt-2" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item p-2 active">
                    <div class="container">
                        <div class="row">
                            <!-- Resto de las tarjetas -->
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=ajedrez">    
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/ajedrez.svg"
                                        class="card-img-top p-2" alt="ajedrez" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Ajedrez</h5>
                                        <p class="card-text">Juego de estrategia y habilidad mental que involucra
                                            movimientos de piezas en un tablero.</p>
                                        
                                            <a href="<?php echo RUTA_DISCIPLINA; ?>?d=ajedrez" class="btn btn-small btn-primary">Ver
                                                más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=baloncesto">          
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/baloncesto.svg"
                                        class="card-img-top p-2" alt="baloncesto" loading="lazy">
                                        </a>
                                     </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Baloncesto</h5>
                                        <p class="card-text">Deporte de equipo que se juega con una pelota y cestas en
                                            ambos extremos de la cancha.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=baloncesto"
                                            class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=billar">  
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg"
                                        class="card-img-top p-2" alt="billar" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Billar</h5>
                                        <p class="card-text">Juego de precisión que se juega con bolas y un taco sobre
                                            una mesa cubierta de paño.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=billar" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=bolas_criollas">  
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/bolas_criollas.svg"
                                        class="card-img-top p-2" alt="bolas criollas" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Bolas Criollas</h5>
                                        <p class="card-text">Deporte tradicional en el que se lanzan bolas metálicas
                                            para acercarse a un objetivo.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=bolas_criollas"
                                            class="btn btn-primary">Ver más</a>
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
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=boliche">  
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/boliche.svg"
                                        class="card-img-top p-2" alt="boliche" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Boliche</h5>
                                        <p class="card-text">Juego donde se lanzan bolas hacia un conjunto de bolos
                                            para de derribar la mayor cantidad posible.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=boliche" class="btn btn-small btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=domino">  
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/domino.svg"
                                        class="card-img-top p-2" alt="domino" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Domino</h5>
                                        <p class="card-text"> Juego de mesa con fichas rectangulares en las que se
                                            muestran combinaciones de puntos.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=domino" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=futbol_sala">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/futbol_sala.svg"
                                        class="card-img-top p-2" alt="futbol sala" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Fútbol Sala</h5>
                                        <p class="card-text">Variante del fútbol que se juega en espacios cerrados con
                                            equipos de cinco jugadores.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=futbol_sala"
                                            class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=kickingball">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/kickingball.svg"
                                        class="card-img-top p-2" alt="kickingball" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Kickingball</h5>
                                        <p class="card-text">Deporte similar al béisbol, pero se golpea una pelota con
                                            el pie en lugar de un bate.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=kickingball"
                                            class="btn btn-primary">Ver más</a>
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
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=maraton">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg"
                                        class="card-img-top p-2" alt="maraton" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Maratón</h5>
                                        <p class="card-text">Carrera de larga distancia en la que participan
                                            diferentes atletas.
                                        </p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=maraton" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=natacion">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/natacion.svg"
                                        class="card-img-top p-2" alt="natacion" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Natación</h5>
                                        <p class="card-text">Deporte acuático en el que los nadadores compiten en
                                            diferentes estilos y distancias.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=natacion" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=softball">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg"
                                        class="card-img-top p-2" alt="softball" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Softball</h5>
                                        <p class="card-text">Juego similar al béisbol, pero con una pelota más grande y
                                            un campo de juego más pequeño.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=softball" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=tenis_de_campo">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tenis_de_campo.svg"
                                        class="card-img-top p-2" alt="tenis de campo" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Tenis de Campo</h5>
                                        <p class="card-text">Deporte de raqueta en el que dos jugadores o parejas se
                                            enfrentan en una cancha rectangular.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=tenis_de_campo"
                                            class="btn btn-primary">Ver más</a>
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
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=tenis_de_mesa">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tenis_de_mesa.svg"
                                        class="card-img-top p-2" alt="tenis de mesa" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Tenis de Mesa</h5>
                                        <p class="card-text">Juego de raqueta en el que los jugadores golpean una pelota
                                            sobre una mesa dividida por una red.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=tenis_de_mesa"
                                            class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=tiro">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tiro.svg"
                                        class="card-img-top p-2" alt="tiro" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Tiro</h5>
                                        <p class="card-text">Actividad en la que se dispara un proyectil hacia un
                                            objetivo utilizando armas de fuego o arcos.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=tiro" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=toros_coleados">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/toros_coleados.svg"
                                        class="card-img-top p-2" alt="toros coleados" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Toros Coleados</h5>
                                        <p class="card-text">Competencia en la que los jinetes deben derribar un toro
                                            agarrándolo por la cola.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=toros_coleados"
                                            class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=voleibol">
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/voleibol.svg"
                                        class="card-img-top p-2" alt="voleibol" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Voleibol</h5>
                                        <p class="card-text">Deporte donde dos equipos se enfrentan en una
                                            cancha dividida por una red, golpeando una pelota.
                                        </p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=voleibol" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#diciplinesCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#diciplinesCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <h2 class="text-white text-center mt-4">Disciplinas Exhibición</h2>
    <div class="row">
        <div id="diciplinesExibitionCarousel" class="carousel slide mt-2" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item p-2 active">
                    <div class="container">
                        <div class="row">
                            <!-- Resto de las tarjetas -->
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=golf">    
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/golf.svg"
                                        class="card-img-top p-2" alt="golf" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Golf</h5>
                                        <p class="card-text">Juego de estrategia y habilidad mental que involucra
                                            movimientos de piezas en un tablero.</p>
                                        
                                            <a href="<?php echo RUTA_DISCIPLINA; ?>?d=golf" class="btn btn-small btn-primary">Ver
                                                más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=natacion_aguas_abiertas">          
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/natacion_aguas_abiertas.svg"
                                        class="card-img-top p-2" alt="natacion_aguas_abiertas" loading="lazy">
                                        </a>
                                     </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Natación Aguas Abiertas</h5>
                                        <p class="card-text">Deporte de equipo que se juega con una pelota y cestas en
                                            ambos extremos de la cancha.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=natacion_aguas_abiertas"
                                            class="btn btn-primary">Ver más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=beach_tenis">    
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/beach_tenis.svg"
                                        class="card-img-top p-2" alt="beach_tenis" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Beach Tenis</h5>
                                        <p class="card-text">Juego de estrategia y habilidad mental que involucra
                                            movimientos de piezas en un tablero.</p>
                                        
                                            <a href="<?php echo RUTA_DISCIPLINA; ?>?d=beach_tenis" class="btn btn-small btn-primary">Ver
                                                más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=padel">          
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/padel.svg"
                                        class="card-img-top p-2" alt="padel" loading="lazy">
                                        </a>
                                     </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Padel</h5>
                                        <p class="card-text">Deporte de equipo que se juega con una pelota y cestas en
                                            ambos extremos de la cancha.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=padel"
                                            class="btn btn-primary">Ver más</a>
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
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=futbol_campo_libre">  
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/futbol_campo_libre.svg"
                                        class="card-img-top p-2" alt="futbol_campo_libre" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Fútbol cámpo libre</h5>
                                        <p class="card-text">Juego donde se lanzan bolas hacia un conjunto de bolos
                                            para de derribar la mayor cantidad posible.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=futbol_campo_libre" class="btn btn-small btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 col-md-3">
                                <div class="card bg-dark text-white">
                                <a href="<?php echo RUTA_DISCIPLINA; ?>?d=futbol_campo_+50">  
                                    <img src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/futbol_campo_+50.svg"
                                        class="card-img-top p-2" alt="futbol_campo_+50" loading="lazy">
                                        </a>
                                    <div class="card-body hide-on-all">
                                        <h5 class="card-title">Fútbol cámpo +50</h5>
                                        <p class="card-text"> Juego de mesa con fichas rectangulares en las que se
                                            muestran combinaciones de puntos.</p>
                                        <a href="<?php echo RUTA_DISCIPLINA; ?>?d=futbol_campo_+50" class="btn btn-primary">Ver
                                            más</a>
                                    </div>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#diciplinesExibitionCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#diciplinesExibitionCarousel" data-bs-slide="next">
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