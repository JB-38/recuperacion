<?php 
session_start();
$usu=$_SESSION['usuario'];

include_once "encabezado.html";
include_once "conexion.php";
$sentencia = $conexion->query("SELECT usuarios.nombre, usuarios.apellido, presupuestos.*, recursos.descripcion, recursos.precio, reservas.cantidad, reservas.fecha, reservas.hora FROM usuarios INNER JOIN presupuestos ON usuarios.usuario=presupuestos.usuario INNER JOIN reservas ON presupuestos.usuario=reservas.usuario, recursos  WHERE  presupuestos.usuario = '$usu'  ORDER BY descripcion;");
//$sentencia->execute([$usu]);
$data = $sentencia->fetchAll(PDO::FETCH_ASSOC);
if($data === FALSE){
    echo "¡No existe ningún registro con ese ID!";
    exit();
}
$total=0;
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Presupuesto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Presupuesto</li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Presupuesto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action=""> 
                <div class="card-body">
                  <div class="form-group">
                    
                    <table id="tablas" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Recursos</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Precio</th>
                    </tr>
                  </thead>
                        <tbody>
                          <tr>
                            
                    <?php                            
                            foreach($data as $dat) {                                                        
                      ?>
                                <td><?php echo $dat['nombre']." ".$dat['apellido'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['cantidad'] ?></td>  
                                <td><?php echo $dat['fecha'] ?></td> 
                                <td><?php echo $dat['hora'] ?></td> 
                                <td><?php echo $dat['precio'] ?></td>  
                                   
                            </tr>
                            <?php
                                $total=$total+$dat['precio'];
                                } 
                            ?>                                
                        </tbody>   
                        
                       </table>
                       <h2>Total presupuesto: <?php echo $total."€"; ?></h2>
                   
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a class="btn btn-danger" href="./iniciar.php">Volver</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>