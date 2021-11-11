<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../views/SubjectsListView.php';

checkSession();
$id = $_GET['id'];
$subjects = new Subjects();

// validacion de id
if ( !isset($id) ) die ("El campo no existe");
if ( !ctype_digit($id) ) die("Tiene que ser un numero");
if ( $id < 1 ) die("Tiene que ser mayor a 0");

$subjectsList = $subjects->getSubjectByCareerId($id);

$view = new SubjectsListView();
$view->subjects = $subjectsList;
$view->render();

?>