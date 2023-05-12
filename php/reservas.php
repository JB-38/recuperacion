<?php 
session_start();
$usu=$_SESSION['usuario'];
include_once "./encabezado.html";
include_once "conexion.php";
$sentencia = $conexion->query("SELECT * FROM `recursos`;");
$data = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Recursos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Recursos</li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div>
			<a class="btn btn-success" href="./recurso.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Datos de los Recursos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tablas" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Id</th> 
                        <th>Descripción</th>
                        <th>Límite de ocupantes</th>
                        <th>Precio</th>
                        <th>Tipo</th>
                        <th>Reservar</th>
                        
                    </tr>
                  </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td> 
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['limite'] ?></td>  
                                <td><?php echo $dat['precio'] ?></td>  
                                <td><?php echo $dat['id_tipo'] ?></td>    
                    
                                <td><a class="btn btn-sm" href="<?php echo "./reservar.php?id=" . $dat['id']?>"><i class="fa fa-edit"></i></a></td>
                            </tr>
                            <?php
                                } 
                            ?>                                
                        </tbody>   
                        <tfoot>   
                           <tr>
                           <<th>Id</th> 
                            <th>Descripción</th>
                            <th>Límite de ocupantes</th>
                            <th>Precio</th>
                            <th>Tipo</th>
                            <th>Reservar</th>
                           </tr>  
                        </tfoot>
                       </table>     

                       </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#tablas').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>

  <?php 
  //include_once "vistas/encabezado.php" 
  ?>