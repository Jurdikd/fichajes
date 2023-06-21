<?php

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

// Ruta de help
$router->register('/help', 'app/public/views/help/help.php');

// Ruta de tasa personalizada
$router->register('/custom', 'app/public/views/custom.php');



/**
 * Rutas de pruebas
 */


// Ruta de email
$router->register('/prubs', 'app/public/views/prubs.php');


//----------------------------------------------------------------------------//