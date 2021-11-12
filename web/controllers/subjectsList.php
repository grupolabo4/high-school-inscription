<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Careers.php';
require '../views/SubjectsListView.php';

checkSession();
$id = $_GET['id'];
$subjects = new Subjects();

if ( !isset($id) ) die("El campo no existe");

try {
  $subjectsList = $subjects->getSubjectByCareerId($id);
  $view = new SubjectsListView();
  $view->subjects = $subjectsList;
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}


?>