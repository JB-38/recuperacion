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
  <link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
  <link rel="stylesheet" type="text/css" href="../estilo/layout.css">
</head>

  <!-- Content Wrapper. Contains page content -->
  <div>
    <!-- Main content -->
    <section name="separator-admin">
      <h2>Recursos</h2>
      <div>
        <div>
          <div>
            <div style="border: 1px solid #e7e4e4; border-radius: 0.5rem; background: white;">
              <div>
                <h1>Datos de los Recursos</h1>
              </div>
              <div style="padding: 2%;">
                <div style="text-align: left; margin-bottom: 10px">
                  <a type="button" href="./recurso.php">Nuevo <i class="fa fa-plus"></i></a>
                </div>
                <table>
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
                    
                                <td><a type="button" href="<?php echo "./reservar.php?id=" . $dat['id']?>">
                                      Reservar
                                    </a></td>
                            </tr>
                            <?php
                                } 
                            ?>                                
                        </tbody>   
                        <tfoot>   
                           <tr>
                           <th>Id</th> 
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