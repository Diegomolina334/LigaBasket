<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los nombres de los equipos desde el formulario
    $equipos = $_POST['equipos'];

    // Insertar los equipos en la tabla de posiciones con victorias y derrotas por defecto en 0
    foreach ($equipos as $equipo) {
        $equipo = htmlspecialchars($equipo); // Prevenir inyección de código HTML
        $sql = "INSERT INTO posiciones (equipo, victorias, derrotas) VALUES ('$equipo', 0, 0)";

        if ($conexion->query($sql) === TRUE) {
            header('Location: ../Partidos/Posicion.php');
        } else {
            echo "Error al agregar equipo $equipo: " . $conexion->error . "<br>";
        }
    }

    // Cerrar la conexión
    $conexion->close();
}
?>
