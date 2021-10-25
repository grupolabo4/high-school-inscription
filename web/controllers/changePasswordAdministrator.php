<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/ChangePasswordAdministratorView.php';

checkSession();
// TODO validar parametro
$id = $_GET['id'];

$administrator = new Administrators();
$administrator = $administrator->getById($id);

$view = new ChangePasswordAdministratorView();
$view->administrator = $administrator[0];
$view->render();

?>