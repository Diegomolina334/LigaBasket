<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LigaBasket/CSS/duelos.css">
    <title>Resultados de Duelos</title>
</head>
<body>

<h1>Resultados de Duelos</h1>

<!-- Estructura de la tabla -->
<table>
    <thead>
        <tr>
            <th>Hora</th>
            <th>Equipo Local</th>
            <th>Equipo Visitante</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Tipo</th>
            <th>Categoría</th>
            <th>Resultado</th>
        </tr>
    </thead>
    <tbody>
    <?php
// Incluir el archivo de conexión
include 'conexion.php';

// Verificar si se envió una fecha
if (isset($_GET['fecha'])) {
    $fecha = $_GET['fecha'];

    // Consulta para buscar los duelos en la fecha especificada
    $sql = "SELECT hora, equipo_local, equipo_visitante, fecha, lugar, tipo, categoria, resultado FROM duelos WHERE fecha = '$fecha'";
    $result = $conexion->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Mostrar los resultados en una tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['hora'] . "</td>";
            echo "<td>" . $row['equipo_local'] . "</td>";
            echo "<td>" . $row['equipo_visitante'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['lugar'] . "</td>";
            echo "<td>" . $row['tipo'] . "</td>";
            echo "<td>" . $row['categoria'] . "</td>";
            echo "<td>" . $row['resultado'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        // Si no hay resultados, mostrar un mensaje
        echo "<p>No se encontraron duelos para la fecha $fecha</p>";
    }
} else {
    // Si no se proporcionó una fecha, redireccionar a la página principal o mostrar un mensaje
    header("Location: /LigaBasket/Partidos/Calendario.php");
    exit();
}
?>

    </tbody>
</table>

</body>
</html>
