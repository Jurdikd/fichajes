<?php


class UsersCrt
{
    public static function register_user_fichaje($conexion, $userData)
    { // Datos usuario en sesion
        $userLogin = ControlSesion::datos_sesion();
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == 1) {
            # colocamos el estado que admin decida...
            //  echo $userData['delegacion'][0];
            $estadoSelect = RepositorioEstadosPaises::obtener_estados_paises_por_id($conexion, $userData['delegacion'][0]);
            $delegacion = $estadoSelect[0]["id_estado_pais"];
            $nombreDelegacion = strtoupper($estadoSelect[0]["estado_nom"]);
        } else {
            # colocamos el estado por defecto del usuario que registro
            $estadoUserLogin = UsersCrt::GetEstado($conexion, $userLogin["usuario"]);
            $delegacion = $estadoUserLogin["id_estado"];
            $nombreDelegacion = strtoupper($estadoUserLogin["nombre_estado"]);
        }



        //verificar si usuario existe
        $verifyUser = RepositorioUsuario::ci_existe($conexion, $userData['cedula']);
        # si ficha no existe lo creamos ...
        if (!$verifyUser) {
            $codigoEmpleado = uniqid($nombreDelegacion . "-");
            $usuario = $codigoEmpleado . "-" . $userData['cedula'];
            #guardar imagen
            $imagen = $userData['imagen'];
            $rutaimg = "public/img/users/" . $usuario . "/" . $usuario . ".jpg";
            $userDataRegister = array(
                'nombre' => $userData['primer-nombre'],
                'nombre2' => $userData['segundo-nombre'],
                'apellido1' =>  $userData['primer-apellido'],
                'apellido2' => $userData['segundo-apellido'],
                'cedula' => $userData['cedula'],
                'fk_sexo' => $userData['sexo'],
                'fecha_nacimiento' => $userData['fecha-nacimiento'],
                'usuario' => $usuario,
                'celular' => $userData['telefono'],
                'codigo_empleado' => $codigoEmpleado,
                'inpre_abogado' =>  $userData['inpre-abogado'],
                'correo' =>  $userData['correo'],
                'fk_estado' =>  $delegacion,
                'fk_rol' => 3,
                'imagen' => "app/" . $rutaimg
            );
            //Registrar usuario
            // guardar en base de datos
            $registro = RepositorioUsuario::registrar_usuario_ficha($conexion, $userDataRegister);
            if ($registro) {
                # guardamos la imagen...
                //Creamos un objeto con todos los datos para guardar en la base de datos luego del registro
                $base64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
                $carpeta = "../public/img/users/" . $usuario;
                if (!file_exists($carpeta)) {
                    mkdir($carpeta, 0777, true);
                }
                //Guardamos la imagen si todo salio correcto
                file_put_contents("../" . $rutaimg, $base64);
                //obtenos el id del usuario registrado
                $id_ficha = RepositorioUsuario::obtener_id_usuario($conexion,  $usuario);
                //Creamos un codigo de registro unico con usuario
                $fechaRegistro = RepositorioUsuario::obtener_registro_usuario($conexion, $usuario);
                $codigo_registro = uniqid($usuario . "-" . $userLogin["usuario"] . "-");

                $registrar =  RepositorioRegistroUsuarios::insertar_registro_usuario($conexion, $id_ficha, $userLogin["id"], $fechaRegistro, $codigo_registro);
                //verificacion de disciplinas
                $disciplinas = [
                    "ajedrez",
                    "baloncesto",
                    "billar",
                    "bolas_criollas",
                    "boliche",
                    "domino",
                    "futbol_sala",
                    "kickingball",
                    "maraton",
                    "natacion",
                    "softball",
                    "tenis_de_campo",
                    "tenis_de_mesa",
                    "tiro",
                    "toros_coleados",
                    "voleibol"
                ];

                $arrayACambiar = $userData["disciplinas"];
                $nuevosIndices = [];
                //numerar disciplinas 
                foreach ($arrayACambiar as $elemento) {
                    $indice = array_search($elemento, $disciplinas);
                    if ($indice !== false) {
                        $nuevosIndices[] = $indice + 1; // Sumar 1 para obtener el número correspondiente
                    }
                }
                //registro dinamico de disciplinas
                $registrarDisciplinas = true;
                foreach ($nuevosIndices as $disciplina) {
                    $resultado = RepositorioDisciplinasUsuarios::insertar_disciplinas_usuario($conexion, $disciplina, $id_ficha, $userLogin["id"]);
                    if (!$resultado) {
                        $registrarDisciplinas = false;
                        break; // Detener el bucle si ocurre algún error
                    }
                }
                if ($registrar == true && $registrarDisciplinas == true) {
                    # Ficha insertada y registrado correctamente con las disciplinas!
                    $resultado = 1;
                } else if ($registrar == true && $registrarDisciplinas == false) {
                    # Ficha insertada correctamente! pero ha habido un error al guardar las disciplinas!
                    $resultado = 2;
                } else if ($registrar == false && $registrarDisciplinas == true) {
                    # Ficha insertada correctamente! pero ha habido un error al guardar el registro!
                    $resultado = 3;
                } else if ($registrar == false && $registrarDisciplinas == false) {
                    # Ficha insertada correctamente! pero ha habido un error al guardar el registro y disciplinas!
                    $resultado = 4;
                }
            } else {
                # ¡Ha habido un error al insertar ficha!
                $resultado = 5;
            }
        } else {
            # si ficha existe retornamos error 6 ...
            # ¡Ha habido un error al insertar ficha!
            $resultado = 6;
        }
        return $resultado;
    }
    public static function GetFichas($conexion, $user)
    {
        $ficha = RepositorioUsuario::obtener_fichas_usuarios($conexion);
        return $ficha;
    }
    public static function GetFichasDiciplinas($conexion, $get)
    {
        $userLogin = ControlSesion::datos_sesion();
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == 1) {
            # colocamos el estado que admin decida...

            $estadoSelect = RepositorioEstadosPaises::obtener_estados_paises_por_id($conexion, $get['delegacion']);
            $delegacion = $estadoSelect[0]["id_estado_pais"];
        } else {
            $estadoUserLogin = UsersCrt::GetEstado($conexion, $userLogin["usuario"]);
            $delegacion = $estadoUserLogin["id_estado"];
        }
        $fichas = RepositorioUsuario::obtener_fichas_usuarios_por_estado($conexion, $delegacion, $get['disciplina']);
        return $fichas;
    }
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
