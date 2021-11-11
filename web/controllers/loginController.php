<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/LoginView.php';


if (count($_POST) > 0) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $administrators = new Administrators();

  // validaciones
  $validEmail = $administrators->validateString($email, 50);
  $validPassword = $administrators->validateString($password, 16);
  $validPassword = hash("sha256", $validPassword);

  $administrator = $administrators->getByEmail($validEmail);
  if ($administrator['password'] == $validPassword) {
    createSession($administrator['id_administrator']);
  }  
} else {
  $view = new LoginView();
  $view->render();
}

?>