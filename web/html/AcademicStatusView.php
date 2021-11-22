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
                            <?php if ($this->is_admin) { ?>
                                <th>Acciones</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->subjects as $subject) { ?>
                            <tr>
                                <td><?=htmlentities($subject['name'])?></b>
                                <td><?=htmlentities($subject['status'])?></b>
                                <?php if ($this->is_admin) { ?>
                                    <td>
                                        <a href="aprobar-cursada-<?=htmlentities($this->id)?>-<?=htmlentities($subject['id_subject'])?>" class="btn btn-success" title="Aprobar">
                                            <i class="fa fa-check"></i>
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