<html>
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
            <h1 class="m-0 text-dark">Registro</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
              <li class="breadcrumb-item active">Registro</li>
              
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
 
<body id="home">

<?php

  require 'conexion.php';

  $message = '';

  if (!empty($_POST['usuario']) && !empty($_POST['clave'])) {

    $usuario = $_POST['usuario'];
    $records = $conexion->prepare('SELECT usuario FROM usuarios WHERE usuario = :usuario');
    $records->bindParam(':usuario', $_POST['usuario']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    
    if (empty($results)){
      $sql = "INSERT INTO `usuarios` (`usuario`, `clave`, `nombre`, `apellido`,`telefono`, `direccion`) VALUES (:usuario, :clave, :nombre, :apellido, :telefono, :direccion)";
      $stmt = $conexion->prepare($sql);
      $stmt->bindParam(':usuario', $_POST['usuario']);
      $stmt->bindParam(':clave', $_POST['clave']);
      $stmt->bindParam(':nombre', $_POST['nombre']);
      $stmt->bindParam(':apellido', $_POST['apellido']);
      $stmt->bindParam(':telefono', $_POST['telefono']);
      $stmt->bindParam(':direccion', $_POST['direccion']);
      
      if ($stmt->execute()) {
        $message = 'Nuevo usuario creado con éxito';
      } else {
        $message = 'Lo sentimos, debe haber habido un problema al crear su cuenta';
      }
  }else{
    $message = 'Este usuario ya se encuentra en la base de datos';
  }
  }
   if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>


     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <!-- /.card-header -->
              <div>
                 <a class="btn btn-success" href="./iniciar.php">Iniciar sesión</i></a>
               </div>
              <div class="card-body">
                  <h1>Registrate</h1>
                   <div class="form-group">

                  <form action="registro.php" method="POST">
                    <input name="usuario" type="text" class="form-control" placeholder="Ingresa tú usuario"> <br>
                    <input name="clave" type="password" class="form-control" placeholder="Ingresa tú clave"><br>
                    <input name="confirm_password" type="password" class="form-control" placeholder="Confirma tú clave"><br>
                    <input name="nombre" type="text" class="form-control" placeholder="Ingresa tú nombre"><br>
                    <input name="apellido" type="text" class="form-control" placeholder="Ingresa tú apellido"><br>
                    <input name="telefono" type="text" class="form-control" placeholder="Ingresa tú teléfono"><br>
                    <input name="direccion" type="text" class="form-control" placeholder="Ingresa tú direccion"><br>
                    <input class="btn btn-primary" type="submit" value="Enviar">
                    
                    <a class="btn btn-danger" href="../index.html">Volver</a>
                  </form>
                  </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

  </body>
</html>
