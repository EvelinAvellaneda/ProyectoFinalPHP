<div class="col-12"> 
    <h1 class="h3 titulo"> Administrador de Usuarios </h1>
</div>
<div class="col-12" align="right"> 
  <?php if($_SESSION["rol"]=="Coordinador"){ ?>
    <a class="btn btn-primary" href="usuariosControlador.php?accion=1&subaccion=2"><i class="fas fa-plus icobutton"></i>Nuevo Usuario</a>
  <?php } ?>
  </div>

        <table class="table col-12" >
          <thead>
            <tr>
              <th scope="col" ><i class="fas fa-user "></i></th>
              <th scope="col" >Identificación</th>
              <th scope="col" >Nombre y Apellidos</th>
              <th scope="col" >Correo</th>
              <th scope="col" >Celular</th>
              <th scope="col" >Rol</th>
              <th scope="col" >Acción</th>
            </tr>
          </thead>
          <tbody>


            <?php
            foreach ($listaUsuarios as $usuario) {
              ?>
                <tr>
                  <td><i class="fas fa-user "></i></td>
                  <td scope="row"><?php echo $usuario['identificacion']?></th>
                  <td><?php echo $usuario['nombre'] . " " . $usuario['apellido'] ; ?></td>
                  <td><?php echo $usuario['correo']?></td>
                  <td><?php echo $usuario['celular']?></td>
                  <td><?php echo $usuario['nombre_rol']?></td>
                  <td>
                  <?php if($_SESSION["rol"]=="Coordinador"){ ?>
                        <a class="btn btn-primary btn-sm" href="../controladores/usuariosControlador.php?accion=3&id=<?php echo $usuario['identificacion']?>"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="../controladores/usuariosControlador.php?accion=4&id=<?php echo $usuario['identificacion']?>&subaccion=5"><i class="fas fa-pencil-alt"></i></a>
                        <a class="btn btn-primary btn-sm" href="../controladores/usuariosControlador.php?accion=6&id=<?php echo $usuario['identificacion']?>"><i class="fas fa-vote-yea"></i></a>                      
                        <a class="btn btn-primary btn-sm" href="../controladores/usuariosControlador.php?accion=7&id=<?php echo $usuario['identificacion']?>"><i class="fas fa-trash-alt"></i></a>  </td>
                  <?php } ?>
                  <?php if($_SESSION["rol"]=="Docente"){ ?>
                        <a class="btn btn-primary btn-sm" href="../controladores/usuariosControlador.php?accion=3&id=<?php echo $usuario['identificacion']?>"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-primary btn-sm" href="../controladores/usuariosControlador.php?accion=6&id=<?php echo $usuario['identificacion']?>"><i class="fas fa-vote-yea"></i></a>  </td>
                  <?php } ?>
                </tr>
            <?php
            }
            ?>
          </tbody>
        </table>

