<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Careers.php';
require '../views/SubjectsListView.php';

checkSession();
$id = $_GET['id'];
$subjects = new Subjects();

// validacion de id
$career = new Careers();
$validId = $career->validateID($id);

$subjectsList = $subjects->getSubjectByCareerId($validId);

$view = new SubjectsListView();
$view->subjects = $subjectsList;
$view->render();

?>