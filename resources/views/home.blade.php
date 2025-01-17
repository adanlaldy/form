<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="text-4xl font-semibold py-10 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-20">
            <a href="{{ route('home') }}">Survey Project</a>
        </div>
        <div class="flex justify-end space-x-8 items-center">
            <a href="{{ route('get.register') }}" class="text-center rounded-lg text-lg py-2 px-2 bg-blue-700 text-white
            hover:bg-blue-600 shadow-lg">Register</a>
            <a href="{{ route('get.login') }}"
               class="text-center rounded-lg text-lg py-2 px-2 bg-blue-700 text-white hover:bg-blue-600 shadow-lg">Login</a>
        </div>
    </div>
</header>
<main>
    <section class="flex flex-col items-center">
        <h1 class="text-2xl font-semibold py-8">Welcome to the Survey platform!</h1>
        <p class="text-lg">You can create customizable survey and see what people answer.</p>
        <div class="flex flex-row justify-evenly pt-24 w-1/2">
            <a class="text-center rounded-lg text-lg py-8 w-1/4 bg-blue-700 text-white hover:bg-blue-600 hover:animate-bounce ease-out duration-300 shadow-lg"
               href="{{ route('get.register') }}">
                <button type="submit">Register</button>
            </a>
            <a class="text-center rounded-lg text-lg py-8 w-1/4 bg-blue-700 text-white hover:bg-blue-600 hover:animate-bounce ease-out duration-300 shadow-lg"
               href="{{ route('get.login') }}">
                <button type="submit">Login</button>
            </a>
        </div>
    </section>
</main>
</body>
</html>
