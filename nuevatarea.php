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
include ('conexion.php');
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">TAREAS</h1>
          </div><!-- /.col -->
         
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-user mr-1"></i>
                  AGREGAR TAREA
                </h3>
              </div>
<div class="card-body">
  <form class="form-horizontal" action="" method="post">
    <div class="tab-content p-0">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-body">
            <div class="form-group">
                <label for="inputName">ID TAREA</label>
                <input type="text" id="inputName" class="form-control" name="txtID">
              </div>
               <div class="form-group">
                <label for="inputName">NOMBRE TAREA</label>
                <input type="text" id="inputName" class="form-control" name="txtNombre">          
             </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>

      </div>
      <br>
      <?php 
              if(isset($_POST['btnGuardar'])){
                
                $id_tareas = $_POST['txtID'];
                $nomtarea = $_POST['txtNombre'];

                            
                $rs = mysqli_query($conexion,"CALL sp_insertar_tareas('$id_tareas','$nomtarea')");
                if($rs){
                echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido agregados con éxito.</div>';
                }else{
                echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se agregaron los datos.</div>';
              }
            }
        ?>
      <div class="row">
        <div class="col-12">
        <br>
          <a href="todo.php" class="btn btn-secondary"> 
          <i class="fas fa-arrow-alt-circle-left"> </i> Regresar</a>
          <input type="submit" value="Guardar" class="btn btn-success float-right" name="btnGuardar">
        </div>
      </div>
</body>
</html>   