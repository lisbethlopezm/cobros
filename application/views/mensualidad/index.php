 <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Aplicación Web de Cobros</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item active">Menu</li>
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
            <h3 class="card-title"><a href="<?php echo base_url(); ?>mensualidad/insert" class="btn btn-primary">Cobro Mensualidad</a></h3>
            <br>
            <div class="card-header border-0">
              <div class="d-flex justify-content-between">
                
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Nº</th>
                        <th>Placa</th>
                        <th>Mes</th>
                        <th>Año</th>
                        <th>Monto</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <?php $i = 1; foreach ($mensualidad  as $row) { 
                          $ciU = &get_instance();
                          $ciU->load->model('Vehiculo_model');
                          $usuario = $ciU->Vehiculo_model->obtenervehiculo($row['idVehiculo']);
                          ?>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $usuario['placa']; ?></td>
                          <td><?php echo $row['mes']; ?></td>
                          <td><?php echo $row['anio']; ?></td>
                          <td><?php echo $row['monto']; ?></td>
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
                                 <a href="<?php echo base_url().'mensualidad/modificar/'.$row['idMensualidad']; ?>"
                                  title="Modificar informacion" onClick="">
                                   <i style="color:#555;" class="far fa-address-card"></i>  Cancelar
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
