<?php   
     
     unset($_SESSION['usuar']);
     unset($_SESSION['identificacion']);
     unset($_SESSION['correo']);
     unset($_SESSION['rol']);
     session_destroy();
     header("Location: ../index.php"); 
?>