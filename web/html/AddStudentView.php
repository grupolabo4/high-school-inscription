<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Agregar alumno</h5>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" name="name" class="form-control" id="name" maxlength="50" required>
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Apellido</label>
              <input type="text" name="lastname" class="form-control" id="lastname" maxlength="50" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email" maxlength="50" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password" maxlength="16" required>
            </div>
            <div class="mb-3">
              <label for="identifier" class="form-label">Numero de legajo</label>
              <input type="number" name="identifier" class="form-control" id="identifier" min="1" required>
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

