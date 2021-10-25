<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $id = $_POST['id'];
    $careerInstance = new Careers();
    $careerInstance->updateName($id, $name);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../controllers/careersList.php");
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Carrera</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="name" value="<?php echo $this->career['name']?>">
        <input type="hidden" name="id" value="<?php echo $this->career['id_career']?>">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>