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

class RepositorioUsuario
{

    public static function obtener_fichas_usuarios($conexion, $id_rol, $id_estado = null)
    {
        $arrDatos = null;
        if (isset($conexion)) {
            try {
                if ($id_rol == 1) {
                    $sql = "SELECT usuarios.imagen, usuarios.nombre, usuarios.nombre2, 
                            usuarios.apellido1, usuarios.apellido2, usuarios.cedula, 
                            sexos.nombre_sexo, usuarios.fecha_nacimiento, usuarios.codigo_empleado, 
                            usuarios.inpre_abogado, estatus.id_estatus, usuarios.celular, 
                            usuarios.correo, usuarios.edicion_u, estados_paises.estado_nom,
                            usuarios.registro_u, usuarios.id_usuario 
                            FROM usuarios 
                            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo 
                            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
                            INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
                            WHERE usuarios.nombre != 'admin' AND usuarios.fk_rol != 4 -- Excluir al usuario 'admin'
                            ORDER BY usuarios.registro_u DESC";

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->execute();
                } else {
                    $sql = "SELECT usuarios.imagen, usuarios.nombre, usuarios.nombre2, 
                            usuarios.apellido1, usuarios.apellido2, usuarios.cedula, 
                            sexos.nombre_sexo, usuarios.fecha_nacimiento, usuarios.codigo_empleado, 
                            usuarios.inpre_abogado, estatus.id_estatus, usuarios.celular, 
                            usuarios.correo, usuarios.edicion_u, estados_paises.estado_nom,
                            usuarios.registro_u, usuarios.id_usuario 
                            FROM usuarios 
                            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo 
                            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
                            INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
                            WHERE usuarios.fk_estado = :id_estado
                            AND usuarios.nombre != 'admin' AND usuarios.fk_rol != 4-- Excluir al usuario 'admin'
                            ORDER BY usuarios.registro_u DESC";

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
                    $sentencia->execute();
                }


                $arrDatos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }
    public static function obtener_usuarios($conexion, $id_rol, $id_estado = null)
    {
        $arrDatos = null;
        if (isset($conexion)) {
            try {
                if ($id_rol == 1 || $id_rol == 4) {
                    $sql = "SELECT usuarios.imagen, usuarios.nombre, usuarios.nombre2, 
                            usuarios.apellido1, usuarios.apellido2, usuarios.cedula, 
                            sexos.nombre_sexo, usuarios.fecha_nacimiento, usuarios.usuario, usuarios.codigo_empleado, 
                            usuarios.inpre_abogado, estatus.id_estatus, usuarios.celular, 
                            usuarios.correo, usuarios.edicion_u, estados_paises.estado_nom,
                            usuarios.registro_u, usuarios.id_usuario, rol.nombre_rol,
                            rol.codigo_rol
                            FROM usuarios 
                            INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
                            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo 
                            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
                            INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
                            WHERE usuarios.nombre != 'admin' -- Excluir al usuario 'admin'
                            ORDER BY usuarios.registro_u DESC";

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->execute();
                } else {
                    $sql = "SELECT usuarios.imagen, usuarios.nombre, usuarios.nombre2, 
                            usuarios.apellido1, usuarios.apellido2, usuarios.cedula, 
                            sexos.nombre_sexo, usuarios.fecha_nacimiento, usuarios.usuario, usuarios.codigo_empleado, 
                            usuarios.inpre_abogado, estatus.id_estatus, usuarios.celular, 
                            usuarios.correo, usuarios.edicion_u, estados_paises.estado_nom,
                            usuarios.registro_u, usuarios.id_usuario, rol.nombre_rol,
                            rol.codigo_rol
                            FROM usuarios 
                            INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
                            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo 
                            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
                            INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
                            WHERE usuarios.fk_estado = :id_estado
                            AND usuarios.nombre != 'admin' -- Excluir al usuario 'admin'
                            ORDER BY usuarios.registro_u DESC";

                    $sentencia = $conexion->prepare($sql);
                    $sentencia->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
                    $sentencia->execute();
                }

                $arrDatos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }
    public static function obtener_usuario_por_id_simple($conexion, $id_usuario)
    {
        $arrDatos = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT usuarios.imagen, usuarios.nombre, usuarios.nombre2, 
                            usuarios.apellido1, usuarios.apellido2, usuarios.cedula, 
                            sexos.id_sexo, usuarios.fecha_nacimiento, usuarios.usuario, usuarios.codigo_empleado, 
                            usuarios.inpre_abogado, estatus.id_estatus, usuarios.celular, 
                            usuarios.correo, usuarios.edicion_u,estados_paises.id_estado_pais, estados_paises.estado_nom,
                            usuarios.registro_u, usuarios.id_usuario, rol.nombre_rol,
                            rol.id_rol
                            FROM usuarios 
                            INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
                            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo 
                            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
                            INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
                            WHERE usuarios.id_usuario = :id_usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
                $sentencia->execute();


                $arrDatos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }
    public static function obtener_fichas_usuarios_por_estado($conexion, $id_estado, $name_short_disciplina, $id_sexo)
    {

        $arrDatos = null;
        if (isset($conexion)) {
            try {

                $sql = "SELECT
                usuarios.imagen,
                usuarios.nombre,
                usuarios.nombre2,
                usuarios.apellido1,
                usuarios.apellido2,
                usuarios.cedula,
                sexos.nombre_sexo,
                usuarios.fecha_nacimiento,
                usuarios.codigo_empleado,
                usuarios.inpre_abogado,
                estatus.id_estatus,
                usuarios.celular,
                usuarios.correo,
                disciplinas.name_disciplina,
                usuarios.edicion_u,
                estados_paises.estado_nom,
                usuarios.registro_u,
                usuarios.id_usuario
            FROM
                usuarios
            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo
            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
            INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
            JOIN registro_disciplinas_users ON usuarios.id_usuario = registro_disciplinas_users.fk_usuario
            JOIN disciplinas ON registro_disciplinas_users.fk_disciplina = disciplinas.id_disciplina
            WHERE
                1 AND usuarios.fk_estado = :id_estado  
                AND disciplinas.name_short_disciplina = :name_short_disciplina
                AND usuarios.fk_sexo = :id_sexo
                    ORDER BY usuarios.registro_u DESC";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_estado', $id_estado, PDO::PARAM_INT);
                $sentencia->bindParam(':id_sexo', $id_sexo, PDO::PARAM_INT);
                $sentencia->bindParam(':name_short_disciplina', $name_short_disciplina, PDO::PARAM_STR);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }
    public static function obtener_usuario($conexion, $id_usuario)
    {
        $resultado = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT usuario FROM usuarios WHERE id_usuario = :id_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

                $sentencia->execute();

                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $resultado;
    }
    public static function obtener_clave_usuario($conexion, $id_usuario)
    {
        $resultado = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT clave FROM usuarios WHERE id_usuario = :id_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

                $sentencia->execute();

                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $resultado;
    }
    public static function obtener_codigo_empleado_usuario($conexion, $id_usuario)
    {
        $resultado = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT codigo_empleado FROM usuarios WHERE id_usuario = :id_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

                $sentencia->execute();

                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $resultado;
    }
    public static function obtener_img_usuario($conexion, $id_usuario)
    {
        $resultado = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT imagen FROM usuarios WHERE id_usuario = :id_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $resultado;
    }
    public static function mostrar_usuarios_tutores($conexion, $cargo)
    {

        $arrDatos = null;
        if (isset($conexion)) {
            try {

                $sql = "SELECT
                usuarios.id_usuario,
                usuarios.nombre,
                usuarios.nombre2,
                usuarios.apellidos,
                usuarios.cedula,
                sexos.nombre_sexo,
                usuarios.usuario,
                usuarios.codigo_empleado,
                rol.nombre_rol,
                rol.codigo_rol,
                cargo.nombre_cargo,
                cargo.codigo_cargo,
                estatus.nombre_estatus,
                usuarios.correo,
                usuarios.correo2,
                usuarios.ciudad,
                paises.nombre_pais,
                paises.iso
                FROM
                usuarios
            INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo
            INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
            INNER JOIN cargo ON usuarios.fk_cargo = cargo.id_cargo
            INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
            INNER JOIN paises ON usuarios.fk_pais = paises.id_pais_origen
            WHERE
                (usuarios.fk_rol <= 2 AND usuarios.usuario != 'admin') AND usuarios.fk_cargo = :cargo
            ORDER BY
                usuarios.nombre
                ASC";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':cargo', $cargo, PDO::PARAM_INT);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }

    public static function obtener_numero_usuarios($conexion)
    {
        $total_usuarios = null;

        if (isset($conexion)) {
            try {
                $sql = "SELECT COUNT(*) as total FROM usuarios WHERE id_usuario != 1";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                $total_usuarios = $resultado['total'];
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $total_usuarios;
    }

    public static function insertar_usuario(
        $conexion,
        $nombre,
        $nombre2,
        $apellidos,
        $cedula,
        $fk_sexo,
        $fecha_nacimiento,
        $usuario,
        $codigoEmpleado,
        $tlf,
        $tlf2,
        $correo,
        $correo2,
        $pais,
        $ciudad,
        $clave,
        $fk_rol,
        $fk_cargo,
        $imagen
    ) {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre, nombre2, apellidos, cedula, fk_sexo, fecha_nacimiento, usuario, codigo_empleado,
                    celular, celular2, correo, correo2, fk_pais, ciudad, clave, fk_rol, fk_cargo, imagen, registro_u) 
                    VALUES(:nombre, :nombre2, :apellidos, :cedula, :fk_sexo, :fecha_nacimiento, :usuario, :codigo_empleado,
                    :celular, :celular2, :correo, :correo2, :fk_pais, :ciudad, :clave, :fk_rol, :fk_cargo, :imagen, NOW() )";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->bindParam(':nombre2', $nombre2, PDO::PARAM_STR);
                $sentencia->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
                $sentencia->bindParam(':cedula', $cedula, PDO::PARAM_STR);
                $sentencia->bindParam(':fk_sexo', $fk_sexo, PDO::PARAM_INT);
                $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento, PDO::PARAM_STR);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empleado', $codigoEmpleado, PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $tlf, PDO::PARAM_STR);
                $sentencia->bindParam(':celular2', $tlf2, PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $correo, PDO::PARAM_STR);
                $sentencia->bindParam(':correo2', $correo2, PDO::PARAM_STR);
                $sentencia->bindParam(':fk_pais', $pais, PDO::PARAM_INT);
                $sentencia->bindParam(':ciudad', $ciudad, PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $clave, PDO::PARAM_STR);
                $sentencia->bindParam(':fk_rol', $fk_rol, PDO::PARAM_INT);
                $sentencia->bindParam(':fk_cargo', $fk_cargo, PDO::PARAM_INT);
                $sentencia->bindParam(':imagen', $imagen, PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }
    public static function registrar_usuario($conexion, $userDataRegister)
    {

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre, nombre2, apellido1, apellido2, cedula, 
                fk_sexo, fecha_nacimiento, usuario, clave, codigo_empleado, inpre_abogado, celular,
                 correo, fk_estado, fk_rol, imagen) 
                    VALUES(:nombre, :nombre2, :apellido1, :apellido2, :cedula, :fk_sexo, 
                    :fecha_nacimiento, :usuario, :clave, :codigo_empleado, :inpre_abogado,
                    :celular, :correo, :fk_estado, :fk_rol, :imagen)";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $userDataRegister['nombre'], PDO::PARAM_STR);
                $sentencia->bindParam(':nombre2', $userDataRegister['nombre2'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido1', $userDataRegister['apellido1'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido2', $userDataRegister['apellido2'], PDO::PARAM_STR);
                $sentencia->bindParam(':cedula', $userDataRegister['cedula'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_sexo', $userDataRegister['fk_sexo'], PDO::PARAM_INT);
                $sentencia->bindParam(':fecha_nacimiento', $userDataRegister['fecha_nacimiento'], PDO::PARAM_STR);
                $sentencia->bindParam(':usuario', $userDataRegister['usuario'], PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $userDataRegister['clave'], PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empleado', $userDataRegister['codigo_empleado'], PDO::PARAM_STR);
                $sentencia->bindParam(':inpre_abogado', $userDataRegister['inpre_abogado'], PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $userDataRegister['celular'], PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $userDataRegister['correo'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_estado', $userDataRegister['fk_estado'], PDO::PARAM_INT);
                $sentencia->bindParam(':fk_rol', $userDataRegister['fk_rol'], PDO::PARAM_STR);
                $sentencia->bindParam(':imagen', $userDataRegister['imagen'], PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }
    public static function registrar_usuario_ficha($conexion, $userDataRegister)
    {

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuarios(nombre, nombre2, apellido1, apellido2, cedula, 
                fk_sexo, fecha_nacimiento, usuario, codigo_empleado, inpre_abogado, celular,
                 correo, fk_estado, fk_rol, imagen) 
                    VALUES(:nombre, :nombre2, :apellido1, :apellido2, :cedula, :fk_sexo, 
                    :fecha_nacimiento, :usuario, :codigo_empleado, :inpre_abogado,
                    :celular, :correo, :fk_estado, :fk_rol, :imagen)";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $userDataRegister['nombre'], PDO::PARAM_STR);
                $sentencia->bindParam(':nombre2', $userDataRegister['nombre2'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido1', $userDataRegister['apellido1'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido2', $userDataRegister['apellido2'], PDO::PARAM_STR);
                $sentencia->bindParam(':cedula', $userDataRegister['cedula'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_sexo', $userDataRegister['fk_sexo'], PDO::PARAM_INT);
                $sentencia->bindParam(':fecha_nacimiento', $userDataRegister['fecha_nacimiento'], PDO::PARAM_STR);
                $sentencia->bindParam(':usuario', $userDataRegister['usuario'], PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_empleado', $userDataRegister['codigo_empleado'], PDO::PARAM_STR);
                $sentencia->bindParam(':inpre_abogado', $userDataRegister['inpre_abogado'], PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $userDataRegister['celular'], PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $userDataRegister['correo'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_estado', $userDataRegister['fk_estado'], PDO::PARAM_INT);
                $sentencia->bindParam(':fk_rol', $userDataRegister['fk_rol'], PDO::PARAM_STR);
                $sentencia->bindParam(':imagen', $userDataRegister['imagen'], PDO::PARAM_STR);

                $usuario_insertado = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_insertado;
    }
    public static function insertar_patron_usuario($conexion, $usuario, $patron)
    {
        $patron_insertado = "";

        if (isset($conexion)) {
            try {
                $sql = "UPDATE usuarios SET patron = :patron WHERE id_usuario = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':patron', $patron, PDO::PARAM_STR);
                $sentencia->bindParam(':id', $usuario, PDO::PARAM_INT);

                $resultado = $sentencia->execute();
                if ($resultado == TRUE) {
                    $patron_insertado = true;
                    return $patron_insertado;
                } elseif ($resultado == FALSE) {
                    $patron_insertado = false;
                    return $patron_insertado;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
    }
    public static function cambiar_estatus_usuario($conexion, $usuario, $estatus)
    {
        $estatus_actualizado = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE usuarios SET fk_estatus = :fk_estatus WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':fk_estatus', $estatus, PDO::PARAM_INT);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $resultado = $sentencia->execute();
                if ($resultado == true) {
                    $estatus_actualizado = true;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $estatus_actualizado;
    }

    public static function nombre_existe($conexion, $nombre)
    {
        $nombre_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE nombre = :nombre";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $nombre_existe = true;
                } else {
                    $nombre_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $nombre_existe;
    }
    public static function usuario_existe($conexion, $usuario)
    {
        $usuario_existe = false;

        if (isset($conexion)) {
            try {
                $sql = "SELECT usuario FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $usuario_existe = true;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario_existe;
    }
    public static function ci_existe($conexion, $ci)
    {
        $ci_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT cedula FROM usuarios WHERE cedula = :ci";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':ci', $ci, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $ci_existe = true;
                } else {
                    $ci_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $ci_existe;
    }
    public static function clave_existe($conexion, $usuario, $clave)
    {
        $resultado = false;

        if (isset($conexion)) {
            try {
                $sql = "SELECT clave FROM usuarios WHERE usuario = :usuario AND clave = :clave";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $clave, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = ($sentencia->rowCount() > 0);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $resultado;
    }
    public static function email_existe($conexion, $email)
    {
        $email_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuarios WHERE email = :email";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':email', $email, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $email_existe = true;
                } else {
                    $email_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $email_existe;
    }

    public static function obtener_usuario_por_usuario($conexion, $usuario)
    {
        $nick = null;

        if (isset($conexion)) {
            try {


                $sql = "SELECT usuarios.id_usuario,
                usuarios.nombre,
                usuarios.nombre2,
                usuarios.apellido1,
                usuarios.apellido2,
                usuarios.cedula,
                sexos.id_sexo,
                sexos.iso_sexo,
                sexos.nombre_sexo,
                usuarios.fecha_nacimiento,
                usuarios.usuario,
                usuarios.clave,
                usuarios.patron,
                usuarios.codigo_empleado,
                usuarios.celular,
                usuarios.correo,
                estados_paises.id_estado_pais,
                estados_paises.estado_nom,
                usuarios.fk_pais,
                paises.nombre_pais,
                usuarios.fk_rol,
                rol.nombre_rol,
                rol.codigo_rol,
                usuarios.fk_cargo,
                cargo.nombre_cargo,
                cargo.codigo_cargo,
                usuarios.imagen,
                usuarios.fk_estatus,
                estatus.nombre_estatus,
                usuarios.ultimo_login,
                usuarios.edicion_u,
                usuarios.registro_u
        FROM usuarios
        INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
        INNER JOIN cargo ON usuarios.fk_cargo = cargo.id_cargo
        INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo
        INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
        INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
        INNER JOIN paises ON usuarios.fk_pais = paises.id_pais_origen
        WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $nick = $resultado;
                    $nick = new Usuario(
                        $resultado['id_usuario'],
                        $resultado['nombre'],
                        $resultado['nombre2'],
                        $resultado['apellido1'],
                        $resultado['apellido2'],
                        $resultado['cedula'],
                        $resultado['id_sexo'],
                        $resultado['iso_sexo'],
                        $resultado['nombre_sexo'],
                        $resultado['fecha_nacimiento'],
                        $resultado['usuario'],
                        stripslashes($resultado['clave']), #stripslashes PARA ESCAPAR BARRAS INVERTIDAS
                        $resultado['patron'],
                        $resultado['codigo_empleado'],
                        $resultado['celular'],
                        $resultado['correo'],
                        $resultado['id_estado_pais'],
                        $resultado['estado_nom'],
                        $resultado['fk_pais'],
                        $resultado['nombre_pais'],
                        $resultado['fk_rol'],
                        $resultado['nombre_rol'],
                        $resultado['codigo_rol'],
                        $resultado['fk_cargo'],
                        $resultado['nombre_cargo'],
                        $resultado['codigo_cargo'],
                        $resultado['imagen'],
                        $resultado['fk_estatus'],
                        $resultado['nombre_estatus'],
                        $resultado['ultimo_login'],
                        $resultado['edicion_u'],
                        $resultado['registro_u']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $nick;
    }
    public static function obtener_usuario_por_rol($conexion, $rol)
    {
        $rol = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT * FROM usuarios 
                    INNER JOIN rol on usuarios.fk_rol = rol.id_rol
                INNER JOIN cargo on usuarios.fk_cargo = cargo.id_cargo
                INNER JOIN estatus on usuarios.fk_estatus = estatus.id_estatus
                WHERE rol = :rol";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':rol', $rol, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario =  new Usuario(
                        $resultado['id_usuario'],
                        $resultado['nombre'],
                        $resultado['nombre2'],
                        $resultado['apellido1'],
                        $resultado['apellido2'],
                        $resultado['cedula'],
                        $resultado['id_sexo'],
                        $resultado['iso_sexo'],
                        $resultado['nombre_sexo'],
                        $resultado['fecha_nacimiento'],
                        $resultado['usuario'],
                        stripslashes($resultado['clave']), #stripslashes PARA ESCAPAR BARRAS INVERTIDAS
                        $resultado['patron'],
                        $resultado['codigo_empleado'],
                        $resultado['celular'],
                        $resultado['correo'],
                        $resultado['id_estado_pais'],
                        $resultado['estado_nom'],
                        $resultado['fk_pais'],
                        $resultado['nombre_pais'],
                        $resultado['fk_rol'],
                        $resultado['nombre_rol'],
                        $resultado['codigo_rol'],
                        $resultado['fk_cargo'],
                        $resultado['nombre_cargo'],
                        $resultado['codigo_cargo'],
                        $resultado['imagen'],
                        $resultado['fk_estatus'],
                        $resultado['nombre_estatus'],
                        $resultado['ultimo_login'],
                        $resultado['edicion_u'],
                        $resultado['registro_u']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario;
    }

    public static function obtener_usuario_por_id($conexion, $id)
    {
        $usuario = null;

        if (isset($conexion)) {
            try {

                $sql = "SELECT usuarios.id_usuario,
                usuarios.nombre,
                usuarios.nombre2,
                usuarios.apellido1,
                usuarios.apellido2,
                usuarios.cedula,
                sexos.id_sexo,
                sexos.iso_sexo,
                sexos.nombre_sexo,
                usuarios.fecha_nacimiento,
                usuarios.usuario,
                usuarios.clave,
                usuarios.patron,
                usuarios.codigo_empleado,
                usuarios.celular,
                usuarios.correo,
                estados_paises.id_estado_pais,
                estados_paises.estado_nom,
                usuarios.fk_pais,
                paises.nombre_pais,
                usuarios.fk_rol,
                rol.nombre_rol,
                rol.codigo_rol,
                usuarios.fk_cargo,
                cargo.nombre_cargo,
                cargo.codigo_cargo,
                usuarios.imagen,
                usuarios.fk_estatus,
                estatus.nombre_estatus,
                usuarios.ultimo_login,
                usuarios.edicion_u,
                usuarios.registro_u
        FROM usuarios
        INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
        INNER JOIN cargo ON usuarios.fk_cargo = cargo.id_cargo
        INNER JOIN sexos ON usuarios.fk_sexo = sexos.id_sexo
        INNER JOIN estatus ON usuarios.fk_estatus = estatus.id_estatus
        INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais
        INNER JOIN paises ON usuarios.fk_pais = paises.id_pais_origen
        WHERE id_usuario = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario =  new Usuario(
                        $resultado['id_usuario'],
                        $resultado['nombre'],
                        $resultado['nombre2'],
                        $resultado['apellido1'],
                        $resultado['apellido2'],
                        $resultado['cedula'],
                        $resultado['id_sexo'],
                        $resultado['iso_sexo'],
                        $resultado['nombre_sexo'],
                        $resultado['fecha_nacimiento'],
                        $resultado['usuario'],
                        stripslashes($resultado['clave']), #stripslashes PARA ESCAPAR BARRAS INVERTIDAS
                        $resultado['patron'],
                        $resultado['codigo_empleado'],
                        $resultado['celular'],
                        $resultado['correo'],
                        $resultado['id_estado_pais'],
                        $resultado['estado_nom'],
                        $resultado['fk_pais'],
                        $resultado['nombre_pais'],
                        $resultado['fk_rol'],
                        $resultado['nombre_rol'],
                        $resultado['codigo_rol'],
                        $resultado['fk_cargo'],
                        $resultado['nombre_cargo'],
                        $resultado['codigo_cargo'],
                        $resultado['imagen'],
                        $resultado['fk_estatus'],
                        $resultado['nombre_estatus'],
                        $resultado['ultimo_login'],
                        $resultado['edicion_u'],
                        $resultado['registro_u']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $usuario;
    }

    public static function actualizar_password($conexion, $id_usuario, $nueva_clave)
    {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE usuarios SET password = :password WHERE id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':password', $nueva_clave, PDO::PARAM_STR);
                $sentencia->bindParam(':id', $id_usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->rowCount();

                if (count($resultado)) {
                    $actualizacion_correcta = true;
                } else {
                    $actualizacion_correcta = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $actualizacion_correcta;
    }
    public static function obtener_id_usuario($conexion, $usuario)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT id_usuario FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $id = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($id as $nroid) {
                    $resultado = $nroid['id_usuario'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    public static function obtener_usuario_de_usuario($conexion, $id_usuario)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT usuario FROM usuarios WHERE id_usuario = :id_usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);

                $sentencia->execute();

                $id = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($id as $nroid) {
                    $resultado = $nroid['usuario'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    public static function obtener_rol_usuario($conexion, $usuario)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT usuarios.fk_rol,
                rol.nombre_rol,
                rol.codigo_rol 
                FROM usuarios
                INNER JOIN rol ON usuarios.fk_rol = rol.id_rol
                WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    public static function obtener_cargo_usuario($conexion, $usuario)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT id_usuario FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $id = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($id as $nroid) {
                    $resultado = $nroid['id_usuario'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    public static function obtener_estado_usuario($conexion, $usuario)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT usuarios.fk_estado, 
                estados_paises.estado_nom, 
                estados_paises.fk_pais 
                FROM usuarios 
                INNER JOIN estados_paises ON usuarios.fk_estado = estados_paises.id_estado_pais 
                WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    public static function obtener_registro_usuario($conexion, $usuario)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT registro_u FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $fecha = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($fecha as $fechare) {
                    $resultado = $fechare['registro_u'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
    public static function comprobar_patron($conexion, $usuario, $patron)
    {
        $patron_existe = false;

        if (isset($conexion)) {
            try {
                $sql = "SELECT patron FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultado as $patro) {
                    if ($patron == $patro['patron']) {
                        $patron_existe = true;
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $patron_existe;
    }
    public static function actualizar_usuario($conexion, $dataUsuario)
    {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE
                usuarios
                SET
                nombre = :nombre,
                nombre2 = :nombre2,
                apellido1 = :apellido1,
                apellido2 = :apellido2,
                cedula = :cedula,
                fk_sexo = :fk_sexo,
                fecha_nacimiento = :fecha_nacimiento,
                usuario = :usuario,
                clave = :clave,
                inpre_abogado = :inpre_abogado,
                celular = :celular,
                correo = :correo,
                fk_estado = :fk_estado,
                fk_rol = :fk_rol,
                imagen  = :imagen
                WHERE id_usuario = :id_usuario";
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $dataUsuario['id_usuario'], PDO::PARAM_INT);
                $sentencia->bindParam(':nombre', $dataUsuario['nombre'], PDO::PARAM_STR);
                $sentencia->bindParam(':nombre2', $dataUsuario['nombre2'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido1', $dataUsuario['apellido1'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido2', $dataUsuario['apellido2'], PDO::PARAM_STR);
                $sentencia->bindParam(':cedula', $dataUsuario['cedula'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_sexo', $dataUsuario['fk_sexo'], PDO::PARAM_INT);
                $sentencia->bindParam(':fecha_nacimiento', $dataUsuario['fecha_nacimiento'], PDO::PARAM_STR);
                $sentencia->bindParam(':usuario', $dataUsuario['usuario'], PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $dataUsuario['clave'], PDO::PARAM_STR);
                $sentencia->bindParam(':inpre_abogado', $dataUsuario['inpre_abogado'], PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $dataUsuario['celular'], PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $dataUsuario['correo'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_estado', $dataUsuario['fk_estado'], PDO::PARAM_INT);
                $sentencia->bindParam(':fk_rol', $dataUsuario['fk_rol'], PDO::PARAM_INT);
                $sentencia->bindParam(':imagen', $dataUsuario['imagen'], PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia;

                if ($resultado) {
                    $actualizacion_correcta = true;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $actualizacion_correcta;
    }
    public static function actualizar_ficha($conexion, $dataUsuario)
    {
        $actualizacion_correcta = false;

        if (isset($conexion)) {
            try {
                $sql = "UPDATE
                usuarios
                SET
                nombre = :nombre,
                nombre2 = :nombre2,
                apellido1 = :apellido1,
                apellido2 = :apellido2,
                cedula = :cedula,
                fk_sexo = :fk_sexo,
                fecha_nacimiento = :fecha_nacimiento,
                inpre_abogado = :inpre_abogado,
                celular = :celular,
                correo = :correo,
                imagen  = :imagen
                WHERE id_usuario = :id_usuario";
                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_usuario', $dataUsuario['id_usuario'], PDO::PARAM_INT);
                $sentencia->bindParam(':nombre', $dataUsuario['nombre'], PDO::PARAM_STR);
                $sentencia->bindParam(':nombre2', $dataUsuario['nombre2'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido1', $dataUsuario['apellido1'], PDO::PARAM_STR);
                $sentencia->bindParam(':apellido2', $dataUsuario['apellido2'], PDO::PARAM_STR);
                $sentencia->bindParam(':cedula', $dataUsuario['cedula'], PDO::PARAM_STR);
                $sentencia->bindParam(':fk_sexo', $dataUsuario['fk_sexo'], PDO::PARAM_INT);
                $sentencia->bindParam(':fecha_nacimiento', $dataUsuario['fecha_nacimiento'], PDO::PARAM_STR);
                $sentencia->bindParam(':inpre_abogado', $dataUsuario['inpre_abogado'], PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $dataUsuario['celular'], PDO::PARAM_STR);
                $sentencia->bindParam(':correo', $dataUsuario['correo'], PDO::PARAM_STR);
                $sentencia->bindParam(':imagen', $dataUsuario['imagen'], PDO::PARAM_STR);

                $sentencia->execute();
                $actualizacion_correcta =  $sentencia;
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $actualizacion_correcta;
    }
    public static function eliminar_usuario($conexion, $id_usuario)
    {
        $resultado = false;
        try {
            $sql = "DELETE FROM usuarios WHERE id_usuario = :id_usuario";
            $sentencia = $conexion->prepare($sql);
            $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $sentencia->execute();

            $resultado = ($sentencia->rowCount() > 0);
        } catch (PDOException $ex) {
            print 'ERROR' . $ex->getMessage();
        }
        return $resultado;
    }
}
