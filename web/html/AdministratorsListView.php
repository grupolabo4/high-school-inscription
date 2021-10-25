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
            <td><?=$administrator['name']?></td>
            <td><?=$administrator['lastname']?></td>
            <td><?=$administrator['email']?></td>
            <td>
              <a href="../controllers/changePasswordAdministrator.php?id=<?=$administrator['id_administrator']?>" class="btn btn-primary">
                Cambiar password
              </a>
              <a href="../controllers/editAdministrator.php?id=<?=$administrator['id_administrator']?>" class="btn btn-primary" title="Editar">
                <i class="fa fa-edit"> </i>
              </a>
              <a href="../controllers/deleteAdministrator.php?id=<?=$administrator['id_administrator']?>" class="btn btn-danger" title="Eliminar">
                <i class="fa fa-trash"> </i>
              </a>
              <!-- Tener en cuenta que estos links son solo demostrativos, ver la mejor forma
              de hacer que esto se vea bien, con botones o en una tabla por ejemplo -->
            </td>
          </tr>
        <!-- Aca meterlo adentro de un link, o agregarle un boton al lado, como nos guste mas -->
        <?php } ?>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <a href="../controllers/addAdministrator.php" class="btn btn-success">Agregar administrador</a>
  <div>
</div>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
  } );
</script>
</html>