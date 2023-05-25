<?php 
class Conexion
{
    private static $conexion;
    # Esta variable contendra al conexion a la base de datos que luego se obtendra desde el metodo obtener_conexion()

    public static function abrir_conexion()
    {
        #Sirve para crear una variable que contenga la conexion a la base de datos
        if (!isset(self::$conexion)) {
            # Se crea la conexion dentro de una variable si no existe, en un try catch
            try {
                # Se incluye el config con las variables dentro por si hay errores
                //include_once 'config.inc.php';
                # se llama a la variable privada con :: y en una libreria PDO 
                self::$conexion = new PDO('mysql:host=' . NOMBRE_SERVIDOR . '; dbname=' . NOMBRE_BD, NOMBRE_USUARIO, PASSWORD);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                # Se seleciona el utf8 para todo tipo de caracteres
                self::$conexion->exec('SET CHARACTER SET utf8; SET time_zone="' . ZONA_HORARIA . '";');
            } catch (PDOException $ex) {
                print "ERROR: " . $ex->getMessage() . "<br>";
                die();
            }
        }
    }

    public static function cerrar_conexion()
    {
        if (isset(self::$conexion)) {
            self::$conexion = null;
        }
    }

    public static function obtener_conexion()
    {
        return self::$conexion;
    }
}