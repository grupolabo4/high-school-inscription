<?php

require '../fw/fw.php';
require '../models/Administrators.php';

checkSession();
// TODO validar parametro
$id = $_GET['id'];

$administrator = new Administrators();
// TODO pedir confirmacion antes de borrar
$administrator = $administrator->deleteById($id);

header("Location: ./administratorsList.php")

?>