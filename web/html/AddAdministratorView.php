<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = hash('sha256', $password);
    $administrators = new Administrators();
    $administrators->create($name, $lastname, $email, $password);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../controllers/administratorsList.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Administrator</title>
</head>
<body>
    <form action="" method="POST">
        Nombre: <input type="text" name="name">
        Apellido: <input type="text" name="lastname">
        Email: <input type="text" name="email">
        Password: <input type="password" name="password">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>