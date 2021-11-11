<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/ChangePasswordStudentView.php';

checkSession();

if (count($_POST) > 0) {
  $password = $_POST['password'];
  $id = $_POST['id'];
  $student = new Students();

  // validaciones
  $validId = $student->validateID($id);
  $validPassword = $student->validateString($password, 16);

  $validPassword = hash("sha256", $validPassword);

  $student->changePassword($validId, $validPassword);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: alumnos");
} else {
  $id = $_GET['id'];
  $student = new Students();
  
  // validacion
  $validId = $student->validateID($id);
  
  $student = $student->getById($validId);
  
  $view = new ChangePasswordStudentView();
  $view->student = $student[0];
  $view->render();
}

?>