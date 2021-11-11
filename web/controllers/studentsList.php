<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/StudentsListView.php';

checkSession();

$students = new Students();
$studentsList = $students->getAll();

$view = new StudentsListView();
$view->students = $studentsList;
$view->render();

?>