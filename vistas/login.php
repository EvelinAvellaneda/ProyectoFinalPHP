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
    <link rel="stylesheet" href="../assets/css/stylelogin.css">
  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('../assets/images/bg.png');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h5>Centro de Gestión de Mercados, Logística y Tenologías de la Información</h5>			
			<br>
            <h5 class="mb-4">Login</h5>

            <form action="../controladores/usuariosControladorlogin.php" method="post">
              <div class="form-group first">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" placeholder="Numero de Identificación" id="usuario" name="usuario">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" placeholder="Contraseña" id="contrasena" name="contrasena">
              </div>              
              <div class="d-flex mb-5 align-items-center">               
              </div>

              <input type="submit" value="Ingresar" class="btn btn-block btn-primary">
              <?php if (isset($ErrorCodigo))
                 echo "<div class='alert alert-danger' role='alert'> $ErrorCodigo </div>"  ?>
			  

            </form>
          </div>
        </div>
      </div>
    </div>    
  </div>
    
    

