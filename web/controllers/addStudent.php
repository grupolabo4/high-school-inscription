<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../models/Careers.php';
require '../views/AddStudentView.php';

checkSession();

if (count($_POST) > 0) {
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $identifier = $_POST['identifier'];
  $career = $_POST['career'];
  $student = new Students();

  if ( !isset($name) ) die("El campo no existe");
  if ( !isset($lastname) ) die("El campo no existe");
  if ( !isset($email) ) die("El campo no existe");
  if ( !isset($password) ) die("El campo no existe");
  if ( !isset($identifier) ) die("El campo no existe");
  if ( !isset($career) ) die("El campo no existe");

  $password = hash("sha256", $password);

  try {
    $student->create($name, $lastname, $email, $password, $identifier, $career);
    header("Location: alumnos");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
} else {
  $careers = new Careers();
  $view = new AddStudentView();
  $view->careers = $careers->getAll();
  $view->render();
}

?>