<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Inicio</h5>
        </div>
        <div class="card-body">
          <?php if($this->is_admin) { ?>
            <a href="carreras" class="btn btn-primary">Carreras</a>
            <a href="administradores" class="btn btn-primary">Administradores</a>
            <a href="alumnos" class="btn btn-primary">Alumnos</a>
          <?php } else { ?>
            <a href='editar-alumno-<?=htmlentities($this->id)?>' class='btn btn-primary mx-2'>Editar datos personales</a>
            <a href='materias-<?=htmlentities($this->career)?>' class='btn btn-primary mx-2'>Ver materias</a>
            <a href='estado-academico-<?=htmlentities($this->id)?>' class='btn btn-primary mx-2'>Ver estado academico</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </body>
</html>