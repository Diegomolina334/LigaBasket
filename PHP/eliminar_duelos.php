<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql_duelos = "DELETE FROM duelos";
    if ($conexion->query($sql_duelos) === TRUE) {
        header('Location: /LigaBasket/Partidos/Calendario.php');
    } else {
        echo "Error al eliminar duelos: " . $conexion->error;
    } 
    $sql_posiciones = "DELETE FROM posiciones";
    if ($conexion->query($sql_posiciones) === TRUE) {
        echo "Posiciones eliminadas correctamente.";
    } else {
        echo "Error al eliminar posiciones: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="/LigaBasket/CSS/formulario2.css">
    <title>Eliminar Duelos y Posiciones</title>
</head>
<body>
    <div class="container">
        <form action="eliminar_duelos.php" method="post">
            <button class="animate__animated animate__bounceIn" type="submit">Eliminar Duelos y Posiciones</button>
        </form>
    </div>

    <script src="/LigaBasket/JS/alerta.js"></script>
</body>
</html>
