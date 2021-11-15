<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../models/Students.php';
require '../views/LoginView.php';


if (count($_POST) > 0) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rol = $_POST['role'];
  $administrators = new Administrators();
  $students = new Students();

  if ( !isset($email) ) die("El campo no existe");
  if ( !isset($password) ) die("El campo no existe");
  $password = hash("sha256", $password);

  try {
    if ($rol == "admin") {
      $user = $administrators->getByEmail($email);
    } else {
      $user = $students->getByEmail($email);
    }
    if ($user['password'] == $password) {
      createSession($user['id_administrator'], $rol);
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