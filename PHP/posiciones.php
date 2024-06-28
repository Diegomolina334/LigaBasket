<?php
include '../PHP/conexion.php';

// Consulta para obtener los resultados de los duelos
$sql = "SELECT equipo_local, equipo_visitante, resultado FROM duelos";
$result = $conexion->query($sql);

// Array para almacenar victorias y derrotas
$equipos = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $local_score = 0;
        $visitante_score = 0;

        if (!empty($row["resultado"])) {
            list($local_score, $visitante_score) = explode("-", $row["resultado"]);
        }

        $local_team = $row["equipo_local"];
        $visitante_team = $row["equipo_visitante"];


        if (!isset($equipos[$local_team])) {
            $equipos[$local_team] = ["victorias" => 0, "derrotas" => 0];
        }
        if (!isset($equipos[$visitante_team])) {
            $equipos[$visitante_team] = ["victorias" => 0, "derrotas" => 0];
        }


        if ($local_score > $visitante_score) {
            $equipos[$local_team]["victorias"] += 1;
            $equipos[$visitante_team]["derrotas"] += 1;
        } else if ($visitante_score > $local_score) {
            $equipos[$visitante_team]["victorias"] += 1;
            $equipos[$local_team]["derrotas"] += 1;
        }
    }
}

foreach ($equipos as $equipo => $stats) {
    $sql = "INSERT INTO posiciones (equipo, victorias, derrotas)
            VALUES ('$equipo', {$stats['victorias']}, {$stats['derrotas']})
            ON DUPLICATE KEY UPDATE
            victorias = VALUES(victorias),
            derrotas = VALUES(derrotas)";
    $conexion->query($sql);
}
?>
