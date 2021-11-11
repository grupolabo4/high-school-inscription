<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Careers.php';
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
  // validacion de career
  $career = new Careers();
  $validCareerId = $career->validateID($careerId);

  header("Location: ../controllers/subjectsList.php?id=$careerId");
} else {
  $id = $_GET['id'];
  $subjects = new Subjects();

  // validacion 
  $validId = $subjects->validateID($id);
  
  $subject = $subjects->getById($validId);
  
  $view = new EditSubjectView();
  $view->subject = $subject[0];
  $view->render();
}

?>