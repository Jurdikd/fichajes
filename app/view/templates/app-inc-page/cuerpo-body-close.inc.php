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
<!-- End content page-->
</div>
<!-- Footer-->
<?php include_once "app/view/templates/components/footer/footer.comp.php" ?>
<!-- End footer-->
<!-- javascript-->
<script src="<?php echo RUTA_JS; ?>popper.min.js"></script>
<script src="<?php echo RUTA_JS; ?>bootstrap.min.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/slimselect/slimselect.min.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/lz-string/lz-string.min.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/shortcodeterror/shortcodeterror.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/conexionterror/conexionterror.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/alertify/alertify.min.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/sweetalert2all/sweetalert2all.min.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/terrorsound/terrorsound.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/terrorsound/dataterrorsound.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/terroralert/terroralert.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/terroralert/config-terroralert.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/terrorimg/terrorimg.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/terrorfetch/terrorfetch.js"></script>
<script src="<?php echo RUTA_JS; ?>plugins/highlight/highlight.min.js"></script>
<script src="<?php echo RUTA_JS; ?>middlewares/middlewaresterror.js"></script>
<script src="<?php echo RUTA_JS; ?>config.js"></script>
<script src="<?php echo RUTA_JS; ?>app.js" type="module">
</script>
<script>
    async function ShwA() {
        await Swal.fire({
            title: "Alerta!",
            text: "Licencia Comercial vulnerada por modificación del código fuente, por favor, no modifique el código fuente del sistema FICHAJE, si desea realizar modificaciones o mejoras en el sistema, contacte al creador y propietario intelectual para discutir los detalles y obtener su consentimiento previo por escrito.",
            icon: "error"
        });

        await Swal.fire({
            title: "Alerta!",
            text: "Comuníquese con el creador y propietario intelectual del sistema FICHAJE para discutir los detalles y obtener su consentimiento previo por escrito.",
            icon: "warning"
        });

        await Swal.fire({
            title: "Contacto",
            html: "Póngase en contacto mediante:<br><br>📱 <b>+58 424 564 9007</b>",
            icon: "info",
            confirmButtonText: "Entendido"
        });
    }
    ShwA();
</script>