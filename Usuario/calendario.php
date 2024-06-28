<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LigaBasket/CSS/index.css">
    <link rel="stylesheet" href="/LigaBasket/CSS/duelos.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="navegador">
            <nav>
                <ul>
                    <li>
                        <a href="#">Partidos</a>
                        <ul class="submenu">
                            <li>
                                <a href="/LigaBasket/Usuario/calendario.php">Calendario</a>
                            </li>

                            <li>
                                <a href="/LigaBasket/Usuario/posicion.php">Posiciones</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="/LigaBasket/Usuario/usuario.php">Equipos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    
    <!--------Tabla---------->
    <table>
        <tr>
            <th>Hora</th>
            <th>Equipo Local</th>
            <th>Equipo Visitante</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Tipo</th>
            <th>Categoria</th>
        </tr>



    <?php
        include '../PHP/conexion.php';

        $sql = "SELECT hora, equipo_local, equipo_visitante, fecha, lugar, tipo, categoria, resultado FROM duelos";
        $result = $conexion -> query($sql);

        if($result -> num_rows > 0)
        {
            while ($row = $result->fetch_assoc()) {
                $local_score = "";
                $visitante_score = "";
                if (!empty($row["resultado"])) {
                    list($local_score, $visitante_score) = explode("-", $row["resultado"]);
                }

                $local_class = ($local_score !== "" && $visitante_score !== "" && $local_score > $visitante_score) ? 'ganador' : (($local_score !== "" && $visitante_score !== "" && $local_score < $visitante_score) ? 'perdedor' : '');
                $visitante_class = ($visitante_score !== "" && $local_score !== "" && $visitante_score > $local_score) ? 'ganador' : (($visitante_score !== "" && $local_score !== "" && $visitante_score < $local_score) ? 'perdedor' : '');

                echo "<tr>
                <td>".$row['hora']. "</td>
                <td><a href='/LigaBasket/Estadisticas/estadistica.php?equipo=" . urlencode($row["equipo_local"]) . "'>" . $row["equipo_local"] . "</a><span class='resultado $local_class'>" . $local_score . "</span></td>
                <td><a href='/LigaBasket/Estadisticas/estadistica.php?equipo=" . urlencode($row["equipo_visitante"]) . "'>" . $row["equipo_visitante"] . "</a><span class='resultado $visitante_class'>" . $visitante_score . "</span></td>
                <td>" .$row["fecha"]. "</td>
                <td>".$row['lugar'] ."</td>
                <td>".$row['tipo'] ."</td>
                <td>".$row['categoria'] ."</td>
                </tr>";
            }
            
        }
    ?>
    </table>

</body>
</html>