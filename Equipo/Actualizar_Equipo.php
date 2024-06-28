<?php
include '../PHP/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $equipo_original = $_POST['equipo_original'];
    $equipo = $_POST['equipo'];
    $entrenador = $_POST['entrenador'];
    $ciudad = $_POST['ciudad'];

    $sql = "UPDATE posiciones SET equipo = ?, entrenador = ?, ciudad = ? WHERE equipo = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param('ssss', $equipo, $entrenador, $ciudad, $equipo_original);

    if ($stmt->execute()) {
        echo "Registro actualizado exitosamente";
        header("Location: ../Equipo/Equipos.php");
    } else {
        echo "Error al actualizar el registro: " . $conexion->error;
    }
} else {
    echo "Método no permitido";
}
?>
