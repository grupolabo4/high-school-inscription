<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/EditStudentView.php';

checkSession();
// TODO validar parametro
$id = $_GET['id'];

$student = new Students();
$student = $student->getById($id);

$view = new EditStudentView();
$view->student = $student[0];
$view->render();

?>