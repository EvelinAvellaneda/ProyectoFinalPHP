<div class="col-12"> 
      <h1 class="h3 titulo"> Detalle Usuario </h1>
  </div> 
  <table class="table col-10" >
    <thead>
      <tr>
        <th scope="col" ><i class="fas fa-user"></i></th>
        <th scope="col" >Identificación</th>
        <th scope="col" >Nombre y Apellidos</th>
        <th scope="col" >Correo</th>
        <th scope="col" >Celular</th>
        <th scope="col" >Rol</th>
      </tr>
    </thead>
          <tbody> <?php
  
  foreach ($usuario as $u) {  ?>
        <tr>
          <td><i class="fas fa-user"></i></td>
          <td> <?php echo $u['identificacion'] ?></td>
          <td> <?php echo $u['nombre'] . " " . $u['apellido'] ; ?></td>
          <td> <?php echo $u['correo'] ?></td>
          <td> <?php echo $u['celular'] ?></td>          
          <td> <?php echo $u['nombre_rol'] ?></td>
        </tr><?php
  } ?>
  </tbody>
        </table><?php
  
  $encab=0;
  foreach ($listaUsuarios as $nota) {
    if($encab==0){
      $encab=1; ?>
      <table class="table col-8" >
        <thead>
          <tr>
            <th scope="col" ></th>
            <th scope="col" >Nota uno</th>
            <th scope="col" >Nota dos</th>
            <th scope="col" >Nota Tres</th>
            <th scope="col" >Promedio</th>
            <th scope="col" >Estado</th>
          </tr>
        </thead>
        <tbody><?php 
      } ?>
        <tr>
          <th><i class="fas fa-vote-yea"></i></th>          
          <td><?php echo $nota['notauno'] ?></td>
          <td><?php echo $nota['notados']?></td>
          <td><?php echo $nota['notatres']?></td>
          <td><?php echo $nota['promedio']?></td>
          <td><?php echo $nota['estado']?></td>
          </tr><?php
  }?>
          </tbody>
        </table>

        <div class="col-11 btones" align="center" >

        <?php if($_SESSION["rol"]!="Estudiante"){ ?>
          <a class="btn btn-secondary" href="usuariosControlador.php?accion=0">Volver</a>
        <?php }?>
        
          
        </div>