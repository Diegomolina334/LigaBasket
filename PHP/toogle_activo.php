<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $equipo = $_POST['equipo'];

    $sql = "UPDATE estadistica SET activo = NOT activo WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        header('Location: ../Estadisticas/estadistica.php?equipo=' . urlencode($equipo));
    } else {
        echo "Error al actualizar el estado del jugador.";
    }

    $stmt->close();
    $conexion->close();
}
?>
