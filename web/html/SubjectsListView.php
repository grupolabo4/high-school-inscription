<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Listado de Materias</h5>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>Profesor asignado</th>
                            <th>Acciones</th>
                            <!-- Aca hay que decidir como editar estos datos siendo administrador
                            puede ser boton "editar" que lleve a nueva pantalla o directamente permitir
                            editarlo aca, como te guste mas -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->subjects as $subject) { ?>
                            <tr>
                                <td><?=$subject['name']?></b>
                                <td><?=$subject['teacher']?></td>
                                <td>
                                    <a href="editar-materia-<?=$subject['id_subject']?>-<?=$_GET['id']?>" class="btn btn-primary" title="Editar">
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