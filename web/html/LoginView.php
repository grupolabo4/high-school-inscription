<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <link rel="stylesheet" type="text/css" href="./assets/stylesheets/login.css"/>
	</head>
  <body>
    <form action="" method="POST">
      <h2>Iniciar sesión</h2>
      <div class="formGroup">
        <label>Email: </label>
        <input type="email" name="email" maxlength="50" required/>
      </div>
      <div class="formGroup">
        <label>Clave: </label>
        <input type="password" name="password" maxlength="16" required/>
      </div>
      <div class="formGroup">
        <label>Desea iniciar sesión como: </label>
        <select name="role">
          <option value="student">Estudiante</option>
          <option value="admin">Administrador</option>
        </select>
      </div>
      <button type="submit">Ingresar</button>
    </form>
  </body>
</html>