<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Careers.php';
require '../views/SubjectsListView.php';

checkNormalSession();
$id = $_GET['id'];
$is_admin = $_SESSION['x-session'] == "admin";
$user_id = $_SESSION['id'];
$subjects = new Subjects();

if ( !isset($id) ) die("El campo no existe");

try {
  $subjectsList = $subjects->getSubjectByCareerId($id);
  $view = new SubjectsListView();
  $view->subjects = $subjectsList;
  $view->is_admin = $is_admin;
  $view->user_id = $user_id;
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}


?>