 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Lista vehiculos</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <h3 class="card-title"><a href="<?php echo base_url(); ?>vehiculo/insert" class="btn btn-primary">Nuevo Vehiculo</a></h3>
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nº</th>
                        <th>Placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Foto</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $i = 1; foreach ($vehiculo  as $row) { ?>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row['placa']; ?></td>
                          <td><?php echo $row['marca']; ?></td>
                          <td><?php echo $row['modelo']; ?></td>
                          <td><img src="<?php echo base_url().'fotos/vehiculos/'.$row['fotoVehiculo']; ?>" width='60' height='60'></td>
                          <td>
                            <span class="pull-right">
                              <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Acciones
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                               <li>
                                 <a href="<?php echo base_url().'vehiculo/modificar/'.$row['idVehiculo']; ?>"
                                  title="Modificar informacion" onClick="">
                                  &nbsp  <i style="color:#555;" class="far fa-address-card"></i>  Modificar
                                </a>
                              </li>
                              <li>
                                 <a href="<?php echo base_url().'vehiculo/eliminarvehiculo/'.$row['idVehiculo']; ?>"
                                  title="Eliminar informacion" onClick="">
                                  &nbsp   <i style="color:red;" class="fas fa-backspace"></i>  Eliminar
                                </a>
                              </li>
                      </ul>
                    </div>
                  </span>
                </td>
              </tr>
              <?php $i++; } ?>                  
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

  </div>

</div>


</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
