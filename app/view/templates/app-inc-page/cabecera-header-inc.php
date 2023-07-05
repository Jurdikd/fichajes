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

?>
<!doctype html>
<html dir="ltr" lang="es-VE" id="html5" xmlns="http://www.w3.org/1999/xhtml" lang="es-VE" xml:lang="es-VE" class="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="apple-mobile-web-app-able-content" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <noscript>
        <meta HTTP-EQUIV=" REFRESH" content="0; url=javascript-no-activo">
    </noscript>
    <meta name="author" content="TasaTodayPro" />
    <meta id="meta_descripton" name=" description"
        content="TasaTodayPro es un sito para revisar las tasas y precios de diferentes divisas y criotomonedas como objetivo pricipal enfocado a venezuela solo como información y ayuda lo que se haga con la información es meramente resposabilidad de él o los usuarios que la utilicen">
    <?php
    if (!isset($titulo) || empty($titulo)) {
        $titulo = NOMBRE_PRINCIPAL;
    } else {
        $titulo =  $titulo . " | " . NOMBRE_PRINCIPAL;
    }
    echo "<title>$titulo</title>";

    ?>
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo RUTA_FAVICON; ?>apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo RUTA_FAVICON; ?>favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo RUTA_FAVICON; ?>favicon-16x16.png">
    <link rel="manifest" href="<?php echo RUTA_FAVICON; ?>site.webmanifest">
    <meta name="msapplication-config" content="<?php echo RUTA_FAVICON; ?>browserconfig.xml" />
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>dark.min.css">

    <!-- Animate-->

    <link href="<?php echo RUTA_CSS ?>plugins/animate/animate.min.css" rel="stylesheet">
    <!-- Slim-select-->
    <link href="<?php echo RUTA_CSS ?>plugins/slimselect/slimselect.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo RUTA_CSS ?>style.css">



</head>
<!-- Body -->

<body class="body-page">
    <!-- Preloader -->
    <div id="preloader" class="load crystal-effects">
        <div class="preloader"></div>
        <h5 id="msgPreloader" class="mx-auto text-center tittle-dark"></h5>
    </div>
    <!-- End preloader -->
    <!-- Page Content -->

    <div class="content-page">