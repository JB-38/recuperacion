<?php
include_once "./encabezado.html";
require __DIR__ . "/nexo/nexo.php";
LoginController::userAuth();

if(!empty($_GET)){
  $resourceController = new ResourceController();
  $data = json_decode($resourceController->getResources($_GET["id"]));
}else{
  $data = null;
}
?>

<?php if(!empty($data)){ ?>
     <!-- Main content -->
     <section name="separator-admin">
      <h2>Reservaciones</h2>
      <div>
          <!-- left column -->
          <div style="width: 100%; padding-left: 30%; padding-right: 30%;">
            <br>
            <!-- jquery validation -->
            <div style="border: 1px solid #e7e4e4; border-radius: 0.5rem; background: white;">
              <div>
                <h1>Reservaciones</h1>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="abm_reservar.php" style="padding: 20px"> 
                <div>
                  <div>
                      <input type="hidden" name="id" value="<?php echo $data[0]->id; ?>">

                      <label for="nombre">Recurso</label>
                      <input type="text" value="<?php echo $data[0]->descripcion ?>" name="descripcion" readonly>
                      <label>Precio</label>
                      <input type="text" value="<?php echo $data[0]->precio ?>" name="precio" readonly>
                      <label>Límite de ocupantes</label>
                      <input type="number" value="<?php echo $data[0]->limite ?>" name="limite" readonly>
                      <label>Cantidad de ocupantes a reservar</label>
                      <input type="number" name="cantidad" required="">
                      <label>Fecha de reservación</label>
                      <input type="date" name="fecha" required="">
                      <label>Hora de reservación</label>
                      <input type="time" name="hora" required="">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <br>
                <div>
                  <input type="submit" value="Reservar">
                  <a type="back" href="./reservas.php">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<?php }else{ ?>
       <!-- Main content -->
    <section name="separator-admin">
        <h2><span style="color:red">Error: </span> Se necesita un identificador para poder hacer la reservación o la información que esta buscando ya no existe.</h2> <br>
        <a type="back" href="./reservas.php">Volver</a>
    </section>
<?php } ?>