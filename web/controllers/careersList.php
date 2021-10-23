<?php

require '../fw/fw.php';
require '../models/Careers.php';
require '../views/CareersListView.php';

$careers = new Careers();
$careersList = $careers->getAll();

$view = new CareersListView();
$view->careers = $careersList;
$view->render();

?>