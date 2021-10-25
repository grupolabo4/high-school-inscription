<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../views/SubjectsListView.php';

$subjects = new Subjects();
$subjectsList = $subjects->getAll();

$view = new SubjectsListView();
$view->subjects = $subjectsList;
$view->render();

?>