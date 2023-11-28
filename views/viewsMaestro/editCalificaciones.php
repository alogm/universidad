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
            <h2>Hola Maestro <?= $userData['nombre']; ?></h2>
            <p>Su Correo: <?= $userData['correo']; ?></p>
        </section>

        <section id="cuerpo" class="mt-2">
            <h2 class="text-center mb-2">MENU MAESTRO</h2>
            <div class="flex flex-col items-center">

                <div>
                    <span class="material-symbols-outlined">school</span>
                    <a href="/vista-maestro-alumnos" class="ml-2">Alumnos</a>
                </div>

            </div>
        </section>
    </section>

    <section class="w-1/2 p-4">
        <section id="home" class="flex w-full bg-white p-4 " style="width: 1450px;">
            <div>
                <p class="ml-2"><span class="material-symbols-outlined">menu</span>
                    <a href="/home-maestro">Home</a>
                </p>
            </div>
            <div class="ml-auto">
            <div class="ml-auto">

                <h6>Maestro <?php echo $userData['nombre']; ?></h6>
            </div>
            <div>
                <form action="/exit" method="post" class="mt-4">
                    <button type="submit" name="logout" class="bg-red-500 text-white px-2 py-1">Exit</button>
                </form>

            </div>
        </section>

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Califica y comenta</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p-6 max-w-screen-xl">
            <h6 class="text-left">Informacion de Usuario</h6>
            <p class="text-left">Los cambios realizados se veran reflejados hasta iniciar sesion nuevamente</p>
        </section>

        
        <form action="/calificacion-update" method="post" class="mt-4">

            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="mb-2">
    <label class="block">1.-Calificacion:</label>
    <input type="text" name="calificacion" value="<?= $data['calificacion']; ?>" class="border border-gray-300 w-full rounded p-2">
</div>


            <div class="mb-2">
                <label class="block">2.-Comentarios</label>
                <input type="text" name="comentarios" value="<?= $data['comentarios']; ?>" class="border border-gray-300 w-full rounded p-2">
            </div>

            <button type="submit" name="guardar" class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 mt-4">
                Guardar cambios
            </button>
            <a href="/vista-maestro-alumnos" class="bg-neutral-400 hover:bg-teal-400 text-white rounded p-2 mt-4">Cancelar</a>
        </form>
 
    </section>
</body>

</html>