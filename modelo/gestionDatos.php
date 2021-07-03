<?php    // CRUD A LA BASE DE DATOS

require 'conexion.php';



class servicioDatos extends Conexion
{
    public function __construct() {
        parent::__construct();
    }
    // *********************************** Funciones para Usuario ****************************************

    public function obtenerUsuarios() {       //SQL de usuarios Activos
        $consulta= $this->conexion->query('SELECT * FROM usuarios');
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;
    }  

    public function obtenerUsuarioRol($roles) {       //SQL de usuarios Activos
        $consulta= $this->conexion->query("SELECT * FROM usuarios WHERE id='".$roles."'");
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;
    } 

    public function consultarroles() {     // SQL de tipos de roles **
        $consulta= $this->conexion->query('SELECT * FROM roles');
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;
    } 
    
    public function consultarUsuario ($identificacion) {   // SQL de usuario detalle **
        $consulta= $this->conexion->query("SELECT * FROM usuarios where identificacion='".$identificacion."'");
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;
 
    }

    public function consultarnota ($identificacion) {   // SQL de usuario notas **
        $consulta= $this->conexion->query("SELECT * FROM sabana_notas WHERE id_estudiante='".$identificacion."'");
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        $this->conexion->close();
        return $resultado;
    }

    public function crearUsuario($identificacion,$nombre,$apellido,$correo,$celular,$rol,$contrasena) {  //SQL de usuario nuevo **
        $sql ="INSERT INTO usuario (identificacion,nombre,apellido,correo,celular,rol,contrasena) VALUES ('".$identificacion."','".$nombre."','".$apellido."','".$correo."','".$celular."' ,".$rol.",'".$contrasena."');";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $this->conexion->close();
            return true;
        } else {
            $this->conexion->close();
            return false;
        }
    }

    public function modificarusuario($identificacion,$nombre,$apellido,$correo,$celular,$rol,$contrasena) {  //SQL de usuario Actualizar **
        $sql ="UPDATE usuario SET nombre='".$nombre."', apellido='".$apellido."', correo='".$correo."', celular='".$celular."', rol='".$rol."',  contrasena='".$contrasena."' WHERE identificacion='".$identificacion."'";
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $this->conexion->close();
            return true;
        } else {
            $this->conexion->close();
            return false;
        }
    }

    public function eliminarusuario($identificacion) {  // elimina al usuario
        $sql ="DELETE FROM usuario WHERE identificacion='".$identificacion."'";        
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $this->conexion->close();
            return true;
        } else {
            $this->conexion->close();
            return false;
        }
        
    }

    public function validarCodigo($identificacion) {
         $consulta= $this->conexion->query("SELECT * FROM usuarios where identificacion='".$identificacion."'");
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
        if ($resultado)
           return true;
           else
           return false;
    }

    public function validarUsuario($usuario, $contrasena) {
       $consulta= $this->conexion->query("SELECT * FROM usuarios where identificacion='".$usuario."' and contrasena ='".$contrasena."'");
       $resultado = $consulta->fetch_all(MYSQLI_ASSOC);
       $this->conexion->close();
       return $resultado;
   }

    // *********************************** Funciones para Notas ****************************************
    
    public function crearNotas($id_estudiante, $notauno,$notados,$notatres,$promedio,$estado) {  //SQL de usuario nuevo notas**
        $sql ="INSERT INTO notas (id_estudiante,notauno,notados,notatres,promedio,estado) VALUES ('".$id_estudiante."','".$notauno."','".$notados."','".$notatres."','".$promedio."' ,'".$estado."');";
       
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $this->conexion->close();
            return true;
        } else {
            $this->conexion->close();
            return false;
        }
    }

    public function modificarNota($id_estudiante,$notauno,$notados,$notatres,$promedio,$estado) {  //SQL de usuario Actualizar notas**
        $sql ="UPDATE notas SET notauno='".$notauno."', notados='".$notados."', notatres='".$notatres."', promedio='".$promedio."', estado='".$estado."'  WHERE id_estudiante='".$id_estudiante."'";
     
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $this->conexion->close();
            return true;
        } else {
            $this->conexion->close();
            return false;
        }
    }

    public function eliminarnota($identificacion) { // elimina notas del usuario
        $sql ="DELETE FROM notas WHERE id_estudiante ='".$identificacion."'";        
        $resultado = $this->conexion->query($sql);
        if ($resultado) {
            $this->conexion->close();
            return true;
        } else {
            $this->conexion->close();
            return false;
        }
    }


    


}


?>