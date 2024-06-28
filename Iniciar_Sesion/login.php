<?php
    include '../PHP/conexion.php';

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM login WHERE correo='$email' AND contrasena='$password'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                header('Location: /LigaBasket/index.html');
                exit(); // Asegúrate de que el script termine después de redirigir
            } else {
                header('Location: /LigaBasket/Usuario/usuario.php');
            }
        } else {
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="/LigaBasket/CSS/index.css">
    <link rel="stylesheet" href="login.css">
    <title>Iniciar Sesión</title>
</head>
<body>
    <div class="container animate_animated animate_fadeIn">
        <h1>Iniciar Sesión</h1>
        <form action="/LigaBasket/Iniciar_Sesion/login.php" method="post">
            <div class="form-group">
                <span class="material-symbols-outlined">mail</span>
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="form-group">
                <span class="material-symbols-outlined">key</span>
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
