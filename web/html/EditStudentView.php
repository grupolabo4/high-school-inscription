<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $students = new Students();
    $students->update($id, $name, $lastname, $email, $identifier);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../controllers/indexController.php");
} 

?>
<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Editar alumno</h5>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" name="name" value="<?php echo $this->student['name']?>" class="form-control" id="name">
            </div>
            <div class="mb-3">
              <label for="lastname" class="form-label">Apellido</label>
              <input type="text" name="lastname" value="<?php echo $this->student['lastname']?>" class="form-control" id="lastname">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" name="email" value="<?php echo $this->student['email']?>" class="form-control" id="email">
            </div>
            <input type="hidden" name="id" value="<?php echo $this->student['id_student']?>">
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>