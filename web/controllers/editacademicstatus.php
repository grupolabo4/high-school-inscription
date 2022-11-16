<?php

require '../fw/fw.php';
require '../models/Students_Subjects.php';
require '../views/EditAcademicStatusView.php';

checkSession();

$id = $_GET['id'];
$id_post = $_POST['id_post'];
$value1 = $_POST['value1'];
$value2 = $_POST['value2'];
$ss = new Students_Subjects();

if (!isset($_POST['submit'])) {


$ss = $ss->getOneById($id);
$view = new EditAcademicStatusView();
$view->students_subjects = $ss;
$view->render();

}

else{


if($value2 && $value1){
  $status = "Aprobada";
  $ss->updateStatus($id,$status);
  $ss->updateValue1($id,$value1);
  $ss->updateValue2($id,$value2);
}

if(!$value2 && $value1){
  $ss->updateValue1($id,$value1);
  $status = "Regularizada";
  $ss->updateStatus($id,$status);
}

if(!$value2 && !$value1){
  $status = "Inscripto";
  $ss->updateStatus($id,$status);
}
  $ss = $ss->getOneById($id);
  $view = new EditAcademicStatusView();
  $view->students_subjects = $ss;
  $view->render();


}
   

?>