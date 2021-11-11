<?php

require '../fw/fw.php';
require '../models/Students.php';
require '../views/EditStudentView.php';

checkSession();

if (count($_POST) > 0) {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $identifier = $_POST['identifier'];
  $students = new Students();

  // validaciones
  $validId = $students->validateID($id);
  $validName = $students->validateString($name, 50);
  $validLastName = $students->validateString($lastname, 50);
  $validEmail = $students->validateString($email, 50, 7);
  $validIdentifier = $students->validateNumber($identifier);

  $students->update($validId, $validName, $validLastName, $validEmail, $validIdentifier);
  // TODO mensaje guardado exitosamente, redirigiendo
  header("Location: alumnos");
} else {
  $id = $_GET['id'];
  $student = new Students();

  // validacion
  $validId = $student->validateID($id);
  
  $student = $student->getById($validId);
  
  $view = new EditStudentView();
  $view->student = $student[0];
  $view->render();
}

?>