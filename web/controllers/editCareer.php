<?php

require '../fw/fw.php';
require '../models/Careers.php';
require '../views/EditCareerView.php';

checkSession();
// TODO validar parametro
$id = $_GET['id'];

$careers = new Careers();
$career = $careers->getById($id);

$view = new EditCareerView();
$view->career = $career[0];
$view->render();

?>