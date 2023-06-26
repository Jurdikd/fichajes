<?php
class RepositorioRegistroUsuarios
{

    public static function insertar_registro_usuario($conexion, $id_usuario, $useregis, $fechargis, $codigo_registro)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO registro_usuarios(fk_usuario_insertado, 
                fk_usuario_registro, 
                fecha_registro_usuario, 
                codigo_registro)
                VALUES (:fk_usuario_insertado, :fk_usuario_registro, :fecha_registro_usuario, :codigo_registro)";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':fk_usuario_insertado', $id_usuario, PDO::PARAM_INT);
                $sentencia->bindParam(':fk_usuario_registro', $useregis, PDO::PARAM_INT);
                $sentencia->bindParam(':fecha_registro_usuario', $fechargis, PDO::PARAM_STR);
                $sentencia->bindParam(':codigo_registro', $codigo_registro, PDO::PARAM_STR);
                $resultado =  $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $resultado;
    }
}
