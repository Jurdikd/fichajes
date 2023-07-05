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