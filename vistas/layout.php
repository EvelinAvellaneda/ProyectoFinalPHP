<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../assets/fonts/icomoon/style.css">
    
    <link rel="stylesheet" href="../assets/css/owl.carousel.min.css">    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>SENA</title>
  </head>
  <body>


    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target bg-white" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-lg-3">
              <nav class="site-navigation text-right ml-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="#" class="nav-link Usuario">
                   
                           <?php echo $_SESSION["usuar"]; ?><br> 
                           <?php echo $_SESSION["correo"]; ?><br> 
                           <?php echo $_SESSION["rol"]; ?></a></li>			          
                </ul>
              </nav>
            </div>


           

            <div class="col-lg-3 text-center">
              <div class="site-logo">
                <a href="../index.php"><i class="fab fa-optin-monster icono"></i> APP SENA</a>
              </div>


              <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3 text-black"></span></a></div>
            </div>
            <div class="col-lg-5">
              <nav class="site-navigation text-left mr-auto " role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="../controladores/rutasControlador.php?rutaOpc=0" class="nav-link">Inicio</a></li>
                  <li><a href="../controladores/rutasControlador.php?rutaOpc=1" class="nav-link">Nosotros</a></li>
                  <?php if($_SESSION["rol"]=="Coordinador"){ ?>
                      <li><a href="../controladores/usuariosControlador.php?accion=0" class="nav-link">Usuarios</a></li>
                  <?php }?>
                  <?php if($_SESSION["rol"]=="Docente"){ ?>
                      <li><a href="../controladores/usuariosControlador.php?accion=10" class="nav-link">Notas</a></li>
                  <?php }?>
                  <?php if($_SESSION["rol"]=="Estudiante"){ ?>
                      <li><a href="../controladores/usuariosControlador.php?accion=11&id=<?php echo  $_SESSION['identificacion']?>" class="nav-link">Notas</a></li>
                  <?php }?>
				          <li><a href="../controladores/usuariosControladorlogout.php" class="nav-link">Salir</a></li>
                </ul>
              </nav>
            </div>
            

          </div>
        </div>

      </header>
    

      <main class="col-12 fondo p-4 d-flex flex-column align-items-center justify-content-start" >
        <?php 
        
        if(!isset($_SESSION["usuar"])){
          header("Location: login.php");
        }
          if (!isset($vista))
              $vista="home.php";

           
        
              

            require $vista;
        
      ?>
        </main>

  <footer class="bg-dark d-flex justify-content-lg-around align-items-center footer">
       
    <div class="d-flex justify-content-lg-around align-items-center m-2">

        <div class="d-flex flex-column align-items-center">
             <p class="text-white m-0 p-0"> Centro de Gestión de Mercados, Logística y Tenologías de la Información </p>
             <p class="text-white m-0 p-0 "> Todos los derechos reservados. Copyright &copy; SENA - ADSI 2021 </p>
        </div>
    </div>

    </footer>

    <script src="../assets/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.sticky.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/funciones.js"></script>
  </body>
</html>