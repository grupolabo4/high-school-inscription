<?php

require '../fw/fw.php';
require '../models/Administrators.php';

checkSession();
$id = $_GET['id'];
$administrator = new Administrators();

if ( !isset($id) ) die("El campo no existe");

try {
  $administrator = $administrator->deleteById($id);
  header("Location: administradores");
} catch (ValidationException $e) {
  die($e->getMessage());
}
?>