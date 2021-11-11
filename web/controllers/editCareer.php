<?php

require '../fw/fw.php';
require '../models/Careers.php';
require '../views/EditCareerView.php';

checkSession();

if (count($_POST) > 0) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $careerInstance = new Careers();

  //validaciones
  $validId = $careerInstance->validateID($id);
  $validName = $careerInstance->validateString($name, 50);
  
  $careerInstance->updateName($validId, $validName);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: ../controllers/careersList.php");
} else {
  $id = $_GET['id'];
  if ( !isset($id) ) die ("El campo no existe");
  if ( !ctype_digit($id) ) die("Tiene que ser un numero");
  if ( $id < 1 ) die("Tiene que ser mayor a 0");
  
  $careers = new Careers();
  $career = $careers->getById($id);
  
  $view = new EditCareerView();
  $view->career = $career[0];
  $view->render();
}
?>