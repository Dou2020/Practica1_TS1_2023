<?php

session_start();
error_reporting(0);
$config = include './includes/Config.php';
$validar = $_SESSION['carnet'];

if( $validar == null || $validar = ''){
    header("Location: ./includes/login.php");
    die();
}else {
    $conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);
    $consulta= "SELECT * FROM user WHERE carnet='$validar'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);

    if($filas['rol'] == 1){ //admin

        header('Location: ./views/profesor.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ./views/estudiante.php');
    }
}
?>

<!DOCTYPE html> 
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<body>
         
</body>
</html>