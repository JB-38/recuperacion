<?php

session_start();
$usu=$_SESSION['usuario'];

include_once "./encabezado.html";

if(!isset($_GET["id"])) exit();

$id = $_GET["id"];

include_once "conexion.php";
$sentencia = $conexion->query("SELECT * FROM recursos WHERE  id = '$id';");
$sentencia->execute([$id]);
$data = $sentencia->fetch(PDO::FETCH_OBJ);
if($data === FALSE){
	echo "¡No existe ningún registro con ese ID!";
	exit();
}

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reservar Recursos de Coaña </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Reservaciones</li>
              
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
                <h3 class="card-title">Reservaciones</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" method="post" action="abm_reservar.php"> 
                <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                     
                    
                    <label for="nombre">Recurso</label>
                    <input type="text" value="<?php echo $data->descripcion ?>" name="descripcion" class="form-control" readonly>
                    <label>Precio</label>
                    <input type="text" value="<?php echo $data->precio ?>" name="precio" class="form-control" readonly>
                    <label>Límite de ocupantes</label>
                    <input type="number" value="<?php echo $data->limite ?>" name="limite" class="form-control" readonly>
                    <label>Cantidad de ocupantes a reservar</label>
                    <input type="number" name="cantidad" class="form-control" required="">
                    <label>Fecha de reservación</label>
                    <input type="date"  name="fecha" class="form-control" required="">
                    <label>Hora de reservación</label>
                    <input type="time"  name="hora" class="form-control" required="">
                    
                        
                </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Reservar</button>
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