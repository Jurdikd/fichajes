<?php
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
}