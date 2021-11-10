<?php

if (count($_POST) > 0) {
    // TODO validar los datos
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash("sha256", $password);

    $administrators = new Administrators();
    $administrator = $administrators->getByEmail($email);
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
        <label>Email: </label>
        <input type="email" name="email" maxlength="50" required/>
      </div>
      <div class="formGroup">
        <label>Clave: </label>
        <input type="password" name="password" maxlength="50" required/>
      </div>
      <button type="submit">Ingresar</button>
    </form>
  </body>
</html>