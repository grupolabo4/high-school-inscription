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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($this->subjects as $subject) { ?>
                            <tr>
                                <td><?=$subject['name']?></b>
                                <td><?=$subject['status']?></b>
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