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
              <li class="breadcrumb-item active">Nuevo Vehiculo</li>
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
                <h3 class="card-title">Nuevo Vehiculo</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url();?>vehiculo/add" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group col-md-3">
                    <label for="tipo">Tipo</label>

                    <select class="form-control select2" name="socio" style="width: 100%;">
                      <?php foreach ($socio as $row) { ?>
                        <option value="<?php echo $row['idSocio']; ?>"><?php echo $row['nombre'].' '.$row['primerApellido'].' '.$row['segundoApellido']; ?></option>
                      <?php } ?> 
                  </select>
                    <span class="text-danger"><?php echo form_error('socio');?></span>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="placa">Placa</label>
                    <input type="text" class="form-control" name="placa" placeholder="Placa">
                    <span class="text-danger"><?php echo form_error('placa');?></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="marca">Marca</label>
                    <input type="text" class="form-control" name="marca" placeholder="Marca">
                    <span class="text-danger"><?php echo form_error('marca');?></span>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="exampleInputPassword1">Color</label>
                    <input type="text" class="form-control" name="color" placeholder="Color">
                    <span class="text-danger"><?php echo form_error('color');?></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="modelo">Modelo</label>
                    <input type="text" class="form-control" name="modelo" placeholder="Modelo">
                    <span class="text-danger"><?php echo form_error('modelo');?></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="tipo">Tipo</label>

                    <select class="form-control select2" name="tipo" style="width: 100%;">
                      <?php foreach ($tipovehiculo as $row) { ?>
                        <option value="<?php echo $row['idTipoVehiculo']; ?>"><?php echo $row['nombre']; ?></option>
                      <?php } ?> 
                  </select>
                    <span class="text-danger"><?php echo form_error('tipo');?></span>
                  </div>
                  <div class="form-group col-md-3">
                    <label for="cilindrada">Cilindrada</label>
                    <input type="text" class="form-control" name="cilindrada" placeholder="Cilindrada">
                    <span class="text-danger"><?php echo form_error('cilindrada');?></span>
                  </div>
                  <div class="form-group col-md-4" >
                    <label for="motor">Motor</label>
                    <input type="text" class="form-control" name="motor" placeholder="Motor">
                    <span class="text-danger"><?php echo form_error('motor');?></span>
                  </div>
                  <div class="form-group col-md-4" >
                    <label for="chasis">Chasis</label>
                    <input type="text" class="form-control" name="chasis" placeholder="Chasis">
                    <span class="text-danger"><?php echo form_error('chasis');?></span>
                  </div>
                  <div class="form-group col-md-2" >
                    <label for="motor">Número de Movil</label>
                    <input type="text" class="form-control" name="numeroMovil" placeholder="Número de Movil">
                    <span class="text-danger"><?php echo form_error('numeroMovil');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control-file" name="archivo" id="archivo">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="<?php echo base_url(); ?>Vehiculo" class="btn btn-default">Cancelar</a>
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