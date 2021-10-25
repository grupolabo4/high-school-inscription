<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Administradores</title>
</head>
<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php 
    foreach($this->administrators as $administrator) { ?>
        <tr>
            <td><?=$administrator['name']?></td>
            <td><?=$administrator['lastname']?></td>
            <td><?=$administrator['email']?></td>
            <td>
                <a href="../controllers/editAdministrator.php?id=<?=$administrator['id_administrator']?>">
                    Editar datos
                </a>
                <a href="../controllers/deleteAdministrator.php?id=<?=$administrator['id_administrator']?>">
                    Eliminar administrador
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