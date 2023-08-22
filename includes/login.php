

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    
<div class="form-box">
<form class="form" action="_functions.php" method="POST">
    <span class="title">Iniciar Sesión</span>
    <span class="subtitle">Inicia como Estudiante o Profesor.</span>
    <div class="form-container">
		<input type="text" name="carnet" class="input" placeholder="Carnet">
		<input type="password" name="password" class="input" placeholder="Password">
        <input type="hidden" name="accion" value="acceso_user">
    </div>
    <button>Ingresar</button>
</form>
</div>
</body>
</html>