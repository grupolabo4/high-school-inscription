<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/AdministratorsListView.php';

checkSession();

$administrators = new Administrators();
$administratorsList = $administrators->getAll();

$view = new AdministratorsListView();
$view->administrators = $administratorsList;
$view->render();

?>