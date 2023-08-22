<?php

session_start();
error_reporting(0);

$validar = $_SESSION['nombre'];

if( $validar == null || $validar = ''){

  header("Location: ../includes/login.php");
  die();
  
}

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../css/estilo.css">
<link rel="stylesheet" href="../css/es.css">
    <title>Estudiante</title>
</head>

<div class="container is-fluid">




<div class="col-xs-12">
  		<h1>Bienvenido Estudiante <?php echo $_SESSION['nombre'];?>  Carnet:<?php echo $_SESSION['carnet'];?></h1>
      <br>
		<h1>Lista de Tareas</h1>
    <br>
		<div>

      <a class="btn btn-warning" href="../includes/_sesion/cerrarSesion.php">Cerrar
      <i class="fa fa-power-off" aria-hidden="true"></i>
       </a>
		</div>
		<br>

           <br>


			</form>
 
      <table class="table table-striped table-dark " id= "table_id">

                   
                         <thead>    
                         <tr>
                        <th>No.</th>
                        <th>Descripcion</th>
                        <th>Profesor</th>
                        <th>Fecha</th>
                        <th>Curso</th>
                        <th>Puntaje</th>
                        </tr>
                        </thead>
                        <tbody>

				<?php

$conexion=mysqli_connect("localhost","root","","r_user");               
$SQL="SELECT user.id, user.nombre, user.correo, user.password, user.telefono,
user.fecha, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
    
?>
<tr>
<td><?php echo $fila['id']; ?></td>
<td><?php echo $fila['descripcion']; ?></td>
<td><?php echo $fila['name']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['puntaje']; ?></td>

<?php
  }
  }else{
?>
    <tr class="text-center">
    <td colspan="16">No existen registros</td>
    </tr>
    
<?php    
  } 
?>
	</body>
  </table>
</html>