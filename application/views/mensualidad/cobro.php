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
              <li class="breadcrumb-item active">Cobro Mensualidad</li>
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
              <div class="card-header border-0">

                <div class="d-flex justify-content-between">
              <div class="col-md-12">    
                  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cobro Mensualidad</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php 
                  if(!empty($mensaje)){
                    echo '<span class="text-danger">'.$mensaje.'</span>';
                  }

                ?>
              <form method="post" action="<?php echo base_url();?>mensualidad/add">
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <div class="form-group col-md-10">
                    <label for="idVehiculo" class="control-label">Vehiculo</label>
                    <br>
                    <select id="idVehiculo" name="idVehiculo" class="col-md-6 form-control select2">
                      <?php
                      foreach ($vehiculo as $row)
                      {
                      ?>
                        <option value="<?php echo $row['idVehiculo']; ?>"><?php echo $row['placa']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('idVehiculo');?></span>
                  </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="monto">Monto</label>
                    <input type="text" class="form-control" name="monto" placeholder="Monto">
                    <span class="text-danger"><?php echo form_error('monto');?></span>
                  </div>                  
                </div>
                <!-- /.card-body -->
                <input type="hidden" class="form-control" name="mes" value="<?php echo date('m') ?>">
                <input type="hidden" class="form-control" name="anio" value="<?php echo date('Y') ?>">
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="<?php echo base_url(); ?>mensualidad" class="btn btn-default">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
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