<?php
/**
 *
 * # Commercial License Fichaje / Licencia Comercial Fichaje
 * ## FICHAJE
 *
 * Copyright © 2023 Jesús Covo https://github.com/Jurdikd
 * 
 * Attendance Systems / Sistemas para Fichajes
 * 
 * As the creator and intellectual property owner, I hereby grant you, as a customer, the following rights with respect to your copy of the FICHAJE system upon payment: / Como creador y propietario intelectual, por la presente te otorgo, como cliente, los siguientes derechos con respecto a tu copia del sistema FICHAJE al realizar el pago:
 * 
 * 1. Sale: You have the right to sell the system to third parties. / Venta: Tienes el derecho de vender el sistema a terceros.
 * 2. Distribution: You may distribute the system to third parties. / Distribución: Puedes distribuir el sistema a terceros.
 * 3. Gift: You have the option to gift the system to third parties. / Regalo: Tienes la opción de regalar el sistema a terceros.
 * 4. Personal Use: You may keep and use the system for any personal purpose without modifying the system or its libraries. / Uso personal: Puedes guardar y utilizar el sistema para cualquier propósito personal sin realizar modificaciones en el sistema o sus librerías.
 * 
 * However, please note the following: / Sin embargo, ten en cuenta lo siguiente:
 * 
 * 1. Ownership: The source code and logic of the system, as well as the libraries created by the creator and intellectual property owner, remain the property of the creator and intellectual property owner. / Propiedad: El código fuente y la lógica del sistema, así como las librerías creadas por el creador y propietario intelectual, siguen siendo propiedad del creador y propietario intelectual.
 * 2. Modifications and Enhancements: If you wish to make modifications or enhancements to the system, I recommend that you contact the creator and intellectual property owner to discuss the details and obtain their prior written consent. / Modificaciones y mejoras: Si deseas realizar modificaciones o mejoras en el sistema, te recomiendo que te pongas en contacto con el creador y propietario intelectual para discutir los detalles y obtener su consentimiento previo por escrito.
 * 
 * This license guarantees your rights as a customer and protects both the creator and intellectual property owner's copyright and your investment in the FICHAJE system. / Esta licencia garantiza tus derechos como cliente y protege tanto los derechos de autor del creador y propietario intelectual como tu inversión en el sistema de FICHAJE.
 * 
 * Additional Terms: / Términos adicionales:
 * - The system is provided "as is," without warranty of any kind, express or implied. / El sistema se proporciona "tal cual", sin garantía de ningún tipo, expresa o implícita.
 * - Under no circumstances shall the creator and intellectual property owner be liable for any claims, damages, or other liability, whether in an action of contract, tort, or otherwise, arising from, out of, or in connection with the use of the system or any transactions related to it. / En ningún caso el creador y propietario intelectual será responsable por cualquier reclamo, daño u otra responsabilidad, ya sea en una acción de contrato, agravio o de otra manera, que surja de, fuera de o en conexión con el uso del sistema o cualquier transacción relacionada con el mismo.
 * 
 * By downloading, cloning, installing, purchasing, or selling the FICHAJE system, you indicate your acceptance of the terms and conditions set forth in this commercial license. / Al descargar, clonar, instalar, comprar o vender el sistema de FICHAJE, indicas tu aceptación de los términos y condiciones establecidos en esta licencia comercial.
 * 
 **/


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