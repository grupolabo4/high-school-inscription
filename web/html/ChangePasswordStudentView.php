<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Cambiar contraseña</h5>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label for="password" class="form-label">Nuevo password</label>
              <input type="password" name="password" class="form-control" id="password" maxlength="16" required>
              <input type="hidden" name="id" value="<?php echo $this->student['id_student']?>">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>