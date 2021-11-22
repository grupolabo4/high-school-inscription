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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->subjects as $subject) { ?>
                            <tr>
                                <td><?=htmlentities($subject['name'])?></b>
                                <td><?=htmlentities($subject['teacher'])?></td>
                                <td>
                                    <?php if ($this->is_admin) { ?>
                                        <a href="editar-materia-<?=htmlentities($subject['id_subject'])?>-<?=$_GET['id']?>" class="btn btn-primary" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    <?php } else { ?>
                                        <a href="inscribirse-<?=htmlentities($this->user_id)?>-<?=htmlentities($subject['id_subject'])?>" class="btn btn-success" title="Inscribirse">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    <?php } ?>
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