<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<?php
  session_start();
  if (!isset($_SESSION['correo'])) {
    header("location:index.php");
  }
  include('conexion.php');
  ?>
<div class="wrapper">

  <!-- Navbar -->
  <?php include('funciones/navbar.php') ?>
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/user.gif" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"></span>
      <?php echo $_SESSION['correo']; ?>
    </a>
      <!-- Sidebar Menu -->
      <?php include('funciones/sidebar.php') ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
  <body>
  <?php
  if (!isset($_SESSION['correo'])) {
    header("location:index.php");
  }
  include('conexion.php');
  ?>
  <div class="container">
    <header class="text-center text-light my-4">
      <h1 class="mb-4" style="color: black;">Lista de tareas</h1>
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
      </div>
      <?php mysqli_close($conexion); ?>
    </div>
  </div>
</body>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js"></script>
</body>
</html>
