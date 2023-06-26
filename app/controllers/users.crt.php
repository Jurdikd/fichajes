<?php


class UsersCrt
{
    public static function GetRol($conexion, $user)
    {
        $getRol = RepositorioUsuario::obtener_rol_usuario($conexion, $user);

        $rol = array(
            'id_rol' => $getRol[0]["fk_rol"],
            'nombre_rol' =>  $getRol[0]["nombre_rol"],
            'codigo_rol' =>  $getRol[0]["codigo_rol"],
        );
        return $rol;
    }
    public static function GetCargo($conexion, $user)
    {
    }
    public static function GetEstado($conexion, $user)
    {
        $getEstado = RepositorioUsuario::obtener_estado_usuario($conexion, $user);

        $estado = array(
            'id_estado' => $getEstado[0]["fk_estado"],
            'nombre_estado' =>  $getEstado[0]["estado_nom"],
            'codigo_pais' =>  $getEstado[0]["fk_pais"],
        );
        return $estado;
    }
}