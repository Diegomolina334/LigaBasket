<?php
include 'conexion.php';

$equipo_local = $_GET['equipo_local'];
$equipo_visitante = $_GET['equipo_visitante'];

$sql = "SELECT equipo_local, equipo_visitante, resultado FROM duelos WHERE equipo_local = '$equipo_local' AND equipo_visitante = '$equipo_visitante'";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LigaBasket/CSS/resultado.css">
    <title>Modificar Calendario</title>
</head>
<body>
<div class="container">
    <h1>Agregar Resultado</h1>
    <form action="procesar_modificacion.php" method="post">
        <input type="hidden" name="equipo_local" value="<?php echo $equipo_local; ?>">
        <input type="hidden" name="equipo_visitante" value="<?php echo $equipo_visitante; ?>">
        <div class="form-group">
            <label for="resultado">Resultado</label>
            <input type="text" name="resultado" id="resultado" required>
        </div>
        <input type="submit" value="Agregar Resultado">
    </form>
</div>
</body>
</html>
