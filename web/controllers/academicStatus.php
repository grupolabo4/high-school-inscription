<?php 

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Students.php';
require '../views/AcademicStatusView.php';

checkNormalSession();
$id = $_GET['id'];
$is_admin = $_SESSION['x-session'] == "admin";
$subjects = new Subjects();
$students = new Students();

if ( !isset($id) ) die("El campo no existe");

try {
  $subjectsList = $subjects->getSubjectsAndStatusByStudentId($id);
  $view = new AcademicStatusView();
  $view->subjects = $subjectsList;
  $view->is_admin = $is_admin;
  $view->id = $id;
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>