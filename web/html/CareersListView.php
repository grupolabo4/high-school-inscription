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
                    <td><?=$career['name']?></td>
                    <td>
                        <a href="../controllers/subjectsList.php?id=<?=$career['id_career']?>" class="btn btn-success" title="Ver materias">
                            <i class="fa fa-search"></i>
                        </a>
                        <a href="../controllers/editCareer.php?id=<?=$career['id_career']?>" class="btn btn-primary" title="Editar">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            <!-- Aca meterlo adentro de un link, o agregarle un boton al lado, como nos guste mas -->
            <?php } ?>
        </tbody>
    </table>
  </div>
</div>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>