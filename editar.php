<?php
require "conexion.php";
$titulo = '';
$descripcion= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $consulta = "SELECT * FROM tarea WHERE id=$id";
  $resultado = mysqli_query($conexion, $consulta);
  if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_array($resultado);
    $titulo = $fila['titulo'];
    $descripcion = $fila['descripcion'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $titulo= $_POST['titulo'];
  $descripcion = $_POST['descripcion'];

  $consulta = "UPDATE tarea set titulo = '$titulo', descripcion = '$descripcion' WHERE id=$id";
  mysqli_query($conexion, $consulta);
  $_SESSION['message'] = 'Tarea Actualizada Correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>" placeholder="Actualizar titulo">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" rows="10"><?php echo $descripcion;?></textarea>
        </div>
        <button class="btn-success" name="actualizar">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
