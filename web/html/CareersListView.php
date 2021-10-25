<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Carreras</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre de Carrera</th>
            <th>Acciones</th>
        </tr>
        <?php 
    foreach($this->careers as $career) { ?>
        <tr>
            <td><?=$career['name']?></td>
            <td>
                <a href="../controllers/subjectsList.php?id=<?=$career['id_career']?>">
                    Ver materias
                </a>
                <a href="../controllers/editCareer.php?id=<?=$career['id_career']?>">
                    Editar nombre
                </a>
                <!-- Tener en cuenta que estos links son solo demostrativos, ver la mejor forma
                de hacer que esto se vea bien, con botones o en una tabla por ejemplo -->
            </td>
        </tr>
         
        
        <br>
        <!-- Aca meterlo adentro de un link, o agregarle un boton al lado, como nos guste mas -->
    <?php } ?>
    </table>
</body>
</html>