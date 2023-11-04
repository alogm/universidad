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
            <h2>admin</h2>
            <p>Administrador</p>
        </section>

        <section id="cuerpo" class="mt-2">
            <h2 class="text-center mb-2">MENU ADMINISTRACIÓN</h2>
            <div class="flex flex-col items-center">
                <div>
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <a href="/views/viewsAdmin/adminPermisos.php" class="ml-2">Permisos</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">tv_signin</span>
                    <a href="/views/viewsAdmin/adminMaestro.php" class="ml-2">Maestros</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">school</span>
                    <a href="" class="ml-2">Alumnos</a>
                </div>
                <div>
                    <span class="material-symbols-outlined">table_restaurant</span>
                    <a href="" class="ml-2">Clases</a>
                </div>
            </div>
        </section>
    </section>

    <section class="w-1/2 p-4">
        <section id="home" class="flex w-full bg-white p-4 " style="width: 1450px;">
            <div>
                <p class="ml-2"><span class="material-symbols-outlined">menu</span>
                    home</p>
            </div>
            <div class="ml-auto">
                <button> <span class="material-symbols-outlined">
                        expand_more
                    </span></button>
                Administrador
            </div>
        </section>

        <section id="Dashboard" class="mb-4">
            <h1 class="text-center text-4xl text-black p-6">Agregar Nuevo Maestro</h1>
        </section>

        <section id="bienvenido" class="w-full bg-white p-6 max-w-screen-xl">
            <h6 class="text-left">Bienvenido</h6>
            <p class="text-left">Selecciona la acción que quieras realizar en las pestañas del menú de la izquierda</p>
        </section>

        <form action="/index.php/create" method="post" class="mt-4">
            <div class="mb-2">
                <label class="block">1.-Maestro:</label>
                <input type="text" name="maestro" class="border border-gray-300 w-full rounded p-2">
            </div>

            <div class="mb-2">
                <label class="block">2.-Email:</label>
                <input type="text" name="email" class="border border-gray-300 w-full rounded p-2">
            </div>

            <div class="mb-2">
                <label class="block">3.-Contraseña:</label>
                <input type="text" name="contrasena" class="border border-gray-300 w-full rounded p-2">
            </div>

            <div class="mb-2">
                <label class="block">4.-Direccion:</label>
                <input type="text" name="direccion" class="border border-gray-300 w-full rounded p-2">
            </div>

            <div class="mb-2">
                <label class="block">5.-Telefono:</label>
                <input type="number" name="telefono" class="border border-gray-300 w-full rounded p-2">
            </div>

            <div class="mb-2">
                <label class="block">6.-Foto:</label>
                <input type="text" name="foto" class="border border-gray-300 w-full rounded p-2">
            </div>

            <div class="mb-2">
                <label class="block">2.-Id Maestro:</label>
                <input type="number" name="id_maestro" class="border border-gray-300 w-full rounded p-2">
            </div>

            <button type="submit" name="guardar" class="bg-blue-500 hover:bg-blue-600 text-white rounded p-2 mt-4">
                Guardar
            </button>
        </form>
    </section>
</body>



</html>

