<?php 
        require "conexion.php";

  $message = '';

  
      $sql = "INSERT INTO `recursos` (`descripcion`, `limite`, `precio`, `id_tipo`) VALUES (:descripcion, :limite, :precio, :id_tipo)";
      $stmt = $conexion->prepare($sql);
      $stmt->bindParam(':descripcion', $_POST['descripcion']);
      $stmt->bindParam(':limite', $_POST['limite']);
      $stmt->bindParam(':precio', $_POST['precio']);
      $stmt->bindParam(':id_tipo', $_POST['tipo']);
      
      if ($stmt->execute()) {
        $message = 'Nuevo recurso creado con éxito';
        header("Location: ./reservas.php");
      } else {
        $message = 'Lo sentimos, debe haber habido un problema al crear el recurso';
      }
  
   if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    ?>