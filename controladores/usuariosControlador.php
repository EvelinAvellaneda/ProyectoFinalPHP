<?php
    require '../modelo/gestionDatos.php';
    $datos = new servicioDatos();
    $listar = new servicioDatos();
    $validar = new servicioDatos();
   
    switch($_GET['accion']) {
        case 0:  //Llenar Lista de usuarios en el sistema
                if($_SESSION["rol"]=="Coordinador"){
                    $listaUsuarios = $listar->obtenerUsuarios();
                }else{
                    $listaUsuarios = $datos->obtenerUsuarioRol(2); 
                } 
                $vista = "listarUsuarios.php";
                break;
        case 1: //Llenar <Select> con los tipos de roles activos en el sistema
                $listaRol = $datos->consultarroles();   
                $vista = "crud.php";
                $titulo = "Nuevo Usuario";
                break;
        case 2: //Insertar Datos en la base de datos
                if( (isset($_POST['identificacion'])) && (!empty($_POST['identificacion'])) &&
                (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
                (isset($_POST['apellido'])) && (!empty($_POST['apellido'])) &&
                (isset($_POST['correo'])) && (!empty($_POST['correo'])) && 
                (isset($_POST['celular'])) && (!empty($_POST['celular'])) && 
                (isset($_POST['rol'])) && (!empty($_POST['rol'])) && 
                (isset($_POST['contrasena'])) && (!empty($_POST['contrasena']))  )  {
                    $identificacion=$_POST['identificacion'];
                    $nombre=$_POST['nombre'];
                    $apellido=$_POST['apellido'];
                    $correo=$_POST['correo'];
                    $celular=$_POST['celular'];
                    $rol=$_POST['rol'];
                    $contrasena=$_POST['contrasena'];  
                    $id=$_POST['rol'];
                    $nombre_rol="";
                    $validacion = $validar->consultarUsuario($identificacion);        
                    if (!$validacion) { 
                        $crear = $datos->crearUsuario($identificacion,$nombre,$apellido,$correo,$celular,$rol,$contrasena);
                        if ($crear) {
                            $listaUsuarios = $listar->obtenerUsuarios();
                            $vista = "listarUsuarios.php";
                        }else {
                            $vista = "crud.php";
                        }
                    }else{
                        $ErrorCodigo = "El identificacion ya ".$identificacion." existe";
                        $vista = "crud.php";
                    }
                }else{
                    $vista = "crud.php";      
                }
                break;
        case 3: //Llenar formatos vista detalle
                $identificacion=$_GET['id'];
                $usuario = $datos->consultarUsuario($identificacion); 
                if ($usuario) { 
                    $listado = new servicioDatos();
                    $listaUsuarios = $listar->consultarnota($identificacion);
                } 
                $vista = "listarUDetalle.php";
                break;
        case 4: //Llenar formatos vista detalle para editar
                $identificacion=$_GET['id'];
                $usuario = $listar->consultarUsuario($identificacion); 
                foreach ($usuario as $u){
                    $identificacion=$u['identificacion'];
                    $nombre =$u['nombre'];
                    $apellido=$u['apellido']; 
                    $correo=$u['correo'];
                    $contrasena =$u['contrasena'];
                    $celular=$u['celular'];
                    $nombre_rol=$u['nombre_rol'];
                    $id=$u['id'];
                    $rol=$u['rol'];  
                }
                $titulo = "Editar Usuario";
                $listaRol = $datos->consultarroles();   
                $vista = "crud.php";
                break;
        case 5: //Actualizar registro de usuario    
                if( (isset($_POST['identificacion'])) && (!empty($_POST['identificacion'])) &&
                    (isset($_POST['nombre'])) && (!empty($_POST['nombre'])) && 
                    (isset($_POST['apellido'])) && (!empty($_POST['apellido'])) &&
                    (isset($_POST['correo'])) && (!empty($_POST['correo'])) && 
                    (isset($_POST['celular'])) && (!empty($_POST['celular'])) && 
                    (isset($_POST['rol'])) && (!empty($_POST['rol'])) && 
                    (isset($_POST['contrasena'])) && (!empty($_POST['contrasena']))  )  {
                    $identificacion=$_POST['identificacion'];
                    $nombre=$_POST['nombre'];
                    $apellido=$_POST['apellido'];
                    $correo=$_POST['correo'];
                    $celular=$_POST['celular'];
                    $rol=$_POST['rol'];
                    $contrasena=$_POST['contrasena'];                     
                    $actualizar = $datos->modificarusuario($identificacion,$nombre,$apellido,$correo,$celular,$rol,$contrasena);
                    if ($actualizar) {
                        $listaUsuarios = $listar->obtenerUsuarios();
                        $vista = "listarUsuarios.php";
                    }else {
                        $vista = "crud.php"; }       
                }else {
                    $vista = "crud.php";      
                }
                break;  
        case 6: // Editar notas
                $identificacion=$_GET['id'];
                $usuario = $datos->consultarUsuario($identificacion); 
                if ($usuario) { 
                    $listado = new servicioDatos();
                    $listaUsuarios = $listar->consultarnota($identificacion);
                } 
                $vista = "editarNotas.php";
                break;
        case 7: //Llenar formatos vista detalle para eliminar
                $identificacion=$_GET['id'];                   
                $usuario = $datos->consultarUsuario($identificacion); 
                if ($usuario) { 
                    $listado = new servicioDatos();
                    $listaUsuarios = $listar->consultarnota($identificacion);
                } 
                $vista = "listarUEliminar.php";
                break;  
        case 8: // guardar notas
                if( (isset($_POST['id_estudiante'])) && (!empty($_POST['id_estudiante'])) &&
                    (isset($_POST['notauno'])) && (!empty($_POST['notauno'])) &&
                    (isset($_POST['notados'])) && (!empty($_POST['notados'])) && 
                    (isset($_POST['notatres'])) && (!empty($_POST['notatres'])) &&
                    (isset($_POST['promedio'])) && (!empty($_POST['promedio'])) && 
                    (isset($_POST['estado'])) && (!empty($_POST['estado'])))  {
                    $id_estudiante=$_POST['id_estudiante'];
                    $notauno=$_POST['notauno'];
                    $notados=$_POST['notados'];
                    $notatres=$_POST['notatres'];
                    $promedio=$_POST['promedio'];
                    $estado=$_POST['estado'];
                    $validacion = $validar->consultarnota($id_estudiante);        
                    if (!$validacion) { 
                        $dato = new servicioDatos();
                        $crearnota = $dato->crearNotas($id_estudiante, $notauno,$notados,$notatres,$promedio,$estado);
                    }else{
                        $dato = new servicioDatos();
                        $modificarnota = $dato->modificarNota($id_estudiante, $notauno,$notados,$notatres,$promedio,$estado);
                    }
                    if($_SESSION["rol"]=="Coordinador"){
                        $listaUsuarios = $listar->obtenerUsuarios();
                    }else{
                        $listaUsuarios = $datos->obtenerUsuarioRol(2); 
                    }
                    $vista = "listarUsuarios.php";
                }else{
                    $vista = "editarNotas.php";      
                }
                break;  
        case 9: // Eliminar registro de usuario
                $identificacion=$_GET['id'];               
                $eliminar = $datos->eliminarnota($identificacion);
                if ($eliminar) {
                    $dato = new servicioDatos();
                    $eliminar = $dato->eliminarusuario($identificacion);
                }else{
                    $dato = new servicioDatos();
                    $eliminar = $dato->eliminarusuario($identificacion);
                }                
                if($_SESSION["rol"]=="Coordinador"){
                    $listaUsuarios = $listar->obtenerUsuarios();
                }else{
                    $listaUsuarios = $datos->obtenerUsuarioRol(2); 
                }
                $vista = "listarUsuarios.php";
                break;
        case 10:  //Llenar Lista de usuarios en el sistema por el rol de estudiante
                $listaUsuarios = $datos->obtenerUsuarioRol(2);  
                $vista = "listarUsuarios.php";
                break;
        case 11:  //Llenar Lista de usuarios en el sistema por el rol de estudiante
            $identificacion=$_GET['id'];
            $usuario = $datos->consultarUsuario($identificacion); 
                if ($usuario) { 
                    $listado = new servicioDatos();
                    $listaUsuarios = $listar->consultarnota($identificacion);
                } 
                $vista = "listarUDetalle.php";
                break;
        default:
                
                $v="home.php";
                break;
    }


        
        
        
        require "../vistas/layout.php"
?>