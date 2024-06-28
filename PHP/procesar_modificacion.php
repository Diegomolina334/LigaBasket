<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $equipo_local = $_POST['equipo_local'];
    $equipo_visitante = $_POST['equipo_visitante'];
    $resultado = $_POST['resultado'];

    // Validar formato del resultado
    if (preg_match('/^\d+-\d+$/', $resultado)) {
        $sql = "UPDATE duelos SET resultado = '$resultado' WHERE equipo_local = '$equipo_local' AND equipo_visitante = '$equipo_visitante'";

        if ($conexion->query($sql) === TRUE) {
            echo "Resultado agregado correctamente";
            header('Location: /LigaBasket/Partidos/Calendario.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }
    } else {
        echo "Formato de resultado inválido. Debe ser 'X-Y' donde X e Y son números.";
    }

    $conexion->close();
}
?>
