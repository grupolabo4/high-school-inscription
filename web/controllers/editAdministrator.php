<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/EditAdministratorView.php';

checkSession();

if (count($_POST) > 0) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $id = $_POST['id'];
  $administrators = new Administrators();

  //validaciones
  $validId = $administrators->validateID($id);
  $validName = $administrators->validateString($name, 50);
  $validLastName = $administrators->validateString($lastname, 50);
  $validEmail = $administrators->validateString($email, 50, 7);
  
  $administrators->update($validId, $validName, $validLastName, $validEmail);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: administradores");
}  else {
  $id = $_GET['id'];
  $administrator = new Administrators();

  // validacion
  $validId = $administrator->validateID($id);
  
  $administrator = $administrator->getById($validId);
  
  $view = new EditAdministratorView();
  $view->administrator = $administrator[0];
  $view->render();
}

?>