<?php


class Libs
{
    public static function eliminar_simbolos_acentos_espacios_demas($string)
    {
        $string = trim($string);
        # $string = preg_replace ('/\s+/'," ",trim($string));
        //trim($string);
        # strtolower

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'õ', 'ô', 'Ó', 'Ò', 'Ö', 'Õ', 'Ô'),
            array('o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        $string = str_replace(
            array(
                "\\", "¨", "º", "-", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/", "¥",
                "(", ")", "¿", "?", "'", "¡",
                "°", "[", "^", "<code>", "]",
                "+", "}", "{", "¨", "´",
                ">", "<", ";", ",", ":", "Æ",
                "♀", "§", "↓", "↑", "☼",
                ".", "*", "å", "▲", "┤", "©", "="
            ),
            '',
            $string
        );
        return $string = ucfirst(strtolower(preg_replace('/\s+/', " ", trim($string))));
    }
    public static function eliminar_simbolos_espacios_demas($string)
    {
        $string = trim($string);
        $string = str_replace(
            array(
                "\\", "¨", "º", "-", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/", "¥",
                "(", ")", "¿", "?", "'", "¡",
                "°", "[", "^", "<code>", "]",
                "+", "}", "{", "¨", "´", "┴",
                ">", "<", ";", ",", ":", "Æ",
                "♀", "§", "↓", "↑", "☼", "¢",
                ".", "*", "å", "▲", "┤", "©",
                "=", "±", "┐", "╚", "╔", "│"
            ),
            '',
            $string
        );
        return $string = ucfirst(strtolower(preg_replace('/\s+/', " ", trim($string))));
    }
    public static function eliminar_simbolos_espacios_demas_titulos($string)
    {
        //$string =  preg_replace('([^Á-Źá-źA-Za-z0-9 ])', '', $string);
        //áàäâÁÀÂÄéèëêÉÈÊËíìïîÍÌÏÎóòöõôÓÒÖÕÔúùüûÚÙÛÜñÑç
        //$string =  preg_replace('([^a-zA-ZÀ-ÿÁ-Źá-ź0-9 ])', '', $string);
        $string =  preg_replace('([^A-Za-zÁ-Źá-źÀ-ÿ0-9 ])', '', $string);
        //echo $string;
        return $string = preg_replace('/\s+/', " ", trim($string));
    }
    public static function eliminar_espacios_demas_parrafo($string)
    {
        return $string = preg_replace('/\s+/', " ", trim($string));
        // return trim($string);
    }
    public function crear_url($url)
    {
        $url = strtolower(preg_replace('/\s+/', "-", $url));
        return $url;
    }
    public function limpiar_url($url)
    {
        $url = strtolower(strtr($url, "-", " "));
        return $url;
    }

    public static function url_unica_aleatorea()
    {
        $string_aleatorio = "";
        # Creamos un string aleatoreo

        $caracteres = '$-_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numero_caracteres = strlen($caracteres);


        for ($i = 0; $i < 10; $i++) {
            $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
        }
        //Unico con 10 caracteres aleatoreos

        return uniqid($string_aleatorio);
    }
    public static function url_secreta($string_dato)
    {
        $url_secreta = "";
        $string_aleatorio = "";
        if (isset($string_dato)) {
            # Creamos un string aleatoreo

            $caracteres = '$-_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $numero_caracteres = strlen($caracteres);


            for ($i = 0; $i < 10; $i++) {
                $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
            }
            //Lo encriptamos
            $url_secreta = hash('sha256', $string_aleatorio . $string_dato); //64 caracteres
        }


        return $url_secreta;
    }
    public function limpiar_nombre_imagen($string)
    {
        $string = trim($string);
        # $string = preg_replace ('/\s+/'," ",trim($string));
        //trim($string);
        # strtolower

        $string = str_replace(
            array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('ó', 'ò', 'ö', 'õ', 'ô', 'Ó', 'Ò', 'Ö', 'Õ', 'Ô'),
            array('o', 'o', 'o', 'o', 'o', 'O', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('ñ', 'Ñ', 'ç', 'Ç'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        $string = str_replace(
            array(
                "\\", "¨", "º", "-", "~",
                "#", "@", "|", "!", "\"",
                "·", "$", "%", "&", "/", "¥",
                "(", ")", "¿", "?", "'", "¡",
                "°", "[", "^", "<code>", "]",
                "+", "}", "{", "¨", "´",
                ">", "<", ";", ",", ":", "Æ",
                "♀", "§", "↓", "↑", "☼",
                "*", "å", "▲", "┤", "©", "="
            ),
            ' ',
            $string
        );
        return $string = strtolower(preg_replace('/\s+/', "-", trim($string)));
    }
    public static function formatear_fecha_es($string)
    {
        $fecha = explode('/', $string);
        return $fecha[2] . "-" . $fecha[1] . "-" . $fecha[0];
    }
    public static function formatear_fecha_en($string)
    {
        $fecha = explode('/', $string);
        return $fecha[0] . "-" . $fecha[1] . "-" . $fecha[2];
    }

    public static function borrar_directorio($dir)
    {
        if (!is_dir($dir)) {
            //throw new Exception('La ruta no es un directorio válido.');
            return false;
        }

        $contenido = scandir($dir);

        if ($contenido === false) {
           // throw new Exception('No se pudo obtener el contenido del directorio.');
        }

        foreach ($contenido as $item) {
            if ($item != '.' && $item != '..') {
                $rutaItem = $dir . '/' . $item;
                if (is_dir($rutaItem)) {
                    if (!self::borrar_directorio($rutaItem)) {
                        return false;
                    }
                } else {
                    if (!unlink($rutaItem)) {
                        return false;
                    }
                }
            }
        }

        return rmdir($dir);
    }
    public static function normaliza($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
    ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
    bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        $cadena = utf8_decode($cadena);

        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);

        $cadena = strtolower($cadena);
        return utf8_encode($cadena);
    }
    public static function  Links_limpios($var)
    {
        setlocale(LC_ALL, 'en_US.UTF8');
        $var = preg_replace("/[^A-Za-z0-9 ]/", '', iconv('UTF-8', 'ASCII//TRANSLIT', $var));
        return strtolower($var);
    }
}