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
  $careers = new Careers();
  
  // validacion
  $validId = $careers->validateID($id);
  
  $career = $careers->getById($validId);
  
  $view = new EditCareerView();
  $view->career = $career[0];
  $view->render();
}
?>