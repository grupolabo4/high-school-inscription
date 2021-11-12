<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Careers.php';
require '../views/EditSubjectView.php';

checkSession();

if (count($_POST) > 0) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $careerId = $_POST['careerId'];
  $teacher = $_POST['teacher'];
  $subjectInstance = new Subjects();

  if ( !isset($id) ) die("El campo no existe");
  if ( !isset($name) ) die("El campo no existe");
  if ( !isset($careerId) ) die("El campo no existe");
  if ( !isset($teacher) ) die("El campo no existe");

  try {
    $subjectInstance->updateSubject($id, $name, $teacher);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: materias-$careerId");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
} else {
  $id = $_GET['id'];
  $subjects = new Subjects();

  if ( !isset($id) ) die("El campo no existe");
  
  try {
    $subject = $subjects->getById($id);
    $view = new EditSubjectView();
    $view->subject = $subject[0];
    $view->render();
  } catch (ValidationException $e) {
    die($e->getMessage());
  }
}

?>