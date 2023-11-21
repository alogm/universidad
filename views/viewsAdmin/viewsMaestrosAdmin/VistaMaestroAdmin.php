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
            <h2>admin</h2>
            <p>Administrador</p>
        </section>

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
                <p class="ml-2"><span class="material-symbols-outlined">menu</span>
                    <a href="/vista-home">Home</a>
                </p>
            </div>
            <div class="ml-auto">
                <button> <span class="material-symbols-outlined">
                        expand_more
                    </span></button>
                Administrador
            </div>
        </section>

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Lista de Maestros</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p-6 max-w-screen-xl flex items-center">
            <h6 class="text-left">Informacion de Maestros</h6>
            <a href="/crear-maestros" class="bg-blue-500 hover:bg-blue-600 rounded-lg px-4 py-2 text-white ml-auto">
                Agregar Maestro
            </a>
        </section>


        <div class="w-full p-4 overflow-x-auto">
            <table class="w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 text-left align-middle">#</th>
                        <th class="border border-gray-300 text-left align-middle">Nombre</th>
                        <th class="border border-gray-300 text-left align-middle">Email</th>
                        <th class="border border-gray-300 text-left align-middle">Direccion</th>
                        <th class="border border-gray-300 text-left align-middle">Fecha de Nacimiento</th>
                        <th class="border border-gray-300 text-left align-middle">Clase Asignada</th>
                        <th class="border border-gray-300 text-left align-middle">Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $index => $admin) { ?>
                        <tr class="<?= $index % 2 === 0 ? 'bg-slate-300' : 'bg-white' ?>">

                            <td class="border border-gray-300"><?= $admin["id"] ?></td>
                            <td class="border border-gray-300"><?= $admin["nombre"] ?></td>
                            <td class="border border-gray-300"><?= $admin["correo"] ?></td>
                            <td class="border border-gray-300"><?= $admin["direccion"] ?></td>
                            <td class="border border-gray-300"><?= $admin["fecha_nacimieno"] ?></td>
                            <td class="border border-gray-300 ">

                                <form action="/maestro-delete" method="post">
                                    <input type="hidden" name="id" value="<?= $admin['id'] ?>">
                                    <button type="submit">
                                        <span class="material-symbols-outlined text-red-600">delete</span>
                                    </button>
                                </form>

                                <button>
                                    <a href=""> <span class="material-symbols-outlined">
                                            edit_square
                                        </span></a>
                                </button>
                            </td>

                        </tr>

                    <?php } ?>

                </tbody>
            </table>
        </div>


    </section>



</body>

</html>