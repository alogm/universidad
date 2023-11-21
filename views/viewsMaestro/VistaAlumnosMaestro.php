<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
            <h2>Maestro</h2>
            <p>Maestros</p>
        </section>

        <section id="cuerpo" class="mt-2">
            <h2 class="text-center mb-2">MENU MAESTRO</h2>
            <div class="flex flex-col items-center">
               
                <div>
                    <span class="material-symbols-outlined">school</span>
                    <a href="" class="ml-2">Alumnos</a>
                </div>
              
            </div>
        </section>
    </section>

    <section class="w-1/2 p-4">
        <section id="home" class="flex w-full bg-white p-4 " style="width: 1450px;">
            <div>
            <div>
                <p class="ml-2"><span class="material-symbols-outlined">menu</span>
                <a href="/home-maestro">Home</a> </p>
            </div>
            </div>
            <div class="ml-auto">
                <a href="/edit-perfil-maestro"> <span class="material-symbols-outlined">
                        expand_more
                    </span></a>
                Maestro
            </div>
        </section>

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Alumnos de la Clase</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p- max-w-screen-xl">
            <h6 class="text-left">Alumnos de la clase</h6>
            <p class="text-left"></p>
        </section>
        <section>
        <div class="w-full p-4 overflow-x-auto">
            <table class="w-full border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 text-left align-middle">#</th>
                        <th class="border border-gray-300 text-left align-middle">Nombre de alumno</th>
                        <th class="border border-gray-300 text-left align-middle">Calificacion</th>
                        <th class="border border-gray-300 text-left align-middle">Mensaje</th>
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
                               <a href="/views/viewsAdmin/viewsMaestrosAdmin/EditarMaestroAdmin.php"> <span class="material-symbols-outlined">
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
    </section>
</body>


</html>