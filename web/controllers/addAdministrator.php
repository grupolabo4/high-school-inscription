<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/AddAdministratorView.php';

checkSession();

if (count($_POST) > 0) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $administrators = new Administrators();

  if ( !isset($name) ) die("El campo no existe");
  if ( !isset($lastname) ) die("El campo no existe");
  if ( !isset($email) ) die("El campo no existe");
  if ( !isset($password) ) die("El campo no existe");

  $ePassword = hash("sha256", $password);

  try {
    $administrators->create($name, $lastname, $email, $ePassword);
    header("Location: administradores");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }

} else {
  $view = new AddAdministratorView();
  $view->render();
}

?>