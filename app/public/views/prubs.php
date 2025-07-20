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
include_once 'app/libraries/classUsuario.php';
include_once "app/libraries/ClaseCrypt.php";
include_once "app/libraries/ControlSesion.php";
## codificar aqui:

$nombre_usuario = "admin";
$password = "2204";
$password2 = "220497";
//verificamos si existe el usuario
$usuarioExiste = RepositorioUsuario::usuario_existe(Conexion::obtener_conexion(), $nombre_usuario);
if ($usuarioExiste) {
    # si usuario existe lo buscamos...

    // buscamos usuario por usuario
    $usuario = RepositorioUsuario::obtener_usuario_por_usuario(Conexion::obtener_conexion(), $nombre_usuario);
    echo $usuario->obtener_clave() . "<br>";
    // veroficamos la clave 
    $clave = Encriptrar::Verificar_Crytp($password, $usuario->obtener_clave());
    //verificamos si los datos de sesion son correctos
    if ($clave) {
        // DATOS DE SESION CORRECTOS SE INICIA SESION
        ControlSesion::iniciar_sesion($usuario->obtener_id_usuario(), $usuario->obtener_usuario());
        // ACTUALIZAR ULTIMO LOGIN

        echo "funciono"; # AVISAMOS QUE EL USUARIO HIZO SESION CORRECTAMENTE
    } else {
        echo "no funciono";
    }
}
echo Encriptrar::Crytp($password2); // Encriptar la clave para mostrarla en el ejemplo
//Encriptrar::Verificar_Crytp($password, $usuario->obtener_clave())

// Preparar la consulta SQL para obtener las disciplinas
$consulta = Conexion::obtener_conexion()->prepare("SELECT * FROM disciplinas");

// Ejecutar la consulta
$consulta->execute();

// Obtener los resultados de la consulta
$disciplinas = $consulta->fetchAll(PDO::FETCH_ASSOC);

