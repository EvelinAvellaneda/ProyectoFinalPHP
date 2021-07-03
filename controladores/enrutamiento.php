<?php

class enrutamiento {

    public function Ruta($i) {

        switch($i) {
            case 0:
                $v="login.php";
                break;
            case 1:
                $v="nosotros.php";
                break;
            case 2:
                $v="usuariosControlador.php?accion=0";
                break;
            case 3:
                $v="crud.php";
                break;
            case 4:
                $v="nosotros.php";
                break;
            default:
                $v="home.php";
                break;
        }

       return $v;
    }


    public function SubRuta($i) {

        switch($i) {
            case 0:
                $v="mision.php";
                break;
            case 1:
                $v="vision.php";
                break;
            case 2:
                $v="empresa.php";
                break;

            default:
                $v="mision.php";
                break;
            // sub rutas del crud
            ;
        }

       return $v;
    }



}


?>