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
        <h2>admin:  <?php echo $userData['nombre']; ?></h2>
            <p>admin:  <?php echo $userData['correo']; ?></p>
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
            <h2 class="text-center mb-2">MENU ADMINISTRACIÓN</h2>
            <div class="flex flex-col items-center">
                <div>
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <a href="/vista-permisos" class="ml-2">Permisos</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">tv_signin</span>
                    <a href="/vista-maestros" class="ml-2">Maestros</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">school</span>
                    <a href="/vista-alumnos" class="ml-2">Alumnos</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">table_restaurant</span>
                    <a href="/vista-clases" class="ml-2">Clases</a>
                </div>
            </div>
        </section>
    </section>

    <section class="w-1/2 p-4">
        <section id="home" class="flex w-full bg-white p-4 " style="width: 1450px;">
            <div>
                <a href="/vista-home" class="ml-2"><span class="material-symbols-outlined">menu</span>Home</a>

            </div>
            <div class="ml-auto">
                Administrador
            </div>
            <div>
                <form action="/exit" method="post" class="mt-4">
                    <button type="submit" name="logout" class="bg-red-500 text-white px-2 py-1">Exit</button>
                </form>

            </div>
        </section>

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Editar Permiso</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p- max-w-screen-xl">
            <h6 class="text-left"></h6>
            <p class="text-left"></p>
        </section>

        <section>
            <div class="w-full p-4 overflow-x-auto">

                <form action="" method="post" class="mt-4">
                    <div class="mb-2">
                        <label class="block">1.-Email del Usuario:</label>
                        <input type="text" name="" class="border border-gray-300 w-full rounded p-2">
                    </div>

                    <div class="mb-2">
                        <label class="block">2.-Rol del usuario:</label>
                        <select name="" id="" class="border border-gray-300 w-full rounded p-2">

                        </select>
                    </div>
                    <a href="/vista-permisos" class="bg-zinc-700 hover:bg-blue-600 rounded-lg px-4 py-2 text-white ml-auto">Regresar</a>
                    <button type="submit" name="guardar" class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 mt-4">
                        Guardar
                    </button>
                </form>
            </div>
        </section>

    </section>
</body>


</html>