// Si hay disciplinas, mostrarlas
if ($disciplinas) {
    echo "<h2>Listado de Disciplinas</h2>";
    echo "<table border=1>";
    echo "<tr><th>ID Disciplina</th><th>Nombre Disciplina</th><th>Nombre Corto</th></tr>";
    foreach ($disciplinas as $disciplina) {
        echo "<tr>";
        echo "<td>" . $disciplina['id_disciplina'] . "</td>";
        echo "<td>" . $disciplina['name_disciplina'] . "</td>";
        echo "<td>" . $disciplina['name_short_disciplina'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron disciplinas en la base de datos.";
}

// Cerrar la conexión a la base de datos
Conexion::cerrar_conexion();



?>
<!DOCTYPE html>
<html lang="es-VE">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo RUTA_CSS ?>bootstrap.min.css.map" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.bootstrap5.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap5.min.css" rel="stylesheet" />


    <title>Filtro de imagen</title>
</head>

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


<body>

    <div class="container-fluid mt-5 ">
        <h1 class="text-center mb-4">Filtro de imagen</h1>
        <img class="img-fluid" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid filterFichaje" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid filterFichaje2" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid filterFichaje3" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid filterFichaje4" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="200" height="200">
        <img class="img-fluid" id="myImage" src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="Imagen" width="200" height="200">
        <input id="colorPicker" type="color">

        <div class="row mt-5 mb-5">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card shadow-ficha text-tiro">
                    <div class="card-body">
                        <h5 class="card-tittle text-center">
                            <span class="fas fa-star text-ficha-discipline"></span>
                            ATLETA
                            <span class="fas fa-star text-ficha-discipline"></span>
                        </h5>
                        <img class="card-img-top card-img-cover rounded filterFichaje2 " src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="" srcset="" width="300" height="300" loading="lazy">
                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-7 ps-0">
                                    <div class="title-container">
                                        <h5 class="card-tittle text-left">JUAN PERDOMO</h5>
                                    </div>
                                </div>
                                <div class="col-5 pe-0">
                                    <ul class="list-unstyled list-group text-end text-ficha-list me-auto">
                                        <li>EDAD: 65 AÑOS</li>
                                        <li>SEXO: MASCULINO</li>
                                        <li>CEDULA: V-7.564.847</li>
                                    </ul>
                                </div>
                                <div class="col-12 ps-0">
                                    <ul class="list-unstyled list-group text-left text-ficha-list">
                                        <li>FEDEAV: 16fsys</li>
                                        <li>INPRE ABOGADO: 1638182</li>
                                        <li>TELÉFONO: 0424-514-03-78</li>
                                        <li>DELEGACIÓN: CARABOBO</li>
                                    </ul>
                                </div>

                                <div class="col-4 mt-4 ps-0">
                                    <p class="text-ficha-discipline">DISCIPLINAS:</p>

                                </div>
                                <div class="col-6 mt-3 ps-0 pe-0">
                                    <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tiro">
                                        <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tiro.svg" alt="tiro" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Dominó">
                                        <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/domino.svg" alt="Dominó" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Ajedrez">
                                        <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/ajedrez.svg" alt="Ajedrez" srcset="" width="30" loading="lazy">
                                    </button>
                                    <button class="btn btn-secondary __ficha-btn-plus rounded-circle text-ficha-list" type="button" data-bs-target="#collapseDiscipline" aria-expanded="false" aria-controls="collapseDiscipline" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Ver más">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>

                                <div class="col-2 mt-2 pe-0">
                                    <img class="img-fluid rounded" src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="Logo FEDEAV" srcset="">
                                </div>
                                <div class="col-12 p-0">
                                    <div class="text-center collapse p-1 pt-0" id="collapseDiscipline">
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30" loading="lazy">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30" loading="lazy">
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
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="card shadow-ficha text-tiro">
                    <div class="card-body">
                        <h5 class="card-tittle text-center">
                            <span class="fas fa-star text-ficha-discipline"></span>
                            ATLETA
                            <span class="fas fa-star text-ficha-discipline"></span>
                        </h5>
                        <img class="card-img-top card-img-cover rounded filterFichaje2 " src="<?php echo RUTA_IMG; ?>users/prub4.JPG" alt="" srcset="" width="300" height="300">
                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-7 ps-0">
                                    <div class="title-container">
                                        <h5 class="card-tittle text-left">ALICIA GONZALES</h5>
                                    </div>
                                </div>
                                <div class="col-5 pe-0">
                                    <ul class="list-unstyled list-group text-end text-ficha-list me-auto">
                                        <li>EDAD: 65 AÑOS</li>
                                        <li>SEXO: MASCULINO</li>
                                        <li>CEDULA: V-7.564.847</li>
                                    </ul>
                                </div>
                                <div class="col-12 ps-0">
                                    <ul class="list-unstyled list-group text-left text-ficha-list">
                                        <li>FEDEAV: 16fsys</li>
                                        <li>INPRE ABOGADO: 1638182</li>
                                        <li>TELÉFONO: 0424-514-03-78</li>
                                        <li>DELEGACIÓN: CARABOBO</li>
                                    </ul>
                                </div>

                                <div class="col-4 mt-4 ps-0">
                                    <p class="text-ficha-discipline">DISCIPLINAS:</p>

                                </div>
                                <div class="col-6 mt-3 ps-0 pe-0">
                                    <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Tiro">
                                        <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/tiro.svg" alt="tiro" srcset="" width="30">
                                    </button>
                                    <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Dominó">
                                        <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/domino.svg" alt="Dominó" srcset="" width="30">
                                    </button>
                                    <button class="btn p-0 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Ajedrez">
                                        <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/ajedrez.svg" alt="Ajedrez" srcset="" width="30">
                                    </button>
                                    <button class="btn btn-secondary __ficha-btn-plus rounded-circle text-ficha-list" type="button" data-bs-target="#collapseDiscipline2" aria-expanded="false" aria-controls="collapseDiscipline2" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Ver más">
                                        <i class="fas fa-plus"></i>
                                    </button>

                                </div>

                                <div class="col-2 mt-2 pe-0">
                                    <img class="img-fluid rounded" src="<?php echo RUTA_IMG; ?>logo/logo-fedeav.JPG" alt="Logo FEDEAV" srcset="">
                                </div>
                                <div class="col-12 p-0">
                                    <div class="collapse p-1 pt-0" id="collapseDiscipline2">
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Softball">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/softball.svg" alt="Softball" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Billar">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/billar.svg" alt="Billar" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30">
                                        </button>
                                        <button class="btn p-1 rounded-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Maraton">
                                            <img class="img-fluid shadow-discipline" src="<?php echo RUTA_IMG; ?>icons/icons-discipline-rounded-solid/maraton.svg" alt="Maraton" srcset="" width="30">
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
            <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                <div class="card" style="width: 20rem;">
                    <div class="card-body">
                        <div class="card-header d-flex align-items-center justify-content-between">
                            <img src="<?php echo RUTA_IMG; ?>users/prub.JPG" alt="JUAN PERDOMO" class="object-fit-cover  object-cover  rounded-circle mr-2 p-1" width="150" height="150">
                            <div>
                                <h5 class="card-title text-right">JUAN PERDOMO</h5>
                            </div>
                        </div>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">EDAD: 65 AÑOS</a>
                            <a href="#" class="list-group-item list-group-item-action">SEXO: MASCULINO</a>
                            <a href="#" class="list-group-item list-group-item-action">CI: 7.564.847</a>
                            <a href="#" class="list-group-item list-group-item-action">FEDEAV: 16fsys</a>
                            <a href="#" class="list-group-item list-group-item-action">TELÉFONO: 0424-514-03-78</a>
                            <a href="#" class="list-group-item list-group-item-action">DELEGACIÓN: CARABOBO</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row p-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="example-table" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidoss</th>
                                    <th>Fecha de nacimiento</th>
                                    <th>SEXO</th>
                                    <th>CEDULA</th>
                                    <th>FEDEAV</th>
                                    <th>INPRE</th>
                                    <th>TELÉFONO</th>
                                    <th>DELEGACIÓN</th>
                                    <th>DISCIPLINAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Juan Andres</td>
                                    <td>Perdomo Ramirez</td>
                                    <td>22/05/1958</td>
                                    <td>MASCULINO</td>
                                    <td>V-7.564.847</td>
                                    <td>16fsys</td>
                                    <td>1638182</td>
                                    <td>0424-514-03-78</td>
                                    <td>CARABOBO</td>
                                    <td>Tiro, Bolas Criollas, Dominó</td>
                                </tr>
                                <tr>
                                    <td>Alicia Maria</td>
                                    <td>Gonzalez Cardozo</td>
                                    <td>02/08/1965</td>
                                    <td>FEMENINO</td>
                                    <td>V-7.564.847</td>
                                    <td>16fsys</td>
                                    <td>1638182</td>
                                    <td>0424-514-03-78</td>
                                    <td>LARA</td>
                                    <td>Tenis de campo, Tiro, Bolas Criollas, Dominó</td>
                                </tr>
                                <!-- Más filas aquí -->
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- javascript-->
    <script src="<?php echo RUTA_JS; ?>bootstrap.bundle.min.js"></script>
    <script src="<?php echo RUTA_JS; ?>bootstrap.bundle.min.js.map"></script>
    <!-- Tabulator -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap5.js"></script>

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
    </script>
    <script>
        document.getElementById('colorPicker').addEventListener('input', function() {
            var color = this.value;
            var image = document.getElementById('myImage');
            console.log(color, colorToHueRotation(color))
            var filter = 'sepia(1) saturate(5) contrast(70%) hue-rotate(' + colorToHueRotation(color) +
                'deg)';
            image.style.filter = filter;
        });

        function colorToHueRotation(color) {
            var hex = color.replace('#', '');
            var r = parseInt(hex.slice(0, 2), 16);
            var g = parseInt(hex.slice(2, 4), 16);
            var b = parseInt(hex.slice(4, 6), 16);
            var max = Math.max(r, g, b);
            var min = Math.min(r, g, b);
            var c = max - min;

            var hue;
            if (c === 0) {
                hue = 0;
            } else if (max === r) {
                hue = ((g - b) / c) % 6;
            } else if (max === g) {
                hue = (b - r) / c + 2;
            } else {
                hue = (r - g) / c + 4;
            }
            hue = Math.round(hue * 60);
            return hue;
        }
    </script>
    <script>
        /*
    $(document).ready(function() {
        $('#example-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy',
                'csv',
                'excel',
                'pdf',
                'print'
            ]
        });
    });*/
    </script>
    <script>
        $(document).ready(function() {
            var table = $('#example-table').DataTable({
                dom: 'Bfrtip',
                responsive: true

            });

            $('#copyButton').on('click', function() {
                table.button('.buttons-copy').trigger();
            });

            $('#csvButton').on('click', function() {
                table.button('.buttons-csv').trigger();
            });

            $('#excelButton').on('click', function() {
                table.button('.buttons-excel').trigger();
            });

            $('#pdfButton').on('click', function() {
                table.button('.buttons-pdf').trigger();
            });

            $('#printButton').on('click', function() {
                table.button('.buttons-print').trigger();
            });
        });
    </script>
</body>

</html>