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
    <link rel="stylesheet" href="../css/style.css">
    <title>Usuarios</title>
</head>
<body>

<div class="ContenedorTabla"> 
<h1>Bienvenido Profesor <?php echo $_SESSION['nombre']; ?></h1>
  <form action="" method="GET">
	  <h1>Lista de Estudiantes</h1>
	
	  <div class="ContBuscar">
	    <div style="float: left;">
	      <a href="profesor.php" class="BotonesTeam">Inicio</a>
        <a href="../includes/_sesion/cerrarSesion.php" class="BotonesTeam">Cerrar</a>
	      <input class="BotonesTeam" type="submit" value="Buscar" name="enviar">
	      <input class="CajaTextoBuscar" type="search" name="busqueda"  placeholder="Ingresar descripción del estudiante" autocomplete="off" >
	    </div>
      <?php
        $config = include '../includes/Config.php';
        $conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);
        $where="";
        if(isset($_GET['enviar'])){
          $busqueda = $_GET['busqueda'];

          if (isset($_GET['busqueda'])){
		        $where="WHERE user.correo LIKE'%".$busqueda."%' OR nombre  LIKE'%".$busqueda."%'
            OR telefono  LIKE'%".$busqueda."%'";
	        }
        } 
      ?>
	    <div style="float:right;">
	      <?php echo "<a class='BotonesTeam5' href=\"registrar_user.php\">Agregar estudiante</a>";?>
	    </div>
	  </div>
	</form>
  <br>
  <table>

                   
                         <thead>    
                         <tr>
                         <th>Carnet</th>  
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Telefono</th>
                        <th>Fecha</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>

<?php
$config = include '../includes/Config.php';
$conexion=mysqli_connect($config['db']['host'],$config['db']['user'],$config['db']['pass'],$config['db']['name']);             
$SQL="SELECT user.carnet,user.id, user.nombre, user.correo, user.telefono, user.fecha, permisos.rol FROM user
LEFT JOIN permisos ON user.rol = permisos.id $where";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0){
    while($fila=mysqli_fetch_array($dato)){
?>
<tr>
<td><?php echo $fila['carnet']; ?></td>
<td><?php echo $fila['nombre']; ?></td>
<td><?php echo $fila['correo']; ?></td>
<td><?php echo $fila['telefono']; ?></td>
<td><?php echo $fila['fecha']; ?></td>
<td><?php echo $fila['rol']; ?></td>

<td>


<a class="btn btn-warning" href="editar_user.php?id=<?php echo $fila['id']?> ">
<i class="fa fa-edit"></i> </a>

  <a class="btn btn-danger"  href="eliminar_user.php?id=<?php echo $fila['id']?>">
<i class="fa fa-trash"></i></a>

</td>
</tr>

</div>
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
		<?php include('../index.php'); ?>
</html>