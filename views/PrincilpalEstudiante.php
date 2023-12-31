<?php

if (!isset($_SESSION['user'])) {

    header('Location: /ruta-a-tu-pagina-de-login');
    exit();
}

$userData = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>

<body class="flex bg-gray-100">
    <section id="bloque" class="bg-zinc-700 text-gray-400 h-screen flex flex-col justify-between p-4">
        <section id="logo" class="flex items-center">
            <img src="/img/logo.jpg" alt="" class="w-24 mx-2">
            <h2 class="text-center">Universidad</h2>
        </section>

        <section id="admin" class="text-center">
            <h2>Hola <?php echo $userData['nombre']; ?></h2>
            <p>Tu correo <?php echo $userData['correo']; ?></p>
        </section>

        <?php
        date_default_timezone_set('America/Mexico_City');

        $fecha= date('Y-m-d');
        $hora = date('H:i');

        echo "$fecha";
        echo "<br>";
        echo "$hora";
        ?>

        <section id="cuerpo" class="mt-2">
            <h2 class="text-center mb-2">MENU ALUMNOS</h2>
            <div class="flex flex-col items-center">
                <div>
                    <span class="material-symbols-outlined">
                        task
                    </span>
                    <a href="/calificaciones-alumno" class="ml-2">Ver Calificaciones</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">
                        display_settings
                    </span>
                    <a href="/clases-alumno" class="ml-2">Administra tus Clases</a>
                </div>
            </div>
        </section>
    </section>

    <section class="w-1/2 p-4">
        <section id="home" class="flex w-full bg-white p-4 " style="width: 1450px;">
            <div>
                <a href="/home-alumnos" class="ml-2"><span class="material-symbols-outlined">menu</span>Home</a>

            </div>
            <div class="ml-auto">
                <a href="/edit-perfil-alumno"> <span class="material-symbols-outlined">
                        expand_more
                    </span>Edita tu perfil</a>
                    <h2>Hola <?php echo $userData['nombre']; ?></h2>
            </div>
            <div>
                <form action="/exit" method="post" class="mt-4">
                    <button type="submit" name="logout" class="bg-red-500 text-white px-2 py-1">Exit</button>
                </form>

            </div>
        </section>
        

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Hola <?php echo $userData['nombre']; ?></h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p- max-w-screen-xl">
            <h6 class="text-left">Bienvenido</h6>
            <p class="text-left">Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda</p>
        </section>
    </section>
</body>


</html>