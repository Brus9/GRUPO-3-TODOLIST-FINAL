<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>TodoList</title>
</head>
<style>

</style>

<body>
    <form action="validar.php" method="post">
        <h1 style="color: black;">Login Tareas</h1> <br>
        <div style="text-align: center;">
            <img src="img/login.svg" height="100">
        </div>
        <label for=""></label>
        <input type="text" name="correo" placeholder="Correo electronico" required>
        <label for=""></label>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <button type="submit">LOGIN</button>
        <p> <a href="registrarvista.php">REGISTRATE</a></p>

    </form>
</body>

</html>