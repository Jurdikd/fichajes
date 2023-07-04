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