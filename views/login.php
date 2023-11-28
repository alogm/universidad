<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/dist/output.css" rel="stylesheet">
    <title>Document</title>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="bg-white p-8 rounded shadow-md max-w-xs w-full">
       

        <div class="flex justify-center mb-4">
            <img class="w-30 h-30 rounded-full" src="/img/logo.jpg" alt="logo universidad">
        </div>

        <form action="/inicio" method="post">
            <label class="block mb-2" for="correo">Email</label>
            <input class="w-full p-2 border rounded" type="text" name="correo" id="correo">

            <label class="block mt-4 mb-2" for="contrasena">Contraseña</label>
            <input class="w-full p-2 border rounded" type="password" name="contrasena" id="contrasena">

            <button class="mt-4 bg-blue-500 text-white py-2 px-4 rounded" type="submit">Enviar</button>
        </form>
    </div>
    
</body>
</html>