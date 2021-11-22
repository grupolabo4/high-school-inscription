<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Listado de alumnos</h5>
        </div>
        <div class="card-body">
          <table id="myTable" class="display">
            <thead>
              <tr>
                <th>Legajo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Carrera</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($this->students as $student) { ?>
                <tr>
                  <td><?=htmlentities($student['identifier'])?></td>
                  <td><?=htmlentities($student['name'])?></td>
                  <td><?=htmlentities($student['lastname'])?></td>
                  <td><?=htmlentities($student['email'])?></td>
                  <td><?=htmlentities($student['career'])?></td>
                  <td>
                    <a href="cambiar-pass-alumno-<?=htmlentities($student['id_student'])?>" class="btn btn-primary">
                      Cambiar password
                    </a>
                    <a href="estado-academico-<?=htmlentities($student['id_student'])?>" class="btn btn-success" title="Ver estado academico">
                      <i class="fa fa-search"> </i>
                    </a>
                    <a href="editar-alumno-<?=htmlentities($student['id_student'])?>" class="btn btn-primary" title="Editar">
                      <i class="fa fa-edit"> </i>
                    </a>
                    <a href="#" class="btn btn-danger" title="Eliminar" onclick="onDelete(<?=htmlentities($student['id_student'])?>)">
                      <i class="fa fa-trash"> </i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="agregar-alumno" class="btn btn-success">Agregar alumno</a>
        <div>
      </div>
    </div>
  </body>
  <script>
    function onDelete(id) {
      if (confirm("¿Esta seguro que quiere borrar el alumno?")) {
        window.location = `borrar-alumno-${id}`;
      }
    }
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
</html>