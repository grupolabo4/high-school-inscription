<?php

require './fw/Session.php';

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
  <a href="./controllers/careersList.php">Listado de carreras</a>
  <br>
  <br>
  <!-- TODO Header con logout para compartir en todas las pantallas ?-->
  <a href="logout.php">Cerrar sesión</a>
</body>
</html>