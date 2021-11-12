<?php

require '../fw/fw.php';
require '../models/Careers.php';
require '../views/EditCareerView.php';

checkSession();

if (count($_POST) > 0) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $careerInstance = new Careers();

  if ( !isset($id) ) die("El campo no existe");
  if ( !isset($name) ) die("El campo no existe");
  
  try {
    $careerInstance->updateName($id, $name);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: carreras");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
} else {
  $id = $_GET['id'];
  $careers = new Careers();

  if ( !isset($id) ) die("El campo no existe");
  
  try {
    $career = $careers->getById($id);
    $view = new EditCareerView();
    $view->career = $career[0];
    $view->render();
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
}
?>