<?php    
    
    if(!isset($_SESSION["usuar"])){
        header("Location: vistas/login.php");
      }else{
        header("Location: vistas/layout.php");
      }
?>