<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Cambiar contraseña</h5>
        </div>
        <form action="" method="POST" action="/editar-estado-academico-"<?=htmlentities($student_subject['id'])?> >
          <div class="card-body">
            <div class="mb-3">
              <input type="hidden" name="id_post" value=<?=htmlentities($student_subject['id'])?> class="form-control" id="id_post"  >
              <label for="value1" class="form-label">Nota Cursada</label>
              <input type="number" name="value1" value=<?=htmlentities($student_subject['value1'])?> class="form-control" id="value1" min = "5" max= "10" maxlength="2" >
              <label for="value2" class="form-label">Nota Final</label>
              <input type="number" name="value2" value=<?=htmlentities($student_subject['value2'])?> class="form-control" id="value2" min = "5" max= "10" maxlength="2" >   
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" name="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>