<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/ChangePasswordStudentView.php';

checkSession();

if (count($_POST) > 0) {
  $password = $_POST['password'];
  $id = $_POST['id'];
  $student = new Students();

  if ( !isset($id) ) die("El campo no existe");
  if ( !isset($password) ) die("El campo no existe");

  $password = hash("sha256", $password);

  try {
    $student->changePassword($id, $password);
    header("Location: alumnos");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }

} else {
  $id = $_GET['id'];
  $student = new Students();
  
  try {
    $student = $student->getById($id);
    $view = new ChangePasswordStudentView();
    $view->student = $student[0];
    $view->render();
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
}

?>