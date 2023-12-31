<?php

if (!isset($_SESSION['user'])) {

    header('Location: /index.php');
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
                <a href="/edit-alumno"> <span class="material-symbols-outlined">
                        expand_more
                    </span></a>
                Alumno
            </div>
        </section>


        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Editar datos de perfil</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p- max-w-screen-xl">
            <h6 class="text-left">Informacion de Usuario</h6>
            <p class="text-left">Los cambios realizados se veran reflejados hasta iniciar sesion nuevamente</p>
        </section>

        <section>
            <form action="/perfil-alumno-update" method="post" class="mt-4">
                <input type="hidden" name="id" value="<?= $userData['id']; ?>">
                <div class="mb-2">
                    <label class="block">1.-Matricula:</label>
                    <input type="text" name="matricula" value="<?= $userData['matricula']; ?>" class="border border-gray-300 w-full rounded p-2">
                </div>
                <div class="mb-2">
                    <label class="block">2.-Correo Electronico:</label>
                    <input type="text" name="correo" value="<?= $userData['correo']; ?>" class="border border-gray-300 w-full rounded p-2">
                </div>

                <div class="mb-2">
                    <label class="block">3.-Ingresa nueva contraseña:</label>
                    <input type="text" name="contrasena" class="border border-gray-300 w-full rounded p-2">
                </div>

                <div class="mb-2">
                    <label class="block">3.-Nombre:</label>
                    <input type="text" name="nombre" value="<?= $userData['nombre']; ?>" class="border border-gray-300 w-full rounded p-2">
                </div>

                <div class="mb-2">
                    <label class="block">4.-Apellido:</label>
                    <input type="text" name="apellido" value="<?= $userData['apellido']; ?>" class="border border-gray-300 w-full rounded p-2">
                </div>

                <div class="mb-2">
                    <label class="block">4.-Direccion:</label>
                    <input type="text" name="direccion" value="<?= $userData['direccion']; ?>" class="border border-gray-300 w-full rounded p-2">
                </div>

                <div class="mb-2">
                    <label class="block">4.-Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nacimieno" value="<?= $userData['fecha_nacimieno']; ?>" class="border border-gray-300 w-full rounded p-2">
                </div>

                <button type="submit" name="guardar" class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 mt-4">
                    Guardar cambios
                </button>
            </form>
        </section>
    </section>
</body>


</html>