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
  $student = $students->getById($id);
  $subjectsList = $subjects->getSubjectsAndStatusByStudentId($student[0]['id_student']);
  $view = new AcademicStatusView();
  $view->subjects = $subjectsList;
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>