<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- DataTables -->
  <!-- Enlace a los archivos de estilo CSS -->
  <link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
  <link rel="stylesheet" type="text/css" href="../estilo/layout.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
       <header>
          <nav style="display: flex;">
             <a href="../index.html" style="margin-bottom: 5px; margin-top: 10px; margin-left: 20px">
                <img src="../multimedia/company_logo.jpg" style="width: 100px; height:60px; border-radius: 0.5rem;">
             </a>
             <ul>
                <li>
                   <a href="../index.html">Página Principal</a>
                </li>
                <li>
                   <a href="../gastronomia.html">Gastronomía</a>
                </li>
                <li>
                   <a href="../#">Rutas</a>
                </li>
                <li>
                   <a href="../meteorologia.html">Meteorología</a>
                </li>
                <li>
                   <a href="../juego.html">Juego</a>
                </li>
                <li>
                   <a href="./registro.php">Reservas</a>
                </li>
             </ul>
          </nav>
       </header>
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
     <section name="separator">
          <div style="width: 100%; padding-left: 30%; padding-right: 30%;">
            <div style="border: 1px solid #e7e4e4; border-radius: 0.5rem">
              <div style="padding: 1.25rem;">
                  <h1>Registrate</h1>
                   <div>
                      <form action="registro.php" method="POST">
                        <input name="usuario" type="text" placeholder="Ingresa tú usuario"> <br>
                        <input name="clave" type="password" placeholder="Ingresa tú clave"><br>
                        <input name="confirm_password" type="password" placeholder="Confirma tú clave"><br>
                        <input name="nombre" type="text" placeholder="Ingresa tú nombre"><br>
                        <input name="apellido" type="text" placeholder="Ingresa tú apellido"><br>
                        <input name="telefono" type="text" placeholder="Ingresa tú teléfono"><br>
                        <input name="direccion" type="text" placeholder="Ingresa tú direccion"><br>
                        
                        <a type="back" href="../index.html">Volver</a>
                        <input type="submit" value="Enviar">
                        
                      </form>
                  </div>
              </div>
          </div>

          <br>
          <center>
              <a href="./iniciar.php" style="color: green; text-decoration: underline; font-size: 20px">
                ¿Ya tienes una cuenta? Ingresa al sistema.</i>
              </a>
          </center>
        </div>
    </section>

  </body>
</html>
