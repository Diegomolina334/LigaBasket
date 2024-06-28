<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/LigaBasket/Partidos/calendario.css">
    <link rel="stylesheet" href="/LigaBasket/CSS/index.css">
    <link rel="stylesheet" href="/LigaBasket/Equipos/Equipos.css">
    <title>Equipos</title>

    <style>
        h1{
            text-align: center;
            color:white;
        }
    </style>
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


  <h1>Equipos</h1>

    <table>
       <tr>
        <th>Nombre</th>
        <th>Entrenador</th>
        <th>Ciudad</th>
        <th>Victorias</th>
        <th>Derrotas</th>
        <th>Modificaciones</th>
       </tr>
   

       <?php
        include '../PHP/conexion.php';
        include '../PHP/posiciones.php';

        $sql = "SELECT equipo, entrenador, ciudad, victorias, derrotas FROM posiciones ORDER BY victorias DESC, derrotas ASC";
        $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row['equipo'] . "</td>
            <td>" . $row['entrenador'] . "</td>
            <td>" . $row['ciudad'] . "</td>
            <td>" . $row['victorias'] . "</td>
            <td>" . $row['derrotas'] . "</td>
            <td><a href='Modificar_Equipo.php?equipo=" . urlencode($row['equipo']) . "'>Modificar</a></td>
            </tr>";
                 }
            }
        ?>
     </table>
        <a href="../Equipo/Agregar_Equipo.php">
            <button>Agregar Equipos</button>
        </a>

   
</body>
</html>
