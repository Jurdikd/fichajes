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

/**
 * Rutas registradas para index
 * Manejador de la clase Router
 */

//RUTAS PRINCIPALES:
// Crear una instancia del enrutador
$router = new Router();

// Ruta de error 404
$router->registerNotFound('app/public/views/404.php');

// Ruta de sin js
$router->register('/javascript-no-activo', 'app/public/views/sin-js.php');

// Ruta de robots.txt
$router->register('/robots.txt', 'app/public/views/robots.txt');

// Ruta de sitemap.xml
$router->register('/sitemap.xml', 'app/public/views/sitemap.xml.php');


//----------------------------------------------------------------------------//

//RUTAS PRINCIPALES:

// Ruta de inicio
$router->register('/', 'app/public/views/start.php');

// Ruta de Login
$router->register('/login', 'app/public/views/login.php');
// Ruta de Login
$router->register('/logout', 'app/public/views/logout.php');

//----------------------------------------------------------------------------//

//RUTAS SECUNDARIAS:

// Ruta de CREAR FICHAJE
$router->register('/create-fichaje', 'app/public/views/fichajes/create-fichaje.php');

// Ruta de VER FICHAJES
$router->register('/show-fichajes', 'app/public/views/fichajes/show-fichajes.php');

// Ruta para VER DISCIPLINAS
$router->register('/disciplines', 'app/public/views/disciplines/disciplines.php');

// Ruta para VER DISCIPLINA
$router->register('/discipline', 'app/public/views/disciplines/discipline.php');
// Ruta de CREAR USUARIOS
$router->register('/create-user', 'app/public/views/users/create-user.php');

// Ruta de VER USUARIOS
$router->register('/show-users', 'app/public/views/users/show-users.php');

//----------------------------------------------------------------------------//
// Ruta de help
$router->register('/help', 'app/public/views/help/help.php');

// Ruta de licencia
$router->register('/licencia', 'app/public/views/licencia/licencia.php');



/**
 * Rutas de pruebas
 */


// Ruta de email
$router->register('/prubs', 'app/public/views/prubs.php');


//----------------------------------------------------------------------------//