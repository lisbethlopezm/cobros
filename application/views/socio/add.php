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
              <div class="card-header border-0">

                <div class="d-flex justify-content-between">
              <div class="col-md-12">    
                  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Nuevo socio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url();?>socio/add">
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre">
                    <span class="text-danger"><?php echo form_error('nombre');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Apellido Paterno</label>
                    <input type="text" class="form-control" name="primerApellido" placeholder="Apellido Paterno">
                    <span class="text-danger"><?php echo form_error('primerApellido');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Apellido Materno</label>
                    <input type="text" class="form-control" name="segundoApellido" placeholder="Apellido Paterno">
                    <span class="text-danger"><?php echo form_error('segundoApellido');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Fecha de Nacimiento</label>
                    <div class="input-group-prepend">
                    </div>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="1990-09-21"
				       min="1940-01-01" max="1992-12-31">
               <span class="text-danger"><?php echo form_error('fechaNacimiento');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Dirección</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección">
                    <span class="text-danger"><?php echo form_error('direccion');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Telefono</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Telefono">
                    <span class="text-danger"><?php echo form_error('telefono');?></span>
                  </div>
                  <div class="form-group col-md-6" >
                    <label for="exampleInputPassword1">Ingresos</label>
                    <input type="text" class="form-control" name="ingresos" placeholder="Ingresos">
                    <span class="text-danger"><?php echo form_error('ingresos');?></span>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a href="<?php echo base_url(); ?>socio" class="btn btn-default">Cancelar</a>
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