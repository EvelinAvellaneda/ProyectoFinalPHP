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
        </tr><?php
  } ?>
  </tbody>
        </table>
<?php

        $nu="";
        $nd="";
        $nt="";
        $pm="";
        $st="";

        foreach ($listaUsuarios as $notas) {
            $nu = $notas['notauno'];
            $nd = $notas['notados'];
            $nt = $notas['notatres'];
            $pm = $notas['promedio'];
            $st = $notas['estado'];
        }

?>




<form class="row" action="../controladores/usuariosControlador.php?accion=8" method="post">


      <div class="col-1"></div>

      <div class="col-2">
      <label class="form-label">Primer Nota:</label>
        <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo $u['identificacion'] ?>" >
        <input type="number" onkeyup="promedioNota();" class="form-control col-12" id="notauno" name="notauno" placeholder="0 al 10"  value="<?php echo $nu ?>" required>
      </div>
      <div class="col-2">
      <label class="form-label">Segunda Nota:</label>
        <input type="number"  onkeyup="promedioNota();" class="form-control col-12" id="notados" name="notados" placeholder="0 al 10"  value="<?php echo $nd ?>" required>
      </div>
      <div class="col-2">
      <label class="form-label">Tercer Nota:</label>
        <input type="number" onkeyup="promedioNota();" class="form-control col-12" id="notatres" name="notatres" placeholder="0 al 10" value="<?php echo $nt ?>" required>
      </div>
      <div class="col-2">
      <label class="form-label">Promedio:</label>
        <input type="text" class="form-control col-12" readonly id="promedio" name="promedio" placeholder="Promedio " value="<?php echo $pm ?>" required>
      </div>
      <div class="col-2">
      <label class="form-label">Estado:</label>
        <input type="text" class="form-control col-12" readonly id="estado" name="estado" placeholder="Estado" value="<?php echo $st ?>" required>
      </div>
      


    


            <div class="col-12 btones" align="right" >
              <a class="btn btn-secondary" href="usuariosControlador.php?accion=0">Volver</a>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>


</form>