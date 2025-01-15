<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="flex justify-center text-3xl font-semibold py-8 bg-gray-700 text-white">
    <a href="/">Survey Project</a>
</header>
<main>
    <section class="flex flex-col items-center">
        <h1 class="text-2xl font-semibold py-8">Welcome to the Survey platform!</h1>
        <p class="text-lg">You can create customizable survey and see what people answer.</p>
        <div class="flex flex-row justify-evenly pt-24 w-1/2">
            <a class="text-center rounded-lg text-lg py-8 w-1/4 bg-blue-700 text-white hover:bg-blue-600 hover:animate-bounce ease-out duration-300 shadow-lg"
               href="/register">
                <button type="submit">Register</button>
            </a>
            <a class="text-center rounded-lg text-lg py-8 w-1/4 bg-blue-700 text-white hover:bg-blue-600 hover:animate-bounce ease-out duration-300 shadow-lg"
               href="/login">
                <button type="submit">Login</button>
            </a>
        </div>
    </section>
</main>
</body>
</html>
