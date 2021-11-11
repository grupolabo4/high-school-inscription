<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/AddStudentView.php';

checkSession();

if (count($_POST) > 0) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $identifier = $_POST['identifier'];
  $student = new Students();

  //validaciones
  $validName = $student->validateString($name, 50);
  $validLastName = $student->validateString($lastname, 50);
  $validEmail = $student->validateString($email, 50, 7);
  $validPassword = $student->validateString($password, 16);
  $validIdentifier = $student->validateNumber($identifier);

  $validPassword = hash("sha256", $validPassword);

  $student->create($validName, $validLastName, $validEmail, $validPassword, $validIdentifier);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: alumnos");
} else {
  $view = new AddStudentView();
  $view->render();
}

?>