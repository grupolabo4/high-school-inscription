<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/ChangePasswordAdministratorView.php';

checkSession();

if (count($_POST) > 0) {
  $password = $_POST['password'];
  $id = $_POST['id'];
  $administrators = new Administrators();

  // validaciones
  $validId = $administrators->validateID($id);
  $validPassword = $administrators->validateString($password, 16);

  $validPassword = hash("sha256", $validPassword);

  $administrators->changePassword($validId, $validPassword);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: ../../index.php");
} else {
  $id = $_GET['id'];
  $administrator = new Administrators();
  
  // validacion
  $validId = $administrator->validateID($id);
  
  $administrator = $administrator->getById($validId);
  
  $view = new ChangePasswordAdministratorView();
  $view->administrator = $administrator[0];
  $view->render();
}

?>