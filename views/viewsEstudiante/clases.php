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
            <h1 class="text-center text-4xl text-black p-6">Esquema de Clases</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p- max-w-screen-xl">
            <h6 class="text-left">Tus Materias Inscritas</h6>
            <p class="text-left"></p>
        </section>
        <section>
            <div class="w-full p-4 overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead>
                        <tr>

                            <th class="border border-gray-300 text-left align-middle">Materia</th>
                            <th class="border border-gray-300 text-left align-middle">Dar de baja</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($data as $index => $admin) { ?>
                            <tr class="<?= $index % 2 === 0 ? 'bg-slate-300' : 'bg-white' ?>">


                                <td class="border border-gray-300"><?= $admin["nombre_materia"] ?></td>
                                <td class="border border-gray-300 ">

                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?= $admin['nombre_materia'] ?>">
                                        <button type="submit">
                                            <span class="material-symbols-outlined text-red-600">delete</span>
                                        </button>
                                    </form>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </section>
        <section>
            
        <div class="mb-2">
           <form action="">
           <label class="block">Materias pendientes</label>
                <select name="id_materia" class="border border-gray-300 w-full rounded p-2">
                    <?php

                    foreach ($materias as $admin ) {
                        echo "<option value='{$admin['id']}'>{$admin['materia']}</option>";
                    }

                    ?>
                </select>
                <button type="submit" name="guardar" class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 mt-4">
                Agregar
            </button>
           </form>
        </section>
    </section>
</body>


</html>