<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/EditAdministratorView.php';

checkSession();
// TODO validar parametro
$id = $_GET['id'];

$administrator = new Administrators();
$administrator = $administrator->getById($id);

$view = new EditAdministratorView();
$view->administrator = $administrator[0];
$view->render();

?>