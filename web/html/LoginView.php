<?php

if (count($_POST) > 0) {
    // TODO validar los datos
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password = hash("sha256", $password);

    $administrators = new Administrators();
    $administrator = $administrators->getByEmail($username);
    if ($administrator['password'] == $password) {
        createSession($administrator['id_administrator']);
    }  
}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="../assets/stylesheets/login.css"/>
	</head>
  <body>
    <form action="#" method="POST">
      <h2>Iniciar sesion</h2>
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