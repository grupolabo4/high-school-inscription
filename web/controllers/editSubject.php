<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../views/EditSubjectView.php';

checkSession();

if (count($_POST) > 0) {
  $name = $_POST['name'];
  $id = $_POST['id'];
  $careerId = $_POST['careerId'];
  $teacher = $_POST['teacher'];
  $subjectInstance = new Subjects();

  //validaciones
  $validId = $subjectInstance->validateID($id);
  $validName = $subjectInstance->validateString($name, 80);
  $validTeacher = $subjectInstance->validateString($teacher, 50);
  
  $subjectInstance->updateSubject($validId, $validName, $validTeacher);
  
  // TODO mensaje guardado exitosamente, redirigiendo
  if ( !isset($careerId) ) die ("El campo no existe");
  if ( !ctype_digit($careerId) ) die("Tiene que ser un numero");
  if ( $careerId < 1 ) die("Tiene que ser mayor a 0");
  header("Location: ../controllers/subjectsList.php?id=$careerId");
} else {
  $id = $_GET['id'];
  if ( !isset($id) ) die ("El campo no existe");
  if ( !ctype_digit($id) ) die("Tiene que ser un numero");
  if ( $id < 1 ) die("Tiene que ser mayor a 0");
  
  $subjects = new Subjects();
  $subject = $subjects->getById($id);
  
  $view = new EditSubjectView();
  $view->subject = $subject[0];
  $view->render();
}

?>