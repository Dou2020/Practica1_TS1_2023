<?php
$config = include './Config.php';
$conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);

if(isset($_POST['registrar'])){

    if(strlen($_POST['carnet']) >=1 && strlen($_POST['nombre']) >=1 && strlen($_POST['correo'])  >=1 && strlen($_POST['telefono'])  >=1 
    && strlen($_POST['password'])  >=1 && strlen($_POST['rol']) >= 1 ){
    
    $id = trim($_POST['id']);
    $carnet = trim($_POST['carnet']);
    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['correo']);
    $telefono = trim($_POST['telefono']);
    $password = trim($_POST['password']);
    $rol = trim($_POST['rol']);

    $consulta= "INSERT INTO user (id,carnet,nombre, correo, telefono, password,fecha , rol)
    VALUES ($id,'$carnet','$nombre', '$correo','$telefono','$password','2023-08-23 18:30:47', $rol )";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: ../views/profesor.php');
  }
}









?>