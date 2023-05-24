<?php
class UrlGetTerror
{
    public static function Getjson()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
    public static function Getquery($query)
    {
        $url = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; # obtener url

        $components = parse_url($url); # componentes de la url

        if (!empty($components['query'])) {
            # mostramos resultados...
            parse_str($components['query'], $results); # obtener variable plan
            if (empty($results[$query])) {
                # retornar falso...
                return  false;
            }
            return  $results[$query];
        } else {
            return  false;
        }
    }
}