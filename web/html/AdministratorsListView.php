<?php require_once '../html/Layout.php'?>
<!DOCTYPE html>
<html lang="en">
  <body>
    <div id="content">
      <div class="card">
        <div class="card-header">
          <h5 class="card-title">Listado de administradores</h5>
        </div>
        <div class="card-body">
          <table id="myTable" class="display">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($this->administrators as $administrator) { ?>
                <tr>
                  <td><?=htmlentities($administrator['name'])?></td>
                  <td><?=htmlentities($administrator['lastname'])?></td>
                  <td><?=htmlentities($administrator['email'])?></td>
                  <td>
                    <a href="cambiar-pass-admin-<?=htmlentities($administrator['id_administrator'])?>" class="btn btn-primary">
                      Cambiar password
                    </a>
                    <a href="editar-admin-<?=htmlentities($administrator['id_administrator'])?>" class="btn btn-primary" title="Editar">
                      <i class="fa fa-edit"> </i>
                    </a>
                    <a href="#" class="btn btn-danger" title="Eliminar" onclick="onDelete(<?=htmlentities($administrator['id_administrator'])?>)">
                      <i class="fa fa-trash"> </i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer">
          <a href="agregar-admin" class="btn btn-success">Agregar administrador</a>
        <div>
      </div>
    </div>
  </body>
  <script>
    function onDelete(id) {
      if (confirm("¿Esta seguro que quiere borrar el administrador?")) {
        window.location = `borrar-admin-${id}`;
      }
    }
    $(document).ready( function () {
      $('#myTable').DataTable();
    } );
  </script>
</html>