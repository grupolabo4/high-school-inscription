<?php

require '../fw/fw.php';
require '../models/Administrators.php';
require '../views/LoginView.php';

$view = new LoginView();
$view->render();

?>