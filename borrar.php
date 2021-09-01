<?php

require "conexion.php";

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "DELETE FROM tarea WHERE id = $id";
  $resultado = mysqli_query($conexion, $consulta);
  if(!$resultado) {
    die("Consulta Fallida.");
  }

  $_SESSION['message'] = 'Tarea Removida Correctamente';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>
