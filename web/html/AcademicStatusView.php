<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Estado académico</h5>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <tr>
                            <th>Materia</th>
                            <th>Estado</th>
                            <th>Nota cursada</th>
                            <th>Nota final</th>
                            <?php if ($this->is_admin) { ?>
                            <th></th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->students_subjects as $subject) { ?>
                            <tr>
                                <td><?=htmlentities($subject['name'])?></b>
                                <td><?=htmlentities($subject['status'])?></b>
                                <td><?=htmlentities($subject['value1'])?></b>
                                <td><?=htmlentities($subject['value2'])?></b>

                                <?php if ($this->is_admin) { ?>
                                    <td>
                                        <a href="editar-estado-academico-<?=htmlentities($subject['id'])?>" class="btn btn-primary" title="Editar">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </td>
                                <?php } ?>
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