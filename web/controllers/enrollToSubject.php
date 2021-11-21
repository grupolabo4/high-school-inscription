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
  // TODO aca decidir si redirigimos o solo mostramos un cartelito que fue inscripto y fue
  // decidir como se vea mejor cuando hagamos el front
} catch (ValidationException $e) {
  die($e->getMessage());
}

?>