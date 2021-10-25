<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Carreras</title>
</head>
<body>
    <br>
    <?php 
    foreach($this->careers as $career) { ?>
        <a href="../controllers/subjectsList.php?id=<?=$career['id_career']?>">
            <?=$career['name']?>
        </a>
        <br>
        <!-- Aca meterlo adentro de un link, o agregarle un boton al lado, como nos guste mas -->
    <?php } ?>
</body>
</html>