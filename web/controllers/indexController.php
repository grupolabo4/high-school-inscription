<?php

require '../fw/fw.php';
require '../views/IndexView.php';

checkSession();
$view = new IndexView();
$view->render();

?>