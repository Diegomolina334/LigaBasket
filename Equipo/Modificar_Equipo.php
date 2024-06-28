<?php
include '../PHP/conexion.php';

if (isset($_GET['equipo'])) {
    $equipo = $_GET['equipo'];
    $sql = "SELECT equipo, entrenador, ciudad FROM posiciones WHERE equipo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('s', $equipo);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
} else {
    echo "Equipo no especificado";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Equipo</title>
</head>
<body>
    <h1>Modificar Equipo</h1>
    <form action="Actualizar_Equipo.php" method="post">
        <input type="hidden" name="equipo_original" value="<?php echo $equipo; ?>">
        <label for="equipo">Nombre del Equipo:</label>
        <input type="text" id="equipo" name="equipo" value="<?php echo $row['equipo']; ?>" required><br>
        
        <label for="entrenador">Entrenador:</label>
        <input type="text" id="entrenador" name="entrenador" value="<?php echo $row['entrenador']; ?>" required><br>
        
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo $row['ciudad']; ?>" required><br>
        
        <input type="submit" value="Actualizar">
    </form>
</body>
</html>
