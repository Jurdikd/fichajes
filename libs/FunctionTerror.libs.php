<?php

/** Libreria creada por Jurdikd
 * Alias Terror
 */
class FunctionTerror
{
    public static function cambiarComas_puntos($num)
    {
        # Cambiar comas por puntos...
        $convertido = str_replace(',', '.', $num);
        return $convertido;
    }
    public static function NumberFormatesES($string_numero, $lang)
    {

        $formatter = new NumberFormatter($lang, NumberFormatter::DECIMAL);
        $numero = $formatter->parse($string_numero);
        return $numero;
    }
    public static function NumberFormates($string_numero)
    {
        $string_sin_puntos = str_replace(".", "", $string_numero);
        $string_con_punto_decimal = str_replace(",", ".", $string_sin_puntos);
        $numero = floatval($string_con_punto_decimal);
        return $numero;
    }
}