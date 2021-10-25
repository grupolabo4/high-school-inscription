<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $id = $_POST['id'];
    $careerId = $_POST['careerId'];
    $teacher = $_POST['teacher'];
    $subjectInstance = new Subjects();
    $subjectInstance->updateSubject($id, $name, $teacher);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../controllers/subjectsList.php?id=$careerId");
} 

?>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Editar materia</h5>
  </div>
  <form action="" method="POST">
    <div class="card-body">
      <div class="mb-3">
        <label for="name" class="form-label">Nombre</label>
        <input type="text" name="name" value="<?php echo $this->subject['name']?>" class="form-control" id="name">
      </div>
      <div class="mb-3">
        <label for="teacher" class="form-label">Profesor</label>
        <input type="text" name="teacher" value="<?php echo $this->subject['teacher']?>" class="form-control" id="teacher">
      </div>
    </div>
    <input type="hidden" name="id" value="<?php echo $this->subject['id_subject']?>">
    <input type="hidden" name="careerId" value="<?php echo $_GET['careerId']?>">
    <div class="card-footer">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </form>
</div>