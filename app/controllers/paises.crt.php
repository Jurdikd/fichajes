<?php


class PaisesCrt
{
    public static function GetCountries()
    {
        Conexion::abrir_conexion();
        $respuesta = null;
        $datos = RepositorioPaises::mostrar_tlf_paises(Conexion::obtener_conexion());
        if ($datos) {
            $contador = 1;
            $array = array();
            foreach ($datos as $pais) {
                $array[] = array(
                    'name' => $pais['nombre_pais'],
                'iso' => $pais['iso'],
                'code'=> $pais['codigo_area'],
                'flag'=>RUTA_IMG.'img-flags/svg-flags-circular/'.strtolower($pais['iso']).'.svg',
                  
                );
                $contador = $contador + 1;
            }
            $respuesta = $array;
    
           
                
                /*$respuesta = array($pais['nombre_pais'] => array(
                    'name' => $pais['nombre_pais'],
                    'iso' => $pais['iso'],
                    'code'=> $pais['codigo_area'],
                    'flag'=>RUTA_IMG.'img-flags/svg-flags-circular/VE.svg',
                    )
                );*/
            }
        return $respuesta;
           
          
    
    }
    public static function mostrar_paises_mas_iso($ruta_img, $class)
    {
        Conexion::abrir_conexion();
        $respuesta = "";
        $datos = RepositorioPaises::mostrar_iso_mas_paises_activos(Conexion::obtener_conexion());
        if ($datos) {
            # code...
            foreach ($datos as $pais) {
                $id_pais = $pais['id_pais_origen'];
                $iso_pais = $pais['iso'];
                $nombre_pais = $pais['nombre_pais'];
            }
            $img = 'data-content="<img class=\'' . $class . '\' src=\'' . $ruta_img . '/' . $nombre_pais . '.svg\'' . ' alt=\'' . strtolower($nombre_pais) . '\' width=\'15\' height=\'15\' loading=\'lazy\'> <span>' . $nombre_pais  . '</span>"';
            $respuesta = '<option class="text-ms"' . $img . ' value="' . $id_pais . '-' . $iso_pais . '">' . $nombre_pais . '</option>';
        } else {
            $respuesta =  '<option selected value="">Sin datos...</option>';
        }
        return $respuesta;
    }
    public static function mostrar_paises_mas_iso_activos($ruta_img, $class)
    {
        Conexion::abrir_conexion();
        $datos = RepositorioPaises::mostrar_iso_mas_paises_activos(Conexion::obtener_conexion());
        if (is_array($datos)) {
            # code...
            foreach ($datos as $pais) {
                $id_pais = $pais['id_pais_origen'];
                $iso_pais = $pais['iso'];
                $nombre_pais = $pais['nombre_pais'];
            }
            $img = 'data-content="<img class=\'' . $class . '\' src=\'' . $ruta_img . '/' . strtolower($nombre_pais) . '.svg\'' . ' alt=\'' . strtolower($nombre_pais) . '\' width=\'15\' height=\'15\' loading=\'lazy\'> <span>' . $nombre_pais  . '</span>"';
            echo '<option class="text-ms"' . $img . ' value="' . $id_pais . '-' . $iso_pais . '">' . $nombre_pais . '</option>';
        } else {
            echo  '<option selected value="">Sin datos...</option>';
        }
    }

    public static function mostrar_codigo_area()
    {
        Conexion::abrir_conexion();
        $paises = RepositorioPaises::mostrar_tlf_paises(Conexion::obtener_conexion());

        //Recorremos los datos con un array y guardamos en una variable

        foreach ($paises as $pais) {

            $iso_pais = $pais['iso'];
            $nombre_pais = $pais['nombre_pais'];
            $codigo_area_pais = $pais['codigo_area'];

            echo "<option value='" . $codigo_area_pais . "' data-tokens='" . $nombre_pais . "'>" . $iso_pais . " " . $codigo_area_pais . "</option>";
        }
    }
    public static function mostrar_codigo_area_imgs($ruta_img, $class)
    {
        Conexion::abrir_conexion();
        $datos = RepositorioPaises::mostrar_tlf_paises(Conexion::obtener_conexion());

        //Recorremos los datos con un array y guardamos en una variable
        if (is_array($datos)) {
            foreach ($datos as $pais) {

                $iso_pais = $pais['iso'];
                $nombre_pais = $pais['nombre_pais'];
                $codigo_area_pais = $pais['codigo_area'];
                //$img = 'data-content="<img class=\'' . $class . '\' src=\'' . $ruta_img . '/' . $iso_pais . '.svg\'' . ' alt=\'' . strtolower($nombre_pais) . '\' width=\'15\' height=\'15\' loading=\'lazy\'> <span>' . $iso_pais  . ' ' . $codigo_area_pais . '</span>"';
                echo '<option class="text-ms"' . 'data-content="<img class=\'' . $class . '\' src=\'' . $ruta_img . '/' . $iso_pais . '.svg\'' . ' alt=\'' . strtolower($nombre_pais) . '\' width=\'15\' height=\'15\' loading=\'lazy\'> <span>' . $iso_pais  . ' ' . $codigo_area_pais . '</span>"' . '  value="'  . $codigo_area_pais . '" data-tokens="' . $nombre_pais . '">' . $iso_pais . ' ' . $codigo_area_pais . '</option><br>';
            }
        } else {
            echo  '<option selected value="">Sin datos...</option>';
        }
    }
    public static function obtener_paises_por_id_activo($id_pais_origen)
    {
        Conexion::abrir_conexion();
        $respuesta = false;
        $datos = RepositorioPaises::obtener_id_pais_por_id_activo(Conexion::obtener_conexion(), $id_pais_origen);

        # code...
        $respuesta =  $datos['id_pais_origen'];

        return $respuesta;
    }
}