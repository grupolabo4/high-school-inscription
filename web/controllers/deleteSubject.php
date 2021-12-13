<?php

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/SubjectsCareers.php';

checkSession();
$id = $_GET['id'];
$careerId = $_GET['careerId'];
$subject = new Subjects();
$subjects_careers = new SubjectsCareers();

if ( !isset($id) ) die("El campo no existe");

try {
  $subjects_careers = $subjects_careers->deleteBySubjectId($id);
  $subject = $subject->deleteById($id);
  header("Location: materias-$careerId");
} catch (ValidationException $e) {
  die($e->getMessage());
}


?>