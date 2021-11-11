<?php

require '../fw/fw.php';
require '../models/Administrators.php';

checkSession();
$id = $_GET['id'];
$administrator = new Administrators();

$validId = $administrator->validateID($id);
$administrator = $administrator->deleteById($validId);

header("Location: ./administratorsList.php")

?>