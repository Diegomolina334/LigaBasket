<?php
    include 'conexion.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $Hora = $_POST['hora'];
        $equipo_local = $_POST['equipo_local'];
        $equipo_visitante = $_POST['equipo_visitante'];
        $fecha = $_POST['fecha'];
        $lugar = $_POST['lugar'];
        $Tipo = $_POST['tipo'];
        $Categoria = $_POST['categoria'];

        $sql = "INSERT INTO duelos (hora, equipo_local, equipo_visitante, fecha, lugar, tipo, categoria) VALUES  ('$Hora','$equipo_local', '$equipo_visitante', '$fecha', '$lugar', '$Tipo','$Categoria')";

        if($conexion ->query($sql) === TRUE)
        {
            
            header('Location: /LigaBasket/Partidos/Calendario.php');
        }
        else
        {
            echo "Error: " .$sql . "<br>" .$conexion ->error;
        }

        $conexion -> close();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/LigaBasket/CSS/formulario.css">
    <link rel="stylesheet" href="/LigaBasket/CSS/index.css">
    <title>Inicio</title>
</head>
<body>
<div class="container animate__animated animate__fadeIn">
    <h1>Agregar Equipos Al Calendario</h1>
    <form action="insertar_calendario.php" method="post">

        <div class="form-group">
            <span class="material-symbols-outlined">watch</span>
            <label for="Hora">Hora</label>
            <input type="time" name="hora" id="hora">
        </div>

        <div class="form-group">
            <span class="material-symbols-outlined">groups</span><label for="equipo_local">Equipo Local</label>
            <input type="text" name="equipo_local" id="equipo_local" required>
        </div>
        <div class="form-group">
            <span class="material-symbols-outlined">groups</span><label for="equipo_visitante">Equipo Visitante</label>
            <input type="text" name="equipo_visitante" id="equipo_visitante" required>
        </div>

        <div class="form-group">
            <span class="material-symbols-outlined">event</span>
            <label for="fecha">Fecha:</label>
            <input type="date" name="fecha" id="fecha" required>
        </div>

        <div class="form-group">
            <span class="material-symbols-outlined">location_on</span>
            <label for="lugar">Lugar:</label>
            <input type="text" name="lugar" id="lugar" list="lugares" required>
            <datalist id="lugares">
                <option value="Gimnasio">
                <option value="Pabellon">
            </datalist>
        </div>

        <div class="form-group">
            <span class="material-symbols-outlined">unfold_more</span>
            <label for="Tipos">Tipos</label>
            <input type="text" name="tipo" id="tipo" list="Tipos" required>
            <datalist id="Tipos">
                <option value="LIGA">
                <option value="PLAYOFF">
            </datalist>
        </div>

        <div class="form-group">
            <span class="material-symbols-outlined">category</span>
            <label for="Categoria">Categoria</label>
            <input type="text" name="categoria" id="categoria" list="Categorias" required>
            <datalist id="Categorias">
                <option value="1ERA">
                <option value="2DA A">
                <option value="2DA B">
                <option value="Veterano">
                <option value="Femenil">
            </datalist>
        </div>
        
        <input type="submit" value="Agregar Equipo">
    </form>
</div>
</body>
</html>
