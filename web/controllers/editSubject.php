<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../views/EditSubjectView.php';

checkSession();
// TODO validar parametro
$id = $_GET['id'];

$subjects = new Subjects();
$subject = $subjects->getById($id);

$view = new EditSubjectView();
$view->subject = $subject[0];
$view->render();

?>