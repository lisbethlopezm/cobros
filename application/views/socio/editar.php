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
              <div class="card-header border-0">

                <div class="d-flex justify-content-between">
              <div class="col-md-12">    
                  <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Editar socio</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="<?php echo base_url();?>socio/modificarBD">
                <div class="card-body">
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="hidden" class="form-control" name="idSocio" value="<?php echo $socio['idSocio']; ?>" >
                    <input type="text" class="form-control" name="nombre" value="<?php echo $socio['nombre']; ?>" >
                    <span class="text-danger"><?php echo form_error('nombre');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Apellido Paterno</label>
                    <input type="text" class="form-control" name="primerApellido" value="<?php echo $socio['primerApellido']; ?>">
                    <span class="text-danger"><?php echo form_error('primerApellido');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Apellido Materno</label>
                    <input type="text" class="form-control" name="segundoApellido" value="<?php echo $socio['segundoApellido']; ?>">
                    <span class="text-danger"><?php echo form_error('segundoApellido');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Fecha de Nacimiento</label>
                    <div class="input-group-prepend">
                    </div>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $socio['fechaNacimiento']; ?>"
				       min="1940-01-01" max="1992-12-31">
               <span class="text-danger"><?php echo form_error('fechaNacimiento');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Dirección</label>
                    <input type="text" class="form-control" name="direccion" value="<?php echo $socio['direccion']; ?>">
                    <span class="text-danger"><?php echo form_error('direccion');?></span>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="exampleInputPassword1">Telefono</label>
                    <input type="text" class="form-control" name="telefono" value="<?php echo $socio['telefono']; ?>">
                    <span class="text-danger"><?php echo form_error('telefono');?></span>
                  </div>
                  <div class="form-group col-md-6" >
                    <label for="exampleInputPassword1">Ingresos</label>
                    <input type="text" class="form-control" name="ingresos" value="<?php echo $socio['ingresos']; ?>">
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