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
    <!-- Main content -->
    <section name="separator-admin">

      <h2>Presupuesto</h2>
      <!-- left column -->
      <div>
        <!-- jquery validation -->
        <div style="border: 1px solid #e7e4e4; border-radius: 0.5rem; background: white;">
              <div>
                <h3>Ver Presupuesto</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action=""> 
                <div>
                    <div style="padding: 2%;"> 
                        <table>
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
              <br>
              <!-- /.card-body -->
              <div class="card-footer">
                <a type="back" href="./iniciar.php">Volver</a>
              </div>
              <br>
            </form>
      </div>
            <!-- /.card -->
    </div>
</section>