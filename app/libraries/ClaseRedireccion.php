<?php

class Redireccion
{
    public static function redirigir($url)
    {
        if (!headers_sent()) {
            # echo "Funciona el if";
            # header("Status: 301 Moved Permanently");
            header('Location: ' . $url, true, 301);
            exit();
        } else {
            #echo "<h1>ElseElseElseElse</h1><br> ";
            #echo "<h1>ElseElseElseElse</h1><br> ";
            #echo "<h1>ElseElseElseElse</h1><br> ";
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
            echo '</noscript>';
        }
    }
    public static function redirigir_js($url)
    {
        echo '<script type="text/javascript">';
        echo 'window.location.href="' . $url . '";';
        echo '</script>';
    }
}
