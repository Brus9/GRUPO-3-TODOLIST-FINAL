<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="estilos.css">


</head>

<body>
    <div class="app">
        <form action="register.php" class="formulario" method="POST">

            <h1>Crea una cuenta</h1>
            <h2>Es rápido y fácil</h2>
            <div class="contenedor">

                <div class="input-contenedor">
                    <input type="text" name="usuario" placeholder="Nombre Completo" required>               
                </div>

                <div class="input-contenedor">
                    <input type="text" name="correo" placeholder="Correo Electronico" required>
                </div>

                <div class="input-contenedor">
                   <input type="password" name="contraseña" placeholder="Contraseña" required>
                </div>
                <input type="submit" value="Registrate" class="button">

                <p>¿Ya tienes una cuenta? <a class="link" href="index.php."> Iniciar Sesion</a></p>
            </div>
        </form>
        </div>
</body>

</html>