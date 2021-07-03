<?php   
    session_destroy();
    require '../modelo/gestionDatos.php';
    $datos = new servicioDatos();
    if( (isset($_POST['usuario'])) && (!empty($_POST['usuario'])) &&
       (isset($_POST['contrasena'])) && (!empty($_POST['contrasena']))  )
       $usuario=$_POST['usuario'];
       $contrasena=$_POST['contrasena'];
       $usu = $datos->validarUsuario($usuario, $contrasena); 
       
       if(!$usu){
            $ErrorCodigo = "Error en el usuario y/o contraseña";
       }else{
            foreach ($usu as $usuariologin){
                $identificacion=$usuariologin['identificacion'];
                $nombre =$usuariologin['nombre']  . " " . $usuariologin['apellido']; 
                $correo=$usuariologin['correo'];
                $contrasena =$usuariologin['contrasena'];
                $nombre_rol=$usuariologin['nombre_rol']; 
             }
            $status = session_status();
            if($status == PHP_SESSION_NONE){            
                session_start();
                $_SESSION['identificacion']=$identificacion;
                $_SESSION['usuar']=$nombre;
                $_SESSION['correo']=$correo;
                $_SESSION['rol']=$nombre_rol;

            }else
            if($status == PHP_SESSION_DISABLED){
                
            }else
            if($status == PHP_SESSION_ACTIVE){
                session_destroy();
                unset($_SESSION['usuar']);
                session_start();
            }
            
            $vista = "home.php"; 
          }
    $vista = "home.php"; 
    require "../vistas/layout.php"
?>