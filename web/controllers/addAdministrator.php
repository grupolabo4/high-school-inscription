<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/AddAdministratorView.php';

checkSession();

$view = new AddAdministratorView();
$view->render();

?>