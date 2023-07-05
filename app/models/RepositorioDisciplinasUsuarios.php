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

class RepositorioDisciplinasUsuarios
{
    // ...

    public static function insertar_disciplinas_usuario($conexion, $id_disciplina, $id_usuario, $id_usuario_delegado)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO registro_disciplinas_users
                (fk_disciplina, 
                fk_usuario, 
                fk_usuario_delegado)
                VALUES (:fk_disciplina, :fk_usuario, :fk_usuario_delegado)";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':fk_disciplina', $id_disciplina, PDO::PARAM_INT);
                $sentencia->bindParam(':fk_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia->bindParam(':fk_usuario_delegado', $id_usuario_delegado, PDO::PARAM_INT);
                $resultado = $sentencia->execute();

                // Devolver true si la ejecución fue exitosa
                return $resultado;
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        // Devolver false si ocurrió algún error
        return $resultado;
    }
    public static function obtener_disciplinas_usuario($conexion, $id_usuario)
    {
        $resultado = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT
                disciplinas.name_short_disciplina
            FROM
                registro_disciplinas_users
            INNER JOIN disciplinas ON registro_disciplinas_users.fk_disciplina = disciplinas.id_disciplina
            WHERE
              fk_usuario = :fk_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':fk_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia->execute();  // Ejecutar la consulta
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                // Extraer los valores sin las claves
                $resultado = array_column($resultado, 'name_short_disciplina');
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        // Devolver false si ocurrió algún error
        return $resultado;
    }
    public static function obtener_disciplinas_usuarios($conexion, $id_usuario)
    {
        $resultado = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT
                disciplinas.name_disciplina
            FROM
                registro_disciplinas_users
            INNER JOIN disciplinas ON registro_disciplinas_users.fk_disciplina = disciplinas.id_disciplina
            WHERE
              fk_usuario = :fk_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':fk_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia->execute();  // Ejecutar la consulta
                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                // Extraer los valores sin las claves
                $resultado = array_column($resultado, 'name_disciplina');
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        // Devolver false si ocurrió algún error
        return $resultado;
    }
    public static function eliminar_disciplinas_usuario($conexion, $id_usuario)
    {
        $resultado = null;
        if (isset($conexion)) {
            try {
                $sql = "DELETE
                FROM
                    registro_disciplinas_users
                WHERE
                    fk_usuario = :fk_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':fk_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia->execute();  // Ejecutar la consulta

                $resultado = ($sentencia->rowCount() > 0);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            return $resultado;
        }
    }
}