<!DOCTYPE html>
<html lang="es-MX">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="stylesheet" href="../css/registrar.css">
</head>

<body>
<form class="form"  action="../includes/validar.php" method="POST">
    <p class="title">Registar Usuario</p>
    <p class="message">Registro de estudiante o profesor </p>

    <label>
        <input required="" placeholder="" name="id" type="number" class="input">
        <span>Id.</span>
    </label>
    <label>
        <input required="" placeholder="" name="carnet" type="text" class="input">
        <span>Carnet</span>
    </label>
    <label>
        <input required="" placeholder="" name="nombre" type="text" class="input">
        <span>Nombre</span>
    </label>
    <label>
        <input required="" placeholder="" name="correo" type="email" class="input">
        <span>Email</span>
    </label> 
    <label>
        <input required="" placeholder="" name="telefono" type="number" class="input">
        <span>Telefono</span>
    </label>
    <label>
        <input required="" placeholder="" name="passowrd" type="password" class="input">
        <span>Password</span>
    </label>
    <label>
        <input placeholder="" name="rol" value="2" type="checkbox">
        <span>Estudiante</span>
        <input  placeholder="" name="rol" value="1" type="checkbox">
        <span>Profesor</span>
    </label>
    <input type="hidden" name="registrar" value="Guardar">
    <button class="submit">Registrar</button>
    <a href="../includes/_sesion/cerrarSesion.php" class="submit">Cancelar</a>
</form>
               
</body>
</html>