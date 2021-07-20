<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=3.0, minimum-scale=1.0">

    <link rel="stylesheet" href="estilos.css">


</head>

<body>
    <form action="register.php" class="formulario" method="POST">

        <h1>Registrate</h1>
        <div class="contenedor">

            <div class="input-contenedor">
                <i class="fas fa-user icon"></i>
                <input type="text" name="usuario" placeholder="Nombre Completo">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-envelope icon"></i>
                <input type="text" name="correo" placeholder="Correo Electronico">
            </div>

            <div class="input-contenedor">
                <i class="fas fa-key icon"></i>
                <input type="password" name="contraseña" placeholder="Contraseña">
            </div>
            <input type="submit" value="Registrate" class="button">

            <p>¿Ya tienes una cuenta?<a class="link" href="index.php.">Iniciar Sesion</a></p>
        </div>
    </form>
</body>

</html>