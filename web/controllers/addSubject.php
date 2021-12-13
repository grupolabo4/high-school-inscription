<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/SubjectsCareers.php';
require '../views/AddSubjectView.php';

checkSession();

if (count($_POST) > 0) {
  $name = $_POST['name'];
  $careerId = $_POST['careerId'];
  $teacher = $_POST['teacher'];
  $subject = new Subjects();

  if ( !isset($name) ) die("El campo nombre no existe");
  if ( !isset($careerId) ) die("El campo carrera no existe");
  if ( !isset($teacher) ) die("El campo profesor no existe");

  try {
    $subject->create($name, $teacher);
    
    try {
      $subjectId = $subject->getByName($name)["id_subject"];
      $subject_career = new SubjectsCareers();
      $subject_career->create($subjectId, $careerId);
    } catch (ValidationException $e) {
      die($e->getMessage());
    }

    header("Location: materias-$careerId");
  } catch (ValidationException $e) {
    die($e->getMessage());
  }

} else {
  $view = new AddSubjectView();
  $view->render();
}

?>