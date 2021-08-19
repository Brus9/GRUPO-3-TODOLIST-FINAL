<?php

include ('conexion.php');

$usuario=$_POST["usuario"];
$correo=$_POST["correo"];
$contraseña=$_POST["contraseña"];

$insertar="INSERT INTO usuarios(usuario,correo,contraseña)VALUES('$usuario','$correo','$contraseña')";


$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if(mysqli_num_rows($verificar_correo) > 0){
    echo '<Script>
    alert("El correo ya esta esta en uso intente denuevo");
    window.history.go(-1);
    </Script>';
    exit;
}

$resultado=mysqli_query($conexion,$insertar);
if(!$resultado){
}else{
    echo '<Script>
    alert("Usuario correctamente registrado ahora puede Iniciar sesion");
    window.history.go(-1);
    </Script>';
}
mysqli_close($conexion);
