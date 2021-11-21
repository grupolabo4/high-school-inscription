<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div id="content">
            <div class="card">
                <div class="card-header">
                <h5 class="card-title">Listado de Carreras</h5>
                </div>
                <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Nombre de Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->careers as $career) { ?>
                            <tr>
                                <td><?=htmlentities($career['name'])?></td>
                                <td>
                                    <a href="materias-<?=htmlentities($career['id_career'])?>" class="btn btn-success" title="Ver materias">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    <a href="editar-carrera-<?=htmlentities($career['id_career'])?>" class="btn btn-primary" title="Editar">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</html>