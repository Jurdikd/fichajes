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

//DATOS DEL SITIO

define('NOMBRE_PRINCIPAL', 'Fichajes FEDEAV'); #nombre
/* Rutas de la web
http://localhost/instarapid/
    ** Colocar el url del dominio entre comillas y reemplazarlo con el nombre del dominio final
    Nota si es http o https colocar s porque por defecto viene http
    */
define("HTTPS", $_SERVER["REQUEST_SCHEME"] . "://");
define("DOMINIO", $_SERVER['SERVER_NAME']);
define("PUERTO", $_SERVER['SERVER_PORT']);
// Verificación de servidor de prueba u oficial
$dbSet = false; # verofica si estamos en db de local
if (PUERTO === "80" || PUERTO === "443") {
    define("SERVIDOR", HTTPS . DOMINIO);
    $dbSet = true;
} else {
    define("SERVIDOR", HTTPS . DOMINIO . ":" . PUERTO);
}
// Creacion de base de datos

//información de la base de datos

#NOTA: verificamos sin estamos en prueba o hosting
if ($dbSet === true) {
    #  datos de base de datos online
    define('NOMBRE_SERVIDOR', 'localhost'); #nombre
    define('NOMBRE_USUARIO', 'u646234231_fichaje_fedeav'); #usuario
    define('PASSWORD', 'Fichaje_fedeav2204'); #clave
    define('NOMBRE_BD', 'u646234231_fichaje_fedeav'); #nombre de la base de datos
} else {
    # SI ESTA CORRIENDO LA PRUEBA LOCAL...
    define('NOMBRE_SERVIDOR', 'localhost'); #nombre
    define('NOMBRE_USUARIO', 'root'); #usuario
    define('PASSWORD', ''); #clave
    define('NOMBRE_BD', 'fichajes_fedeav'); #nombre de la base de datos
}
// Variables para hora y zona horaria
define('PAIS_ZONA_HORARIA', 'America/Caracas'); #pais - zona horaria
define('ZONA_HORARIA', '-4:00'); #zona horaria



#Server para admins

/* Rutas de la vista
    ** Vistas de html o php
    */
#define("VISTA", SERVIDOR . "vistas" . "/");
define("VISTA", SERVIDOR . "/");

//copiar esta de ejemplo sin "#" para seguir colocando rutas:

# define("RUTA_", VISTA . ".php");

//VISTAS PRINCIPALES
define("RUTA_GENERAL", VISTA);
define("RUTA_START", VISTA . "start");
define("RUTA_LOGIN_GENERAL", VISTA . "login");
define("RUTA_REGISTER", VISTA . "register");
define("RUTA_LOGOUT_GENERAL", VISTA . "logout");
define("RUTA_LICENCIA", VISTA . "licencia");
define("RUTA_HELP", VISTA . "help");

//VISTAS FICHAJES
define("RUTA_CREATE_FICHAJE", VISTA . "create-fichaje");
define("RUTA_SHOW_FICHAJES", VISTA . "show-fichajes");
//VISTAS FICHAJES
define("RUTA_CREATE_USER", VISTA . "create-user");
define("RUTA_SHOW_USERS", VISTA . "show-users");
//VISTA DISCIPLINAS
define("RUTA_DISCIPLINAS", VISTA . "disciplines");
define("RUTA_DISCIPLINA", VISTA . "discipline");
#VISTA DE PRUEBA
define("RUTA_PRUBS", VISTA . "prubs");



#define("RUTA_MUESTRA", SERVIDOR . "muestras" . "/");

//RECURSOS
define("RUTA_CSS", SERVIDOR . "/app/public/css" . "/");
define("RUTA_JS", SERVIDOR . "/app/public/js" . "/");
define("RUTA_FAVICON", SERVIDOR . "/app/public/img/favicon" . "/");
define("RUTA_IMG", SERVIDOR . "/app/public/img" . "/");
define("DIRECTORIO_RAIZ", realpath(dirname(__FILE__) . "/..")); //para php < 5.3
// realpath(__DIR__."/..") para php 5.3+
@session_start();
@extract($_REQUEST);