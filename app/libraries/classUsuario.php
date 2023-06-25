<?php

class Usuario
{

    private $id_usuario;
    private $nombre;
    private $nombre2;
    private $apellido1;
    private $apellido2;
    private $cedula;
    private $fk_sexo;
    private $iso_sexo;
    private $nombre_sexo;
    private $fecha_nacimiento;
    private $usuario;
    private $clave;
    private $patron;
    private $codigo_empleado;
    private $celular;
    private $correo;
    private $fk_estado;
    private $estado_nom;
    private $fk_pais;
    private $nombre_pais;
    private $fk_rol;
    private $nombre_rol;
    private $codigo_rol;
    private $fk_cargo;
    private $nombre_cargo;
    private $codigo_cargo;
    private $imagen;
    private $fk_estatus;
    private $nombre_estatus;
    private $ultimo_login;
    private $edicion_u;
    private $registro_u;


    public function __construct(
        $id_usuario,
        $nombre,
        $nombre2,
        $apellido1,
        $apellido2,
        $cedula,
        $fk_sexo,
        $iso_sexo,
        $nombre_sexo,
        $fecha_nacimiento,
        $usuario,
        $clave,
        $patron,
        $codigo_empleado,
        $celular,
        $correo,
        $fk_estado,
        $estado_nom,
        $fk_pais,
        $nombre_pais,
        $fk_rol,
        $nombre_rol,
        $codigo_rol,
        $fk_cargo,
        $nombre_cargo,
        $codigo_cargo,
        $imagen,
        $fk_estatus,
        $nombre_estatus,
        $ultimo_login,
        $edicion_u,
        $registro_u
    ) {
        $this->id_usuario = $id_usuario;
        $this->nombre = $nombre;
        $this->nombre2 = $nombre2;
        $this->apellido1 = $apellido1;
        $this->apellido2 = $apellido2;
        $this->cedula = $cedula;
        $this->fk_sexo = $fk_sexo;
        $this->iso_sexo = $iso_sexo;
        $this->nombre_sexo = $nombre_sexo;
        $this->fecha_nacimiento = $fecha_nacimiento;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->patron = $patron;
        $this->codigo_empleado = $codigo_empleado;
        $this->celular = $celular;
        $this->correo = $correo;
        $this->fk_estado = $fk_estado;
        $this->estado_nom = $estado_nom;
        $this->fk_pais = $fk_pais;
        $this->nombre_pais = $nombre_pais;
        $this->fk_rol = $fk_rol;
        $this->nombre_rol = $nombre_rol;
        $this->codigo_rol = $codigo_rol;
        $this->fk_cargo = $fk_cargo;
        $this->nombre_cargo = $nombre_cargo;
        $this->codigo_cargo = $codigo_cargo;
        $this->imagen = $imagen;
        $this->fk_estatus = $fk_estatus;
        $this->nombre_estatus = $nombre_estatus;
        $this->ultimo_login = $ultimo_login;
        $this->edicion_u =  $edicion_u;
        $this->registro_u =   $registro_u;
    }

    public function obtener_id_usuario()
    {
        return $this->id_usuario;
    }

    public function obtener_nombre()
    {
        return $this->nombre;
    }

    public function obtener_nombre2()
    {
        return $this->nombre2;
    }

    public function obtener_apellido1()
    {
        return $this->apellido1;
    }

    public function obtener_apellido2()
    {
        return $this->apellido2;
    }

    public function obtener_cedula()
    {
        return $this->cedula;
    }

    public function obtener_fk_sexo()
    {
        return $this->fk_sexo;
    }

    public function obtener_iso_sexo()
    {
        return $this->iso_sexo;
    }

    public function obtener_nombre_sexo()
    {
        return $this->nombre_sexo;
    }

    public function obtener_fecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    public function obtener_usuario()
    {
        return $this->usuario;
    }

    public function obtener_clave()
    {
        return $this->clave;
    }

    public function obtener_patron()
    {
        return $this->patron;
    }

    public function obtener_codigo_empleado()
    {
        return $this->codigo_empleado;
    }

    public function obtener_celular()
    {
        return $this->celular;
    }

    public function obtener_correo()
    {
        return $this->correo;
    }

    public function obtener_fk_estado()
    {
        return $this->fk_estado;
    }

    public function obtener_estado_nom()
    {
        return $this->estado_nom;
    }

    public function obtener_fk_pais()
    {
        return $this->fk_pais;
    }

    public function obtener_nombre_pais()
    {
        return $this->nombre_pais;
    }

    public function obtener_fk_rol()
    {
        return $this->fk_rol;
    }

    public function obtener_nombre_rol()
    {
        return $this->nombre_rol;
    }

    public function obtener_codigo_rol()
    {
        return $this->codigo_rol;
    }

    public function obtener_fk_cargo()
    {
        return $this->fk_cargo;
    }

    public function obtener_nombre_cargo()
    {
        return $this->nombre_cargo;
    }

    public function obtener_codigo_cargo()
    {
        return $this->codigo_cargo;
    }

    public function obtener_imagen()
    {
        return $this->imagen;
    }

    public function obtener_fk_estatus()
    {
        return $this->fk_estatus;
    }

    public function obtener_nombre_estatus()
    {
        return $this->nombre_estatus;
    }

    public function obtener_ultimo_login()
    {
        return $this->ultimo_login;
    }

    public function obtener_edicion_u()
    {
        return $this->edicion_u;
    }

    public function obtener_registro_u()
    {
        return $this->registro_u;
    }
}
