<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/ChangePasswordAdministratorView.php';

checkSession();

if (count($_POST) > 0) {
  $password = $_POST['password'];
  $id = $_POST['id'];
  $administrators = new Administrators();

  if ( !isset($id) ) die("El campo no existe");
  if ( !isset($password) ) die("El campo no existe");

  $validPassword = hash("sha256", $password);

  try {
    $administrators->changePassword($id, $validPassword);
    header("Location: administradores");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }

} else {
  $id = $_GET['id'];
  $administrator = new Administrators();
  
  try {
    $administrator = $administrator->getById($id);
    $view = new ChangePasswordAdministratorView();
    $view->administrator = $administrator[0];
    $view->render();
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
}

?>