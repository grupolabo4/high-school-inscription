<?php 

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Students.php';
require '../views/AcademicStatusView.php';

checkNormalSession();
$id = $_GET['id'];
$subjects = new Subjects();
$students = new Students();

if ( !isset($id) ) die("El campo no existe");

try {
  $subjectsList = $subjects->getSubjectsAndStatusByStudentId($id);
  $view = new AcademicStatusView();
  $view->subjects = $subjectsList;
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>