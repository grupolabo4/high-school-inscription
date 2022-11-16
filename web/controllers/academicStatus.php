<?php 

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Students.php';
require '../models/Students_Subjects.php';
require '../views/AcademicStatusView.php';

checkNormalSession();
$id = $_GET['id'];
$is_admin = $_SESSION['x-session'] == "admin";
$students_subjects = new Students_Subjects();

if ( !isset($id) ) die("El campo no existe");

try {
  $subjectsList = $students_subjects->getById($id);
  $view = new AcademicStatusView();
  $view->students_subjects = $subjectsList;
  $view->is_admin = $is_admin;
  $view->id = $id;
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>