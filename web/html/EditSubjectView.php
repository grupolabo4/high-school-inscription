<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Editar materia</h5>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" name="name" value="<?php echo $this->subject['name']?>" maxlength="80" class="form-control" id="name" required>
            </div>
            <div class="mb-3">
              <label for="teacher" class="form-label">Profesor</label>
              <input type="text" name="teacher" value="<?php echo $this->subject['teacher']?>" maxlength="50" class="form-control" id="teacher" required>
            </div>
          </div>
          <input type="hidden" name="id" value="<?php echo $this->subject['id_subject']?>">
          <input type="hidden" name="careerId" value="<?php echo $_GET['careerId']?>">
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
