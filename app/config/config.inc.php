<?php
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
define("RUTA_HELP", VISTA . "help");

//VISTAS FICHAJES
define("RUTA_CREATE_FICHAJE", VISTA . "create-fichaje");
define("RUTA_SHOW_FICHAJES", VISTA . "show-fichajes");

//VISTA DISCIPLINAS
define("RUTA_DISCIPLINAS", VISTA . "disciplines");

#VISTA DE PRUEBA
define("RUTA_PRUBS", VISTA . "prubs");

#VERIFICACION
define("RUTA_VERIFICACION", VISTA . "verificacion");

//USUARIO
define("RUTA_CALIFICACIONES", VISTA . "calificaciones");
define("RUTA_FAVORITOS", VISTA . "favoritos");
define("RUTA_HISTORIAL", VISTA . "historial");
define("RUTA_TRASANCIONES", VISTA . "transanciones");


//MAS INFORMACION
define("RUTA_MAS_INFORMACION", VISTA . "mas-informacion");

//DENUNCIAS Y RECLAMOS
define("RUTA_DENUNCIAS_RECLAMOS", VISTA . "denuncias-y-reclamos");

//VISTAS ACERCA DE LA SEGURIDAD EN LA PAGINA
define("RUTA_POLITICAS_PRIVACIDAD", VISTA . "politicas-de-privacidad");
define("RUTA_TERMINOS_CONDICIONES", VISTA . "terminos-y-condiciones");


//RUTAS DE REDIRECCIONES ALTERNAS

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