<?php
require_once ("_db.php");

echo("<script>console.log('PHP: Hello word');</script>");
if (isset($_POST['accion'])){ 
    switch ($_POST['accion']){
        //casos de registros
        case 'editar_registro':
            editar_registro();
            break; 

        case 'eliminar_registro';
            eliminar_registro();
            break;

        case 'acceso_user';
            acceso_user();
            break;
        default:
            //header('Location: login.php');
            break;
		}
	}

    function editar_registro() {
        
		$conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);
		extract($_POST);
		$consulta="UPDATE user SET nombre = '$nombre', correo = '$correo', telefono = '$telefono',
		password ='$password', rol = '$rol' WHERE id = '$id' ";

		mysqli_query($conexion, $consulta);


		header('Location: ../views/user.php');

}

function eliminar_registro() {
    $conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);
    extract($_POST);
    $id= $_POST['id'];
    $consulta= "DELETE FROM user WHERE id= $id";

    mysqli_query($conexion, $consulta);


    header('Location: ../views/user.php');

}

function acceso_user() {
    $config = include './Config.php';
    $nombre=$_POST['carnet'];
    $password=$_POST['password'];
    session_start();
    //$_SESSION['nombre']=$nombre;

    $conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);
    $consulta= "SELECT * FROM user WHERE carnet='$nombre' AND password='$password'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_fetch_array($resultado);
    $_SESSION['nombre']=$filas['nombre'];
    $_SESSION['carnet']=$filas['carnet'];

    if($filas['rol'] == 1){ //admin

        header('Location: ../views/profesor.php');

    }else if($filas['rol'] == 2){//lector
        header('Location: ../views/estudiante.php');
    }
    
    
    else{

        header('Location: login.php');
        session_destroy();

    }

  
}






