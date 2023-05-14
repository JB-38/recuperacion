<?php 
include_once "encabezado.html";
require __DIR__ . "/nexo/nexo.php";
LoginController::userAuth();

if(!empty($_SESSION['usuario'])){
  $reserveController = new ReserveController();
  $data = json_decode($reserveController->getBudgets($_SESSION['usuario']));
}else{
  $data = null;
}

?>

<?php if(!empty($data)){ ?>
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
                                  $total = 0;             
                                  foreach($data as $dat) {                                                        
                            ?>
                                      <td><?php echo $dat->nombre ." ". $dat->apellido  ?></td>
                                      <td><?php echo $dat->descripcion  ?></td>
                                      <td><?php echo $dat->cantidad  ?></td>  
                                      <td><?php echo $dat->fecha  ?></td> 
                                      <td><?php echo $dat->hora  ?></td> 
                                      <td><?php echo $dat->precio  ?></td>  
                                         
                                  </tr>
                                  <?php
                                      $total=$total+$dat->precio;
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

<?php }else{ ?>
       <!-- Main content -->
    <section name="separator-admin">
        <h2>No hay presupuestos disponibles actualmente. </h2> <br>
        <a type="back" href="./reservas.php">Volver</a>
    </section>
<?php } ?>