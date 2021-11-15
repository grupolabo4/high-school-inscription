<?php

require '../fw/fw.php';
require '../views/IndexView.php';

checkNormalSession();
$view = new IndexView();
$view->render();

?>