<?php
$conexion= mysqli_connect("localhost", "root", "130824973586", "Practica1_TS1");

if(isset($_POST['registrar'])){

    if(strlen($_POST['carnet']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) >= 1 ){

    $carnet = trim($_POST['carnet']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO user (carnet,nombre, correo, telefono, password, rol)
    VALUES ('$carnet','$nombre', '$correo','$telefono','$password', '$rol' )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/user.php');
  }
}









?>