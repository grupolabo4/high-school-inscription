<?php 

require '../fw/fw.php';
require '../models/Subjects.php';
require '../models/Students.php';
require '../views/AcademicStatusView.php';

checkNormalSession();
$studentId = $_GET['id_student'];
$subjectId = $_GET['id_subject'];

if ( !isset($studentId) ) die("El campo no existe");
if ( !isset($subjectId) ) die("El campo no existe");


try {
  $subjects = new Subjects();
  $subjects->enrollToSubject($studentId, $subjectId);
  header("Location: estado-academico-$studentId");
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>