<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Lista de tareas</title>
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION['correo'])) {
    header("location:index.php");
  }
  include('conexion.php');
  ?>
  <div class="container">
    <header class="text-center text-light my-4">
      <h1 class="mb-4">Lista de tareas</h1>
      <?php echo $_SESSION['correo']; ?>
    </header>
    <?php
    //seleccion del registro exacto para la edicion
    $cod = $_SESSION['correo'];
    $rs = mysqli_query($conexion, "SELECT U.id_usuario, U.usuario, T.id_tareas, T.nomtarea
      FROM usuarios U INNER JOIN tareas T ON U.id_usuario = T.id_usuario WHERE correo = '$cod'");
    ?>
    <table class="table table-bordered" style="text-align:center;">
      <thead>
        <tr>
          <th>ID TAREA</th>
          <th>NOMBRE TAREA</th>
          <th>ID DE USUARIO</th>
          <th>EDITAR / ELIMINAR</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($registro = mysqli_fetch_array($rs)) { ?>
          <tr>
            <td><?php echo $registro['id_tareas']; ?></td>
            <td><?php echo $registro['nomtarea']; ?></td>
            <td><?php echo $registro['id_usuario']; ?></td>
            <?php $nombre = $registro['usuario']; ?>
            <td>
              <a class="btn btn-info btn-sm" href="editar.php?cod=<?php echo $registro['id_tareas']; ?>">
                <i class="fas fa-pencil-alt"> </i> </a>
              <a class="btn btn-danger btn-sm" href="eliminar.php?cod=<?php echo $registro['id_tareas']; ?>">
                <i class="fas fa-trash"></i> </a>
            </td>
          </tr>
        <?php
        }
        ?>
        </tr>
      </tbody>
    </table>

    <div>
      <?php
      $cod = $_SESSION['correo'];
      $rsD = mysqli_query($conexion, "SELECT U.id_usuario, U.usuario, T.id_tareas, T.nomtarea
              FROM usuarios U INNER JOIN tareas T ON U.id_usuario = T.id_usuario WHERE correo = '$cod'");
      $usuarios = mysqli_fetch_array($rsD);

      if (isset($_POST['btnGuardar'])) {

        $id = $_POST['ID'];
        $tarea = $_POST['tarea'];

        $CREAR = "INSERT INTO tareas (tarea)VALUES('$tarea')";

        $resultado = mysqli_query($conexion, $CREAR);
        if (!$resultado) {
        } else {
          echo '<Script>
                    alert("Trea agregada correctamente");
                    </Script>';
        }
      }

      ?>

      <div class="form-group">
        <label for="inputName">NOMBRE TAREA</label>
        <input type="text" id="inputName" class="form-control" name="Tarea">
      </div>

      <div class="form-group">
        <label for="inputName">ID USUARIO</label>
        <input type="text" id="inputName" class="form-control" name="ID" value="<?php echo $usuarios['id_usuario']; ?>" disabled>
      </div>

      <div>
        <br>
        <input type="submit" value="Agregar Tarea" class="btn btn-success float-right" name="btnGuardar">
        <p><a href="index.php" style="color:black">SALIR</a></p>
      </div>
      <?php mysqli_close($conexion); ?>
    </div>
  </div>
</body>

</html>