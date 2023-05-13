<?php
include_once "./encabezado.html";
require __DIR__ . "/nexo/nexo.php";
LoginController::userAuth();

$typeController = new TypeController();
$types = json_decode($typeController->getTypes());
?>

    <!-- Main content -->
    <section name="separator">
          <!-- left column -->
          <div type="modal">
            <!-- jquery validation -->
            <div style="border: 1px solid #e7e4e4; border-radius: 0.5rem; background: white;">
              <div>
                <h3>Registrar Nuevo Recurso</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="nuevo_recurso.php" style="padding: 20px"> 
                    <label for="nombre">Descripción</label>
                    <input type="text" name="descripcion" required  placeholder="Descripción del recurso">
                    <label for="direccion">Límite ocupantes</label>
                    <input type="number"  name="limite" required  placeholder="Límite de ocupantes">
                        
                    <label for="capacidad">Precio</label>
                    <input type="text"name="precio" required  placeholder="Precio del recurso">
                    <label for="etiqueta">Tipo de recurso</label>
                    <select name="tipo">
                        <option value="" selected> Seleccione un tipo turistico</option>
                        
                      <?php foreach($types as $dat) {   ?>
                        <option value="<?= $dat->id ?>"><?= $dat->tipo ?></option>
                      <?php } ?>

                    </select>   
                <br>
                <!-- /.card-body -->
                <div>
                  <input type="submit" value="Guardar">
                  <a type="back" href="./reservas.php">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
    </section>
    <!-- /.content -->