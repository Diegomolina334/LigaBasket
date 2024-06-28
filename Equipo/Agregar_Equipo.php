<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include '../PHP/conexion.php';

        $equipo = $_POST['equipo'];
        $entrenador = $_POST['entrenador'];
        $ciudad = $_POST['ciudad'];

        // Valores predeterminados para victorias y derrotas
        $victorias = 0;
        $derrotas = 0;

        $sql = "INSERT INTO posiciones (equipo, entrenador, ciudad, victorias, derrotas) VALUES ('$equipo', '$entrenador', '$ciudad', $victorias, $derrotas)";

        if ($conexion->query($sql) === TRUE) {
           Header('Location: /LigaBasket/Equipo/Equipos.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conexion->error;
        }

        $conexion->close();
    }
    ?>






<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="/LigaBasket/CSS/calendario.css">
    <link rel="stylesheet" href="Equipos.css">
    <title>Agregar Equipo</title>
    <style>
        h1{
            color:black;
        }
    </style>
</head>
<body>
    <div class="container animate__animated animate__fadeInUp">
        <h1>Agregar Nuevo Equipo</h1>
        <form action="agregar_equipo.php" method="post">
            <div class="form-group">
                <label for="equipo">Nombre del Equipo:</label>
                <input type="text" id="equipo" name="equipo" required>
            </div>
            <div class="form-group">
                <label for="entrenador">Nombre del Entrenador:</label>
                <input type="text" id="entrenador" name="entrenador" required>
            </div>
            <div class="form-group">
                <label for="ciudad">Ciudad:</label>
                <input type="text" id="ciudad" name="ciudad" required>
            </div>
            <input type="submit" value="Agregar Equipo">
        </form>
    </div>

    <script>
        // Agregar animación de desplazamiento suave al hacer clic en el botón de enviar
        document.querySelector('input[type="submit"]').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelector('.container').classList.add('animate__fadeOutUp');
            setTimeout(function() {
                document.querySelector('form').submit();
            }, 500);
        });
    </script>
</body>
</html>


