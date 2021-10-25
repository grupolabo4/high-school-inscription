<?php

checkSession()

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pantalla inicial</title>
</head>
<body>
  Aca iria la pantalla inicial con los distintos accesos a las views correspondientes
  segun el rol (alumno o administrador)
  <br>
  <a href="../controllers/careersList.php">Listado de carreras</a>
  <br>
  <a href="../controllers/administratorsList.php">Listado de administradores</a>
  <br>
  <a href="../controllers/addAdministrator.php">Agregar administrador</a>
  <br>
  <!-- TODO sacar el 10 hardcodeado y obtener el id por session -->
  <a href="../controllers/changePasswordAdministrator.php?id=10">
    Cambiar password
  </a>
  <br>
  <!-- TODO Header con logout para compartir en todas las pantallas ?-->
  <a href="../controllers/logoutController.php">Cerrar sesión</a>
</body>
</html>