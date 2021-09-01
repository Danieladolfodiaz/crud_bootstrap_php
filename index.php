<?php require 'conexion.php'; ?>

<?php require 'index.view.php'; ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAJE -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- AÑADIR TAREA -->
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo de Tarea" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripcion de Tarea" required></textarea>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Guardar Tarea">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Descripcion</th>
            <th>Creado En</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $consulta = "SELECT * FROM tarea";
          $resultado_tareas = mysqli_query($conexion, $consulta);

          while($fila = mysqli_fetch_assoc($resultado_tareas)) { ?>
          <tr>
            <td><?php echo $fila['titulo']; ?></td>
            <td><?php echo $fila['descripcion']; ?></td>
            <td><?php echo $fila['creado_en']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $fila['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar.php?id=<?php echo $fila['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
