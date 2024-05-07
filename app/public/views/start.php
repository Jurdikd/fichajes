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

//verificar si hay o no sesion
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);

include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";

include_once "app/view/templates/components/menu/menu.comp.php"; ?>
<style>
body.count {
    background: #04214e;
}

/* Estilos del contador */
#contador {
    font-family: 'Orbitron', sans-serif;
    font-size: 48px;
    font-weight: bold;
    text-align: center;
    margin-top: 100px;
    color: #ffffff;
}

#contador span {
    display: inline-block;
    perspective: 1000px;
}

/* Estilos para los cohetes */
.rocket-container {
    position: relative;
    width: 100%;
    height: 0;
}

.rocket {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 200px;
    background-image: url('app/public/img/rocket/rocket.png');
    background-size: cover;
    z-index: 100;
    opacity: 0;
}

.explote {
    animation: rocketLaunch 7s ease-out;
    animation-fill-mode: forwards;
    opacity: 1;
}

@keyframes rocketLaunch {
    0% {
        transform: translate(-50%, -50%);
        opacity: 0;
    }

    40% {
        opacity: 0.5;
    }

    60% {
        opacity: 0.7;
    }

    80% {
        opacity: 1;
    }

    100% {
        transform: translate(-50%, -900%);
        opacity: 0;
    }
}

/* Estilos para el contenedor de partículas */
#particles-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap">
<div class="container mt-5">
<h2 class="text-center text-white"> EL SISTEMA SE ENCUENTRA EN MANTENIMIENTO...</h2>
    <div id="particles-container"></div>
    <div id="contador">
        <h3>Comienza: <br> 15/05/2024</h3>
        <h3>Fichajes terminan el:</h3>
        <span id="dateFichaje"></span>
        <h4>Falta:</h4>
        <span id="contadorDate"></span>
    </div>

    <img class="img-fluid mx-auto my-auto mb-3" src="<?php echo RUTA_IMG; ?>logo/fondo-fedeav.svg"
        alt="Fondo fedeav"> 

    <div class="rocket-container">
        <div class="rocket"></div>
    </div>

</div>

<?php
include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src=" <?php echo RUTA_JS; ?>views/start.js"></script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>