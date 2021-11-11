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

  //validaciones
  $validName = $administrators->validateString($name, 50);
  $validLastName = $administrators->validateString($lastname, 50);
  $validEmail = $administrators->validateString($email, 50, 7);
  $validPassword = $administrators->validateString($password, 16);

  $validPassword = hash("sha256", $validPassword);

  $administrators->create($validName, $validLastName, $validEmail, $validPassword);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: ../controllers/administratorsList.php");
} else {
  $view = new AddAdministratorView();
  $view->render();
}

?>