
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario no autorizado</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     
</head>
<body>
    <section class="bg-white dark:bg-gray-900 h-screen">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 my-auto">
            <div class="mx-auto max-w-screen-sm text-center">
                <h1 class=" text-5xl tracking-tight font-extrabold text-white">403</h1>
                <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">Acceso no autorizado!</p>
                <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">Lo siento, no cuenta con el rol correcto para acceder a esta pagina :D </p>
                <a href="{{route('clients')}}" class="inline-flex text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:focus:ring-primary-900 my-4">Regresar a inicio</a>
            </div>   
        </div>
    </section>
</body>
</html>