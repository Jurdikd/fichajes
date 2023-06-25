<?php
class RepositorioUsuario
{
    public static function obtener_todos($conexion)
    {

        $usuarios = array();

        if (isset($conexion)) {

            try {

                include_once '../clases/ClaseUsuario.inc.php';

                $sql = "SELECT * FROM usuarios
                    INNER JOIN rol on usuarios.fk_rol = rol.id_rol
                INNER JOIN cargo on usuarios.fk_cargo = cargo.id_cargo
                INNER JOIN estatus on usuarios.fk_estatus = estatus.id_estatus
                 WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                            $resultado['id_usuario'],
                            $resultado['nombre'],
                            $resultado['apellidos'],
                            $resultado['usuario'],
                            $resultado['clave'],
                            $resultado['patron'],
                            $resultado['fk_rol'],
                            $resultado['nombre_rol'],
                            $resultado['fk_cargo'],
                            $resultado['nombre_cargo'],
                            $resultado['imagen'],
                            $resultado['fk_estatus'],
                            $resultado['nombre_estatus'],
                            $resultado['ultimo_login']
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }

        return $usuarios;
    }
    public static function mostrar_usuarios_tablas($conexion, $igual, $usuario)
    {

        $arrDatos = null;
        if (isset($conexion)) {
            try {

                $sql = "SELECT  usuarios.imagen, usuarios.nombre, usuarios.nombre2,
                    usuarios.apellidos, usuarios.cedula, sexos.nombre_sexo, usuarios.fecha_nacimiento,
                    usuarios.usuario, usuarios.codigo_empleado, rol.nombre_rol, rol.codigo_rol, cargo.nombre_cargo,
                    cargo.codigo_cargo,estatus.id_estatus,usuarios.celular, usuarios.celular2, usuarios.correo,
                    usuarios.correo2, paises.nombre_pais, paises.iso, usuarios.ciudad, usuarios.ultimo_login, usuarios.edicion_u,
                    usuarios.registro_u, usuarios.id_usuario 
                          FROM usuarios 
        
                    INNER JOIN sexos on usuarios.fk_sexo = sexos.id_sexo
                    INNER JOIN rol on usuarios.fk_rol = rol.id_rol 
                    INNER JOIN cargo on usuarios.fk_cargo = cargo.id_cargo 
                    INNER JOIN estatus on usuarios.fk_estatus = estatus.id_estatus
                    INNER JOIN paises on usuarios.fk_pais = paises.id_pais_origen
                    WHERE (usuarios.usuario != 'admin' AND usuarios.usuario != :usuario) AND usuarios.fk_estatus" . $igual . " 3 
                    ORDER BY usuarios.registro_u DESC";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
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
        $usuario_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT usuario FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $usuario_existe = true;
                } else {
                    $usuario_existe = false;
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
        $clave_existe = false;

        if (isset($conexion)) {
            try {
                $sql = "SELECT clave FROM usuarios WHERE usuario = :usuario";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario', $usuario, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                foreach ($resultado as $clavedb) {
                    if ($clave == $clavedb['clave']) {
                        $clave_existe = true;
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $clave_existe;
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
                include_once 'clases/ClaseUsuario.inc.php';

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
                    $usuario = new Usuario(
                        $resultado['id_usuario'],
                        $resultado['nombre'],
                        $resultado['apellidos'],
                        $resultado['usuario'],
                        $resultado['clave'],
                        $resultado['patron'],
                        $resultado['fk_rol'],
                        $resultado['nombre_rol'],
                        $resultado['fk_cargo'],
                        $resultado['nombre_cargo'],
                        $resultado['imagen'],
                        $resultado['fk_estatus'],
                        $resultado['nombre_estatus'],
                        $resultado['ultimo_login']
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
                include_once '../clases/ClaseUsuario.inc.php';

                $sql = "SELECT * FROM usuarios 
                    INNER JOIN rol on usuarios.fk_rol = rol.id_rol
                    INNER JOIN cargo on usuarios.fk_cargo = cargo.id_cargo
                    INNER JOIN estatus on usuarios.fk_estatus = estatus.id_estatus
                     WHERE id_usuario = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario(
                        $resultado['id_usuario'],
                        $resultado['nombre'],
                        $resultado['apellidos'],
                        $resultado['usuario'],
                        $resultado['clave'],
                        $resultado['patron'],
                        $resultado['fk_rol'],
                        $resultado['nombre_rol'],
                        $resultado['fk_cargo'],
                        $resultado['nombre_cargo'],
                        $resultado['imagen'],
                        $resultado['fk_estatus'],
                        $resultado['nombre_estatus'],
                        $resultado['ultimo_login']
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
}