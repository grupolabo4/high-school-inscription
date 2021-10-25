<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $password = $_POST['password'];
    $password = hash("sha256", $password);
    $id = $_POST['id'];
    $administrators = new Administrators();
    $administrators->changePassword($id, $password);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../../index.php");
} 

?>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Cambiar contraseña</h5>
  </div>
  <form action="" method="POST">
    <div class="card-body">
      <div class="mb-3">
        <label for="password" class="form-label">Nuevo password</label>
        <input type="password" name="password" class="form-control" id="password">
        <input type="hidden" name="id" value="<?php echo $this->administrator['id_administrator']?>">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </form>
</div>