<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $password = $_POST['password'];
    $password = hash("sha256", $password);
    $id = $_POST['id'];
    $administrators = new Administrators();
    $administrators->changePassword($id, $password);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../../index.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar password</title>
</head>
<body>
    <form action="" method="POST">
        Ingrese su nuevo password<input type="password" name="password">
        <input type="hidden" name="id" value="<?php echo $this->administrator['id_administrator']?>">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>