<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LigaBasket/CSS/duelos.css">
    <title>Estadísticas del Equipo</title>
</head>
<body>

    <?php
        if (isset($_GET['equipo'])) {
            $equipo = $_GET['equipo'];
            echo "<h1>Estadísticas de: $equipo</h1>";
        } else {
            echo "<h1>Equipo no especificado</h1>";
            exit;
        }
    ?>

    <div class="btn-container">
        <a href="../PHP/agregar_jugador.php?equipo=<?php echo urlencode($equipo); ?>">
            <button>Agregar Jugador</button>
        </a>
    </div>
    
    <table>
        <tr>
            <th>#</th>
            <th>Jugador</th>
            <th>2 Puntos</th>
            <th>3 Puntos</th>
            <th>TL</th>
            <th>Puntos</th>
            <th>Especial</th>
            <th>Acciones</th>
        </tr>

        <?php
            include '../PHP/conexion.php';

            $sql = "SELECT id, nombre, doble_punto, triple_puntos, tl, puntos, activo FROM estadistica WHERE equipo = ?";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param("s", $equipo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo("<tr>
                    <td>".$row['id']. "</td>
                    <td>".$row['nombre']."</td>
                    <td>".$row['doble_punto']."</td>
                    <td>".$row['triple_puntos']."</td>
                    <td>".$row['tl']."</td>
                    <td>".$row['puntos']."</td>
                    <td>".($row['activo'] ? 'Sí' : 'No')."</td>
                    <td>
                        <form action='../PHP/toogle_activo.php' method='post'>
                            <input type='hidden' name='id' value='".$row['id']."'>
                            <input type='hidden' name='equipo' value='".$equipo."'>
                            <button type='submit'>".($row['activo'] ? 'Desactivar' : 'Activar')."</button>
                        </form>
                    </td>
                    </tr>");
                }
            } else {
                echo "<tr><td colspan='8'>No hay jugadores para este equipo</td></tr>";
            }

            $stmt->close();
            $conexion->close();
        ?>
    </table>

</body>
</html>
