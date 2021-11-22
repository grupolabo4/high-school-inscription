<?php

require '../fw/fw.php';
require '../views/IndexView.php';
require '../models/Students.php';

checkNormalSession();
$is_admin = $_SESSION['x-session'] == "admin";
$id = $_SESSION['id'];

$student = new Students();
$view = new IndexView();
$view->is_admin = $is_admin;
$view->id = $id;

try {
  if (!$is_admin) {
    $student = $student->getById($id);
    $view->career = $student[0]['id_career'];
  }
  $view->render();
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>