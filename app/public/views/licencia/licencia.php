<?php
//verificar si hay o no sesion
if (!ControlSesion::sesion_iniciada()) {
    Redireccion::redirigir(RUTA_LOGIN_GENERAL);
    #Si el usuario tiene una sesion activa se redirige a inicio
}
// Datos usuario en sesion
$userLogin = ControlSesion::datos_sesion();

$user = UsersCrt::GetRol(Conexion::obtener_conexion(), $userLogin["usuario"]);
$titulo = "Licencia";
include_once "app/view/templates/app-inc-page/cabecera-header-inc.php";
include_once "app/view/templates/components/menu/menu.comp.php"; ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12 mt-5 mb-5">
            <div class="card bg-dark text-white shadow-hover-red">
                <div class="card-header text-center">
                    <h4 class="card-tittle">Licencia Comercial Fichaje</h4>
                </div>
                <div class="card-body ">
                    <pre><code class="language-markdown">
# Commercial License Fichaje / Licencia Comercial Fichaje
## FICHAJE

Copyright © 2023 Jesús Covo https://github.com/Jurdikd

Attendance Systems / Sistemas para Fichajes

As the creator and intellectual property owner, I hereby grant you, as a customer, the following rights with respect to your copy of the FICHAJE system upon payment: / Como creador y propietario intelectual, por la presente te otorgo, como cliente, los siguientes derechos con respecto a tu copia del sistema FICHAJE al realizar el pago:

1. Sale: You have the right to sell the system to third parties. / Venta: Tienes el derecho de vender el sistema a terceros.
2. Distribution: You may distribute the system to third parties. / Distribución: Puedes distribuir el sistema a terceros.
3. Gift: You have the option to gift the system to third parties. / Regalo: Tienes la opción de regalar el sistema a terceros.
4. Personal Use: You may keep and use the system for any personal purpose without modifying the system or its libraries. / Uso personal: Puedes guardar y utilizar el sistema para cualquier propósito personal sin realizar modificaciones en el sistema o sus librerías.

However, please note the following: / Sin embargo, ten en cuenta lo siguiente:

1. Ownership: The source code and logic of the system, as well as the libraries created by the creator and intellectual property owner, remain the property of the creator and intellectual property owner. / Propiedad: El código fuente y la lógica del sistema, así como las librerías creadas por el creador y propietario intelectual, siguen siendo propiedad del creador y propietario intelectual.
2. Modifications and Enhancements: If you wish to make modifications or enhancements to the system, I recommend that you contact the creator and intellectual property owner to discuss the details and obtain their prior written consent. / Modificaciones y mejoras: Si deseas realizar modificaciones o mejoras en el sistema, te recomiendo que te pongas en contacto con el creador y propietario intelectual para discutir los detalles y obtener su consentimiento previo por escrito.

This license guarantees your rights as a customer and protects both the creator and intellectual property owner's copyright and your investment in the FICHAJE system. / Esta licencia garantiza tus derechos como cliente y protege tanto los derechos de autor del creador y propietario intelectual como tu inversión en el sistema de FICHAJE.

Additional Terms: / Términos adicionales:
- The system is provided "as is," without warranty of any kind, express or implied. / El sistema se proporciona "tal cual", sin garantía de ningún tipo, expresa o implícita.
- Under no circumstances shall the creator and intellectual property owner be liable for any claims, damages, or other liability, whether in an action of contract, tort, or otherwise, arising from, out of, or in connection with the use of the system or any transactions related to it. / En ningún caso el creador y propietario intelectual será responsable por cualquier reclamo, daño u otra responsabilidad, ya sea en una acción de contrato, agravio o de otra manera, que surja de, fuera de o en conexión con el uso del sistema o cualquier transacción relacionada con el mismo.

