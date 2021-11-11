<?php

require '../fw/fw.php';
require '../models/Students.php';

checkSession();
$id = $_GET['id'];
$student = new Students();

$validId = $student->validateID($id);
$student = $student->deleteById($validId);

header("Location: alumnos");

?>