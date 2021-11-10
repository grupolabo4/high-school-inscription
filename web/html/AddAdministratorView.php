<?php 

if (count($_POST) > 0) {
  // TODO VALIDAR
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = hash('sha256', $password);
  $administrators = new Administrators();
  $administrators->create($name, $lastname, $email, $password);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: ../controllers/administratorsList.php");
} 

?>

<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Agregar administrador</h5>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" name="name" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Apellido</label>
              <input type="text" name="lastname" class="form-control" id="lastname">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
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

