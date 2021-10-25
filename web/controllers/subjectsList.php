<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../views/SubjectsListView.php';
require '../fw/Session.php';

checkSession();

$id = $_GET['id'];

$subjects = new Subjects();
$subjectsList = $subjects->getSubjectByCareerId($id);

$view = new SubjectsListView();
$view->subjects = $subjectsList;
$view->render();

?>