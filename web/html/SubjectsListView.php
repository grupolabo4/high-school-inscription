<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Materias por Carrera</title>
</head>
<body>
    <table>
        <tr>
            <th>Materia</th>
            <th>Profesor asignado</th>
            <th>Acciones</th>
            <!-- Aca hay que decidir como editar estos datos siendo administrador
            puede ser boton "editar" que lleve a nueva pantalla o directamente permitir
            editarlo aca, como te guste mas -->
        </tr>
        <?php foreach($this->subjects as $subject) { ?>
            <tr>
                <td><?=$subject['name']?></b>
                <td><?=$subject['teacher']?></td>
                <td>
                    <a href="../controllers/editSubject.php?id=<?=$subject['id_subject']?>&careerId=<?=$_GET['id']?>">
                        Editar materia
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>