<?php
require __DIR__ . "/nexo/nexo.php";
LoginController::isAuth();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
   

    <title>Iniciar Reservación</title>

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>

    <!-- Enlace a los archivos de estilo CSS -->
    <link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
    <link rel="stylesheet" type="text/css" href="../estilo/layout.css">

</head>
<body style="background: white;">
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
         $error = '';
         if(!empty($_POST)){
            $postdata = [
               'identifier' => $_POST['usuario'],
               'clave' => $_POST['clave']
            ];

            $loginController = new LoginController();
            $result = $loginController->Login($postdata);
            $result = json_decode($result);

            $error = $loginController->goToHome($result, $_POST['usuario']);
         }
      ?>

     <section name="separator">
          <div style="width: 100%; padding-left: 30%; padding-right: 30%;">
            <div style="border: 1px solid #e7e4e4; border-radius: 0.5rem">
              <div style="padding: 1.25rem;">
               <div>
                  <h1>Iniciar Sesión</h1>
                  <?php if(!empty($error)){ ?>
                     <br>
                     <h5 style="background: #d5b3bb;padding: 10px;border-radius: 0.5rem; color: black"><?= $error ?></h5>
                     <br>
                  <?php } ?>
                    <div>
                     <form action="iniciar.php" method="POST">
                          <input type="text" placeholder="Usuario" name="usuario"> <br>
                          <input type="password" placeholder="Password" name="clave"> <br>

                          <br>

                          <a type="back" href="../index.html">Volver</a>
                          <input type="submit" value="Ingresar">                
                      </form>
                    </div>
               </div>
              </div>
            </div>

            <br>
            <center>
                <a href="registro.php" style="color: green; text-decoration: underline; font-size: 20px">
                  ¿Todavía no te has registrado? Hazlo por aquí.</i>
                </a>
            </center>
          </div>
    </section>
  </body>
</html>
