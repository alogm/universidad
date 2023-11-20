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
            <h2>Alummno</h2>
            <p>Alumno</p>
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
                Maestro
            </div>
        </section>
        

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Calificaciones y mensajes de tus clases</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p- max-w-screen-xl">
            <h6 class="text-left">Calificaciones y mensajes de tus clases</h6>
            <p class="text-left"></p>
        </section>
    </section>
</body>


</html>