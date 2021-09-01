<?php

require 'conexion.php';

if (isset($_POST['guardar'])) {
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $consulta = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
  $resultado = mysqli_query($conexion, $consulta);
  if(!$resultado) {
    die("Consulta Fallida.");
  }

  $_SESSION['message'] = 'Tarea Guardada Sastifactoriamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>
