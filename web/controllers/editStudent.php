<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/EditStudentView.php';

checkSession();

if (count($_POST) > 0) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $identifier = $_POST['identifier'];
  $students = new Students();

  if ( !isset($id) ) die("El campo no existe");
  if ( !isset($name) ) die("El campo no existe");
  if ( !isset($lastname) ) die("El campo no existe");
  if ( !isset($email) ) die("El campo no existe");
  if ( !isset($identifier) ) die("El campo no existe");

  try {
    $students->update($id, $name, $lastname, $email, $identifier);
    header("Location: alumnos");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
  
} else {
  $id = $_GET['id'];
  $student = new Students();
  
  try {
    $student = $student->getById($validId);
    $view = new EditStudentView();
    $view->student = $student[0];
    $view->render();
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
}

?>