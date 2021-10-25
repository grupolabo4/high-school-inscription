<?php

session_start();
if (count($_POST) > 0) {
    // TODO hashear el password
    if ($_POST['username'] == "administrador" && $_POST['password'] == "sarasa") {
        $_SESSION['logged'] = true;
        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../../assets/stylesheets/login.css"/>
	</head>
  <body>
    <form action="#" method="POST">
      <h2>El comienzo de algo nuevo</h2>
      <div class="formGroup">
        <label>Usuario: </label>
        <input type="text" name="username"/>
      </div>
      <div class="formGroup">
        <label>Clave: </label>
        <input type="password" name="password"/>
      </div>
      <button type="submit">Ingresar</button>
    </form>
  </body>
</html>