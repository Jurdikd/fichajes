<?php


class UsersCrt
{
    public static function register_user_fichaje($conexion, $userData)
    { // Datos usuario en sesion
        $userLogin = ControlSesion::datos_sesion();
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == 1) {
            # colocamos el estado que admin decida...
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
            $codigoEmpleado = uniqid();
            $usuario = $nombreDelegacion . "-" . $codigoEmpleado . "-" . $userData['cedula'];
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
    public static function register_user($conexion, $userData)
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
            $claveUser = Encriptrar::Crytp($userData['clave']);
            $codigoEmpleado = uniqid();
            $usuario =  $nombreDelegacion . "-" . $codigoEmpleado . "-" . $userData['cedula'];
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
                'fk_rol' => $userData['rol'],
                'clave' =>  $claveUser,
                'imagen' => "app/" . $rutaimg
            );
            //Registrar usuario
            // guardar en base de datos
            $registro = RepositorioUsuario::registrar_usuario($conexion, $userDataRegister);
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
        $userLogin = ControlSesion::datos_sesion();
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == 1) {
            # code...
            $fichas = RepositorioUsuario::obtener_fichas_usuarios($conexion, $rolUserLogin["id_rol"]);
        } else {
            # code...
            $id_estado = UsersCrt::GetEstado($conexion, $userLogin["usuario"]);

            $fichas = RepositorioUsuario::obtener_fichas_usuarios($conexion, $rolUserLogin["id_rol"], $id_estado["id_estado"]);
        }
        foreach ($fichas as &$usuario) {
            // Obtener las disciplinas del usuario utilizando la función existente
            $disciplinas = RepositorioDisciplinasUsuarios::obtener_disciplinas_usuario($conexion, $usuario['id_usuario']);
            // Agregar el array de disciplinas al final del usuario
            $usuario['disciplinas'] = $disciplinas;
        }

        // RepositorioUsuario::obtener_fichas_usuarios($conexion);
        return $fichas;
    }
    public static function GetUsers($conexion, $user)
    {
        $userLogin = ControlSesion::datos_sesion();
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == "1" && $rolUserLogin["id_rol"] == "4") {
            # code...
            $usersdb = RepositorioUsuario::obtener_usuarios($conexion, $rolUserLogin["id_rol"]);
        } else {
            # code...
            $id_estado = UsersCrt::GetEstado($conexion, $userLogin["usuario"]);

            $usersdb = RepositorioUsuario::obtener_usuarios($conexion, $rolUserLogin["id_rol"], $id_estado["id_estado"]);
        }
        foreach ($usersdb as &$usuario) {
            // Obtener las disciplinas del usuario utilizando la función existente
            $disciplinas = RepositorioDisciplinasUsuarios::obtener_disciplinas_usuario($conexion, $usuario['id_usuario']);
            // Agregar el array de disciplinas al final del usuario
            $usuario['disciplinas'] = $disciplinas;
        }

        // RepositorioUsuario::obtener_fichas_usuarios($conexion);
        return $usersdb;
    }
    public static function GetUserEdit($conexion, $user)
    {
        $userdb = RepositorioUsuario::obtener_usuario_por_id_simple($conexion, $user["id_user"]);

        foreach ($userdb as &$usuario) {
            // Obtener las disciplinas del usuario utilizando la función existente
            $disciplinas = RepositorioDisciplinasUsuarios::obtener_disciplinas_usuario($conexion, $usuario['id_usuario']);
            // Agregar el array de disciplinas al final del usuario
            $usuario['disciplinas'] = $disciplinas;
        }

        return $userdb;
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
        $fichas = RepositorioUsuario::obtener_fichas_usuarios_por_estado($conexion, $delegacion, $get['disciplina'], $get['sexo']);
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
    public static function EditFicha($conexion, $userData)
    {
        # colocamos el estado que admin decida...


        $usuario = RepositorioUsuario::obtener_usuario_de_usuario($conexion, $userData["id_usuario"]);


        #guardar imagen
        $imagen = $userData['imagen'];
        $rutaimg = "public/img/users/" . $usuario . "/" . $usuario . ".jpg";
        $userDataUpdate = array(
            'id_usuario' => $userData["id_usuario"],
            'nombre' => $userData['primer-nombre'],
            'nombre2' => $userData['segundo-nombre'],
            'apellido1' =>  $userData['primer-apellido'],
            'apellido2' => $userData['segundo-apellido'],
            'cedula' => $userData['cedula'],
            'fk_sexo' => $userData['sexo'],
            'fecha_nacimiento' => $userData['fecha-nacimiento'],
            'celular' => $userData['telefono'],
            'inpre_abogado' =>  $userData['inpre-abogado'],
            'correo' =>  $userData['correo'],
            'imagen' => "app/" . $rutaimg
        );



        $actualizacion = RepositorioUsuario::actualizar_ficha($conexion, $userDataUpdate);
        if ($actualizacion) {
            //borrar imagen anterior

            $carpeta = "../public/img/users/" . $usuario;
            $imgDelete = Libs::borrar_directorio($carpeta);
            # guardamos la imagen...
            //Creamos un objeto con todos los datos para guardar en la base de datos luego del registro
            $base64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            $carpeta = "../public/img/users/" . $usuario;
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            //Guardamos la imagen si todo salio correcto
            file_put_contents("../" . $rutaimg, $base64);
            // borrar disciplinas
            $deleteDisciplinas = RepositorioDisciplinasUsuarios::eliminar_disciplinas_usuario($conexion, $userData["id_usuario"]);
            if ($deleteDisciplinas) {
                # code...


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
                // Datos usuario en sesion
                $userLogin = ControlSesion::datos_sesion();
                //registro dinamico de disciplinas
                $registrarDisciplinas = true;
                foreach ($nuevosIndices as $disciplina) {
                    $result = RepositorioDisciplinasUsuarios::insertar_disciplinas_usuario($conexion, $disciplina, $userData["id_usuario"], $userLogin["id"]);
                    if (!$result) {
                        $registrarDisciplinas = false;
                        break; // Detener el bucle si ocurre algún error
                    }
                }
                if ($registrarDisciplinas) {
                    # si se registraron las disciplinas todo bien...
                    $resultado = 1;
                } else {
                    # no se registraron las disciplinas...
                    $resultado = 2;
                }
            } else {
                # error al borrar disciplinas y actualizar...
                $resultado = 3;
            }
        } else {
            # error al borrar disciplinas y actualizar...
            $resultado = 5;
        }
        return $resultado;
    }
    public static function EditUser($conexion, $userData)
    {
        # colocamos el estado que admin decida...

        $estadoSelect = RepositorioEstadosPaises::obtener_estados_paises_por_id($conexion, $userData['delegacion'][0]);
        $delegacion = $estadoSelect[0]["id_estado_pais"];
        $nombreDelegacion = strtoupper($estadoSelect[0]["estado_nom"]);
        if ($userData['clave'] !== "") {
            # code...


            $claveUser = Encriptrar::Crytp($userData['clave']);
        } else {
            # code...
            $clave = RepositorioUsuario::obtener_clave_usuario($conexion, $userData["id_usuario"]);
            $claveUser = $clave['clave'];
        }
        // buscamos el codigo de usuario existente
        $getUserCode = RepositorioUsuario::obtener_codigo_empleado_usuario($conexion, $userData["id_usuario"]);
        $codigoEmpleado = $getUserCode['codigo_empleado'];
        // creamos el ususario
        $usuario = $nombreDelegacion . "-" . $codigoEmpleado . "-" . $userData['cedula'];
        #guardar imagen
        $imagen = $userData['imagen'];
        $rutaimg = "public/img/users/" . $usuario . "/" . $usuario . ".jpg";
        $userDataUpdate = array(
            'id_usuario' => $userData["id_usuario"],
            'nombre' => $userData['primer-nombre'],
            'nombre2' => $userData['segundo-nombre'],
            'apellido1' =>  $userData['primer-apellido'],
            'apellido2' => $userData['segundo-apellido'],
            'cedula' => $userData['cedula'],
            'fk_sexo' => $userData['sexo'],
            'fecha_nacimiento' => $userData['fecha-nacimiento'],
            'usuario' => $usuario,
            'celular' => $userData['telefono'],
            'inpre_abogado' =>  $userData['inpre-abogado'],
            'correo' =>  $userData['correo'],
            'fk_estado' =>  $delegacion,
            'fk_rol' => $userData['rol'],
            'clave' =>  $claveUser,
            'imagen' => "app/" . $rutaimg
        );



        $actualizacion = RepositorioUsuario::actualizar_usuario($conexion, $userDataUpdate);
        if ($actualizacion) {


            //borrar imagen anterior
            $oldUser = RepositorioUsuario::obtener_usuario_de_usuario($conexion, $userData["id_usuario"]);
            $carpeta = "../public/img/users/" . $oldUser;
            $imgDelete = Libs::borrar_directorio($carpeta);
            # guardamos la imagen...
            //Creamos un objeto con todos los datos para guardar en la base de datos luego del registro
            $base64 = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $imagen));
            $carpeta = "../public/img/users/" . $usuario;
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777, true);
            }
            //Guardamos la imagen si todo salio correcto
            file_put_contents("../" . $rutaimg, $base64);
            // borrar disciplinas
            $deleteDisciplinas = RepositorioDisciplinasUsuarios::eliminar_disciplinas_usuario($conexion, $userData["id_usuario"]);
            if ($deleteDisciplinas) {
                # code...


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
                // Datos usuario en sesion
                $userLogin = ControlSesion::datos_sesion();
                //registro dinamico de disciplinas
                $registrarDisciplinas = true;
                foreach ($nuevosIndices as $disciplina) {
                    $result = RepositorioDisciplinasUsuarios::insertar_disciplinas_usuario($conexion, $disciplina, $userData["id_usuario"], $userLogin["id"]);
                    if (!$result) {
                        $registrarDisciplinas = false;
                        break; // Detener el bucle si ocurre algún error
                    }
                }
                if ($registrarDisciplinas) {
                    # si se registraron las disciplinas todo bien...
                    $resultado = 1;
                } else {
                    # no se registraron las disciplinas...
                    $resultado = 2;
                }
            } else {
                # error al borrar disciplinas y actualizar...
                $resultado = 3;
            }
        }

        return $resultado;
    }
    public static function DeleteUser($conexion, $user)
    {
        // verificar contraseña

        $userLogin = ControlSesion::datos_sesion();
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == 1 || $rolUserLogin["id_rol"] == 4) {
            # verificamos contraseña...

            $passUsuario = Encriptrar::Crytp($user['verifyPassword']); #encriptamos la clave

            $Clave = RepositorioUsuario::clave_existe($conexion,  $userLogin["usuario"], $passUsuario); #verificamos clave

            if ($Clave) {
                // borramos usuario
                $usuario = RepositorioUsuario::obtener_usuario($conexion, $user['id_user']);
                $deleteUser = RepositorioUsuario::eliminar_usuario($conexion, $user['id_user']);
                if ($deleteUser) {
                    //ELIMNAR FOTO DE Y CARPETA DE USUARIO
                    $carpeta = "../public/img/users/" . $usuario['usuario'];
                    $imgDelete = Libs::borrar_directorio($carpeta);
                    if ($imgDelete) {
                        //borrado de imagen correcto
                        # si usuario fue eliminado retormanos 1...
                        $resultado = 1;
                    } else {
                        # error al borrar la imagen pero el usuario fue eliminado
                        $resultado = 2;
                    }
                } else {
                    # si el usuario no fue elimnado avisamos...
                    $resultado = 3;
                }
            } else {
                // avisamos que la clave es incorrecta
                $resultado = 4;
            }
        }
        return $resultado;
    }
    public static function DeleteFicha($conexion, $user)
    {
        // verificar contraseña

        $userLogin = ControlSesion::datos_sesion();

        # verificamos contraseña...

        $passUsuario = Encriptrar::Crytp($user['verifyPassword']); #encriptamos la clave

        $Clave = RepositorioUsuario::clave_existe($conexion,  $userLogin["usuario"], $passUsuario); #verificamos clave

        if ($Clave) {
            // borramos usuario
            $usuario = RepositorioUsuario::obtener_usuario($conexion, $user['id_user']);
            $deleteUser = RepositorioUsuario::eliminar_usuario($conexion, $user['id_user']);
            if ($deleteUser) {
                //ELIMNAR FOTO DE Y CARPETA DE USUARIO
                $carpeta = "../public/img/users/" . $usuario['usuario'];
                $imgDelete = Libs::borrar_directorio($carpeta);
                if ($imgDelete) {
                    //borrado de imagen correcto
                    # si usuario fue eliminado retormanos 1...
                    $resultado = 1;
                } else {
                    # error al borrar la imagen pero el usuario fue eliminado
                    $resultado = 2;
                }
            } else {
                # si el usuario no fue elimnado avisamos...
                $resultado = 3;
            }
        } else {
            // avisamos que la clave es incorrecta
            $resultado = 4;
        }
        return $resultado;
    }
}
