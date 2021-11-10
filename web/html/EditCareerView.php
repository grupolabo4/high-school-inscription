<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $id = $_POST['id'];
    $careerInstance = new Careers();
    $careerInstance->updateName($id, $name);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../controllers/careersList.php");
} 

?>

<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Editar carrera</h5>
        </div>
        <form action="" method="POST">
          <div class="card-body">
            <div class="mb-3">
              <label for="name" class="form-label">Nombre</label>
              <input type="text" name="name" value="<?php echo $this->career['name']?>" class="form-control" id="name">
              <input type="hidden" name="id" value="<?php echo $this->career['id_career']?>">
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
