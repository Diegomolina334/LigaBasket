<!DOCTYPE html>
<html lang="es">
    <link rel="stylesheet" href="/LigaBasket/CSS/resultado.css">
<head>
</head>
<body>  
    <?php
    if (!isset($_POST['submit'])) {
    ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="cantidad_equipos">Cantidad de Equipos:</label>
            <input type="number" id="cantidad_equipos" name="cantidad_equipos" min="1" required>
            <button type="submit" name="submit">Agregar</button>
        </form>
    <?php
    } else {
        $cantidad_equipos = $_POST['cantidad_equipos'];
    ?>
        <form action="procesar_agregar_equipos.php" method="post">
            <?php
            for ($i = 1; $i <= $cantidad_equipos; $i++) {
                echo "<label for='equipo_$i'>Equipo $i:</label>";
                echo "<input type='text' id='equipo_$i' name='equipos[]' required><br>";
            }
            ?>
            <button type="submit">Guardar Equipos</button>
        </form>
    <?php
    }
    ?>

    <script src="/LigaBasket/JS/alerta.js"></script>
</body>
</html>
