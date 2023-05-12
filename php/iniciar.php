<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
   

    <title>Iniciar Reservación</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
  
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
  

</head>
<body id="home">

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Iniciar sesión</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../index.html">Inicio</a></li>
                  <li class="breadcrumb-item active">Iniciar sesión</li>
                  
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
         
         <?php

  require 'conexion.php';
 // $id = $_GET["id"];
  session_start();

  if (!empty($_GET['usuario']) && !empty($_GET['clave'])) {
    $records = $conexion->prepare('SELECT id, usuario, clave FROM usuarios WHERE usuario = :usuario and clave = :clave' );
    $records->bindParam(':usuario', $_GET['usuario']);
    $records->bindParam(':clave', $_GET['clave']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);


    $message = '';

    if (!empty($results)) {
      
      $_SESSION['usuario'] = $results['usuario'];
      header("Location: reservas.php");
    } else {
      $message = 'Lo sentimos, esas credenciales no coinciden';
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
               <div class="card-body">
                    <div class="form-group">

                     <form action="iniciar.php" method="GET">
                          <input type="text" class="form-control" placeholder="Usuario" name="usuario">
                          <input type="password" class="form-control" placeholder="Password" name="clave">
                          <input class="btn btn-primary" type="submit" value="Ingresar">                
                      </form>
                      <p class="mb-0">
                        <a class="btn btn-primary" href="registro.php">Registro nuevo usuario</a>
                        <a class="btn btn-danger" href="../index.html">Volver</a>
                      </p>
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
