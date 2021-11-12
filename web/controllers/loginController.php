<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/LoginView.php';


if (count($_POST) > 0) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $administrators = new Administrators();

  if ( !isset($email) ) die("El campo no existe");
  if ( !isset($password) ) die("El campo no existe");
  $password = hash("sha256", $password);

  try {
    $administrator = $administrators->getByEmail($email);
    if ($administrator['password'] == $password) {
      createSession($administrator['id_administrator']);
    } else {
      die("password incorrecta");
    }
  } catch (ValidationException $e) {
    die($e->getMessage());
  }

} else {
  $view = new LoginView();
  $view->render();
}

?>