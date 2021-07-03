<div class="col-12"> 
<h1 class="h3 titulo">  <?php echo $titulo?> </h1>
</div>

<form class="row" id="formulario" action="../controladores/usuariosControlador.php?accion=<?php echo $_GET['subaccion']?>" method="post">

    <div class="col-4" align="right">
        <label class="form-label">identificacion</label>
    </div>
    <div class="col-8">
        <?php 
        if (isset($identificacion)){
          $rol= "<option value='".$id."'>".$nombre_rol."</option>";                  
          echo "<input type='number' pattern='{4,16}'  class='form-control col-7' readonly id='identificacion' name='identificacion' placeholder='0000' value='" . $identificacion . "' onkeyup='generarcontrasena();' required>";
        }else{
          $identificacion="";
          $nombre ="";
          $apellido=""; 
          $correo="";
          $contrasena ="";
          $celular="";
          $nombre_rol="";
          $id="";
          $rol="";          
          echo "<input type='number' pattern='{4,16}' class='form-control col-7' id='identificacion' name='identificacion' placeholder='0000' value='" . $identificacion . "' onkeyup='generarcontrasena();' required>";
        }?>
    </div>
    <?php 
      if (isset($ErrorCodigo))
        echo "<div class='alert alert-danger' role='alert'> $ErrorCodigo </div>"  ?>


    <div class="col-4" align="right">
      <label class="form-label">Apellido</label>
    </div>
    <div class="col-8">
      <input type="text" class="form-control col-7" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{2,40}" name="apellido" id="apellido" placeholder="Apellido" value="<?php echo $apellido ?>"  required>
    </div>

    <div class="col-4" align="right">
      <label class="form-label">Nombre</label>
    </div>
    <div class="col-8">
      <input type="text" class="form-control col-7" pattern="[A-Za-zñÑáéíóúÁÉÍÓÚ ]{2,40}" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>" onkeyup="generarcontrasena();" required>
    </div>

    

    <div class="col-4" align="right">
      <label class="form-label">Correo</label>
    </div>
    <div class="col-8">
      <input type="email" class="form-control col-7" name="correo" placeholder="usuario@dominio"  value="<?php echo $correo ?>" required>
    </div>

    <div class="col-4" align="right">
      <label class="form-label">Celular</label>
    </div>
    <div class="col-8">
      <input type="text" class="form-control col-7" name="celular" placeholder="xxx xxxxxxx"  value="<?php echo $celular ?>" required>
    </div>

    <div class="col-4" align="right">
      <label class="form-label">Contraseña</label>
    </div>
    <div class="col-8">
      <input type="text" class="form-control col-7" id="contrasena" name="contrasena" placeholder="xxxxxx"  value="<?php echo $contrasena ?>" required>
    </div>

    <div class="col-4" align="right">
      <label class="form-label">Rol</label>
    </div>
    <div class="col-8">
        <select name="rol" id="rol" class="form-control col-7">          
          <?php 
            echo $rol;
            foreach ($listaRol as $roles) { ?>              
              <option value="<?php echo $roles['id']?>"><?php echo $roles['nombre_rol']?></option> <?php 
              } ?>
        </select>
    </div>  
    
    <div class="col-9 btones" align="right" >
      <a class="btn btn-secondary" href="usuariosControlador.php?accion=0">Volver</a>
      <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

