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
                  <h3 class="card-title"><a href="<?php echo base_url(); ?>socio/insert" class="btn btn-primary">Nuevo Socio</a></h3>
                  <br>
                  <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nº</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php $i = 1; foreach ($socio  as $row) { ?>
                    <th><?php echo $i; ?></th>
                    <th><?php echo $row['nombre']; ?></th>
                    <th><?php echo $row['primerApellido']; ?></th>
                    <th><?php echo $row['segundoApellido']; ?></th>
                    <th><?php echo $row['direccion']; ?></th>
                    <th><?php echo $row['telefono']; ?></th>
                    <th></th>
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