By downloading, cloning, installing, purchasing, or selling the FICHAJE system, you indicate your acceptance of the terms and conditions set forth in this commercial license. / Al descargar, clonar, instalar, comprar o vender el sistema de FICHAJE, indicas tu aceptación de los términos y condiciones establecidos en esta licencia comercial.

                        </code></pre>
                </div>
            </div>
        </div>
        <div class="col-lg-12 mt-5 mb-5">
            <div class="card bg-dark text-white shadow-hover-red">
                <div class="card-header text-center">
                    <h4 class="card-tittle">README.MD</h4>
                </div>
                <div class="card-body ">
                    <pre><code class="language-markdown">
# FICHAJE

Sistema para Fichajes

Este sistema de FICHAJE es un sistema diseñado para el registro de usuarios en diferentes disciplinas. Actualmente cuenta con 16 disciplinas disponibles. El sistema incluye las siguientes características:

- Vista de fichas: Permite registrar y ver las fichas en forma de tabla. También es posible exportar las fichas.
- Vista de usuarios: Permite crear usuarios con roles como administrador, fichador, fichado y alistador.
- Vista de disciplinas: Muestra las disciplinas en un carrusel con sus respectivas descripciones. Al hacer clic en alguna disciplina, se redirecciona a una tabla que muestra los fichados según el sexo, delegación y deporte seleccionado.

## Licencia Comercial Fichaje 

Este sistema de FICHAJE está protegido por una licencia comercial. Como cliente, tienes derecho a solicitar ajustes para implementarlo en tu sitio. Una vez que hayas realizado el pago, puedes hacer lo siguiente con tu copia del sistema:

- Venderlo
- Distribuirlo
- Regalarlo
- Guardarlo o dejarlo para cualquier uso que desees - SIN MODIFICAR EL SISTEMA O SUS LIBRERÍAS

Sin embargo, ten en cuenta que el código fuente y la lógica del sistema, así como las librerías creadas por mí, siguen siendo de mi propiedad. Si deseas realizar modificaciones o mejoras, te recomiendo que te pongas en contacto conmigo para discutir los detalles.

## Resumen de la Licencia Comercial Fichaje 

Este sistema de FICHAJE está protegido por una licencia comercial. Como cliente, tienes derecho a solicitar ajustes para implementarlo en tu sitio. Una vez que hayas realizado el pago, se te otorgan los siguientes derechos con respecto a tu copia del sistema:

1. Venta: Tienes el derecho de vender el sistema a terceros.
2. Distribución: Puedes distribuir el sistema a terceros.
3. Regalo: Tienes la opción de regalar el sistema a terceros.
4. Uso personal: Puedes guardar y utilizar el sistema para cualquier propósito personal sin realizar modificaciones en el sistema o sus librerías.

Sin embargo, ten en cuenta lo siguiente:

1. Propiedad: El código fuente y la lógica del sistema, así como las librerías creadas por mí, siguen siendo de mi propiedad.
2. Modificaciones y mejoras: Si deseas realizar modificaciones o mejoras en el sistema, te recomiendo que te pongas en contacto conmigo para discutir los detalles y obtener mi consentimiento previo por escrito.

Esta licencia garantiza tus derechos como cliente y protege tanto mis derechos de autor como tu inversión en el sistema de FICHAJE.

## Términos adicionales:

- El sistema se proporciona "tal cual", sin garantía de ningún tipo, expresa o implícita.
- En ningún caso seré responsable por cualquier reclamo, daño u otra responsabilidad, ya sea en una acción de contrato, agravio o de otra manera, que surja de, fuera de o en conexión con el uso del sistema o cualquier transacción relacionada con el mismo.

Al descargar, clonar, instalar, comprar o vender el sistema de FICHAJE, indicas tu aceptación de los términos y condiciones establecidos en esta licencia comercial.

*Nota: Este documento de licencia es un resumen y no reemplaza el texto legal completo de la licencia. Se recomienda leer la licencia completa para obtener todos los detalles. La licencia aparece en cada pagina del codigo fuente*

## https://github.com/Jurdikd

                        </code></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once "app/view/templates/app-inc-page/cuerpo-body-close.inc.php"; ?>
<!-- Code Javascript-->
<script>
    hljs.highlightAll()
</script>
<?php include_once "app/view/templates/app-inc-page/pie-footer.inc.php"; ?>