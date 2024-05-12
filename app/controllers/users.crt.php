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
                    "voleibol",
                    "golf",
                    "natacion_aguas_abiertas",
                    "beach_tenis",
                    "padel",
                    "futbol_campo_libre",
                    "futbol_campo_+50"
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
                    "voleibol",
                    "golf",
                    "natacion_aguas_abiertas",
                    "beach_tenis",
                    "padel",
                    "futbol_campo_libre",
                    "futbol_campo_+50"
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
            $disciplinas = RepositorioDisciplinasUsuarios::obtener_disciplinas_usuarios($conexion, $usuario['id_usuario']);
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
            $disciplinas = RepositorioDisciplinasUsuarios::obtener_disciplinas_usuarios($conexion, $usuario['id_usuario']);
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
    public static function GetUserSimple($conexion, $user)
    {
        $getUser = RepositorioUsuario::obtener_usuario_por_id_simple($conexion, $user);

        $user = array(
            'img' => $getUser[0]["imagen"],
            'usuario' =>  $getUser[0]["usuario"],
            'nombre' =>  $getUser[0]["nombre"],
            'apellido' =>  $getUser[0]["apellido1"],
            'nombre_completo' => $getUser[0]["nombre"] . " " . $getUser[0]["nombre2"] . " " . $getUser[0]["apellido1"] . " " . $getUser[0]["apellido2"],
            'rol' =>  $getUser[0]["nombre_rol"],
            'codigo_fedeav' =>  $getUser[0]["codigo_empleado"],
            'delegacion' =>  $getUser[0]["estado_nom"],

        );
        return $user;
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
                "voleibol",
                "golf",
                "natacion_aguas_abiertas",
                "beach_tenis",
                "padel",
                "futbol_campo_libre",
                "futbol_campo_+50"
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
            // borrado de disciplinas haya o no
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
                "voleibol",
                "golf",
                "natacion_aguas_abiertas",
                "beach_tenis",
                "padel",
                "futbol_campo_libre",
                "futbol_campo_+50"
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
        $rolUserLogin = UsersCrt::GetRol($conexion, $userLogin["usuario"]);
        if ($rolUserLogin["id_rol"] == 1 || $rolUserLogin["id_rol"] == 2 || $rolUserLogin["id_rol"] == 4) {
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
}
