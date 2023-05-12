<?php include_once "./encabezado.html" ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Nuevo Recurso</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Recursos</li>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php 
        require "conexion.php";
    ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registrar Nuevo Recurso</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="nuevo_recurso.php"> 
                <div class="card-body">
                  <div class="form-group">
                    <label for="nombre">Descripción</label>
                    <input type="text" name="descripcion" class="form-control" required  placeholder="Descripción del recurso">
                    <label for="direccion">Límite ocupantes</label>
                    <input type="number"  name="limite" class="form-control" required  placeholder="Límite de ocupantes">
                        
                    <label for="capacidad">Precio</label>
                    <input type="text"  name="precio" class="form-control" required  placeholder="Precio del recurso">
                    <label for="etiqueta">Tipo de recurso</label>
                    <select class="form-control" name="tipo">
                        <?php 
                        $sentencia = $conexion->query("SELECT * FROM  tipos;");
                        $data = $sentencia->fetchAll(PDO::FETCH_ASSOC);
                        foreach($data as $dat) {   
                            $id=$dat["id"];
                            $tipo=$dat["tipo"];
                        ?>
                         
                          <option value=""></option>
                          <option value="<?php echo $id?>"><?php echo $tipo?></option>
                        <?php
                        }
                        ?>
                    </select>   
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <a class="btn btn-danger" href="./reservas.php">Cancelar</a>
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