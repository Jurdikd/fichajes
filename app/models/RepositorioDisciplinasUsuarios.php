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
}