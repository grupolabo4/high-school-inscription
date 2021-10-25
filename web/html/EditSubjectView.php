<?php 

if (count($_POST) > 0) {
    // TODO VALIDAR
    $name = $_POST['name'];
    $id = $_POST['id'];
    $careerId = $_POST['careerId'];
    $teacher = $_POST['teacher'];
    $subjectInstance = new Subjects();
    $subjectInstance->updateSubject($id, $name, $teacher);
    // TODO mensaje guardado exitosamente, redirigiendo
    header("Location: ../controllers/subjectsList.php?id=$careerId");
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
        <input type="text" name="name" value="<?php echo $this->subject['name']?>">
        <input type="text" name="teacher" value="<?php echo $this->subject['teacher']?>">
        <input type="hidden" name="id" value="<?php echo $this->subject['id_subject']?>">
        <input type="hidden" name="careerId" value="<?php echo $_GET['careerId']?>">
        <input type="submit" value="Guardar">
    </form>

</body>
</html>