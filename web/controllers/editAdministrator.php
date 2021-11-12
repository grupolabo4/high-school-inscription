<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/EditAdministratorView.php';

checkSession();

if (count($_POST) > 0) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $administrators = new Administrators();

  if ( !isset($id) ) die("El campo no existe");
  if ( !isset($name) ) die("El campo no existe");
  if ( !isset($lastname) ) die("El campo no existe");
  if ( !isset($email) ) die("El campo no existe");
  
  try {
    $administrators->update($id, $name, $lastname, $email);
    header("Location: administradores");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }

}  else {
  $id = $_GET['id'];
  $administrator = new Administrators();
  
  try {
    $administrator = $administrator->getById($id);
    $view = new EditAdministratorView();
    $view->administrator = $administrator[0];
    $view->render();
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
  
}

?>