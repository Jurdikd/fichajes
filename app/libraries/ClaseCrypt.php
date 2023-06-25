<?php

/**
 * Clase para encriptrar las claves
 * By Terror
 * copiar Encriptrar::Crytp();
 * copiar2 Encriptrar::Verificar_Crytp();
 */
class Encriptrar
{
    public static function Crytp($clave)
    {
        $pass = "";
        if (!empty($clave)) {
            $salt = '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$';
            $pass = crypt($clave, $salt);
        }
        return $pass;
    }

    public static function Verificar_Crytp($clave, $claveEncriptada)
    {
        $resultado = false;
        if (!empty($clave) && !empty($claveEncriptada)) {
            $passEncriptada = crypt($clave, $claveEncriptada);
            if ($passEncriptada === $claveEncriptada) {
                $resultado = true;
            }
        }
        return $resultado;
    }
}
