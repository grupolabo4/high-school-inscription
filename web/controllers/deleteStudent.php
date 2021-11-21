<?php

require '../fw/fw.php';
require '../models/Students.php';

checkSession();
$id = $_GET['id'];
$student = new Students();

if ( !isset($id) ) die("El campo no existe");

try {
  $student = $student->deleteById($id);
  header("Location: alumnos");
} catch (ValidationException $e) {
  die($e->getMessage());
}


?>