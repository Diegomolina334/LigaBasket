<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LigaBasket/CSS/index.css">
    <link rel="stylesheet" href="../Partidos/calendario.css">
    <title>Posiciones</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        
    </style>
</head>
<body>

    <header>
        <div class="navegador">
            <nav>
                <ul>
                    <li>
                        <a href="/LigaBasket/index.html">Inicio</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>   

   
    <h1>Tabla de Posiciones</h1>
    
    
    <table>
        <tr>
            <th>Posición</th>
            <th>Equipo</th>
            <th>Victorias</th>
            <th>Derrotas</th>
        </tr>
    
    <?php
        include '../PHP/conexion.php';
        include '../PHP/posiciones.php';

        $sql = "SELECT equipo, victorias, derrotas FROM posiciones ORDER BY victorias DESC, derrotas ASC";
        $result = $conexion->query($sql);
        $posicion = 1;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $posicion . "</td>
                <td>" . $row["equipo"] . "</td>
                <td>" . $row["victorias"] . "</td>
                <td>" . $row["derrotas"] . "</td>
                </tr>";
                $posicion++;
            }
        } else {
            echo "<tr><td colspan='4'>Sin lugares</td></tr>";


        }
    ?>
    </table>

</body>
</html>
