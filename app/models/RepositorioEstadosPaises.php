<?php

class RepositorioEstadosPaises
{
    public static function obtener_estados_paises_por_id($conexion, $id_estado_pais)
    {
        $resultado = false;

        if (isset($conexion)) {
            try {

                $sql = "SELECT id_estado_pais, estado_nom, iso_pais, fk_pais, status_estado
                FROM estados_paises
                WHERE id_estado_pais = :id_estado_pais";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id_estado_pais', $id_estado_pais, PDO::PARAM_INT);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }

        return $resultado;
    }
    public static function obtener_todos_paises($conexion, $urlpais)
    {


        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM paises";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
                /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
                foreach ($arrDatos as $pais) {

                    echo $urlpais = Links_limpios($pais['iso']) . "<br>";
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $urlpais;
    }
    public static function mostrar_iso_mas_paises($conexion)
    {
        $arrDatos =  "";

        if (isset($conexion)) {
            try {
                $sql = "SELECT id_pais_origen, iso, nombre_pais FROM paises";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
                /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }
    public static function mostrar_iso_mas_paises_activos($conexion)
    {
        $arrDatos =  "";

        if (isset($conexion)) {
            try {
                $sql = "SELECT id_pais_origen, iso, nombre_pais FROM paises WHERE status_pais = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
                /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
                return $arrDatos;
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
    }
    public static function mostrar_tlf_paises($conexion)
    {
        $arrDatos =  "";

        if (isset($conexion)) {
            try {
                $sql = "SELECT iso, nombre_pais, codigo_area FROM paises";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
                /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }

    public static function mostrar_paises($conexion)
    {
        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM paises ORDER BY activo = 1 DESC, nombre_pais";
                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $arrDatos =  $sentencia->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $arrDatos;
    }

    public static function obtener_nombre_pais($conexion, $iso_pais)
    {
        $nom_pais = null;
        if (isset($conexion)) {
            try {
                $sql = "SELECT nombre_pais FROM paises WHERE nombre_pais = :isourl";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':isourl', $iso_pais, PDO::PARAM_STR);
                $sentencia->execute();
                $nom_pais  = $sentencia->fetch(PDO::FETCH_ASSOC);
                $nom_pais = $nom_pais['nombre_pais'];
                /*Recorremos todos los resultados, ya no hace falta invocar más a fetchAll como si fuera fetch...*/
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            return  $nom_pais;
        }
    }
    public static function obtener_pais_por_url($conexion, $url, $nombre_pais)
    {

        if (isset($conexion)) {
            try {
                $sql = "SELECT nombre_pais FROM paises WHERE nombre_pais = :isourl";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":isourl", $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);

                $nombre_pais = $resultado['nombre_pais'];
                $nombre_pais = Libs::eliminar_simbolos_acentos_espacios_demas($nombre_pais);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            return strtolower($nombre_pais);
        }
    }
    public static function obtener_pais_activo($conexion, $pais)
    {
        $pais_activo = null;

        if (isset($conexion)) {
            try {
                # $sql = "SELECT COUNT(*) as total FROM paises WHERE iso = :isourl AND activo = 1";
                $sql = "SELECT COUNT(nombre_pais) as total FROM paises WHERE nombre_pais = :isourl AND activo = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':isourl', $pais, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
                $pais_activo = $resultado['total'];
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $pais_activo;
    }

    public static function obtener_pais_por_id($conexion, $id_pais)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT id_pais FROM paises WHERE id_pais = :id_pais";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":id_pais", $id_pais, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            return $resultado;
        }
    }
    public static function obtener_id_pais_por_id_activo($conexion, $id_pais_origen)
    {
        $resultado = false;
        if (isset($conexion)) {
            try {
                $sql = "SELECT id_pais_origen  FROM paises WHERE id_pais_origen  = :id_pais_origen  AND status_pais = 1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(":id_pais_origen", $id_pais_origen, PDO::PARAM_INT);
                $sentencia->execute();
                $resultado = $sentencia->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
            return $resultado;
        }
    }
}
