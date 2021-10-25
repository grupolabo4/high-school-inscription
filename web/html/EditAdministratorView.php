<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $administrators = new Administrators();
    $administrators->update($id, $name, $lastname, $email);
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
    <title>Editar Administrador</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name" value="<?php echo $this->administrator['name']?>">
        <input type="text" name="lastname" value="<?php echo $this->administrator['lastname']?>">
        <input type="text" name="email" value="<?php echo $this->administrator['email']?>">
        <input type="hidden" name="id" value="<?php echo $this->administrator['id_administrator']?>">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>