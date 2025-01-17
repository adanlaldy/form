<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Answers</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="flex justify-between items-center text-4xl font-semibold py-8 px-14 bg-gray-700 text-white">
    <div>
        <a href="{{ route('home') }}">Survey Project</a>
    </div>
    <div class="space-x-16 flex">
        <a href="{{ route('get.login') }}" class="flex size-14">
            <img src="/images/add.png" alt="new survey button">
        </a>
        <a href="{{ route('logout') }}" class="flex size-16">
            <img src="/images/logout.png" alt="logout button">
        </a>
    </div>
</header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="hover:text-blue-700 ease-out duration-300" href="/survey">Survey</a>
            <a class="text-blue-700" href="/answers">Answers</a>
        </div>
    </section>
</main>
</body>
</html>
