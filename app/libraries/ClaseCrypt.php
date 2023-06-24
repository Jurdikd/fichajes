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
            # Conprobamos si clave no esta vacia
            $pass = crypt($clave, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
        }
        return $pass;
    }
    public static function Verificar_Crytp($clave, $clave2)
    {
        $resultado =  false;
        if (!empty($clave) && !empty($clave2)) {
            # Conprobamos si clave no esta vacia
            $clave = crypt($clave, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            if ($clave == $clave2) {
                $resultado = true;
            }
        }
        return $resultado;
    }
}
