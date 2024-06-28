<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calendario.css">
    <link rel="stylesheet" href="/LigaBasket/CSS/index.css">
    <link rel="stylesheet" href="/LigaBasket/CSS/marcador.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>Calendario</title>

</head>
<body>

<header>
        <div class="navegador">
            <nav>
                <ul>
                    <li class="animate__animated animate__fadeInDownBig animate__delay-2s">
                        <a href="#">Login</a>
                    </li>

                    <li class="animate__animated animate__fadeInDownBig animate__delay-2s">
                        <a href="/LigaBasket/Equipo/Equipos.php">Equipo</a>
                    </li>

                    <li class="animate__animated animate__fadeInDownBig animate__delay-2s">
                        <a href="#">Partidos</a>
                        <ul class="submenu">
                            <li>
                                <a href="/LigaBasket/Partidos/Calendario.php"> Calendario</a>
                            </li>
                            <li>
                                <a href="/LigaBasket/Partidos/Posicion.php">Posicion</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <div class="buscador-duelos">
    <form action="/LigaBasket/PHP/buscador_duelos.php" method="GET">
        <label for="fecha">Buscar duelos por fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
        <button type="submit">Buscar</button>
    </form>
</div>


    <div class="btn-container">
        <a href="/LigaBasket/PHP/insertar_calendario.php">
            <button class="animate__animated animate__bounceInLeft">Agregar Equipo</button>
        </a>


        <a href="/LigaBasket/PHP/eliminar_duelos.php">
            <button class="animate__animated animate__bounceInRight">Eliminar Liga</button>
        </a>
    </div>

  

    <table>
        <tr>
            <th>Hora</th>
            <th>Equipo Local</th>
            <th>Equipo Visitante</th>
            <th>Fecha</th>
            <th>Lugar</th>
            <th>Tipo</th>
            <th>Categoria</th>
            <th>Acciones</th>
        </tr>
    
    <?php
        include '../PHP/conexion.php';

        $sql = "SELECT hora, equipo_local, equipo_visitante, fecha, lugar, tipo, categoria, resultado FROM duelos";
        $result = $conexion->query($sql);
        if ($result->num_rows > 0) {
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
                <td><a href='../PHP/modificar_calendario.php?equipo_local=" . urlencode($row["equipo_local"]) . "&equipo_visitante=" . urlencode($row["equipo_visitante"]) . "'>Modificar</a></td>
                </tr>";
            }
        } else {
            echo("<tr><td colspan='8'>Sin resultados</td></tr>");
        }
    ?>
    </table>

    <script src="/LigaBasket/JS/alerta.js"></script>
</body>
</html>
